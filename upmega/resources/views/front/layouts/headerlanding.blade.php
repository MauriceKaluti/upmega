 <style>


@media screen and (min-width: 800px) {
      .navbar-nav > .nav-item{
    margin-left: 100px;
    /*margin-right: 60px;*/
}

.upmega-desktop-hide{
    display: none;
}

.upmega-subscribe-btn{
border-radius: 0px 30px 30px 0px!important;

}

  .upmega-newsletter-input{
border-radius: 30px 0px 0px 30px!important
    }
}

 
          .upmegah-ham {
         cursor: pointer;
         -webkit-tap-highlight-color: transparent;
         transition: transform 400ms;
         -moz-user-select: none;
         -webkit-user-select: none;
         -ms-user-select: none;
         user-select: none;
         }
         .upmegah-hamRotate.active {
         transform: rotate(45deg);
         }
         .upmegah-hamRotate180.active {
         transform: rotate(180deg);
         }
         .upmegah-ham-line {
         fill:none;
         transition: stroke-dasharray 400ms, stroke-dashoffset 400ms;
         stroke:#ffd54b;
         stroke-width:5.5;
         stroke-linecap:round;
         }
         .upmegah-ham-toggle .upmegah-ham-top {
         stroke-dasharray: 40 139;
         }
         .upmegah-ham-toggle .upmegah-ham-bottom {
         stroke-dasharray: 40 180;
         }
         .upmegah-ham-toggle.active .upmegah-ham-top {
         stroke-dashoffset: -98px;
         }
         .upmegah-ham-toggle.active .upmegah-ham-bottom {
         stroke-dashoffset: -138px;
         }

        .logo-bg-image {
        background: url("https://www.upmega.co.ke/wp-content/uploads/upmega-logo-inverted-92.png") no-repeat center;
        background-size: contain;
/*        z-index: 99999!important;  */
        width: 115px;
        height: 100px;
        display: block;      
        }

        [data-theme="dark"] .logo-bg-image {
        background: url("https://www.upmega.co.ke/wp-content/uploads/upmega-logo-small.png") no-repeat center;
        background-size: contain;
/*        z-index: 99999!important;  */
        width: 115px;
        height: 100px;
        display: block;      
        }

        .footer-logo-bg-image{
   background: url("https://www.upmega.co.ke/wp-content/uploads/upmega-logo-inverted-92.png") no-repeat center;
        background-size: contain;
        width: 50%;
        height: 178px;
        display: block;    

        }

     [data-theme="dark"] .footer-logo-bg-image {
        background: url("https://www.upmega.co.ke/wp-content/uploads/upmega-logo-small.png") no-repeat center;
        background-size: contain;
/*        z-index: 99999!important;  */
        width: 70%;
        height: 178px;
        display: block;      
        }

   .header-cta-cover{

    display: none;
}

   .upmegah-ham-toggle{

    display: none;
}    

   @media screen and (max-width: 600px){

    .upmega-desktop-hide{
    display: block;
    }

    .upmega-footer-copyright{

        font-size: 10px;
    }

    .upmega-newsletter-input{
        margin-bottom: 10px;
    }
.header-cta-cover{

    display: block;
}
.upmegah-ham-toggle{

    display: block;
}
        .header-nav-item{
            padding-bottom: 24px;
        }

             .header-cta-btn{
            width: 100%!important;
        }
        }
 </style>

<nav class="navbar navbar-expand-lg fixed-top upmega-bg shadow-lg">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->

    <a class="logo-bg-image" href="{{url('/')}}">
        
         <!-- <img class="img-fluid" src="https://www.upmega.co.ke/wp-content/uploads/upmega-logo-inverted-92.png"> -->

     </a>
 
      <!-- <span class="navbar-toggler-icon"></span> -->
        <svg class="upmegah-ham upmegah-hamRotate upmegah-ham-toggle" data-bs-toggle="collapse" data-bs-target="#upmegaSlideHeadNav" aria-controls="upmegaSlideHeadNav" viewBox="0 0 100 100" width="80" onclick="this.classList.toggle('active')">
            <path
               class="upmegah-ham-line upmegah-ham-top"
               d="m 30,33 h 40 c 0,0 9.044436,-0.654587 9.044436,-8.508902 0,-7.854315 -8.024349,-11.958003 -14.89975,-10.85914 -6.875401,1.098863 -13.637059,4.171617 -13.637059,16.368042 v 40" />
            <path
               class="upmegah-ham-line middle"
               d="m 30,50 h 40" />
            <path
               class="upmegah-ham-line upmegah-ham-bottom"
               d="m 30,67 h 40 c 12.796276,0 15.357889,-11.717785 15.357889,-26.851538 0,-15.133752 -4.786586,-27.274118 -16.667516,-27.274118 -11.88093,0 -18.499247,6.994427 -18.435284,17.125656 l 0.252538,40" />
         </svg>
     
    <div class="collapse navbar-collapse justify-content-end" id="upmegaSlideHeadNav">
      <ul class="navbar-nav ml-auto mb-2">
        <li class="nav-item header-nav-item">
        <a class="nav-link text-site active" aria-current="page" href="{{url('/')}}">HOME</a>
        </li>
         <li class="nav-item header-nav-item">
        <a class="nav-link text-site active" aria-current="page" href="{{url('/blog')}}">BLOG</a>
        </li>
     
        @if(Auth::guest())
        <li class="nav-item header-nav-item">
           <a href="{{url('login')}}" class="btn btn-primary upmega-btn-primary header-cta-btn upmega-round"><i class="fa fa-book"></i> Sign In</a>
        </li>
        <li class="nav-item header-nav-item upmega-desktop-hide">
           <a href="{{url('register')}}" class="btn btn-primary upmega-btn-primary header-cta-btn upmega-round"><i class="fa fa-user-plus"></i> Create Account</a>
        </li>
      @else
        <li class="nav-item header-nav-item">
           <a href="{{url('dashboard')}}" class="btn btn-primary upmega-btn-primary header-cta-btn upmega-round"><i class="fa fa-book"></i> Self Service Portal</a>
        </li>
            <li class="nav-item header-nav-item">
           <a href="javascript;" data-bs-toggle="offcanvas" data-bs-target="#toggleSideNav" aria-controls="toggleSideNav" class="btn btn-primary upmega-btn-secondary header-cta-cover upmega-round"><i class="fa fa-user-circle"></i> My Account</a>
        </li>
      @endif
       
      </ul>
    
    </div>
  </div>
</nav>