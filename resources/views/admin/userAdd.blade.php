
 <div class="col-md-10">
  <div class="m-2 my-4">

    <div class="card my-2">
      

      <div class="card-body">
        <h3>Add User</h3>
        <hr>
        <button class="btn btn-primary" data-toggle="modal" data-target="#addBrand"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
        <hr>
        <table id="example" class="display text-center" width="100%">
            <thead>
              <tr>
                <th width="5%">SL</th>
                <th width="20%">Name</th>
                <th width="20%">Username</th>
                <th width="20%">Email</th>
                <th width="15%">Phone</th>
                <th width="5%">Role</th>
                <th width="15%">Action</th>
              </tr>
            </thead>
            <tbody>

              

          @foreach($li as $key=>$data)

              
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$data->user_full_name}}</td>
                <td>{{$data->user_name}}</td>
                <td>{{$data->user_email}}</td>
                <td>{{$data->user_phone}}</td>
                <td>
                  @if($data->user_role_id == 1)
                    Admin
                  @elseif($data->user_role_id == 2)
                    Editor
                  @else
                    Author
                  @endif
                </td>
                <td>

          @if($data->user_id == session()->get('user_id'))
            <button disabled class="btn btn-danger btn-disabled" data-toggle="modal" data-target="#deleteBrand" onclick="setId('{{$data->user_id}}')"><i class="fa fa-trash"></i></button>
            

            <button data-toggle="modal" onclick="userUpdateShowData('{{$data->user_id}}','{{$data->user_full_name}}','{{$data->user_name}}','{{$data->user_phone}}')" data-target="#updateUser" class="btn btn-primary"><i class="fa fa-edit"></i></button>

          @else

             <button class="btn btn-danger btn-disabled" data-toggle="modal" data-target="#deleteBrand" onclick="setId('{{$data->user_id}}')"><i class="fa fa-trash"></i></button>

            <button data-toggle="modal" onclick="userUpdateShowData('{{$data->user_id}}','{{$data->user_full_name}}','{{$data->user_name}}','{{$data->user_phone}}')" data-target="#updateUser" class="btn btn-primary"><i class="fa fa-edit"></i></button>

          @endif
                  
      
      

                </td>
              </tr>

              @endforeach


            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>



  <!-- Modal For update User-->

  <div class="modal fade" id="updateUser">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

     <form method="post" id="userUpdate">
            @csrf

      <div class="card-body">
              <!-- Modal body -->
          <div class="row">
                
            <div class="col-md-6"> 
            <div class="form-group">
              <label>Name</label>

               <input type="hidden" name="user_full_id_up" id="user_full_id_up" value="">

              <input type="text" name="user_full_name_up" id="user_full_name_up" onkeyup="emptyCheck(this.id,'erruser_full_name_up')" placeholder="Enter brand name" class="form-control">

              <small id="erruser_full_name_up" class="form-text text-danger"></small>
            </div>
            </div>

            <div class="col-md-6"> 
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="user_name_up" id="user_name_up" onkeyup="emptyCheck(this.id,'erruser_name_up')" placeholder="Enter brand name" class="form-control">
              <small id="erruser_name_up" class="form-text text-danger"></small>
            </div>
            </div>

            <div class="col-md-6"> 
            <div class="form-group">
              <label>Phone</label>
              <input type="text" name="user_phone_up" maxlength="11" id="user_phone_up" onkeyup="emptyCheck(this.id,'erruser_phone_up')" placeholder="Enter brand name" class="form-control">

              <small id="erruser_phone_up" class="form-text text-danger"></small>
            </div>
            </div>


            <div class="col-md-6"> 
            <div class="form-group">
              <label>Role</label>
                <select name="user_role_id_up" id="user_role_id_up" onchange="emptyCheck(this.id,'erruser_role_id_up')" class="form-control">
                  <option value=""> Select Role</option>
                  <option value="1">Admin</option>
                  <option value="2">Editor</option>
                  <option value="3">Author</option>
                </select>

              <small id="erruser_role_id_up" class="form-text text-danger"></small>
            </div>
            </div>




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






  <!-- Modal For Add Brand-->

  <div class="modal fade" id="addBrand">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        
    <form method="post" id="userAdd">
      @csrf
        <!-- Modal body -->
        <div class="modal-body">

          <div class="row">

            <div class="col-md-6">
              <div class="form-group">
                <input type="text" name="user_full_name" id="user_full_name" onkeyup="emptyCheck(this.id,'erruser_full_name')" placeholder="Enter name" class="form-control">

                <small id="erruser_full_name" class="form-text text-danger"></small>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
              <input type="text" name="user_name" id="user_name" onkeyup="emptyCheck(this.id,'erruser_name')" placeholder="Enter username" class="form-control">
              <small id="erruser_name" class="form-text text-danger"></small>
            </div>

            </div>


            <div class="col-md-6">
              <div class="form-group">
              <input type="text" name="user_email" id="user_email" onkeyup="emptyCheck(this.id,'erruser_email','email')" placeholder="Email address" class="form-control">

              <small id="erruser_email" class="form-text text-danger"></small>
            </div>

            </div>


            <div class="col-md-6">
              <div class="form-group">
              <input type="text" name="user_phone" maxlength="11" id="user_phone" onkeyup="emptyCheck(this.id,'erruser_phone')" placeholder="Phone" class="form-control">

              <small id="erruser_phone" class="form-text text-danger"></small>
            </div>

            </div>

            <div class="col-md-6">
              <div class="form-group">
              <input type="password" name="user_password" id="user_password" onkeyup="emptyCheck(this.id,'erruser_password')" placeholder="Password" class="form-control">

              <small id="erruser_password" class="form-text text-danger"></small>
            </div>

            </div>

            <div class="col-md-6">
              <div class="form-group">
                <select name="user_role_id" id="user_role_id" onchange="emptyCheck(this.id,'erruser_role_id')" class="form-control">
                  <option value=""> Select Role</option>
                  <option value="1">Admin</option>
                  <option value="2">Editor</option>
                  <option value="3">Author</option>
                </select>

              <small id="erruser_role_id" class="form-text text-danger"></small>
            </div>
            </div>


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



  <!-- Modal for delete-->

  <div class="modal fade" id="deleteBrand">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete</h4>
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



    $("#userUpdate").submit(function(){


      if ($('#user_full_name_up').val() == "") {
        $("#erruser_full_name_up").text("Field must not be empty.");
        return false;
      }else{
        $("#erruser_full_name_up").text("");
      }

      if ($('#user_name_up').val() == "") {
        $("#erruser_name_up").text("Field must not be empty.");
        return false;
      }else{
        $("#erruser_name_up").text("");
      }

      if ($('#user_phone_up').val() == "") {
        $("#erruser_phone_up").text("Field must not be empty.");
        return false;
      }else{
        $("#erruser_phone_up").text("");
      }


      if ($('#user_role_id_up').val() == "") {
        $("#erruser_role_id_up").text("Field must not be empty.");
        return false;
      }else{
        $("#erruser_role_id_up").text("");
      }


      if ($('#user_name_up').val() !== "") {

        var form = $("#userUpdate").get(0);

        $.ajax({
          url : "userUpdate",
          method : "post",
          data : new FormData(form),
          processData : false,
          contentType : false,
          success : function(data){

            window.location.assign("adduser");

              //window.location.assign("adduser");
              /*if ($.trim(data) == 1) {
                $("#erruser_email").text("Data already exist.");
              }else{
                window.location.assign("adduser");
              }*/
          }

        });


      }

      return false;

    });


    function userUpdateShowData(user_full_id_up, user_full_name_up,user_name_up,user_phone_up){
      $("#user_full_id_up").val(user_full_id_up);
      $("#user_full_name_up").val(user_full_name_up);
      $("#user_name_up").val(user_name_up);
      $("#user_phone_up").val(user_phone_up);
    }



    function setUpdateData(id,name){
      $("#brand_id").val(id);
      $("#brand_name_up").val(name);
    }


    function deleteDdata(id){
      var id = $("#"+id).val();
      $.ajax({
          url : "deleteUser/"+id,
          processData : false,
          contentType : false,
          success : function(data){
            window.location.assign("adduser");
          }
      });
    }

    function setId(getId){
      $("#delId").val(getId);
    }
    
    



