<style>
   .upmega-profile-img{
   height: 100px;
   width: 100px;
   object-fit: cover;
   }
   .form-control, .form-select {
   -webkit-transition-duration: 500ms;
   transition-duration: 500ms;
   border-color: #ebebeb;
   height: 50px;
   padding: 0.375rem 1rem;
   font-size: 14px;
   }
   .btn {
   font-size: 14px;
   color: #fff;
   background-color: #ff511a;
   padding: 12px 30px;
   display: inline-block;
   border-radius: 5px;
   font-weight: 500;
   text-transform: capitalize;
   letter-spacing: 0.5px;
   transition: all .3s;
   }
   .upmega-text-secondary{
   color: #ff511a;
   }
   .upmega-bg-secondary{
   background-color: #ff511a;
   }
   .package-description{
   margin-bottom: 20px;
   }
   .package-name{
   font-size: 12px;
   }
   .package-description ul{
   padding: 0;
   }
   .package-description ul li{
   color: #fff!important;
   text-align: left;
   font-size: 12px;
   margin-bottom: 10px;
   }
   .table>:not(:first-child) {
   border-top: 0px solid transparent!important;
   }
   /*input selects dark styles*/
   .select2-container--default .select2-selection--single {
   border: 1px solid #ced4da!important;
   height: 50px!important;
   border-radius: .25rem!important;
   background-color: rgba(255, 255, 255, 0.2)!important;
   }
   .select2-container--default .select2-selection--single .select2-selection__rendered {
   line-height: 48px!important;
   }
   .select2-container--default .select2-selection--single .select2-selection__arrow {
   top: 10px!important;
   }
   .select2-container--default .select2-selection--single .select2-selection__placeholder {
   color: #747794!important;
   }
   /*input selects dark styles*/
   .accordion-item:last-of-type .accordion-button.collapsed {
   background-color: #fff !important;
   }
   [data-theme="dark"] .accordion-item:last-of-type .accordion-button.collapsed {
   background-color: #2b2a2b !important;
   }
   .accordion-button:not(.collapsed) {
   color: #fff !important;
   background-color: #ffc107 !important;
   }
   [data-theme="dark"] .accordion-button:not(.collapsed) {
   color: #fff !important;
   background-color: #ffc107 !important;
   }
   .accordion-button {
   color: #ff511a !important;
   border: 1px solid #ff511a !important;
   }
   [data-theme="dark"] .accordion-button {
   color: #747794 !important;
   background-color: #2B2A2B !important;
   border: 1px solid #747794 !important;
   }
   [data-theme="dark"] .accordion-button:not(.collapsed)::after {
   background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
   }
   .accordion-button:not(.collapsed)::after {
   background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
   }
   .accordion-button::after {
   background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ff511a'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
   }
   .btn-close {
   background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ffd54b'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
   }
   .upmega-bg {
   background-color: #FFFFFF;
   }
   [data-theme="dark"] .upmega-bg {
   /*  background-color: #0F1C2F;*/
   background-color: #2b2a2b;
   }
   .upmega-account-label{
   height: 220px;
   }
   .upmega-package-label{
   height: 250px;
   }
   .upmega-plan-text{
   font-size: .8rem;
   text-align: left;
   }
   .btn-check:checked+.btn, .btn.active, .btn.show, .btn:first-child:active, :not(.btn-check)+.btn:active {
   background-color: #f6d200!important;
   }
   .upmega-create-card{
   height: 100px;
   }
   [data-theme="dark"] .alert-close {
   background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%232b2a2b'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
   }
   .alert-close{
   background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%232b2a2b'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
   }
   .upmega-card:hover {
   border: 1px solid #ffaf00!important;
   }
   .upmega-card:active,.upmega-card:focus {
   border: 2px solid #ffaf00!important;
   transform: scale(0.98);
   }
   label{
   cursor: pointer!important;
   }
   .nav-pills .nav-link.active, .nav-pills .show>.nav-link{
   background-color: #ff511a!important;
   -webkit-border-radius: 30px!important;
   -moz-border-radius: 30px!important;
   }
   .nav-pills > li > button {
   -webkit-border-radius: 30px!important;
   -moz-border-radius: 30px!important;
   border-radius: 30px!important;
   }
   .upmega-bold{
   font-weight: bold;
   }
   .upmega-border-primary{
   border: 1px solid #ff511a!important;
   }
   .upmega-border-secondary{
   border: 1px solid #ffaf00!important;
   }
   .upmega-round{
   border-radius: 30px;
   }
   .upmega-btn-primary {
   border-radius: 30px;
   border: 2px solid #ff511a!important;
   background: #ff511a!important;
   color: #fff!important;
   box-shadow: 0 3px 5px #777777, inset 0 0 0px #777777;
   transition: transform 200ms;
   cursor: pointer;
   padding: 10px 20px 10px 20px!important;
   }
   .upmega-btn-primary:hover,.upmega-btn-primary:focus {
   background: #ff511a!important;
   color: #fff!important;
   box-shadow: 0 3px 5px #777777, inset 0 0 10px #777777;
   }
   .upmega-btn-primary:active {
   background: #ff511a!important;
   color: #fff!important;
   transform: scale(0.98);
   }
   .upmega-btn-secondary {
   border-radius: 30px;
   background: #ffaf00!important;
   color: #fff!important;
   box-shadow: 0 3px 5px #777777, inset 0 0 0px #777777;
   transition: transform 200ms;
   cursor: pointer;
   padding: 10px 20px 10px 20px!important;
   }
   .upmega-btn-secondary:hover,.upmega-btn-secondary:focus {
   background: #ffaf00!important;
   color: #fff!important;
   box-shadow: 0 3px 5px #777777, inset 0 0 10px #777777;
   }
   .upmega-btn-secondary:active {
   background: #ffaf00!important;
   color: #fff!important;
   transform: scale(0.98);
   }
   .upmega-btn-outline-primary {
   border-radius: 30px;
   border: 2px solid #ff511a!important;
   background: transparent;!important;
   color: #ff511a!important;
   box-shadow: 0 3px 5px #777777, inset 0 0 0px #777777;
   transition: transform 200ms;
   cursor: pointer;
   padding: 10px 20px 10px 20px!important;
   }
   .upmega-btn-outline-primary:hover,.upmega-btn-outline-primary:focus {
   background: #ff511a!important;
   color: #fff!important;
   box-shadow: 0 3px 5px #777777, inset 0 0 10px #777777;
   }
   .upmega-btn-outline-primary:active {
   background: #ff511a!important;
   color: #fff!important;
   transform: scale(0.98);
   }
   .upmega-btn-outline-secondary {
   border-radius: 30px;
   border: 2px solid #ffaf00!important;
   background: transparent;!important;
   color: #ffaf00!important;
   box-shadow: 0 3px 5px #777777, inset 0 0 0px #777777;
   transition: transform 200ms;
   cursor: pointer;
   padding: 10px 20px 10px 20px!important;
   }
   .upmega-btn-outline-secondary:hover,.upmega-btn-outline-secondary:focus {
   background: #ffaf00!important;
   color: #fff!important;
   box-shadow: 0 3px 5px #777777, inset 0 0 10px #777777;
   }
   .upmega-btn-outline-secondary:active {
   background: #ffaf00!important;
   color: #fff!important;
   transform: scale(0.98);
   }
   .carousel-caption{
   bottom: 7.25rem!important;
   z-index: 2;
   text-align: left!important;
   }
   .upmega-init-swipe-img{
   height: 400px;
   border-radius: 20px;
   }
   .swipe-overlay-nyeusi:after {
   content: "";
   display: block;
   position: absolute;
   top: 0;
   bottom: 0;
   left: 0;
   right: 0;
   background: black;
   border-radius: 20px;
   opacity: 0.6;
   z-index: 1;
   }
   .carousel-indicators [data-bs-target]{
   border-radius: 50%;
   width: 15px;
   height: 15px;
   background-color: #ffaf00!important;
   }
   .upmega-text-secondary{
   color: #ff511a!important;
   }
   .upmega-text-primary{
   color: #212741!important;
   }
   .upmega-bg-primary{
   background-color: #ff511a!important;
   }
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
   .nav-fill .nav-item .nav-link, .nav-justified .nav-item .nav-link{
   width: 90%!important;
   }
   .upmega-swipe-init-header{
   font-size: 42px;
   }
   .upmega-flex{
   display: flex!important;
   justify-content:  space-between!important;
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
<nav class="navbar navbar-dark bg-dark fixed-top">
   <div class="container-fluid">
      <a class="navbar-brand upmega-bold" href="{{url('/')}}"><img height="60" width="60" src="https://cdn-icons-png.flaticon.com/512/197/197374.png"> upmega Jobs <span class="upmega-text-secondary"> UK </span></a>
      <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#seasonMenu" aria-controls="seasonMenu">
         <!--<span class="navbar-toggler-icon"></span>-->
         <i class="fa-solid fa-bars-staggered fs-2"></i>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="seasonMenu" aria-labelledby="seasonMenuLabel">
         <div class="offcanvas-header">
            <h5 class="offcanvas-title upmega-bold text-white" id="seasonMenuLabel"><img height="40" width="40" src="https://cdn-icons-png.flaticon.com/512/197/197374.png"> upmega Jobs <span class="upmega-text-secondary"> UK </span> </h5>
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
               <li class="nav-item mb-3"><a class="nav-link" href="{{url('/')}}"><i class="fa fa-user"></i> My Account</a></li>
               @if(Auth::guest())
               <li class="nav-item mb-3"><a class="nav-link" href="{{ url('login') }}"><i class="fa fa-sign-in"></i> Login</a></li>
               <li class="nav-item mb-3"><a class="nav-link" href="{{ url('register') }}"><i class="fa fa-user-plus"></i> Create Account</a></li>
               @else
               @can('role-list')
               <li class="nav-item mb-3"><a class="nav-link" href="{{ route('roles.index') }}"><i class="fa fa-user-shield"></i> Roles</a></li>
               @endcan
               <li class="nav-item mb-3"><a class="nav-link" href="{{url('/appexit')}}"><i class="fa fa-power-off"></i> Sign Out</a></li>
               @endif
               <li class="nav-item mb-3"><a class="nav-link" href="tel:+254712345678"><i class="fa fa-phone"></i> Help 24/7</a></li>
               <li class="nav-item mb-3"><a class="nav-link" href="{{route('registrations.index')}}"><i class="fa fa-list"></i> Registrations</a></li>
               <li class="nav-item mb-3"><a class="nav-link" href="{{route('mpesa_transactions.index')}}"><i class="fa fa-money"></i> MPESA Transactions</a></li>
               <li class="nav-item mb-3 dropdown">
                  <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
            </ul>
         </div>
      </div>
   </div>
</nav>