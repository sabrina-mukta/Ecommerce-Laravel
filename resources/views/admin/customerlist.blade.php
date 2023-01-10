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

          .print_header{
            display: block !important;
          }

          @media page{
            size: a3;
          }
      }
</style>

 <div class="col-md-10">
  <div class="m-2 my-4">
    <div class="card my-2">
      <div class="card-header">
        <h3>Customer List</h3>
      </div>
      <div class="card-body">
        <table id="example" class="display" width="100%">
            <thead>
              <tr>
                <th width="10%">SL</th>
                <th width="20%">Customer Name</th>
                <th width="20%">Phone</th>
                <th width="20%">Email</th>
                <th width="15%">Zip Code</th>
                <th width="20%">Action</th>
              </tr>
            </thead>
            <tbody>

            <?php $i = 1; ?>

            @foreach($customerData as $data)

            
              <tr>
                <td>{{$i++}}</td>
                <td>{{$data->customers_name}}</td>
                <td>{{$data->customers_phone}}</td>
                <td>{{$data->customers_email}}</td>
                <td>{{$data->customers_zipcode}}</td>
                <td>

                 <button class="btn btn-danger" data-toggle="modal" data-target="#deleteBrand" onclick="setDelId('{{$data->customers_id}}')"><i class="fa fa-trash"></i></button>


                  <button data-target="#showFeedback" onclick='setId("{{$data->customers_name}}","{{$data->customers_phone}}","{{$data->customers_email}}","{{$data->customers_zipcode}}","{{$data->customers_address_line}}","{{$data->customers_address_line_two}}","{{$data->customers_district}}","{{$data->customers_country}}")' data-toggle="modal" class="btn btn-primary"><i class="fa fa-edit"></i></button>




                </td>
              </tr>

            @endforeach


            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>
 <!-- Modal for delete-->
  <div class="modal fade" id="showFeedback">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Customer Information</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body print">

          <div class="print_header d-none">
            <h5>Customer Information<h5/>
            <hr>
          </div>

          <table class="table">
            <tr>
              <td>Customers name</td>
              <td>:</td>
              <td>
                <p class="m-0" id="customers_name"></p>
              </td>
            </tr>
            <tr>
              <td>Customers Phone</td>
              <td>:</td>
              <td>
                <p class="m-0" id="customers_phone"></p>
              </td>
            </tr>
            <tr>
              <td>Customers email</td>
              <td>:</td>
              <td>
                 <p class="m-0" id="customers_email"></p>
              </td>
            </tr>

            <tr>
              <td>Customers zipcode</td>
              <td>:</td>
              <td>
                 <p class="m-0" id="customers_zipcode"></p>
              </td>
            </tr>

            <tr>
              <td>Customers address</td>
              <td>:</td>
              <td>
                 <p class="m-0" id="customers_address_line"></p>
              </td>
            </tr>
            <tr>
              <td>Customers district</td>
              <td>:</td>
              <td>
                 <p class="m-0" id="customers_district"></p>
              </td>
            </tr>
            <tr>
              <td>Customers country</td>
              <td>:</td>
              <td>
                 <p class="m-0" id="customers_country"></p>
              </td>
            </tr>
          </table>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="window.print()" data-dismiss="modal">Print</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal for delete-->

  <div class="modal fade" id="deleteBrand">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Brand Delete</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <p>Are you sure delete?</p>
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



    function setId(customers_name, customers_phone, customers_email, customers_zipcode, customers_address_line,customers_address_line_two,customers_district,customers_country){
      $("#customers_name").html(customers_name);
      $("#customers_phone").html(customers_phone);
      $("#customers_email").html(customers_email);
      $("#customers_zipcode").html(customers_zipcode);
      $("#customers_address_line").html(customers_address_line+"<br>"+customers_address_line_two);
      $("#customers_district").html(customers_district);
      $("#customers_country").html(customers_country);

    }



    function deleteDdata(id){
      var id = $("#"+id).val();
      $.ajax({
          url : "deleteCustomer/"+id,
          processData : false,
          contentType : false,
          success : function(data){
            window.location.assign("customerlist");
          }
      });
    }

    function setDelId(getId){
      $("#delId").val(getId);
    }
  

    

  </script>