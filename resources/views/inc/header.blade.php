<?php 

  use App\Models\cart;

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="shortcut icon" href="{{asset('img/icon.png')}}">
    <link rel="stylesheet" href="{{asset('css/uikit.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <style type="text/css">
      .product-img{
        height: 150px;
      }

     .social a i{
        color: #ddd;
        padding: 13px;
        background: #d13939;
        border-radius: 50%;
        font-size: 20px;
        margin: 2px;
     }

    </style>
  </head>
  <body>

    <!--Navbar-->

    <nav class="navbar navbar-dark bg-dark navbar-expand-md sticky-top">
      <div class="container">
        <a href="" class="navbar-brand">FemaleNeed</a>
        <button data-target="#myNav" data-toggle="collapse" class="navbar-toggler navbar-toggler-right"><span class="navbar-toggler-icon"></span></button>

        <div class="navbar-collapse collapse" id="myNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="{{url('/')}}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('/shoping')}}">Shopping</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('/categorywishData')}}">Category</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('/brandPro')}}">Brand</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('/contact')}}">Contact</a></li>
          </ul>

    

<form action="{{url('/search')}}" method="post" id="searchForm" class="form-inline navbar-nav ml-auto">
  @csrf
  <div class="input-group input-group-sm">
    <input type="text" class="form-control" name="search" id="search" placeholder="Search here">

    <div class="input-group-append">
      <input type="submit" value="Search" class="btn btn-dark">
    </div>
  </div>

</form>

  <?php

      if (session_status() == 1) {
        session_start();
      }

      $sessionCount = cart::where('cart_product_session_id',session_id())
      ->get();

  ?>

  <div style="font-size: 20px;" class="ml-3 shop-card">
        <a href="{{url('/cart')}}" style="color:red;text-decoration: none;"><i class="fa fa-cart-plus"></i> <?php 

      $qtyCount = 0;
      foreach($sessionCount as $data){
        $qtyCount += (int) $data->cart_product_qty;
      }

      echo $qtyCount;

      ?></a>
  </div>

  <div style="color:red;" class="ml-5 shop-card">
      <ul class="navbar-nav ml-auto">

            @if(Session::get('customerLogin'))
              <li class="nav-item"><a class="nav-link" href="customerLogOut">Logout</a></li>
            @else
              <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#loginModal" href="">Login</a></li>
            @endif

            


            <li class="nav-item"><a class="nav-link" href="{{url('/adminpanel')}}" target="_blank">CPanel</a></li>
      </ul>
  </div>

    
        </div>
      </div>
    </nav>

  <!-- The modal user login -->

  <div class="modal fade" id="loginModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">User Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <h6 class="text-center text-danger" id="customerMsg"></h6>
         <form method="post" id="customersLogin">
            @csrf
           <div class="form-group">
             <label>Email</label>
             <input type="text" name="customers_email" id="customers_email" class="form-control" placeholder="Email address">
             <small id="errcustomers_email" class="text-danger"></small>
           </div>

           <div class="form-group">
             <label>Password</label>
             <input type="password" name="customers_password" id="customers_password" class="form-control" placeholder="Password">
             <small id="errcustomers_password" class="text-danger"></small>
           </div>
           <input type="submit" value="Submit" class="btn btn-dark btn-block">

         </form>




         <a href="{{url('/customerReg')}}" class="text-center mt-2 d-block">Create New</a>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          
        </div>
        
      </div>
    </div>
  </div>