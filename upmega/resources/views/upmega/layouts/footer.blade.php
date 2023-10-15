<div class="container-fluid mb-3">
   <div class="row gx-0">
      <div class="col-md-6">
         <div class="card bg-transparent border-0 p-0 h-100">
            <div class="card-body p-0">
               <img class="w-100" src="https://codekali.com/upmega/images/newsletter.webp">
            </div>
         </div>
      </div>
      <div class="col-md-6">
           <div class="card h-100 upmega-bg-primary" style="border-radius: 0px;">
            <div class="card-body text-center">
               <div class="py-3"></div>
         <h4 class="text-white mb-3 upmega-bold fs-1 upmega-slant">Subscribe to our newsletter</h4>

         <div class="input-group mb-3">
  <input type="email" class="form-control upmega-round shadow-none" name="email" placeholder="Email Address" aria-label="Email Address" aria-describedby="subscribe-btn">
  <button style="border-radius: 0px 30px 30px 0px;" class="btn btn-secondary" type="button" id="subscribe-btn">Subscribe</button>
</div>

<p class="text-white std-font">We don't spam at all, our promise!</p>
      </div>
      </div>
      </div>
   </div>
</div>

<footer id="footer" class="footer shadow-lg">
   <div class="footer-content">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-md-6">
               <h4>Let's Connect</h4>
               <div class="footer-info">

                  <p class="mb-3">Capital One Plaza, 3rd Floor. We are near Kamakis along Eastern By-pass, Ruiru, Kenya</p>
                
                  <p class="mb-2"> 
                     <strong><i class="fa fa-phone"></i></strong> +254 712 345 678  
                  </p>
                  <p class="mb-2"> 
                     <strong><i class="fa fa-envelope"></i></strong> info@upmega.co.ke 
                  </p>
               <!--       <div class="mb-3 mb-lg-0">
            <a href="#" class="twitter me-3"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook me-3"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram me-3"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin me-3"><i class="bi bi-whatsapp"></i></a>
         </div> -->
               </div>
            </div>
            <div class="col-lg-3 col-md-6 footer-links">
               <h4>Useful Links</h4>
               <ul>
                  <li> <a href="{{url('/')}}"><i class="bi bi-chevron-right"></i> Home</a></li>
                  <li> <a href="{{url('/')}}"><i class="bi bi-chevron-right"></i> About us</a></li>
                  <!-- <li><i class="bi bi-chevron-right"></i> <a href="{{url('/')}}">Sign In</a></li> -->
                  @if (Auth::guest())
                  <li><a href="{{url('login')}}"><i class="fa fa-sign-in"></i> Login</a></li>
                  <li><a href="{{url('register')}}"><i class="fa fa-edit"></i> Register</a></li>
                  @else
                  <?php 
                     $userid = Auth::user()->id;
                     $user = App\Models\User::where('id','=',$userid)->first();
                     $userRole = $user->roles->pluck('name')->all();
                     $userRole = $userRole[0];
                     ?>
                  @if($userRole == 'Super Admin' || $userRole == 'System Admin')
                  <li><a href="{{url('dashboard')}}"><i class="fa fa-user-shield"></i> Admin</a></li>
                  @else
                  @endif
                  <li><a onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();" title="Logout {{Auth::user()->name}}" href="{{url('/logout')}}"><i class="fa fa-sign-out"></i> Logout</a></li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                  </form>
                  @endif
               </ul>
            </div>
            <div class="col-lg-3 col-md-6 footer-links">
               <h4>Top Products</h4>
               <ul>
                  <li> <a href="#"><i class="bi bi-chevron-right"></i> Recliner Seats</a></li>
                  <li><a href="#"><i class="bi bi-chevron-right"></i> Recliner Sofa Sets</a></li>
                  <li><a href="#"><i class="bi bi-chevron-right"></i> Recliner Sectional</a></li>
               </ul>
            </div>
            <div class="col-lg-3 col-md-6 footer-links">
               <h4>Customer Care </h4>
               <ul>
                  <li> <a href="#"><i class="bi bi-chevron-right"></i> FAQs</a></li>
                  <li> <a href="{{url('/')}}"><i class="bi bi-chevron-right"></i> Contact Us</a></li>
                  <li> <a href="#"><i class="bi bi-chevron-right"></i> Privacy Policy</a></li>
                  <li> <a href="#"><i class="bi bi-chevron-right"></i> Terms & Conditions</a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <div class="footer-legal text-center">
      <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

        <div class="mb-3">
             <a href="{{url('/')}}">
                     <img class="img-fluid" width="275.1" height="101.8" src="https://codekali.com/upmega/images/logo.png">  
                  </a> 
        </div>


         <div class="d-flex flex-column align-items-center align-items-lg-start">
              <div class="mb-3 text-center">
            <a href="#" class="twitter me-3"><i class="bi bi-twitter text-white fs-3"></i></a>
            <a href="#" class="facebook me-3"><i class="bi bi-facebook text-white fs-3"></i></a>
            <a href="#" class="instagram me-3"><i class="bi bi-instagram text-white fs-3"></i></a>
            <a href="#" class="whatsapp me-3"><i class="bi bi-whatsapp text-white fs-3"></i></a>
         </div>
            <div class="copyright">
               &copy; Copyright 2023<strong><span> - Upmega </span></strong> 
            </div>
         </div>
      <!-- hereeee -->


      </div>
   </div>
</footer>
<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<!-- <div id="preloader"></div> -->