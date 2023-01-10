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
          <h3 class="d-inline-block">Order Completed</h3>
          <button onclick="window.print()" class="float-right btn btn-primary">Print</button>
        </div>
        <hr>

      <div class="row print">

        

        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <p class="h5">Customer Infomation</p>
              
              @foreach($customerInfo as $data)
              <table class="table">
                <tr>
                  <td>Name</td>
                  <td>:</td>
                  <td>{{$data->customers_name}}</td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td>:</td>
                  <td>{{$data->customers_email}}</td>
                </tr>

                <tr>
                  <td>Phone</td>
                  <td>:</td>
                  <td>{{$data->customers_phone}}</td>
                </tr>

                <tr>
                  <td>Zipcode</td>
                  <td>:</td>
                  <td>{{$data->customers_zipcode}}</td>
                </tr>

                <tr>
                  <td>District</td>
                  <td>:</td>
                  <td>{{$data->customers_district}}</td>
                </tr>

                <tr>
                  <td>Country</td>
                  <td>:</td>
                  <td>{{$data->customers_country}}</td>
                </tr>

              </table>
               @endforeach
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <p class="h5">Customer order list</p>
              @if(count($orderDataList) > 0)
              <table class="table">
                <tr>
                  <td>SL</td>
                  <td>Product Name</td>
                  <td>Qty</td>
                  <td>Price</td>
                  <td>Date</td>
                </tr>

                <?php 
                  $i = 1;
                ?>

                @foreach($orderDataList as $data)

                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$data->orders_product_name}}</td>
                  <td>{{$data->orders_product_qty}}</td>
                  <td>{{$data->orders_product_price}}</td>
                  <td>{{date('h:i a d/m/y',strtotime($data->orders_date))}}</td>
                </tr>
                @endforeach

              </table>
              @else
                <hr>
                <p class="text-center">Data not found.</p>
              @endif
            </div>
          </div>
        </div>

      </div>
      


  </div>
</div>

