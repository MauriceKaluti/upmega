<div class="card upmega-round h-100">
   <div class="card-body">
      <h3 class="text-center">Create Account</h3>
<hr>
<form id="upmega-register-form" method="POST" action="{{ route('register') }}" autocomplete="off">
   @csrf
   <div class="row">
      <div class="col-md-6 mb-3">
         <div class="form-group boxed">
            <div class="input-wrapper">
               <input name="name" type="text" class="form-control" id="name1" placeholder="Customer Name" required>
               <i class="clear-input">
                  <ion-icon name="close-circle"></ion-icon>
               </i>
               @error('name')
               <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
         </div>
      </div>
      <div class="col-md-6 mb-3">
         <div class="form-group boxed">
            <div class="input-wrapper">
               <input name="email" type="email" class="form-control" id="new-email" placeholder="Customer Email Address" required>
               <i class="clear-input">
                  <ion-icon name="close-circle"></ion-icon>
               </i>
               @error('email')
               <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
               </span>
               @enderror
               <span id="email-error"></span>
            </div>
         </div>
      </div>
      <div class="col-md-6 mb-3">
         <div class="form-group boxed">
            <div class="input-wrapper">
               <input name="phone" type="text" class="form-control" id="phone" placeholder="Customer Phone Number" required>
               <i class="clear-input">
                  <ion-icon name="close-circle"></ion-icon>
               </i>
               @error('phone')
               <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
               </span>
               @enderror
               <span id="email-error"></span>
            </div>
         </div>
      </div>
      <div class="col-md-6 mb-3">
         <div class="form-group boxed">
            <div class="input-wrapper">
               <input name="password" type="password" class="form-control" id="regpassword" placeholder="Customer Password" required>
               <i class="clear-input">
                  <ion-icon name="close-circle"></ion-icon>
               </i>
               @error('password')
               <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
         </div>
      </div>
   </div>
   <div class="mt-1 text-start mb-3">
      <div class="form-check form-switch">
         <input class="form-check-input upmega-round" type="checkbox" role="switch" id="customer-toggle-password" onclick="regtogglePassword()">
         <label class="form-check-label upmega-pointer" for="customer-toggle-password">Show Password</label>
      </div>
   </div>
   <div class="mt-1 text-start mb-3">
      <div class="form-check form-switch">
         <input required class="form-check-input" type="checkbox" role="switch" id="upmega-agree-terms" checked>
         <label class="form-check-label" for="upmega-agree-terms">I Agree With <a class="upmega-text-primary" 
            href="javascript:void();">upmega Jamii Terms</a></label>
      </div>
   </div>
   <div class="form-button-group mt-2 mb-3">
      <div class="d-grid gap-2 w-100">
         <button type="submit" class="btn btn-primary upmega-btn-primary border-0 upmega-round"><i class="fa fa-user-plus"></i> Customer Sign Up</button>
      </div>
   </div>
</form>
   </div>
</div>