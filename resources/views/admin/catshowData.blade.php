
<div class="col-md-5 mx-auto">
      <div class="card mt-5">
            <div class="card-body">


      @foreach($catshowData as $data)
      <form method="post" action="{{url('/categorydataupdate')}}">
      @csrf

      <div class="form-group">
            <label>Brands</label>

<select class="form-control" name="brand_id">
      <option>Select Brand</option>
      @foreach($brandshowData as $dataBrand)

      @if($dataBrand->brand_id == $data->brand_id)
      <option selected="" value="{{$dataBrand->brand_id}}">{{$dataBrand->brand_name}}</option>
      @else
            <option value="{{$dataBrand->brand_id}}">{{$dataBrand->brand_name}}</option>
      @endif

      @endforeach
</select>

      </div>

      <div class="form-group">
            <label>Categroy Name</label>

            <input type="hidden" name="category_id" value="{{$data->category_id}}">

            <input type="text" name="category_name" value="{{$data->category_name}}" class="form-control">
      </div>

      <input type="submit" value="Update" class="btn btn-primary">


     </form>
     @endforeach


            </div>
      </div>
 </div>