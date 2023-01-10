

  <div class="col-md-10" style="background: #f5f6fa;">

    <div class="card my-2">

          <div class="card my-4">
      

      <div class="card-body">
        <h3>Add Product</h3>
        <hr>
        @if(Session::get('success'))
          <p class="text-success h6 mb-3">{{Session::get('success')}}</p>
        @endif

        @if(Session::get('error'))
          <p class="text-danger h6">{{Session::get('error')}}</p>
        @endif




        <form action="addProduct" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">

            <div class="col-md-6 form-group">
               <input type="text" class="form-control" name="product_name" placeholder="Product name" value="{{ old('product_name') }}">

                @error('product_name')
                  <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>


            <div class="col-md-6 form-group">
               <input type="text" class="form-control" name="product_sort_des" placeholder="Product Sort Desciption" value="{{ old('product_sort_des') }}">
                @error('product_sort_des')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-6 form-group">
               <input type="number" class="form-control" min="0" name="product_regular_price" placeholder="Regular price" value="{{ old('product_regular_price') }}">

                @error('product_regular_price')
                  <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>


            <div class="col-md-6 form-group">
               <input type="number" class="form-control" min="0" name="product_price" placeholder="Product price" value="{{ old('product_price') }}">
                @error('product_price')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-6 form-group">

               <select class="form-control" name="product_brand_id">
                 <option value="">Select Brand</option>
                 @foreach($brandData as $value)
                  <option value="{{$value->brand_id }}">{{$value->brand_name}}</option>
                @endforeach
               </select>

                @error('product_brand_id')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-6 form-group">

               <select class="form-control" name="product_category_id">
                 <option value="">Select Category</option>

                 @foreach($categoryData as $value)
                  <option value="{{$value->category_id }}">{{$value->category_name}}</option>
                @endforeach

               </select>

                @error('product_category_id')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-12 form-group">
              <textarea class="form-control" name="product_description" rows="5" placeholder="Product desciption"></textarea>

              <script>CKEDITOR.replace('product_description');</script>

                @error('product_description')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-12 form-group">
              <input type="file" name="product_image" class="form-control-file">

                @error('product_image')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-12 form-group">
              <input type="submit" value="Save" class="btn btn-primary">
            </div>
            

          </div>
        </form>

      </div>
    </div>
 
    </div>
  </div>

    