<style>
   /*Colors
   Purple: #120638
   Pink: #ff2487
   */
   /*   .upmega-btn-primary {
   background-color: #4CAF50;  
   border: none;
   color: white;
   padding: 15px 32px;
   text-align: center;
   text-decoration: none;
   display: inline-block;
   font-size: 16px;
   margin: 4px 2px;
   cursor: pointer;
   }*/
   .std-font{
   font-size: 12px;
   }
   #upmega_progress {
   position: fixed;
   z-index: 9999;
   top: 0;
   left: -6px;
   width: 1%;
   height: 3px;
   background-color: #ff2487;
   -moz-border-radius: 1px;
   -webkit-border-radius: 1px;
   border-radius: 1px;
   -moz-transition: width 600ms ease-out, opacity 500ms linear;
   -ms-transition: width 600ms ease-out, opacity 500ms linear;
   -o-transition: width 600ms ease-out, opacity 500ms linear;
   -webkit-transition: width 600ms ease-out, opacity 500ms linear;
   transition: width 1000ms ease-out, opacity 500ms linear;
   }
   #upmega_progress b, #upmega_progress i {
   position: absolute;
   top: 0;
   height: 3px;
   -moz-box-shadow: #777777 1px 0 6px 1px;
   -ms-box-shadow: #777777 1px 0 6px 1px;
   -webkit-box-shadow: #777777 1px 0 6px 1px;
   box-shadow: #777777 1px 0 6px 1px;
   -moz-border-radius: 100%;
   -webkit-border-radius: 100%;
   border-radius: 100%;
   }
   #upmega_progress b {
   clip: rect(-6px,22px,14px,10px);
   opacity: .6;
   width: 20px;
   right: 0;
   }
   #upmega_progress i {
   clip: rect(-6px,90px,14px,-6px);
   opacity: .6;
   width: 180px;
   right: -80px;
   }
   body {
   font-family: 'Plus Jakarta Sans';
   /*    font-size: 22px;*/
   }
   .header .logo img {
   max-height: 70px;
   margin-right: 6px;
   }
   .nav-item-logo:focus, .nav-item-logo:active{
   background-color: transparent!important; 
   }
   .note-editable{
   background-color: #fff;  
   }
   .upmega-flex{
   display: flex;
   justify-content: space-between;
   }
   .select2-container--default .select2-selection--single .select2-selection__rendered {
   line-height: 48px!important;
   }
   .select2-container--default .select2-selection--single {
   border: 1px solid #ced4da!important;
   height: 50px!important;
   border-radius: 0.25rem!important;
   /*    background-color: rgba(255, 255, 255, 0.2)!important;*/
   }
   .select2-container--default .select2-selection--single {
   background-color: #fff!important;
   }
   .select2-container--default .select2-selection--single .select2-selection__arrow {
   top: 10px;
   }
   .upmega-create-card{
   height: 150px;
   }
   .upmega-rounded{
   border-radius: 10px;
   }
   .upmega-profile-img{
   width: 200px;
   height: 200px;
   }
   .upmega-round{
   border-radius: 30px;
   }
   .upmega-bold{
   font-weight: bold;
   }
   .upmega-home{
   padding-top: 86px;
   }
   .upmega-text-primary{
   color: #120638;
   }
   .upmega-text-secondary{
   color: #ff2487;
   }
   .upmega-bg-primary{
   background-color: #120638;
   }
   .upmega-bg-secondary{
   background-color: #ff2487;
   }
   #header{
   display: block;
   }
   .scrollmenu {
   background-color: #fff;
   white-space: nowrap;
   overflow-x: auto;
   display: none;
   }
   .scrollmenu .nav-item {
   display: inline-block;
   color: #000;
   text-align: center;
   padding: 14px;
   text-decoration: none;
   }
   .scrollmenu .nav-item:hover {
   background-color: #120638;
   color: #fff;
   }
   @media screen and (max-width: 768px){
   #header{
   display: hidden;
   }
   .scrollmenu {
   display: block;
   }
   th{
   font-size: 12px;
   }
   .package-name{
   font-size: 10px;
   }
   .upmega-mobile-hide{
   display: none!important;
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
   .header{
   display: none!important;
   }
   .upmega-home {
   padding-top: 78px;
   }
   }
