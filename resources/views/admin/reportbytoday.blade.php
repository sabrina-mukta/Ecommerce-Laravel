<?php 
  
  use App\Models\orders;
  use App\Models\customer;

?>


<style type="text/css">


      @media print{
            html, body {
                  visibility: hidden;
                  height:100vh; 
                  margin: 0 !important; 
                  padding: 0 !important;
                  overflow: hidden;
            }

          .print{
              visibility: visible;
              border-collapse:collapse;
              border-spacing:0;
              top: 0;
              left: 0;
              position: absolute;
              width: 100%;
              margin-left: -100px;
          }

          .print_button{
            visibility: hidden;
          }

          @media page{
            size: a3;
          }
      }
</style>


 <div class="col-md-10">
  <div class="m-2 my-4">


        <div class="">
          <h3 class="d-inline-block">Today order report</h3>
          <button onclick="window.print()" class="float-right btn btn-primary">Print</button>
        </div>
        <hr>

        <div class="row">
          
          <div class="col-md-4 mx-auto">

            <!-- <form class="text-center">
              <div class="form-group">
                <input type="date" name="" class="form-control">
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary">
              </div>
            </form> -->

            <!-- <a href="{{url('reportbytoday/today')}}" class="btn btn-primary my-2">Today Sales Report</a> -->

            <!-- <form method="get" class="text-center">
              <div class="form-group">
                <input type="date" name="data" class="form-control">
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary">
              </div>
            </form> -->

            <a href="?action=today" class="btn btn-primary my-2">Today Sales Report</a>

          </div>
          
        </div>

      <div class="row print">
        <div class="col-md-12">
           @if($actionData == "today")
           @if(count($todayorderData) > 0)
          <div class="card">
            <div class="card-body">

              <p class="h5">Today Sales list</p>
              
              <table class="table">
                <tr>
                  <th width="10%">SL</th>
                  <th width="20%">Product Name</th>
                  <th width="25%">Order Date</th>
                  <th width="20%">Qty</th>
                  <th width="25%">Price</th>
                </tr>
                <?php 
                  $i = 1;
                  $totalQty = 0;
                  $totalPrice = 0;
                ?>
                @foreach($todayorderData as $data)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$data->orders_product_name}}</td>
                  <td>{{date('H:i a d-F-y',strtotime($data->orders_date))}}</td>
                  <td><?php 
                  $totalQty += $data->orders_product_qty;
                  echo $data->orders_product_qty;
                ?></td>
                  <td><?php 
                  $totalPrice += $data->orders_product_price;
                  echo $data->orders_product_price;
                ?></td>
                </tr>
                @endforeach
                 <tr>
                  <hr>
                  <th colspan="3" class="text-center">Sub Total</th>
                  <th>{{$totalQty}}</th>
                  <th>{{$totalPrice}}</th>
                </tr>
                
              </table>
            </div>
          </div>
          @else
            <p class="text-danger text-center">Data no found!</p>
          @endif
          @endif
        </div>

      </div>
      


  </div>
</div>