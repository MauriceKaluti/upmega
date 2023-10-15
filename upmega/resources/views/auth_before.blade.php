@include('upmega_errors')
<div class="card upmega-round shadow-lg h-100">
   <div class="card-body">
          
            <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
               <li class="nav-item" role="presentation">
                  <button class="nav-link upmega-bold nav-link-mobile shadow-none active" id="reg-upmega-account-tab" data-bs-toggle="pill" data-bs-target="#reg-upmega-account" type="button" role="tab" aria-controls="reg-upmega-account" aria-selected="true"><i class="fa fa-user-circle"></i> Create Account</button>
               </li>
               <li class="nav-item" role="presentation">
                  <button class="nav-link upmega-bold nav-link-mobile shadow-none upmega-reg-toggle-sign" id="login-upmega-init-tab" data-bs-toggle="pill" data-bs-target="#login-upmega-init" type="button" role="tab" aria-controls="login-upmega-init" aria-selected="false"><i class="fas fa-sign-in"></i> Login</button>
               </li>
            </ul>
       
            <div class="tab-content" id="pills-tabContent">
               <div class="tab-pane show active" id="reg-upmega-account" role="tabpanel" aria-labelledby="reg-upmega-account-tab" tabindex="0">
                  <form id="upmega-register-form" method="POST" action="{{ route('register') }}" autocomplete="off">
                     @csrf
                     <div class="row">
                        <div class="col-md-6 mb-3">
                           <div class="form-group boxed">
                              <div class="input-wrapper">
                                 <input name="name" type="text" class="form-control shadow-none" id="name1" placeholder="Customer Name" required>
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
                                 <input name="email" type="email" class="form-control shadow-none" id="new-email" placeholder="Customer Email Address" required>
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
                                 <input name="phone" type="text" class="form-control shadow-none" id="phone" placeholder="Customer Phone Number" required>
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
                                 <input name="password" type="password" class="form-control shadow-none" id="regpassword" placeholder="Customer Password" required>
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
                           <input class="form-check-input upmega-round" type="checkbox" role="switch" id="Customer-toggle-password" onclick="regtogglePassword()">
                           <label class="form-check-label upmega-pointer" for="Customer-toggle-password">Show Password</label>
                        </div>
                     </div>
                     <div class="mt-1 text-start mb-3">
                        <div class="form-check form-switch">
                           <input required class="form-check-input" type="checkbox" role="switch" id="upmega-agree-terms" checked>
                           <label class="form-check-label" for="upmega-agree-terms">I Agree With <a class="upmega-text-primary" 
                              href="javascript:void();">Upmega Terms & Conditions</a></label>
                        </div>
                     </div>
                     <div class="form-button-group mt-2 mb-3">
                        <div class="d-grid gap-2 w-100">
                           <input onClick="this.form.submit(); this.disabled=true; this.value='Creating Account...';" type="submit" class="btn btn-primary btn-lg border-0 upmega-round" value="Create New Account"/>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="tab-pane" id="login-upmega-init" role="tabpanel" aria-labelledby="login-upmega-init-tab" tabindex="0">
                  <form id="upmega-login-form" method="POST" action="{{ route('login') }}" autocomplete="off">
                     @csrf
                     <div class="row">
                        <div class="col-md-12 mb-3">
                           <div class="form-group boxed">
                              <div class="input-wrapper">
                                 <input name="email" type="email" class="form-control shadow-none" id="email" placeholder="Your Email Address" autocomplete="new-email" required>
                                 <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                 </i>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12 mb-3">
                           <div class="form-group boxed">
                              <div class="input-wrapper">
                                 <input name="password" type="password" class="form-control shadow-none" id="logpassword" autocomplete="new-password" placeholder="Your Password" required>
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
                        <div class="mt-1 text-start mb-3">
                           <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" role="switch" id="login-toggle-password" onclick="logintogglePassword()">
                              <label class="form-check-label upmega-pointer ms-1" for="login-toggle-password">Show Password</label>
                           </div>
                        </div>
                     </div>
                     <div class="text-start mb-3">
                        <div class="form-check form-switch">
                           <input name="remember" class="form-check-input" type="checkbox" role="switch" id="remember_me" checked>
                           <label class="form-check-label upmega-pointer ms-1" for="remember_me">Remember me?</label>
                        </div>
                     </div>
                     <div class="form-button-group mt-2">
                        <div class="d-grid gap-2">
                           <input onClick="this.form.submit(); this.disabled=true; this.value='Logging you in...';" type="submit" class="btn btn-primary btn-lg border-0 upmega-round w-100 font-weight-bold" value="Login" />
                           
                        </div>
                     </div>
                  </form>
               </div>
            </div>
   </div>
</div>