</style>
<header id="header" class="header bg-white shadow-lg fixed-top" data-scrollto-offset="0">
   <div class="container-fluid d-flex align-items-center justify-content-between">
      <nav id="navbar" class="navbar text-start">
         <ul>
            <li>
               <a href="{{url('/')}}" class="logo py-1 d-flex align-items-center">
                  <h1 class="upmega-bold"><img class="img-fluid me-0" src="https://codekali.com/upmega/images/logo-dark.png"> </h1>
               </a>
            </li>
            <li><a class="nav-link" href="{{url('/home')}}">Home</a></li>
            <?php 
               $top_cats = App\Models\Category::get();
               ?>
            <li class="dropdown megamenu">
               <a class="" href="{{url('/shop')}}"><span>Our Sofas</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
               <ul class="shadow-lg">
                  @forelse($top_cats as $top_cat)
                  <li><a href="{{url('category',$top_cat->slug)}}"><i class="fa fa-angle-right me-1"></i>  {{$top_cat->name}}</a></li>
                  @empty
                  @endforelse
                  <br>
               </ul>
            </li>
            <li><a class="nav-link" href="{{url('/cart')}}">Cart</a></li>
            <!--   <li class="dropdown megamenu">
               <a class="" href="#"><span>Users</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
               <ul class="shadow-lg">
                  <?php $users = App\Models\User::get(); ?>
                  @forelse($users->chunk(3) as $usersCollection)
                  <li>
                     @forelse($usersCollection as $user)
                     <a href="{{url('service',$user->slug)}}"><i class="fa fa-angle-right me-1"></i> {{ Str::limit($user->name, 20, '...') }}</a>
                     @empty
                     @endforelse
                  </li>
                  @empty
                  @endforelse
               </ul>
               </li> -->
            <li><a class="nav-link" href="{{url('/')}}">Contact</a></li>
            <li><a class="nav-link" href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#toggleSideNav" aria-controls="toggleSideNav">My Account</a></li>
         </ul>
         <i class="bi bi-list mobile-nav-toggle d-none"></i>
      </nav>
      <div class="col-md-4 text-end">
         <a id="wishCount" class="text-dark upmega-bold me-3" href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#toggleWishNav" aria-controls="toggleWishNav">
         <span class="position-relative me-1">
         <i class="fa fa-bookmark fs-3"></i> 
         <span class="badge badge-primary bg-secondary upmega-round position-absolute top-0 start-100 translate-middle text-white border border-light rounded" style="font-size: .50em!important; border-radius: 30px!important;"> 0</span>
         </span> 
         </a>
         <a id="cartCount" class="text-dark upmega-bold me-2" href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#toggleCartNav" aria-controls="toggleCartNav">
         <span class="position-relative me-1">
         <i class="fa fa-shopping-cart fs-3"></i> 
         <span class="badge badge-primary bg-secondary upmega-round position-absolute top-0 start-100 translate-middle text-white border border-light rounded" style="font-size: .50em!important; border-radius: 30px!important;"> {{Cart::count()}}</span>
         </span> 
         </a>
      </div>
   </div>
</header>
<ul class="scrollmenu shadow-lg fixed-top p-0 mb-0">
   <a class="nav-item nav-item-logo mobile-font" href="{{url('/')}}">
   <img width="137.55" height="50.9" class="img-fluid me-0" src="https://codekali.com/upmega/images/logo-dark.png">  
   </a>
   <a class="nav-item mobile-font" href="{{url('/')}}">Home</a>
   <a class="nav-item mobile-font" href="{{url('/shop')}}">Our Sofas</a>
   @forelse($top_cats as $top_cat)
   <a href="{{url('category',$top_cat->slug)}}" class="nav-item mobile-font" href="#">{{$top_cat->name}}</a>
   @empty
   @endforelse
   <a class="nav-item mobile-font" href="{{url('/cart')}}">Cart</a>
   <a data-bs-toggle="offcanvas" data-bs-target="#toggleSideNav" aria-controls="toggleSideNav" class="nav-item mobile-font" href=""> My Account</a>
   <a class="nav-item mobile-font" href="#">Contact</a>
