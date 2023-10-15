<div class="offcanvas offcanvas-start upmega-bg" data-bs-backdrop="true" data-bs-scroll="true" tabindex="-1" id="toggleSideNav"  aria-labelledby="toggleSideNavLabel">
   <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="toggleSideNavLabel">My Account</h5>
      <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
   </div>
   <div class="offcanvas-body">
      @if(Auth::guest())
      @else
      <div class="text-center">
         <div class="image-wrapper">
            <img height="64.05" width="64.05" src="{{asset('images/avatar.png')}}" alt="image" class="imaged rounded">
         </div>
         <div class="in">
            <strong> @if (Auth::guest())
            @else {{Auth::user()->name}} @endif
            </strong>
            <?php 
               $sideuserid = Auth::user()->id;
               $sideuser = \App\Models\User::find($sideuserid);
               
               ?>
            <p>@if(!empty($sideuser->getRoleNames()))
               @foreach($sideuser->getRoleNames() as $v)
               <label class="badge badge-warning bg-warning upmega-round">{{ $v }}</label>
               @endforeach
               @endif
            </p>
         </div>
      </div>
      @endif
      <ul class="list-group list-group-flush">
         <a class="list-group-item p-0"></a>
         <a href="{{url('/')}}" class="list-group-item text-site"><i class="fa fa-home"></i> upmega Home</a>
         @can('role-list')
         <a href="{{url('/roles')}}" class="list-group-item text-site"><i class="fa fa-user-shield"></i> Manage Roles</a>
         @endcan
           
         @can('user-list')
         <a href="{{url('/users')}}" class="list-group-item text-site"><i class="fa fa-users"></i> Manage Users</a>
         @endcan
          
         
         @if(Auth::guest())
         <a class="list-group-item text-site" href="{{url('/login')}}"><i class="fa fa-sign-in"></i> Login</a>
         <a class="list-group-item text-site" href="{{url('/register')}}"><i class="fa fa-user-plus"></i> Create Account</a>
         @else
         <a href="{{url('/appexit')}}" class="list-group-item text-site"><i class="fa fa-power-off"></i> Logout</a>
         @endif
         <a class="list-group-item">
            <div class="d-flex align-items-center nav-link justify-content-between">
               <div class="toggle-title"><span class="text-site"><i class="fa fa-moon"></i> Day/Night Mode</span></div>
               <div class="toggle-dark">
                  <div class="form-check form-switch">
                     <input class="form-check-input shadow-none" type="checkbox" role="switch" id="darkSwitch">
                     <label class="form-check-label" for="darkSwitch"></label>
                  </div>
               </div>
            </div>
         </a>
         <a class="list-group-item p-0"></a>
      </ul>
   </div>
</div>