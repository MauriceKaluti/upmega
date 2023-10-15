<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Upmega Furniture</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
    <meta name="theme-color" content="#120638">
      <meta name="apple-mobile-web-app-capable" content="yes"/>
      <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <link href="{{asset('images/logo icon.png')}}" rel="icon">
      <link rel="apple-touch-icon" href="{{asset('images/logo icon.png')}}">
      <link rel="apple-touch-icon" sizes="152x152" href="{{asset('images/logo icon.png')}}">
      <link rel="apple-touch-icon" sizes="167x167" href="{{asset('images/logo icon.png')}}">
      <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/logo icon.png')}}">
  <script src="https://kit.fontawesome.com/181da3f5e8.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <!-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet"> -->
  <link href="https://fonts.googleapis.com/css?family=Plus Jakarta Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700" rel="stylesheet">
  <!--<link href="{{asset('site/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link href="{{asset('site/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/css/upmegavariables.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/css/upmega.css')}}" rel="stylesheet">

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  

      <style>
         .object-fit-cover{
         object-fit: cover;
         }
         .object-fit-contain{
         object-fit: contain;
         }
         .upmega-card-img{
         height: 200px;
         width: 100%;
         }
         
       .upmega-loader {
   position: fixed;
   left: 0px;
   top: 0px;
   width: 100%;
   height: 100%;
   z-index: 9999;
   background-color: #fff;
   }
   .upmega-loader-img{
   position: absolute;
   top: 50%;
   left: 50%;
   -ms-transform: translateX(-50%) translateY(-50%);
   -webkit-transform: translate(-50%,-50%);
   transform: translate(-50%,-50%);
   }
    </style>
 <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6515a39510c0b257248686e5/1hbe8e12k';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</head>

<body>
    
<div class="upmega-loader">
    <div class="upmega-loader-img"> 
        <img class="img-fluid" src="https://codekali.com/upmega/images/logo-dark.png">
    </div>
</div>
     @include('upmega.layouts.toastr')
      @include('upmega.layouts.selects')

      @if(Route::is('home2'))
@include('upmega.layouts.header2')

      @else

@include('upmega.layouts.header')
@endif
      <main id="main">
 
      @include('upmega.layouts.sidebar')
         @yield('content')
</main>

      @include('upmega.layouts.footer')

 <script src="{{asset('site/assets/js/eagerloader.min.js')}}"></script> 

      <script type="text/javascript">
      new EagerImageLoader();
  </script>
  <!--<script src="{{asset('site/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <script src="{{asset('site/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
 
  
  <script src="{{asset('site/assets/js/mainapp.js')}}"></script>
  
   <script type="text/javascript">
$(window).on('load', function(){  
$('.upmega-loader').fadeOut();
});


// window.addEventListener('load', function() {
//   $('.upmega-loader').fadeOut();
// });
</script>
    <script>
   var token = '{{ Session::token() }}';
    var urlShopCart = '{{ route('fill_cart') }}';
</script>

<script>
   $(document).on('click', '.upmega-shop-cart', function(event){
      event.preventDefault();
      product_id = $(this).data('productid');
      $.ajax({
      method: 'POST',
      url: urlShopCart,
      data: {product_id: product_id, _token: token},
      beforeSend: function () {
      if ($("#upmega_progress").length === 0) {
      $("body").append($("<div><b></b><i></i></div>").attr("id", "upmega_progress"));
      $("#upmega_progress").width("101%").delay(1000).fadeOut(1000, function() {
      $(this).remove();
      });  
      }
      }
      })
      
      .done(function() {
     $('#cartCount').load(document.URL +  ' #cartCount');
     $('#cartCount2').load(document.URL +  ' #cartCount2');
     $('#sideCart').load(document.URL +  ' #sideCart');
     $('#sideCartCount').load(document.URL +  ' #sideCartCount');
      $('#cartModal').modal('show');
      toastr.success('Added to Basket!');
      toastr.options.closeButton = true;
      toastr.options.positionClass = 'toast-bottom-right';
      });

    const audio = new Audio("https://codekali.com/upmega/audio/success.mp3");
    audio.play();

    setTimeout(function() { 
      $('#toggleCartNav').offcanvas('show');

    // var cartCanvas = document.getElementById('toggleCartNav');
    // cartCanvas.show();
    // var bsOffcanvas = new bootstrap.Offcanvas(cartCanvas);
    // bsOffcanvas.show();
    }, 2000);


 
    });
</script>
</body>

</html>