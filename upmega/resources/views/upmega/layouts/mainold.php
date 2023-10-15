<?php // header('Clear-Site-Data: "cache"'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="upmega Jobs">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#0dcaf0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>upmega Jobs</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">

     <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    
    <link rel="icon" href="{{asset('images/logo.png')}}">
    <link rel="apple-touch-icon" href="{{asset('images/logo.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('images/logo.png')}}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{asset('images/logo.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/logo.png')}}">
    <link rel="stylesheet" href="{{asset('app/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/owl.carousel.min.css')}}">
         <script src="https://kit.fontawesome.com/181da3f5e8.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{asset('app/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('app/appupmega.css')}}">
    <link rel="manifest" href="{{asset('app/manifest.json')}}">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </head>
  <body>
    <!-- Preloader-->
  <!--   <div class="preloader" id="preloader">
      <div class="spinner-grow text-secondary" role="status">
        <div class="sr-only">Loading...</div>
      </div>
    </div> -->

    @if(Route::is('home'))
    <div class="upmega-loader">
   <div class="upmega-loader-img"> 
      <img height="188.8" width="188.8" class="img-fluid" src="{{asset('images/logo.png')}}">
   </div>
</div>
@endif
<div class="pt-2"></div>
   @include('upmega.layouts.header')
    @include('upmega.layouts.toastr')

    @include('upmega.layouts.selects')

   @include('upmega.layouts.sidebar')

	<div class="page-content-wrapper">
	@yield('content')
	</div>

<div class="py-3"></div>
   @include('upmega.layouts.footer')
     <script type="text/javascript">
       $(window).on('load', function(){  
         $('.upmega-loader').fadeOut();
       });
    </script>
    <script src="{{asset('app/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('app/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('app/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('app/js/dark-mode-switch.js')}}"></script>
    <script src="{{asset('app/js/no-internet.js')}}"></script>
    <script src="{{asset('app/js/active.js')}}"></script>
    <script src="{{asset('app/js/pwa.js')}}"></script>
    <script>
   function regtogglePassword() {
   var x = document.getElementById("regpassword");
   if (x.type === "password") {
   x.type = "text";
   } else {
   x.type = "password";
   }
   }
    function invregtogglePassword() {
   var x = document.getElementById("inv_regpassword");
   if (x.type === "password") {
   x.type = "text";
   } else {
   x.type = "password";
   }
   }
      function logintogglePassword() {
   var x = document.getElementById("logpassword");
   if (x.type === "password") {
   x.type = "text";
   } else {
   x.type = "password";
   }
   
   }
</script>
  </body>
</html>