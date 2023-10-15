<?php
   // clear cache only
   // header('Clear-Site-Data: "cache"');
   ?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <title>upmega</title>
   <meta charset="utf-8">
   <meta name="robots" content="index,follow">
   <meta http-equiv="refresh" content="300000">
   <meta name="keywords" content="upmega">
   <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
   <meta name="description" content="upmega">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="theme-color" content="#141B57" >
   <meta name="apple-mobile-web-app-capable" content="yes"/>
   <meta name="apple-mobile-web-app-status-bar-style" content="black">
   <!-- Favicon-->
   <link rel="icon" href="{{asset('images/fxlogo.jpg')}}">
   <!-- Apple Touch Icon-->
   <link rel="apple-touch-icon" href="{{asset('images/fxlogo.jpg')}}">
   <link rel="apple-touch-icon" sizes="152x152" href="{{asset('images/fxlogo.jpg')}}">
   <link rel="apple-touch-icon" sizes="167x167" href="{{asset('images/fxlogo.jpg')}}">
   <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/fxlogo.jpg')}}">
   <!-- Stylesheet-->
   <!--Start of Tawk.to Script-->
   <script type="text/javascript">
      var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
      (function(){
      var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
      s1.async=true;
      s1.src='https://embed.tawk.to/6377b88ddaff0e1306d832a1/1gi5qhsfe';
      s1.charset='UTF-8';
      s1.setAttribute('crossorigin','*');
      s0.parentNode.insertBefore(s1,s0);
      })();
   </script>
   <!--End of Tawk.to Script-->
   <head>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
      <script src="https://kit.fontawesome.com/181da3f5e8.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="{{asset('system/homescreen/style/addtohomescreen.css')}}">
      <link rel="manifest" href="{{asset('system/manifest.json')}}">
      <link rel="stylesheet" href="{{asset('system/bootstrap/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('system/style.css')}}">
      <link rel="stylesheet" href="{{asset('system/site.css')}}">
      <script src="{{asset('system/jquery/jquery.min.js')}}"></script>
      <style>
         .upmega-loader {
         position: fixed;
         left: 0px;
         top: 0px;
         width: 100%;
         height: 100%;
         z-index: 9999;
         background-color: #ffff;
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
   </head>
   <body>
      <div class="upmega-loader">
         <div class="upmega-loader-img"> 
            <img height="188.8" width="188.8" class="img-fluid" src="{{asset('images/fxlogo.jpg')}}">
         </div>
      </div>
      @include('front.layouts.header')
      <div class="page-content-wrapper">
         @yield('content')
         @include('layouts.toastr')
         @include('front.layouts.selects')
         @include('search_users')
         @include('pop_contact')
         <div class="py-5"></div>
         @include('front.layouts.footer')
         @include('front.layouts.sidebar')
      </div>
      <script src="{{asset('system/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('system/js/default/dark-mode-switch.js')}}"></script>
      <script src="{{asset('system/js/default/no-internet.js')}}"></script>
      <script src="{{asset('system/js/default/active.js')}}"></script>
      <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
      <script src="{{asset('system/homescreen/src/addtohomescreen.js')}}"></script>
      <script type="text/javascript">
         $(window).on('load', function(){  
           $('.upmega-loader').fadeOut();
         });
      </script>
      <script type="text/javascript">
         $(document).ready(function() {
         
             $('#upmegaDisplay').DataTable( {
                 dom: 'Bfrtip',
                 buttons: [
         'copy', 'csv', 'excel', 'pdf', 'print'
                 ]
             } );
         
         
         
         
         $('#upmegaDisplay2').DataTable( {
                 dom: 'Bfrtip',
                 buttons: [
         'copy', 'csv', 'excel', 'pdf', 'print'
                 ]
             } );
         
         
         $('#upmegaDisplay3').DataTable( {
                 dom: 'Bfrtip',
                 buttons: [
         'copy', 'csv', 'excel', 'pdf', 'print'
                 ]
             } );
         
         
         
             });
      </script>
      <script type="text/javascript">
         $(document).on('click', '.copyprofilelink', function(event){
             event.preventDefault();
         
             profile = $(this).data('profile');
         
                        CopyProfileToClipboard(profile);
         
                });
         
         
                function CopyProfileToClipboard(value) {
                    var $temp = $("<input>");
                    $("body").append($temp);
                    $temp.val(value).select();
                    document.execCommand("copy");
                    $temp.remove();
          
                   
                             toastr.options = {
           "preventDuplicates": true,
           "preventOpenDuplicates": true
           };
             toastr.success('Profile Link Copied to Clipboard');
             toastr.options.closeButton = true;
              toastr.options.positionClass = 'toast-bottom-right';
                   
                }
         
                // end copy profile link to cb
         
         
             
         
                // end copy feed link to cb
         
         
                    // go to user
                          
                          $(document).on('click', '.visit_profile', function(){
                          
                          slug = $(this).data('slug');
                          
                          // alert(slug);
                          
                          if (slug != '') {
                          
                          var slugurl = "{{route('user.profile', '')}}"+"/"+slug;
                          
                          }else{
                          
                          var slugurl = "{{route('home', '')}}";
                          
                          }
                          
                          window.location.href = slugurl;  
                          
                          });
         
            
      </script>
      <script>
         function togglePassword() {
         var x = document.getElementById("password");
         if (x.type === "password") {
         x.type = "text";
         } else {
         x.type = "password";
         }
         }
      </script>
      <script>
         if ( (("standalone" in window.navigator) && !window.navigator.standalone)  
         
         ||
         
         (!window.matchMedia('(display-mode: standalone)').matches)  
         
         ) {
         
         addToHomescreen();
         }
      </script>
   </body>
</html>