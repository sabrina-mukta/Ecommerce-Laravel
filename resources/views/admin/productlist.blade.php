
 <div class="col-md-10">
  <div class="m-2 my-4">
    <div class="card my-2">
      <div class="card-header">
        <h3>Product List</h3>
      </div>
      <div class="card-body">
        <table id="example" class="display" width="100%">
            <thead>
              <tr>
                <th width="10%">SL</th>
                <th width="20%">Product Name</th>
                <th width="20%">Category</th>
                <th width="15%">Brand</th>
                <th width="10%">Price</th>
                <th width="10%">Image</th>
                <th width="20%">Action</th>
              </tr>
            </thead>
            <tbody>

            <?php $i = 1; ?>

            @foreach($productData as $value)

            
              <tr>
                <td>{{$i++}}</td>
                <td>{{$value->product_name}}</td>
                <td>{{$value->category_name}}</td>
                <td>{{$value->brand_name}}</td>
                <td>TK. {{$value->product_regular_price}}</td>
                <td>
                  <img style="height:40px;width: 40px;" src="{{$value->product_image}}">
                </td>
                <td>
                @if(session()->get('user_id') == 1)
                 <button class="btn btn-danger" data-toggle="modal" data-target="#deleteBrand" onclick="setId('{{$value->product_id}}')"><i class="fa fa-trash"></i></button>
                 @endif
                 
                  <a href="{{url('/porductupdate/'.$value->product_id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a> 

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