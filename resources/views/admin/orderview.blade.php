<?php 
  
  use App\Models\orders;
  use App\Models\customer;

?>
 <div class="col-md-10">
  <div class="m-2 my-4">


        <h3>Order List</h3>
        <hr>

      <div class="row">

        <div class="col-md-7">
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
                  <td>Action</td>
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
                  <td>
                    <a href="{{url('/orderShifted/'.$data->orders_id)}}" class="btn btn-primary" onclick="return confirm('Are you sure product shifted?')"><i class="fa fa-edit"></i></a>
                  </td>
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

        <div class="col-md-5">
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

      </div>
      


  </div>
</div>