</ul>
<?php 
   $cartItems=Cart::content();
   ?>
<div class="offcanvas offcanvas-end upmega-bg" data-bs-backdrop="true" data-bs-scroll="true" tabindex="-1" id="toggleCartNav"  aria-labelledby="toggleCartNavLabel">
   <div class="offcanvas-header border-bottom shadow mb-3">
      <h5 id="sideCartCount" class="offcanvas-title" id="toggleCartNavLabel"><i class="fa fa-shopping-cart"></i> Cart <span class="badge badge-primary bg-primary upmega-round">{{Cart::count()}}</span></h5>
      <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
   </div>
   <div class="offcanvas-body" id="sideCart">
      @if(count($cartItems) > 0)
      <div class="table-responsive mb-3">
         <table class="row-border stripe" style="width:100%">
            <thead>
               <tr>
                  <th class="std-font">Product</th>
                  <th class="std-font">Price(KES)</th>
                  <th class="std-font">Total</th>
                  <th class="std-font"><i class="fa fa-trash"></i></th>
               </tr>
            </thead>
            <tbody>
               @forelse($cartItems as $cartItem)
               <?php 
                  $cartProduct = App\Models\Product::where('name', '=', $cartItem->name)->first();
                  
                   ?>
               @if(empty($cartProduct))
               @else
               <?php 
                  $prod_name = $cartItem->name;
                  
                   $prod_id = App\Models\Product::where( 'name', '=', $prod_name )->first();
                  
                   $id=$prod_id->id;
                  
                   $prod = App\Models\Product::where( 'id', '=', $id )->first();
                   ?>
               <tr>
                  <td class="std-font">
                     <img style="width: 100px;" class="img-thumbnail" src="{{url('images/products',$prod->image)}}" alt="">
                  </td>
                  <td class="std-font">
                     <span>{{ number_format($cartItem->price) }} x {{$cartItem->qty}}</span>
                     <div>
                        <h6 class="std-font">{{Str::words($cartItem->name, 7, '...')}}</h6>
                     </div>
                  </td>
                  <td class="std-font">{{ number_format($cartItem->price * $cartItem->qty)}}</td>
                  <td>
                     <form action="{{route('cart.destroy',$cartItem->rowId)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <input type="hidden" name="product_id" id="product_id" value="{{ $cartItem->id }}">
                        <button style="color: red; background-color: transparent; border-color: none; border-style: none;" type="submit"><i class="fa fa-trash"></i></button>
                     </form>
                  </td>
               </tr>
               @endif
               @empty
               @endforelse
            </tbody>
         </table>
      </div>
      @else
      <p><a class="text-warning" href="{{url('/shop')}}"> <i class="fa fa-shopping-cart"></i> Shop Now </a> To Fill Your Basket</p>
      @endif
      <hr>
      <div class="text-center mt-3">
         <h6 class="upmega-bold">Cart Summation</h6>
         <ul class="list-unstyled">
            <li>Total <span>Ksh. {{Cart::subtotal()}}</span></li>
         </ul>
         <?php 
            // $data = json_decode('[{"id":49},{"id":61},{"id":5},{"id":58}]', true);
            $items = collect($cartItems)->pluck('name')->implode(', ');
            // dd($items); die();
            ?>
         @if(!empty($items))
         <a target="_blank" href="https://wa.me/254700422699?text=Hello%20Upmega%20Furniture,%20I'm%20interested%20in%20purchasing%20the%20following%20products+{{$items}}" class="btn btn-primary btn-lg upmega-round mb-3 w-100"><i class="fa fa-phone"></i> Buy With Whatsapp</a>
         <a class="btn btn-secondary btn-lg w-100 upmega-round" href="{{url('/cart')}}"><i class="fa fa-shopping-cart"></i> Go to Cart</a>
         @else
         <a href="{{url('shop')}}" class="btn btn-primary btn-lg upmega-round w-100"><i class="fa fa-shopping-cart"></i> Visit Shop</a>
         @endif
      </div>
   </div>
</div>