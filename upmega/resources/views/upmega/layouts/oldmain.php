<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
      <title>Upmega</title>
      <link rel="icon" href="{{asset('images/upmegalogo.jpg')}}">
      <link rel="apple-touch-icon" href="{{asset('images/upmegalogo.jpg')}}">
      <link rel="apple-touch-icon" sizes="152x152" href="{{asset('images/upmegalogo.jpg')}}">
      <link rel="apple-touch-icon" sizes="167x167" href="{{asset('images/upmegalogo.jpg')}}">
      <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/upmegalogo.jpg')}}">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="{{asset('myupmega/assets/css/fontawesome.css')}}">
      <link rel="stylesheet" href="{{asset('myupmega/assets/css/upmega.css')}}">
      <link rel="stylesheet" href="{{asset('myupmega/assets/css/owl.css')}}">
      <link rel="stylesheet" href="{{asset('myupmega/assets/css/animate.css')}}">
      <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   </head>
   <body>
      @include('upmega.layouts.header')
      @include('upmega.layouts.toastr')
      @include('upmega.layouts.selects')
      @include('upmega.layouts.sidebar')
      @yield('content')
      @include('upmega.layouts.footer')
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
      <script src="{{asset('myupmega/assets/js/isotope.min.js')}}"></script>
      <script src="{{asset('myupmega/assets/js/owl-carousel.js')}}"></script>
      <script src="{{asset('myupmega/assets/js/tabs.js')}}"></script>
      <script src="{{asset('myupmega/assets/js/swiper.js')}}"></script>
      <script src="{{asset('myupmega/assets/js/custom.js')}}"></script>
   </body>
</html>