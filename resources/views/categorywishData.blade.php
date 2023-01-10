<?php 

  use App\Models\product;
  use App\Models\category;

?>


    <!--Latest Product-->

    <section id="home-icon" class="py-5 text-center">
      <div class="container">

    @foreach($categoryData as $data)

    <?php 

        $categoryNameData = category::where('category_id',$data->category_id)
        ->get();

    ?>

    


    @foreach($categoryNameData as $catData)

        <div class="my-2 pb-2">
            <h2 class="text-left">{{$catData->category_name}}</h2>
            <hr>
        </div>

    <?php 

        $productCatwishData = product::where('product_category_id',$catData->category_id)
        ->orderby('product_id','DESC')
        ->limit(4)
        ->get();

    ?>
<div class="row">
    @if(count($productCatwishData) >0 )
    @foreach($productCatwishData as $catProductData)

    

        <div class="col-md-3 my-2" style="max-height: 500px;">
            <div class="card">
               <img src="{{$catProductData->product_image}}" class="product-img card-img-top">
              <div class="card-body">
               
              <h3 class="my-2 h5">{{substr($catProductData->product_name,0,20)}}</h3>
              <p class="m-1">{{substr($catProductData->product_sort_des,0,70)}}</p>

              <p class="m-0">Regular Price: <del>{{$catProductData->product_regular_price}}</del>  TK</p>
              <p class="mb-1">Price: {{$catProductData->product_price}} TK</p>
              <a href="{{url('productview/'.$catProductData->product_id)}}"  class="btn btn-dark btn-block">Buy Now</a>
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