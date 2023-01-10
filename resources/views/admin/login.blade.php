<?php 

  if (session()->get('login') == 1) {
    echo "<script>window.location ='adminpanel';</script>";
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Panel</title>
    <link rel="shortcut icon" href="img/icon.png">
    <link rel="stylesheet" href="css/uikit.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- <script src="js/jquery.min.js"></script> -->

    <script src="js/jquery.min.js"></script>

    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <style type="text/css">
      
      body{background: #ddd;}

    </style>
  </head>
  <body style="background: #ddd;">

    <section class="my-5 p-3 py-5" style="max-width: 450px;margin: auto;">
      <div class="card">
        <div class="card-body">

          <form class="py-5" method="post" id="userLog">
            @csrf
            <h6 class="text-center text-danger" id="msg"></h6>
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" id="email" class="form-control" placeholder="Email address">
              <small id="erremail" class="form-text" style="color:red;"></small>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password">
              <small id="errpassword" class="form-text" style="color:red;"></small>
            </div>
            <input type="submit" value="Login" class="btn btn-primary">

          </form>

        </div>
      </div>

    </section>


    <script type="text/javascript">
      

  $("#userLog").submit(function(){

      if ($('#email').val() == "") {
        $("#erremail").text("Field must not be empty.");
        return false;
      }else{
        $("#erremail").text("");
      }

      if ($('#password').val() == "") {
        $("#errpassword").text("Field must not be empty.");
        return false;
      }else{
        $("#errpassword").text("");
      }

      if ($('#email').val() !== "" && $('#password').val() !== "") {

          var form = $("#userLog").get(0);

          $.ajax({
          url : "loginUser",
          method : "post",
          data : new FormData(form),
          processData : false,
          contentType : false,
          success : function(data){
            
             if ($.trim(data) == 0) {
                $("#msg").text("Email or pasword no match!");
              }else{
                window.location.assign("adminpanel");
              }
          }

        });

      }

      return false;

    });


    </script>
  </body>
</html>