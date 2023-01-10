


<?php 

  use App\Models\product;

?>
    <!--Latest Product-->
@include('inc.header')
@include('inc.slider')
    <section id="home-icon" class="py-5 text-center">
      <div class="container">

        <div class="my-2 pb-2">
            <h2 class="text-left">Latest product</h2>
            <hr>
        </div>

    <div class="row">


        @foreach($productLatestData as $data)

        <div class="col-md-3 my-2" style="max-height: 500px;">
            <div class="card">
               <img src="{{$data->product_image}}" class="product-img card-img-top">
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



        

          

        </div>
      </div>
    </section>


<!--Category Product-->

    <section id="home-icon" class="py-5 text-center">
      <div class="container">

        <div class="my-2 pb-2">
            <h2 class="text-left">Category product</h2>
            <hr>
        </div>

    <div class="row">


    @foreach($categoryData as $data)

        
        <?php

          $getProductCategoryData = product::where('product_category_id',$data->product_category_id)
            ->orderby('product_category_id','DESC')
            ->limit(1)
            ->get();
        ?>

         @foreach($getProductCategoryData as $cdata)

        <div class="col-md-3 my-2" style="max-height: 500px;">
            <div class="card">
               <img src="{{$cdata->product_image}}" class="product-img card-img-top">
              <div class="card-body">
               
              <h3 class="my-2 h5">{{substr($cdata->product_name,0,20)}}</h3>
              <p class="m-1">{{substr($cdata->product_sort_des,0,70)}}</p>

              <p class="m-0">Regular Price: <del>{{$cdata->product_regular_price}}</del>  TK</p>
              <p class="mb-1">Price: {{$cdata->product_price}} TK</p>
              <a href="productview/{{$cdata->product_id}}"  class="btn btn-dark btn-block">Buy Now</a>
              </div>
            </div>
        </div>

        @endforeach

    @endforeach



        

          

        </div>
      </div>
    </section>



<!--Top brand Product-->

    <section id="home-icon" class="py-5 text-center">
      <div class="container">

        <div class="my-2 pb-2">
            <h2 class="text-left">Top Brand</h2>
            <hr>
        </div>

    <div class="row">


    @foreach($brandData as $data)

        
        <?php

          $getBrandData = product::where('product_brand_id',$data->product_brand_id)
            ->orderby('product_brand_id','DESC')
            ->limit(1)
            ->get();
        ?>

         @foreach($getBrandData as $cdata)

        <div class="col-md-3 my-2" style="max-height: 500px;">
            <div class="card">
               <img src="{{$cdata->product_image}}" class="product-img card-img-top">
              <div class="card-body">
               
              <h3 class="my-2 h5">{{substr($cdata->product_name,0,20)}}</h3>
              <p class="m-1">{{substr($cdata->product_sort_des,0,70)}}</p>

              <p class="m-0">Regular Price: <del>{{$cdata->product_regular_price}}</del>  TK</p>
              <p class="mb-1">Price: {{$cdata->product_price}} TK</p>
              <a href="productview/{{$cdata->product_id}}"  class="btn btn-dark btn-block">Buy Now</a>
              </div>
            </div>
        </div>

        @endforeach

    @endforeach



        

          

        </div>
      </div>
    </section>
@include('inc.footer')


