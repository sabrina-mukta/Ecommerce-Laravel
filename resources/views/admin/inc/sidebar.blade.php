<div class="col-md-2 bg-dark" style="min-height: 550px;">
    <div id="accordian">
      <ul class="list-unstyled side-menu my-3">
            <li class="p-1"><a href="{{url('/adminpanel')}}"><i class="fa fa-home"></i>Dashboard</a>
            </li>
            @if(session()->get('user_id') == 1)
            <li class="p-1"><a href="#select-1" class="" data-toggle="collapse"><i class="fa fa-user"></i>User</a>

                <ul class="collapse list-unstyled ml-4" id="select-1" data-parent="#accordian">
                  <li><a href="{{url('/adduser')}}">Add User</a></li>
                </ul>
            </li>
            @endif
            @if(session()->get('user_id') == 1 || session()->get('user_id') == 2)
            <li class="p-1"><a href="#select-2" class="" data-toggle="collapse"><i class="fa fa-bandcamp"></i>Brand</a>
                <ul class="collapse list-unstyled ml-4" id="select-2" data-parent="#accordian">
                  <li><a href="{{url('/brand')}}">Add Brand</a></li>
                </ul>
            </li>
            <li class="p-1"><a href="#select-3" class="" data-toggle="collapse"><i class="fa fa-meetup"></i>Category</a>

                <ul class="collapse list-unstyled ml-4" id="select-3" data-parent="#accordian">
                  <li><a href="{{url('/categoryadd')}}">Add Category</a></li>
                </ul>

            </li> 

            <li class="p-1"><a href="#select-5" class="" data-toggle="collapse"><i class="fa fa-podcast"></i>Product</a>

                <ul class="collapse list-unstyled ml-4" id="select-5" data-parent="#accordian">
                  <li><a href="{{url('/productadd')}}">Add New</a></li>
                  <li><a href="{{url('/productlist')}}">Product List</a></li>
                </ul>
            </li> 
            @endif

            <li class="p-1"><a href="#select-6" class="" data-toggle="collapse"><i class="fa fa-cart-plus"></i>Order</a>

                <ul class="collapse list-unstyled ml-4" id="select-6" data-parent="#accordian">
                @if(session()->get('user_id') == 1)
                  <li><a href="{{url('/orderlist')}}">New Order</a></li>
                  <li><a href="{{url('/ordercomlist')}}">Order Checking</a></li>
                @endif
                  <li><a href="{{url('/ordercompletelist')}}">Completed</a></li>
                </ul>

            </li> 

            <li class="p-1"><a href="#select-7" class="" data-toggle="collapse"><i class="fa fa-th-large"></i>User Profile</a>

                <ul class="collapse list-unstyled ml-4" id="select-7" data-parent="#accordian">
                  <li><a href="{{url('/profile')}}">Profile</a></li>
                  <li><a href="{{url('/userPassChnage')}}">Password Change</a></li>
                </ul>

            </li> 

            <li class="p-1"><a href="#select-8" class="" data-toggle="collapse"><i class="fa fa-comments"></i>Feedback</a>

                <ul class="collapse list-unstyled ml-4" id="select-8" data-parent="#accordian">
                  <li><a href="{{url('/inbox')}}">Feedback List</a></li>
                </ul>

            </li>

            @if(session()->get('user_id') == 1)
            <li class="p-1"><a href="#select-10" class="" data-toggle="collapse"><i class="fa fa-wheelchair-alt"></i>Customer</a>

                <ul class="collapse list-unstyled ml-4" id="select-10" data-parent="#accordian">
                  <li><a href="{{url('/customerlist')}}">Customer List</a></li>
                </ul>
            </li>
            @endif

            <li class="p-1"><a href="#select-9" class="" data-toggle="collapse"><i class="fa fa-american-sign-language-interpreting"></i>Report</a>

                <ul class="collapse list-unstyled ml-4" id="select-9" data-parent="#accordian">
                  <li><a href="{{url('/reportbytoday')}}">Today Sales</a></li>
                  <li><a href="{{url('/reportbydatewish')}}">Datewish Sales</a></li>
                  <li><a href="{{url('/reportbydaterange')}}">Date Range</a></li>
                </ul>

            </li>  

            <li class="p-1"><a href="#select-11" class="" data-toggle="collapse"><i class="fa fa-sign-out"></i>Logout</a>

                <ul class="collapse list-unstyled ml-4" id="select-11" data-parent="#accordian">
                  <li><a href="{{url('/logout')}}">Logout</a></li>
                </ul>

            </li>
      </ul>
      </div>
    </div>