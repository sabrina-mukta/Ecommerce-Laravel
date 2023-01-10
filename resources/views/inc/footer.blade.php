<!--Footer Section-->
  <section id="copyright-section" style="background: #494545 !important;" class="py-3 text-light">
    <div class="container">
      <div class="row">

        <div class="col-md-4">
          <h3 class="lead">Company Information :</h3>
          <p class="m-1">femaleneed Online Shopping Store</p>
          <p class="m-1">307/05, mirpur, Dhaka</p>
          <p class="m-1">Bangladesh</p>
          <p class="m-1">Email: sabrinasultanamukta123@gmail.com</p>

        </div>
        <div class="col-md-4">
         <h3 class="lead">My Account</h3>
         <ul class="list-unstyled">

           <li><a href="{{url('/customerProfile')}}" class="text-light" style="text-decoration: none;font-size: 16px;">My Profile & Order</a></li>

           <li><a href="{{url('/customerReg')}}" class="text-light" style="text-decoration: none;font-size: 16px;">Create Account</a></li>

           <li><a href="{{url('/cart')}}" class="text-light" style="text-decoration: none;font-size: 16px;">My Cart</a></li>


           @if(Session::get('customerLogin'))

              <li><a class="text-light" style="text-decoration: none;font-size: 16px;" href="customerPasswordChange">Change Password</a></li>

              <li><a class="text-light" style="text-decoration: none;font-size: 16px;" href="customerLogOut">Logout</a></li>
            @else
              <li><a class="text-light" style="text-decoration: none;font-size: 16px;" data-toggle="modal" data-target="#loginModal" href="">Login</a></li>
            @endif



         </ul>
        </div>




        <div class="col-md-4">
         <h3 class="lead">Contact:</h3>
         <p class="m-1">+8801744-545901; +8801798-659666</p>
         <p class="m-1">+88999-23333; +88999-23334</p>

         <h3 class="lead">Location:</h3>
         <p class="m-1">307/05, mirpur, Dhaka.</p>

         <h3 class="lead">Social:</h3>
           <ul class="list-inline social">
             <li class="list-item text-center">

              <a target="_blank" href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
              <a target="_blank" href="https://youtube.com/"><i class="fa fa-youtube"></i></a>
              <a target="_blank" href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>
              <a href="{{url('/contact')}}"><i class="fa fa-envelope"></i></a>
            </li>
           </ul>
         

        </div>

      </div>
    </div>
  </section>


<!--Copyright Section-->

  <section id="copyright-section" class="py-3 text-center text-light">
    <div class="container">
      <div class="row">
        <div class="col">
          <p class="lead mb-0">Copyright <?php echo date('Y'); ?> &copy; sabrina sultana mukta</p>
        </div>
      </div>
    </div>
  </section>
  
    <!--JavaScript-->

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/uikit.min.js')}}"></script>
    <script src="{{asset('js/uikit-icons.min.js')}}"></script>
    <script type="text/javascript">

      $("#searchForm").submit(function(){
        var search = $("#search").val();
          if (search == "") {
            return false;
          }
      });

    </script>


  <script type="text/javascript">
      

  $("#customersLogin").submit(function(){


      if ($('#customers_email').val() == "") {
        $("#errcustomers_email").text("Field must not be empty.");
        return false;
      }else{
        $("#errcustomers_email").text("");
      }

      if ($('#customers_password').val() == "") {
        $("#errcustomers_password").text("Field must not be empty.");
        return false;
      }else{
        $("#errcustomers_password").text("");
      }

      if ($('#customers_email').val() !== "" && $('#customers_password').val() !== "") {

          var form = $("#customersLogin").get(0);

          $.ajax({
          url : "loginCustomer",
          method : "post",
          data : new FormData(form),
          processData : false,
          contentType : false,
          success : function(data){

            if ($.trim(data) == 0) {
                $("#customerMsg").text("Email or pasword no match!");
            }else{
                window.location.assign("cart");
            }
          }

        });

      }

      

      return false;

    });


  </script>

  </body>
</html>