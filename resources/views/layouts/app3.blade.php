<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html class="fixed">
<head>
  <!-- Basic -->
		<meta charset="UTF-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

		<title>@yield('title', config('app.name'))</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
		<meta name="author" content="JSOFT.net">

    <!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" rel="stylesheet">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{asset('octopus/assets/vendor/bootstrap/css/bootstrap.css')}}" />
		<link rel="stylesheet" href="{{asset('octopus/assets/vendor/font-awesome/css/font-awesome.css')}}" />
		<link rel="stylesheet" href="{{asset('octopus/assets/vendor/magnific-popup/magnific-popup.css')}}" />
		<!--<link rel="stylesheet" href="{{asset('octopus/assets/vendor/bootstrap-datepicker/css/datepicker3.css')}}" /> -->

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="{{asset('octopus/assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css')}}" />
		<link rel="stylesheet" href="{{asset('octopus/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}" />
		<link rel="stylesheet" href="{{asset('octopus/assets/vendor/morris/morris.css')}}" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{asset('octopus/assets/stylesheets/theme.css')}}" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{asset('octopus/assets/stylesheets/skins/default.css')}}" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{asset('octopus/assets/stylesheets/theme-custom.css')}}">

		<!-- Head Libs -->
		<script src="{{asset('octopus/assets/vendor/modernizr/modernizr.js')}}"></script>
		<link href="{{asset('appzia/plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">
    <style>
    .swal2-popup {
      font-size: 1.6rem !important;
    }
    </style>
    @yield('css')

  </head>
  	<body>
  		<section class="body">

  			<!-- start: header -->
  			<header class="header">
  				<div class="logo-container">
  					<a href="{{url('/')}}" class="logo">
  						<img src="{{asset('logos/logo.png')}}" height="35" alt="{{config('app.name')}}" />
  					</a>
  					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
  						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
  					</div>
  				</div>

  				<!-- start: search & user box -->
  				@include('layouts.headerright')
  				<!-- end: search & user box -->
  			</header>
  			<!-- end: header -->

  			<div class="inner-wrapper">
  				<!-- start: sidebar -->
  				<aside id="sidebar-left" class="sidebar-left">

  					@include('layouts.menu3')

  				</aside>
  				<!-- end: sidebar -->

  				<section role="main" class="content-body">
  					<header class="page-header">
  						<h2>Dashboard</h2>

  						<div class="right-wrapper pull-right">
  							<ol class="breadcrumbs">
  								<li>
  									<a href="{{url('home')}}">
  										<i class="fa fa-home"></i>
  									</a>
  								</li>
  								<li><span>Dashboard</span></li>
  							</ol>

  							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
  						</div>
  					</header>

						<div class="row">

  					</div>

  					<!-- start: page -->
                @yield('content')
  					<!-- end: page -->
  				</section>
  			</div>

  			<aside id="sidebar-right" class="sidebar-right">
  				<div class="nano">
  					<div class="nano-content">
  						<a href="#" class="mobile-close visible-xs">
  							Collapse <i class="fa fa-chevron-right"></i>
  						</a>

  						<div class="sidebar-right-wrapper">

  							<div class="sidebar-widget widget-calendar">
  								<h6>Upcoming Tasks</h6>
  								<div data-plugin-datepicker data-plugin-skin="dark" ></div>

  								<ul>
  									<li>
  										<time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
  										<span>Company Meeting</span>
  									</li>
  								</ul>
  							</div>

  							<div class="sidebar-widget widget-friends">
  								<h6>Friends</h6>
  								<ul>
  									<li class="status-online">
  										<figure class="profile-picture">
  											<img src="{{asset('octopus/assets/images/!sample-user.jpg')}}" alt="Joseph Doe" class="img-circle">
  										</figure>
  										<div class="profile-info">
  											<span class="name">Joseph Doe Junior</span>
  											<span class="title">Hey, how are you?</span>
  										</div>
  									</li>
  									<li class="status-online">
  										<figure class="profile-picture">
  											<img src="{{asset('octopus/assets/images/!sample-user.jpg')}}" alt="Joseph Doe" class="img-circle">
  										</figure>
  										<div class="profile-info">
  											<span class="name">Joseph Doe Junior</span>
  											<span class="title">Hey, how are you?</span>
  										</div>
  									</li>
  									<li class="status-offline">
  										<figure class="profile-picture">
  											<img src="{{asset('octopus/assets/images/!sample-user.jpg')}}" alt="Joseph Doe" class="img-circle">
  										</figure>
  										<div class="profile-info">
  											<span class="name">Joseph Doe Junior</span>
  											<span class="title">Hey, how are you?</span>
  										</div>
  									</li>
  									<li class="status-offline">
  										<figure class="profile-picture">
  											<img src="{{asset('octopus/assets/images/!sample-user.jpg')}}" alt="Joseph Doe" class="img-circle">
  										</figure>
  										<div class="profile-info">
  											<span class="name">Joseph Doe Junior</span>
  											<span class="title">Hey, how are you?</span>
  										</div>
  									</li>
  								</ul>
  							</div>

  						</div>
  					</div>
  				</div>
  			</aside>
  		</section>

  		<!-- Vendor -->
  		<script src="{{asset('octopus/assets/vendor/jquery/jquery.js')}}"></script>
  		<script src="{{asset('octopus/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
  		<script src="{{asset('octopus/assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
  		<script src="{{asset('octopus/assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
  		<!--<script src="{{asset('octopus/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script> -->
  		<script src="{{asset('octopus/assets/vendor/magnific-popup/magnific-popup.js')}}"></script>
  		<script src="{{asset('octopus/assets/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>


  		<!-- Specific Page Vendor -->
      <!--
      <script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
  		<script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
  		<script src="assets/vendor/jquery-appear/jquery.appear.js"></script>
  		<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
  		<script src="assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
  		<script src="assets/vendor/flot/jquery.flot.js"></script>
  		<script src="assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
  		<script src="assets/vendor/flot/jquery.flot.pie.js"></script>
  		<script src="assets/vendor/flot/jquery.flot.categories.js"></script>
  		<script src="assets/vendor/flot/jquery.flot.resize.js"></script>
  		<script src="assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
  		<script src="assets/vendor/raphael/raphael.js"></script>
  		<script src="assets/vendor/morris/morris.js"></script>
  		<script src="assets/vendor/gauge/gauge.js"></script>
  		<script src="assets/vendor/snap-svg/snap.svg.js"></script>
  		<script src="assets/vendor/liquid-meter/liquid.meter.js"></script>
  		<script src="assets/vendor/jqvmap/jquery.vmap.js"></script>
  		<script src="assets/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
  		<script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
  		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
  		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
  		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
  		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
  		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
  		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
      -->
  		<!-- Theme Base, Components and Settings -->
  		<script src="{{asset('octopus/assets/javascripts/theme.js')}}"></script>

  		<!-- Theme Custom -->
  		<script src="{{asset('octopus/assets/javascripts/theme.custom.js')}}"></script>

  		<!-- Theme Initialization Files -->
  		<script src="{{asset('octopus/assets/javascripts/theme.init.js')}}"></script>

      <script src="{{asset('appzia/plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
      @include('sweetalert::alert')
      @yield('scripts')

  		<!-- Examples -->
      <!--
  		<script src="{{asset('octopus/assets/javascripts/dashboard/examples.dashboard.js')}}"></script>
    -->
    </body>
  </html>
