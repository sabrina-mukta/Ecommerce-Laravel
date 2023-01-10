

<!--Future Product-->

    <section id="home-icon" class="py-5 text-center">
      <div class="container">

        <div class="my-2 pb-2">
            <h2 class="text-left">Product Details</h2>
            <hr>
        </div>

        <div class="row">

          <div class="col-md-9">

        @if(count($productData) > 0)
        @foreach($productData as $data)

            <div class="row">



               <div class="col-md-6">
                 <img class="" src="{{asset($data->product_image)}}">
               </div>

               <div class="col-md-6 text-left">




                 
                 <h3>{{$data->product_name}}</h3>
                 <p class="lead">
                    {{$data->product_sort_des}}
                 </p>
                 <p><del>Reqular Price: <strong>{{$data->product_regular_price}}</strong> TK</del></p>
                 <p>Price: <strong>{{$data->product_price}}</strong> TK</p>
                 <p>Category: <strong>{{$data->category_name}}</strong></p>
                 <p>Brand: <strong>{{$data->brand_name}}</strong></p>

                  @if(Session::get('product_added_exist'))
                    <p class="text-danger h6 mb-3">{{Session::get('product_added_exist')}}</p>
                  @endif

                  @if(Session::get('product_added_error'))
                    <p class="text-danger h6 mb-3">{{Session::get('product_added_error')}}</p>
                  @endif

                 <form class="form-inline" action="{{url('/buyproduct')}}" method="post">
                  @csrf

                   <input type="hidden" value="{{$data->product_id}}" name="product_id">

                   <input type="number" min="1" max="100" name="qty" value="1" class="form-control mr-2">

                   <input type="submit"  class="btn btn-primary" value="Add to cart">

                 </form>
                 <form class="form-inline mt-2" action="{{url('/buyproduct')}}" method="post">
                  @csrf

                   <input type="hidden" value="{{$data->product_id}}" name="product_id">

                   <select name="" id="" class="form-control mr-2">
                   <option value="">small</option>
                   <option value="">medium</option>
                   <option value="">large</option>

                  </select>

                   <input type="submit"  class="btn btn-primary" value="Custom Size">

                 </form>
                 <form class="form-inline mt-2" action="{{url('/buyproduct')}}" method="post">
                  @csrf

                   <input type="hidden" value="{{$data->product_id}}" name="product_id">

                   <select name="" id="" class="form-control mr-2">
                   <option value="">Red</option>
                   <option value="">Black</option>
                   <option value="">White</option>

                  </select>

                   <input type="submit"  class="btn btn-primary" value="Custom Color">

                 </form>

               </div>

               <div class="col text-left">
                <button class="btn btn-dark btn-block text-left mb-4 mt-4">Product Description</button>
                  <?php echo $data->product_description; ?>
                </div>

            </div>

            @endforeach

          @else
            <div class="my-2 pb-2">
                <h2 class="text-center">Data not found</h2>
            </div>
          @endif

          </div>

          <div class="col-md-3 text-left">
              <div class="ml-4">
                  <h3>CATEGORIES</h3>
                  <ul class="list-unstyled">

                  @if(count($categoryData) > 0)

                    @foreach($categoryData as $data)

                   <li class="p-1" style="border-bottom: 1px #b99b9b dashed;font-size: 18px;"><a style="text-decoration: none;color: #666;" href="{{url('category/'.$data->category_id)}}">{{$data->category_name}}</a></li>

                   @endforeach

                  @else
                    <p class="text-center">Not found</p>
                  @endif
                   


                  </ul>
              </div>
          </div>







        </div>
        
      </div>
    </section>