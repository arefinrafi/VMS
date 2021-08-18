<?php
use App\Http\Controllers\Controller;
$mainCategories = Controller::mainCategories();
?>

<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
      <div class="container">

        <div class="row">
          <div class="col-sm-6">
            <div class="contactinfo">
              <ul class="nav nav-pills">
                <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> wheelsheaven@mail.com</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="social-icons pull-right">
              <ul class="nav navbar-nav">
                <!-- <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li> -->
                <li><a href="{{ url('/signin')}}"><i class="fa fa-sign-in"></i>Admin Sign in</a></li>
                <li><a href="{{ url('/usersignin')}}"><i class="fa fa-sign-in"></i>User Sign in</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header_top-->
    
    <div class="header-middle"><!--header-middle-->
      <div class="container">

        <div class="row">
          <div class="col-sm-4">
            

            <div class="logo pull-left">
              <a style="text-align:left;" href="{{ url('/')}}">
              <h1 href="{{ url('/')}}" style="text-align:left;font-size:23px;font-family:'Brush Script Std', cursive;"><strong> WHEELS HEAVEN</strong></h1>
          
            <img style="width:200px; " src="{{ asset('images/frontend_images/home/logo.png') }}" alt="" /></a>
            </div>
            
          </div>
          <div class="col-sm-8">
            <div class="shop-menu pull-right">
              <ul class="nav navbar-nav">
                <!-- <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li> -->
                <!-- <li><a href="{{ url('/signup')}}"><i class="fa fa-user"></i> Sign Up</a></li> -->
                <!-- <li><a href="{{ url('/signin')}}"><i class="fa fa-sign-in"></i> Sign in</a></li> -->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header-middle-->
  
    <div class="header-bottom"><!--header-bottom-->
      <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="mainmenu pull-left">
              <ul class="nav navbar-nav collapse navbar-collapse">
                <li><a href="{{ url('/')}}" class="active">Home</a></li>
                <li class="dropdown"><a href="#">Wheels<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                      @foreach($mainCategories as $cat)
                                        <li><a href="{{ asset('/vehicles/'.$cat->url) }}">{{ $cat->name }}</a></li> 
                                        @endforeach
                                    </ul>
                                </li> 
           <!--      <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
                    <li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 
                <li><a href="404.html">404</a></li>
                <li><a href="contact-us.html">Contact</a></li> -->
              </ul>
            </div>
          </div>
          <div class="col-sm-3">
{{--            <div class="search_box pull-right">--}}
{{--              <form action="{{ url('/search-vehicles') }}" method="get">--}}
{{--              <input type="text" placeholder="Search Vehicle" name="vehicle"/>--}}
{{--              <button type="submit" style="border: 0px; height: 35px; margin-left: -5px">Go</button>--}}
{{--            </div>--}}
          </div>
        </div>
      </div>
    </div><!--/header-bottom-->
  </header><!--/header-->