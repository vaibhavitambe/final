<?php
use App\Http\Controllers\Controller;
use App\Product;
$mainCategories = Controller::mainCategories();
$cartCount = Product::cartCount();
?>

<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="www.facebook.com"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
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
							<a href="{{ url('Eshopper') }}"><img src="http://127.0.0.1:8000/frontend/images/home/logo.png" alt=""></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canadian Dollar</a></li>
									<li><a href="#">Pound</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								@if(empty(Auth::check()))
									<li><a href="{{ url('login-register') }}"><i class="fa fa-lock"></i> Login</a></li>
								@else
									<li><a href="{{ url('wishlist') }}"><i class="fa fa-star"></i> Wishlist</a></li>
									<li><a href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i> Cart ({{ $cartCount }})</a></li>
									<li><a href="{{ url('address') }}"><i class="fa fa-user"></i> Address</a></li>
									<li><a href="{{ url('checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
									<li><a href="{{ url('account') }}"><i class="fa fa-user"></i> Account</a></li>
									<li><a href="{{ url('user-logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
								@endif
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
								<li><a href="{{ url('Eshopper') }}" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
									<ul role="menu" class="sub-menu">
										@foreach($mainCategories as $cat)
										<li><a href="{{ asset($cat->url) }}">{{ $cat->name }}</a></li>
										@endforeach
									</ul>
								</li>  
								<li><a href="{{ url('product/404') }}">404</a></li>
								<li><a href="{{ url('orders') }}"><i class="fa fa-first-order"></i>My Orders</a></li>
								<li><a href="{{ url('newsletter') }}">NewsLetter</a></li>
								<li><a href="{{ url('contact-us') }}">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search">
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header>