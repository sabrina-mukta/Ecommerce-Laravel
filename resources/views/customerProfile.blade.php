
    @if(!Session::get('customerLogin'))
        <script type="text/javascript">
            window.location.assign('/isdb-ecommerce/project-isdb/public/');
        </script>
    @endif

    <section id="home-icon" class="pt-2 pb-5 text-center" style="background: #f3f3f3;">
      <div class="container">

        <div class="my-2 pb-2">
            <h2 class="text-left">Customer Details</h2>
            <hr>
        </div>

        <div class="row">

            <div class="col-md-5 text-left">
                <div class="card">
                    <div class="card-body">
                        <h5>Your Information:</h5>
                        @foreach($customerData as $data)
                        <table class="table">
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td>{{$data->customers_name}}</td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td>{{$data->customers_username}}</td>
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
                                <td>Address</td>
                                <td>:</td>
                                <td>{{$data->customers_address_line}}<br>{{$data->customers_address_line_two}}</td>
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
                        <a href="{{url('/customerUpdateData')}}" class="btn btn-primary float-right">Change</a>
                    </div>
                </div>
            </div>

            <div class="col-md-7">

                <div class="row">
                    <div class="col-md-12 text-left">
                        <div class="card">
                            <div class="card-body">
                                <h5>Pending order list:</h5>
                                <hr>
                                @if(count($buyproductData) >0)
                                <table class="table">
                                   <tr>
                                       <th>SL</th>
                                       <th>Product</th>
                                       <th>Image</th>
                                       <th>Qty</th>
                                       <th>Price</th>
                                       <th>Status</th>
                                       <th>Date</th>
                                       <th>Action</th>
                                   </tr>
                                   <?php

                                    $i = 1;

                                   ?>
                                    @foreach($buyproductData as $buyData)
                                    

                                   <tr>
                                       <td>{{$i++}}</td>
                                       <td>{{substr($buyData->orders_product_name,0,10)}}</td>
                                       <td><img height="30" width="30" src="{{$buyData->orders_product_image}}"></td>
                                       <td>{{$buyData->orders_product_qty}}</td>
                                       <td>{{$buyData->orders_product_price}}</td>
                                       <td>
                                           @if($buyData->orders_status == 1)
                                            pending
                                           @else
                                            Completed
                                           @endif
                                       </td>
                                       <td>
                                        <?php
                                            echo date('d/m/y',strtotime($buyData->orders_date));
                                        ?>
                                        </td>
                                       <td>
                                            <button class="btn btn-danger" data-toggle="modal" onclick="setId('{{$buyData->orders_id}}')" data-target="#deleteBrand"><i style="font-size: 18px;" class="fa fa-trash"></i></button>
                                       </td>
                                   </tr>

                                   @endforeach

                                </table>
                                @else
                                    <p class="lead text-center py-2">Data not found.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 text-left mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h5>Completed Order:</h5>
                                <hr>
                                @if(count($buyproductDataComplete) >0)
                                <table class="table">
                                   <tr>
                                       <th>SL</th>
                                       <th>Product Name</th>
                                       <th>Image</th>
                                       <th>Qty</th>
                                       <th>Price</th>
                                       <th>Order Date</th>
                                       <th>Status</th>
                                   </tr>
                                   <?php

                                    $i = 1;

                                   ?>
                                    @foreach($buyproductDataComplete as $buyData)
                                    

                                   <tr>
                                       <td>{{$i++}}</td>
                                       <td>{{substr($buyData->orders_product_name,0,10)}}</td>
                                       <td><img height="30" width="30" src="{{$buyData->orders_product_image}}"></td>
                                       <td>{{$buyData->orders_product_qty}}</td>
                                       <td>{{$buyData->orders_product_price}}</td>
                                       <td>
                                        <?php
                                            echo date('d/m/y',strtotime($buyData->orders_date));
                                        ?>
                                       </td>
                                       <td>
                                           @if($buyData->orders_status == 1)
                                            pending
                                           @else
                                            Completed
                                           @endif
                                       </td>
                                   </tr>

                                   @endforeach

                                </table>
                                @else
                                    <p class="lead text-center py-2">Data not found.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

      </div>
    </section>

     <!-- Modal for delete-->
  <div class="modal fade" id="deleteBrand">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Order Cancel</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <p>Are you sure cancel order?</p>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="delId" onclick="deleteDdata(this.id)">Yes</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </div>
        
      </div>
    </div>
  </div>

  <script type="text/javascript">




    function deleteDdata(id){
      var id = $("#"+id).val();
      $.ajax({
          url : "orderDelete/"+id,
          processData : false,
          contentType : false,
          success : function(data){
            window.location.assign("customerProfile");
          }
      });
    }

    function setId(getId){
      $("#delId").val(getId);
    }
  

    

  </script>



