  <!-- Sidenav Black Overlay-->
      <div class="sidenav-black-overlay"></div>
      <!-- Side Nav Wrapper-->
      <div class="upmega-sidenav-wrapper upmega-bg" id="sidenavWrapper">
         <!-- Sidenav Profile-->
         <div class="sidenav-profile">
            <div class="user-profile">

                 @if(empty(Auth::user()->image))
                  <img style="object-fit: contain; height: 70px; border-radius: 50%;" src="{{url('images/avatar.png')}}" class="img-fluid">
                  @else
                  <img style="object-fit: contain; height: 70px; border-radius: 50%;" src="{{url('images/profilephotos',Auth::user()->image)}}" class="img-fluid">
                  @endif

            </div>
            <div class="user-info">
                <?php 

                 $side_uid = Auth::user()->id;
                 $side_user = \App\User::where('id','=',$side_uid)->first(); 
                  $side_user_typeid = $side_user->user_type;
                 $side_user_type = \App\UserType::where('id','=',$side_user_typeid)->first(); 
                 if(!empty($side_user_type->name))  
                {
                $side_user_type_name = $side_user_type->name; 
                }

                  else  {
                $side_user_type_name = 'upmega User'; 

                    }
 
                 ?>
               <h6 class="text-site mb-0">{{Auth::user()->name}}</h6>
               <p class="text-site mb-0">@<?php echo(Auth::user()->slug); ?></p>
             <span class="badge badge-info bg-info">{{$side_user_type_name}}</span> 

               <!-- <p class="available-balance">User Type <span><span class="counter">- Speciality</span></span></p> -->
            </div>
         </div>
         <hr>
         <!-- Sidenav Nav-->
         <ul class="sidenav-nav pl-0">
            <li><a class="text-site" href="{{url('/feed')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{url('/myprofile')}}"><i class="fa fa-user-circle"></i>Profile</a></li>
             <li><a href="{{url('/messages')}}"><i class="fa fa-envelope-open"></i>Messages</a></li> 
             <li><a href="{{url('/jobs')}}"><i class="fa fa-briefcase"></i>Jobs</a></li> 
             <li>  <a href="{{url('/notifications')}}"> 

                   <i class="fa fa-bell position-relative">
                     @if(auth()->user()->unreadNotifications->count() > 0)
                     <span style="margin-left: -5px!important; font-size: .45em!important; border-radius: 30px!important;" class="position-absolute top-0 start-100 translate-middle bg-info border border-light badge rounded-pill text-white"> @if(auth()->user()->unreadNotifications->count() > 20) 20+ @else {{ auth()->user()->unreadNotifications->count() }}@endif</span>
                     @else @endif
                  </i> Notifications </a></li>
            <!-- <li><a href="#"><i class="lni lni-cog"></i>Settings</a></li> -->
            <li><a href="{{url('/trends')}}"><i class="fa fa-fire"></i>Trends</a></li>
            
             <li><a href="{{url('/courses')}}"><i class="fa fa-university"></i>Medi Courses</a></li>
            <li><a href="{{url('/logout')}}"><i class="fas fa-power-off"></i>Sign Out</a></li>
            <li>
              <a>
                   <div class="single-settings d-flex align-items-center justify-content-between">
                <div class="title"><i class="lni lni-night"></i><span class="text-site">Night Mode</span></div>
                <span class="px-1"></span>
                <div class="data-content">
                  <div class="toggle-button-cover">
                    <div class="button r">
                      <input class="checkbox" id="darkSwitch" type="checkbox">
                      <div class="knobs"></div>
                      <div class="layer"></div>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </li>
       
         </ul>
         <!-- Go Back Button-->
         <div class="go-home-btn" id="goHomeBtn"><i class="fa fa-arrow-left"></i></div>

      </div>