/*    $("#brandUpdate").submit(function(){

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
    });*/




    $("#userAdd").submit(function(){

      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

      if ($('#user_full_name').val() == "") {
        $("#erruser_full_name").text("Field must not be empty.");
        return false;
      }else{
        $("#erruser_full_name").text("");
      }

      if ($('#user_name').val() == "") {
        $("#erruser_name").text("Field must not be empty.");
        return false;
      }else{
        $("#erruser_name").text("");
      }


      if ($('#user_email').val() == "") {
        $("#erruser_email").text("Field must not be empty.");
        return false;
      }else if(!regex.test($('#user_email').val())){
        $("#erruser_email").text("Invalid email address.");
        return false;
      }else{
        $("#erruser_email").text("");
      }

      if ($('#user_phone').val() == "") {
        $("#erruser_phone").text("Field must not be empty.");
        return false;
      }else{
        $("#erruser_phone").text("");
      }


      if ($('#user_password').val() == "") {
        $("#erruser_password").text("Field must not be empty.");
        return false;
      }else{
        $("#erruser_password").text("");
      }

      if ($('#user_role_id').val() == "") {
        $("#erruser_role_id").text("Field must not be empty.");
        return false;
      }else{
        $("#erruser_role_id").text("");
      }


      if ($('#user_name').val() !== "") {

        var form = $("#userAdd").get(0);

        $.ajax({
          url : "userInsert",
          method : "post",
          data : new FormData(form),
          processData : false,
          contentType : false,
          success : function(data){
              if ($.trim(data) == 1) {
                $("#erruser_email").text("Data already exist.");
              }else{
                window.location.assign("adduser");
              }
          }

        });


      }

      return false;

    });







   function emptyCheck(getId, show, found = null){
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

     var getValue = $("#"+getId).val();

      if (found == null) {
        if (getValue == "") {
          $("#"+show).text("Field must not be empty.");
        }else{
          $("#"+show).text("");
        }
      }

      if (found == "email") {

        if(getValue == ""){
          $("#"+show).text("Field must not be empty.");
        }else if (!regex.test(getValue)) {
           $("#"+show).text("Invalid email address.");
        }else{
          $("#"+show).text("");
        }

      }

     
  }

    

  </script>