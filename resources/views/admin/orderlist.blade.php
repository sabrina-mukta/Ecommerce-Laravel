<?php 
  
  use App\Models\orders;
  use App\Models\customer;

?>
 <div class="col-md-10">
  <div class="m-2 my-4">
    <div class="card my-2">
      <div class="card-header">
        <h3>Order List</h3>
      </div>
      <div class="card-body">
        @if(count($orders_customer_id) > 0)
        <table id="example" class="display" width="100%">
            <thead>
              <tr>
                <th width="10%">SL</th>
                <th width="20%">Customer Name</th>
                <th width="20%">Customer Phone</th>
                <th width="20%">Customer Email</th>
                <th width="20%">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php 

                $id = 1;

              ?>

              @foreach($orders_customer_id as $data)

              <?php 

                $customerList = customer::where('customers_id',$data->orders_customer_id)
                ->get();

              ?>



                @foreach($customerList as $data)
                  <tr>
                    <td>{{$id++}}</td>
                    <td>{{$data->customers_name}}</td>
                    <td>{{$data->customers_phone}}</td>
                    <td>{{$data->customers_email}}</td>
                    <td>
                      <a href="{{url('/orderview/'.$data->customers_id)}}">
                      <button data-toggle="modal" onclick="setUpdateData()" data-target="#updateBrand" class="btn btn-primary">View</button></a>
                    </td>
                  </tr>
                @endforeach


              @endforeach

            </tbody>
          </table>
          @else
            <h4 class="text-center">Data not found.</h4>
          @endif
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




    function deleteDdata(id){
      var id = $("#"+id).val();
      $.ajax({
          url : "deleteProduct/"+id,
          processData : false,
          contentType : false,
          success : function(data){
            window.location.assign("productlist");
          }
      });
    }

    function setId(getId){
      $("#delId").val(getId);
    }
  

    

  </script>