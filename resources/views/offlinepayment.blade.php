
    @if(!Session::get('customerLogin'))
        <script type="text/javascript">
            window.location.assign('/isdb-ecommerce/project-isdb/public/');
        </script>
    @endif

    <section id="home-icon" class="pt-2 pb-5 text-center" style="background: #f3f3f3;">
      <div class="container">

        <div class="pb-2">
            <h2 class="text-left">Payment cash on delivery</h2>
            <hr>
        </div>

        <div class="row">

            <div class="col-md-7 text-left">
                <div class="card">
                    <div class="card-body">
                        <h5>Your Order Details:</h5>
                        <table class="table">
                           <tr>
                               <th>SL</th>
                               <th>Product Name</th>
                               <th>Price</th>
                               <th>Qty</th>
                               <th>Total Price</th>
                           </tr>
                           <?php 

                                $i= 1;
                                $totalValue = 0;
                            ?>
                           @foreach($cartProductfinalData as $data)

                           <tr>
                               <td>{{$i++}}</td>
                               <td>{{$data->cart_product_name}}</td>
                               <td>TK. {{$data->cart_product_price}}</td>
                               <td>{{$data->cart_product_qty}}</td>
                               <td>TK. <?php 

                                $totalValue += $data->cart_product_qty*$data->cart_product_price;
                                echo $data->cart_product_qty*$data->cart_product_price;

                           ?></td>

                           </tr>

                           @endforeach

                        </table>
                        <hr>

                <div class="text-right">
                    
                    <table class="mb-4" style="float: right;margin-right: 150px;font-size: 18px;">
                        <tr>
                            <th width="40%">Sub Total</th>
                            <th width="20%">:</th>
                            <th width="40%">{{$totalValue}} TK</th>
                        </tr>
                        <tr>
                            <th>Vat (10%)</th>
                            <th>:</th>
                            <th><?php 

                                $toVat = (int)$totalValue;
                                $vat = $toVat/100;
                                $vat *= 10;
                                echo $vat;

                        ?> TK</th>
                        </tr>
                        <tr>
                            <th>Grand Total</th>
                            <th>:</th>
                            <th>{{$totalValue+$vat}} TK</th>
                        </tr>
                    </table>
                    <a href="{{url('/confirmorder')}}"><button class="btn btn-dark btn-block mb-4">Order Now</button></a>
                </div>
            </div>
                    
                </div>
            </div>

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
          url : "cartDelete/"+id,
          processData : false,
          contentType : false,
          success : function(data){
            window.location.assign("cart");
          }
      });
    }

    function setId(getId){
      $("#delId").val(getId);
    }
  

    

  </script>



