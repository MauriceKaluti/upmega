<style>
   .upmega-active {
   color: #FFD54B!important;
   }
   .upmega-footer-icon{
   font-size: 20px;
   }

   .settings-dropdown-item:focus, .settings-dropdown-item:hover {

      background-color: transparent!important;

}

 

</style>
 

 
<div class="footer-nav-area upmega-bg" id="footerNav">
   <div class="internet-connection-status" id="internetStatus"></div>
   <div class="container-fluid h-100">
         <ul class="h-100 d-flex align-items-center justify-content-between pl-0 list-unstyled">
           
            <li><a class="{{ (request()->is('/dashboard')) ? 'upmega-active upmega-footer-icon' : 'text-site upmega-footer-icon' }}" href="{{url('/')}}"><i class="fa fa-home"></i> <span class="upmega-mobile-hide"> </span> </a></li>

        <li><a class="{{ (request()->is('/dashboard')) ? 'upmega-active upmega-footer-icon' : 'text-site upmega-footer-icon' }}" href="{{url('/')}}"><i class="fa fa-bell"></i> <span class="upmega-mobile-hide"> </span> </a></li>

            <li><a class="{{ (request()->is('/dashboard')) ? 'upmega-active upmega-footer-icon' : 'text-site upmega-footer-icon' }}" href="{{url('/')}}"><i class="fa fa-user-circle"></i> <span class="upmega-mobile-hide"> </span> </a></li>

@if(Auth::guest())
         

          @else
 <li><a href="{{url('/appexit')}}" class="upmega-footer-icon text-site"><i class="fa fa-power-off"></i><span class="upmega-mobile-hide"> </span></a></li>
          @endif
        </ul>  
         
   </div>
</div>