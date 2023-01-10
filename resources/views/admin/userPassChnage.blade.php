
<div class="col-md-5 mx-auto">
      <div class="card mt-5">
            <div class="card-body">
      <h5 class="text-center">Password change</h5>
      <hr>
      @if(Session::get('passError'))
            <p class="text-center text-danger">{{Session::get('passError')}}</p>
      @endif

      @if(Session::get('passSuccess'))
            <p class="text-center text-success">{{Session::get('passSuccess')}}</p>
      @endif

      <form method="post" action="{{url('/passwordChange')}}">
      @csrf

      <div class="form-group">
            <label>Old Password</label>
            <input type="password" name="password_old" value="{{old('password_old')}}" class="form-control">
            @error('password_old')
            <small class="text-danger">{{ $message }}</small>
            @enderror

      </div>

      <div class="form-group">
            <label>New Password</label>
            <input type="password" value="{{old('password_new')}}" name="password_new" class="form-control">
            @error('password_new')
            <small class="text-danger">{{ $message }}</small>
            @enderror
      </div>

      <div class="form-group">
            <label>Retype Password</label>
            <input type="password" name="password_retype" value="{{old('password_retype')}}" class="form-control">
            @error('password_retype')
            <small class="text-danger">{{ $message }}</small>
            @enderror
      </div>

      <input type="submit" value="Update" class="btn btn-primary">


     </form>


            </div>
      </div>
 </div>