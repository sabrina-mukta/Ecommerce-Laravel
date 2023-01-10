<?php 
  
  if (!session()->get('login')) {
    echo "<script>window.location ='login';</script>";
  }

  $getUserId = session('user_id');
  use App\Models\user;
  $unidata = user::where('user_id','=',$getUserId)->first();








?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="shortcut icon" href="{{asset('img/icon.png')}}">
    <link rel="stylesheet" href="{{asset('css/uikit.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
    <!--JavaScript-->
    <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/uikit.min.js')}}"></script>
    <script src="{{asset('js/uikit-icons.min.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <style type="text/css">
  
      .side-menu{}
      .side-menu li{font-size: 18px;
          border-bottom: 1px solid #9db3c9;
          margin-top: 10px;
        }
      .side-menu li:last-child{
        border-bottom: none;
      }
      .side-menu li a{color: #eedddd;}
      .side-menu li i{margin-right: 10px;}
      .side-menu li ul li{
        font-size: 18px;
        border-bottom: none;
        margin-top: 10px;
      }
      .side-menu li a:hover{
        color: #b39292;
      }
      .side-menu li a:hover{
        text-decoration: none;
      }
      .navbar-nav li a{
        font-size: 18px;
      }
      .navbar-nav li a i{
        font-size: 18px;
        margin-right: 5px;
      }
    </style>
  </head>
  <body>

    <!--Navbar-->

    <nav class="navbar navbar-dark bg-dark navbar-expand-md sticky-top">
      <!-- <div class="container"> -->
        <!-- <a href="" class="navbar-brand">Online Shopping</a> -->

        <button data-target="#myNav" data-toggle="collapse" class="navbar-toggler navbar-toggler-right"><span class="navbar-toggler-icon"></span></button>
        
        <div class="navbar-collapse collapse" id="myNav">
          <ul class="navbar-nav">
           

            <li class="nav-item"><a class="nav-link" target="_blank" href="{{url('/')}}"><i class="fa fa-arrows" aria-hidden="true"></i>Visite Site</a></li>
            @if(session()->get('user_id') == 1)
            <li class="nav-item"><a class="nav-link" href="{{url('/orderlist')}}"><i class="fa fa-th-large" aria-hidden="true"></i>Order</a></li>
            @endif

             <li class="nav-item"><a class="nav-link" href="{{url('/inbox')}}"><i class="fa fa-envelope-open-o" aria-hidden="true"></i>Inbox</a></li>

            <li class="nav-item"><a class="nav-link" href="{{url('/profile')}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Profile</a></li>

            <li class="nav-item"><a class="nav-link" href="{{url('/logout')}}"><i class="fa fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
          </ul>

          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="{{url('/profile')}}">Welcome! @if(isset($unidata->user_name)){{
              $unidata->user_name
            }}@endif</a></li>

            <li class="nav-item" title="Change your image"><a class="nav-link" href="{{url('/changeimage')}}">
              
              <img style="height:30px;width: 30px;border-radius: 50%;" src="@if(isset($unidata->user_name)){{
              $unidata->user_image
            }}@endif">

            </a></li>

          </ul>
        </div>

      <!-- </div> -->
    </nav>
  <section class="container-fluid">
    <div class="row">