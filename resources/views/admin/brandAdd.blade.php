
 <div class="col-md-10">
  <div class="m-2 my-4">

    <div class="card my-2">
      

      <div class="card-body">
        <h3>Brand List</h3>
        <hr>
        <button class="btn btn-primary" data-toggle="modal" data-target="#addBrand"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
        <hr>
        <table id="example" class="display text-center" width="100%">
            <thead>
              <tr>
                <th width="20%">SL</th>
                <th width="40%">Band Name</th>
                <th width="40%">Action</th>
              </tr>
            </thead>
            <tbody>

              

              @foreach($li as $key=>$data)

              
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$data->brand_name}}</td>
                <td>
                  @if(session()->get('user_id') == 1)
                  <button class="btn btn-danger" data-toggle="modal" data-target="#deleteBrand" onclick="setId('{{$data->brand_id}}')"><i class="fa fa-trash"></i></button>
                  @endif

                  <button data-toggle="modal" onclick="setUpdateData('{{$data->brand_id}}','{{$data->brand_name}}')" data-target="#updateBrand" class="btn btn-primary"><i class="fa fa-edit"></i></button>
                </td>
              </tr>

              @endforeach


            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>





  <!-- Modal For Add Brand-->

  <div class="modal fade" id="addBrand">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Brand</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
    <form method="post" id="brandAdd">
      @csrf

        <!-- Modal body -->
        <div class="modal-body">


            <div class="form-group">
              <label>Brand Name</label>
              <input type="text" name="brand_name" id="brand_name" onkeyup="emptyCheck(this.id,'errbrand_name')" placeholder="Enter brand name" class="form-control">
              <small id="errbrand_name" class="form-text text-danger"></small>
            </div>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" value="Save">
        </div>


    </form>
        
      </div>
    </div>
  </div> 


  <!-- Modal For update Brand-->

  <div class="modal fade" id="updateBrand">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update Brand</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>


  <form method="post" id="brandUpdate">
      @csrf

        <!-- Modal body -->
        <div class="modal-body">
            <div class="form-group">
              <label>Brand Name</label>

              <input type="hidden" name="brand_id" id="brand_id">

              <input type="text" name="brand_name_up" id="brand_name_up" onkeyup="emptyCheck(this.id,'errbrand_name_up')" placeholder="Enter brand name" class="form-control">
              <small id="errbrand_name_up" class="form-text text-danger"></small>
            </div>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" value="Update">
        </div>


    </form>
        
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



    function setUpdateData(id,name){
      $("#brand_id").val(id);
      $("#brand_name_up").val(name);
    }


    function setUpdateData(id,name){
      $("#brand_id").val(id);
      $("#brand_name_up").val(name);
    }


    function deleteDdata(id){
      var id = $("#"+id).val();
      $.ajax({
          url : "deleteBand/"+id,
          processData : false,
          contentType : false,
          success : function(data){
            window.location.assign("brand");
          }
      });
    }

    function setId(getId){
      $("#delId").val(getId);
    }
    
    



    $("#brandUpdate").submit(function(){

      var brand_name_up = $('#brand_name_up').val();

      if (brand_name_up == "") {
        $("#errbrand_name_up").text("Field must not be empty.");
      }else{

        var form = $("#brandUpdate").get(0);

        $.ajax({
          url : "brandUpdate",
          method : "post",
          data : new FormData(form),
          processData : false,
          contentType : false,
          success : function(data){

            if ($.trim(data) == 0) {
              window.location.assign("brand");
            }else if($.trim(data) == 1){
              $("#errbrand_name_up").text("Data already exist.");
            }else{
               window.location.assign("brand");
            }

          }

        });
      }

      return false;
    });




    $("#brandAdd").submit(function(){

      var brand_name = $('#brand_name').val();

      if (brand_name == "") {
        $("#errbrand_name").text("Field must not be empty.");
      }else{

        var form = $("#brandAdd").get(0);

        $.ajax({
          url : "brandInsert",
          method : "post",
          data : new FormData(form),
          processData : false,
          contentType : false,
          success : function(data){
              if ($.trim(data) == 1) {
                $("#errbrand_name").text("Data already exist.");
              }else{
                window.location.assign("brand");
              }
          }

        });
      }

      return false;
    });


   function emptyCheck(getId, show){
     var getValue = $("#"+getId).val();
      if (getValue == "") {
        $("#"+show).text("Field must not be empty.");
      }else{
        $("#"+show).text("");
      }
  }

    

  </script>