<style type="text/css">
      body{
            background: #f3f3f3;
      }
      .dashboard{}
      .dashboard i{font-size: 35px;}
      .dashboard p{font-size: 18px;}
      .dashboard h5{font-size: 24px;}
</style>
<div class="col-md-10">
      <div class="row mt-2 mb-4 dashboard">
            @if(session()->get('user_id') == 1 || session()->get('user_id') == 2)
            <div class="col-md-4 my-2">
                  <div class="card">
                        <div class="card-body text-center">
                              <i class="fa fa-money" aria-hidden="true"></i>
                              <p class="mt-2 mb-0">TK. <?php 
                              $todaySales = 0;
                              foreach($ordersCount as $data){
                                   $todaySales += $data->orders_product_price;
                              }
                              echo $todaySales
                        ?></p>
                              <h5 class="m-0">Today Sales</h5>
                        </div>
                  </div>
            </div>            
            @endif
            <div class="col-md-4 my-2">
                  <div class="card">
                        <div class="card-body text-center">
                              <i class="fa fa-btc" aria-hidden="true"></i>
                              <p class="mt-2 mb-0">TK. 
                        <?php 
                              $totalSales = 0;
                              foreach($totalBalance as $data){
                                   $totalSales += $data->orders_product_price;
                              }
                              echo $totalSales
                        ?>
                              </p>
                              <h5 class="m-0">Total Balance</h5>
                        </div>
                  </div>
            </div>            

            <div class="col-md-4 my-2">
                  <div class="card">
                        <div class="card-body text-center">
                              <i class="fa fa-user-plus" aria-hidden="true"></i>
                              <p class="mt-2 mb-0">{{$customerCount}}</p>
                              <h5 class="m-0">Total Customer</h5>
                        </div>
                  </div>
            </div>            

            <div class="col-md-4 my-2">
                  <div class="card">
                        <div class="card-body text-center">
                              <i class="fa fa-product-hunt"></i>
                              <p class="mt-2 mb-0">{{$productCount}}</p>
                              <h5 class="m-0">Total Product</h5>
                        </div>
                  </div>
            </div>           

            <div class="col-md-4 my-2">
                  <div class="card">
                        <div class="card-body text-center">
                              <i class="fa fa-first-order" aria-hidden="true"></i>
                              <p class="mt-2 mb-0">{{$penddingOrdersCount}}</p>
                              <h5 class="m-0">New Order</h5>
                        </div>
                  </div>
            </div>            

            <div class="col-md-4 my-2">
                  <div class="card">
                        <div class="card-body text-center">
                              <i class="fa fa-pause" aria-hidden="true"></i>
                              <p class="mt-2 mb-0">{{$penddingConfirmOrdersCount}}</p>
                              <h5 class="m-0">Pending Order</h5>
                        </div>
                  </div>
            </div>            

            <div class="col-md-4 my-2">
                  <div class="card">
                        <div class="card-body text-center">
                              <i class="fa fa-list"></i>
                              <p class="mt-2 mb-0">{{$completeOrdersCount}}</p>
                              <h5 class="m-0">Completed Order</h5>
                        </div>
                  </div>
            </div>            
            @if(session()->get('user_id') == 1 || session()->get('user_id') == 2)
            <div class="col-md-4 my-2">
                  <div class="card">
                        <div class="card-body text-center">
                              <i class="fa fa-eercast" aria-hidden="true"></i>
                              <p class="mt-2 mb-0">{{$brandCount}}</p>
                              <h5 class="m-0">Total Brand</h5>
                        </div>
                  </div>
            </div>


            <div class="col-md-4 my-2">
                  <div class="card">
                        <div class="card-body text-center">
                              <i class="fa fa-stop-circle-o" aria-hidden="true"></i>
                              <p class="mt-2 mb-0">{{$categoryCount}}</p>
                              <h5 class="m-0">Total Category</h5>
                        </div>
                  </div>
            </div>
            @endif

      </div>
 </div>