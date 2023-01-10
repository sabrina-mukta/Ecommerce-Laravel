<?php 

  use App\Models\product;
  use App\Models\brand;

?>


    <!--Latest Product-->

    <section id="home-icon" class="py-5 text-center">
      <div class="container">

    @foreach($brandData as $data)

    <?php 

        $brandNameData = brand::where('brand_id',$data->brand_id)
        ->get();

    ?>

    


    @foreach($brandNameData as $brandData)

        <div class="my-4 pb-2">
            <h2 class="text-left">{{$brandData->brand_name}}</h2>
            <hr>
        </div>

    <?php 

        $productbrandData = product::where('product_brand_id',$brandData->brand_id)
        ->orderby('product_id','DESC')
        ->limit(4)
        ->get();

    ?>
<div class="row">
    @if(count($productbrandData) >0 )
    @foreach($productbrandData as $brandProductData)

    

        <div class="col-md-3 my-2" style="max-height: 500px;">
            <div class="card">
               <img src="{{$brandProductData->product_image}}" class="product-img card-img-top">
              <div class="card-body">
               
              <h3 class="my-2 h5">{{substr($brandProductData->product_name,0,20)}}</h3>
              <p class="m-1">{{substr($brandProductData->product_sort_des,0,70)}}</p>

              <p class="m-0">Regular Price: <del>{{$brandProductData->product_regular_price}}</del>  TK</p>
              <p class="mb-1">Price: {{$brandProductData->product_price}} TK</p>
              <a href="{{url('productview/'.$brandProductData->product_id)}}"  class="btn btn-dark btn-block">Buy Now</a>
              </div>
            </div>
        </div>

    

        @endforeach
        @else

        <div class="col my-2" style="max-height: 500px;">
            <h4>Comimg soon</h4>
        </div>

        @endif
</div>


      

    @endforeach




  @endforeach


      </div>
  </section>