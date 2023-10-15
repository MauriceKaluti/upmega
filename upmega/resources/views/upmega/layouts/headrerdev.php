<style>
      .scrollmenu {
   background-color: #011735;
   white-space: nowrap;
   overflow-x: auto;
   }
   .scrollmenu .nav-item {
   display: inline-block;
   color: white;
   text-align: center;
   padding: 14px;
   text-decoration: none;
   }
   .scrollmenu .nav-item:hover {
   background-color: #0d6efd;
   }
   @media screen and (max-width: 768px){
   th{
   font-size: 12px;
   }
   .package-name{
   font-size: 10px;
   }
   .upmega-mobile-hide{
   display: none;
   }
   .nav-link-mobile{
   font-size: 14px;
   }
   .upmega-init-swipe-img{
   height: 240px;
   }
   .carousel-caption{
   bottom: 4.25rem!important;
   z-index: 2;
   text-align: left!important;
   }
   .upmega-mobile-text{
   font-size: 12px;
   }
   .upmega-swipe-init-header{
   font-size: 24px;
   }
   .upmega-mobile-btn{
   font-size: 12px;
   }
   }
</style>
<!-- <nav class="navbar navbar-light shadow-lg bg-light fixed-top">
   <div class="container-fluid">
      <a class="navbar-brand upmega-bold" href="{{url('/')}}"><img width="128" height="72" src="{{url('images/logo.jpg')}}">  </a>
      <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#upmegaMenu" aria-controls="upmegaMenu">
      <i class="fa-solid fa-bars-staggered fs-2"></i>
      </button>
      <div class="offcanvas offcanvas-end text-bg-light" tabindex="-1" id="upmegaMenu" aria-labelledby="upmegaMenuLabel">
         <div class="offcanvas-header">
            <h5 class="offcanvas-title upmega-bold text-white" id="upmegaMenuLabel"><img width="128" height="72" src="{{url('images/logo.jpg')}}">   </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>
         <div class="offcanvas-body">
            @if(Auth::guest())
            @else
            <?php 
               $sideuserid = Auth::user()->id;
               $sideuser = App\Models\User::where('id','=',$sideuserid)->first();
               $sideuserRole = $sideuser->roles->pluck('name')->all();
               $sideuserRole = $sideuserRole[0];
               
               if ($sideuserRole == 'Super Admin' || $sideuserRole == 'System Admin' || $sideuserRole == 'Employee') {
               }
               
               
               if ($sideuserRole == 'Customer') {
               }
               
               ?>
            @endif
            <div class="sidenav-profile text-center">
               <div class="user-profile"><img height="80" width="80" src="{{url('images/avatar.png')}}" alt=""></div>
               @if(Auth::guest())
               @else
               <div class="user-info">
                  <h6 class="user-name text-white mb-1">{{Auth::user()->name}}</h6>
                  <small><span class="badge badge-primary upmega-round upmega-bg-secondary">{{$sideuserRole ?? 'App User'}}</span></small>
               </div>
               @endif
            </div>
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
               <li class="nav-item mb-3"><a class="nav-link active"  aria-current="page" href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
               @if(Auth::guest())
               <li class="nav-item mb-3"><a class="nav-link" href="{{ url('login') }}"><i class="fa fa-sign-in"></i> Login</a></li>
               <li class="nav-item mb-3"><a class="nav-link" href="{{ url('register') }}"><i class="fa fa-user-plus"></i> Create Account</a></li>
               @else
               <li class="nav-item mb-3"><a class="nav-link" href="{{url('/me')}}"><i class="fa fa-user"></i> My Account</a></li>
               @can('role-list')
               <li class="nav-item mb-3"><a class="nav-link" href="{{ route('roles.index') }}"><i class="fa fa-user-shield"></i> Roles</a></li>
               @endcan
        
               @can('user-list')
               <li class="nav-item mb-3 dropdown">
                  <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-users"></i>
                  Users <i class="fa fa-angle-down float-end"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark">
                     @can('user-list')
                     <li><a class="dropdown-item" href="{{route('users.index')}}">View</a></li>
                     @endcan
                     @can('user-create')
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li><a class="dropdown-item" href="{{route('users.create')}}">Create</a></li>
                     @endcan
                  </ul>
               </li>
               @endcan
               <li class="nav-item mb-3"><a class="nav-link" href="{{url('/appexit')}}"><i class="fa fa-power-off"></i> Sign Out</a></li>
               @endif
               <li class="nav-item mb-3">
                  <a class="nav-link" target="_blank" href="https://wa.me/254700422699?text=I'm%20interested%20in%20buying%20your%20recliner%20seats%20now">
                  <i class="fab fa-whatsapp"></i> WhatsApp Us
                  </a>
               </li>
               <li class="nav-item mb-3"><a class="nav-link" href="tel:+254712345678"><i class="fa fa-phone"></i> Help 24/7</a></li>
            </ul>
         </div>
      </div>
   </div>
</nav> -->

<!-- <nav class="navbar navbar-expand-lg bg-body-tertiary"> -->
   <nav class="navbar navbar-expand shadow-lg bg-primary fixed-top" style="height: 70px;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <a class="navbar-brand upmega-bold" href="{{url('/')}}"><img width="128" height="72" src="{{url('images/logo.jpg')}}">  </a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">


        <li class="nav-item text-dark">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>  

<!-- <ul class="scrollmenu shadow-lg fixed-top p-0 mb-0">
   <a data-bs-toggle="offcanvas" data-bs-target="#toggleSideNav" aria-controls="toggleSideNav" class="nav-item mobile-font" href=""><i class="fa fa-bars" aria-hidden="true"></i> All</a>
       <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
         <a class="nav-item mobile-font" href="https://yetustores.com/category/appliances">Appliances</a>
      <a class="nav-item mobile-font" href="https://yetustores.com/category/automobile">Automobile</a>
      <a class="nav-item mobile-font" href="https://yetustores.com/category/camera-and-accessories">Camera and Accessories</a>
      <a class="nav-item mobile-font" href="https://yetustores.com/category/computing">Computing</a>
      <a class="nav-item mobile-font" href="https://yetustores.com/category/fashion">Fashion</a>
      <a class="nav-item mobile-font" href="https://yetustores.com/category/gaming">Gaming</a>
      <a class="nav-item mobile-font" href="https://yetustores.com/category/home-office">Home &amp; Office</a>
      <a class="nav-item mobile-font" href="https://yetustores.com/category/laptops">Laptops</a>
      <a class="nav-item mobile-font" href="https://yetustores.com/category/luggage-and-bags">Luggage and Bags</a>


   </ul>
 -->