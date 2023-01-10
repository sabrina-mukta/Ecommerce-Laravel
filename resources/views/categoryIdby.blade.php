

<!--Future Product-->

    <section id="home-icon" class="py-5 text-center">
      <div class="container">

        <div class="my-2 pb-2">
          @foreach($catName as $data)
            <h2 class="text-left">{{$data->category_name}}</h2>
          @endforeach
            <hr>
        </div>

    <div class="row">

      @if(count($catbyIdData) > 0)
      @foreach($catbyIdData as $data)

        <div class="col-md-3 my-2" style="max-height: 500px;">
            <div class="card">
               <img src="{{asset($data->product_image)}}" class="product-img card-img-top">
              <div class="card-body">
               
              <h3 class="my-2 h5">{{substr($data->product_name,0,20)}}</h3>
              <p class="m-1">{{substr($data->product_sort_des,0,70)}}</p>

              <p class="m-0">Regular Price: <del>{{$data->product_regular_price}}</del>  TK</p>
              <p class="mb-1">Price: {{$data->product_price}} TK</p>
              <a href="{{url('productview/'.$data->product_id)}}"  class="btn btn-dark btn-block">Buy Now</a>
              </div>
            </div>
        </div>
        @endforeach
        @else
            <div class="col my-2 pb-2">
                <h2 class="text-center">Data not found</h2>
            </div>
        @endif

        </div>
      </div>
    </section>