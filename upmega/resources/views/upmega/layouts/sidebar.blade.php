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
<div class="offcanvas offcanvas-start upmega-bg" data-bs-backdrop="true" data-bs-scroll="true" tabindex="-1" id="toggleSideNav"  aria-labelledby="toggleSideNavLabel">
   <div class="offcanvas-header">
      <h3 class="offcanvas-title upmega-bold" id="toggleSideNavLabel">UPMEGA</h3>
      <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
   </div>
   <div class="offcanvas-body py-0">
      <ul class="sidenav-nav list-unstyled">
         <li class="text-dark mb-3"><a class="text-dark" href="{{url('/')}}"><i class="fa fa-home"></i> Dashboard</a></li>
         <li class="text-dark mb-3"><a class="text-dark" href="{{url('/')}}"><i class="fa fa-user"></i> My Account</a></li>
         @if(Auth::guest())
         <li class="text-dark mb-3"><a class="text-dark" href="{{ url('login') }}"><i class="fa fa-sign-in"></i> Login</a></li>
         <li class="text-dark mb-3"><a class="text-dark" href="{{ url('register') }}"><i class="fa fa-user-plus"></i> Create Account</a></li>
         @else
         @can('role-list')
         <li class="text-dark mb-3"><a class="text-dark" href="{{ route('roles.index') }}"><i class="fa fa-user-shield"></i> Manage Roles</a></li>
         @endcan
         @can('user-list')
         <li class="text-dark mb-3"><a class="text-dark" href="{{ route('users.index') }}"><i class="fa fa-users"></i> Manage Users</a></li>
         @endcan
         
            @can('category-list')
         <li class="text-dark mb-3"><a class="text-dark" href="{{ route('categories.index') }}"><i class="fa fa-list"></i> Manage Categories</a></li>
         @endcan
          @can('product-list')
         <li class="text-dark mb-3"><a class="text-dark" href="{{ route('products.index') }}"><i class="fa fa-list"></i> Manage Products</a></li>
         @endcan
         <li class="text-dark mb-3"><a class="text-dark" href="{{url('/appexit')}}"><i class="fa fa-power-off"></i> Sign Out</a></li>
         @endif
         <li class="text-dark mb-3"><a class="text-dark" href="{{url('/')}}"><i class="fa fa-phone"></i> Help 24/7</a></li>

         <hr>
<h5 class="text-center upmega-bold">Top Categories</h5>
 <hr>
 
  <?php 
       $header_cats = App\Models\Category::get();
       ?>
       
          @forelse($header_cats as $header_cat)
         <li class="text-dark mb-3"><a class="text-dark"  href="{{url('category',$header_cat->slug)}}"><i class="fa fa-angle-right"></i> {{$header_cat->name}}</a></li>
          @empty
          @endforelse
          
           <hr>
           <div class="py-3"></div>
         <p class="text-center">Upmega &copy 2023</p>
      </ul>
   </div>
</div>