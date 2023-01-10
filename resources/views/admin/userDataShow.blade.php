
<div class="col-md-5 mx-auto">
      <div class="card mt-5">
            <div class="card-body">

      @if(session('errorImage'))
      <p class="text-danger text-center">{{session('errorImage')}}</p>
      @endif

      @foreach($getUserDataShow as $data)
      <form method="post" action="{{url('/userprofileuniqUpdate')}}">
      @csrf

      <div class="form-group">
            <label>Name</label>
            <input type="hidden" name="user_id" value="{{$data->user_id}}">
            <input type="text" name="user_full_name" value="{{$data->user_full_name}}" class="form-control">
      </div>

      <div class="form-group">
            <label>Username</label>
            <input type="text" name="user_name" value="{{$data->user_name}}" class="form-control">
      </div>

      <div class="form-group">
            <label>Phone</label>
            <input type="text" name="user_phone" maxlength="11" value="{{$data->user_phone}}" class="form-control">
      </div>

      <input type="submit" value="Update" class="btn btn-primary">


     </form>
     @endforeach


            </div>
      </div>
 </div>