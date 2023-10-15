            <h3 class="text-center">Create Account/Login</h3>
            <hr>
            <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
               <li class="nav-item" role="presentation">
                  <button class="nav-link yetu-bold nav-link-mobile shadow-none active" id="reg-yetu-customer-tab" data-bs-toggle="pill" data-bs-target="#reg-yetu-customer" type="button" role="tab" aria-controls="reg-yetu-customer" aria-selected="true"><i class="fa fa-user-circle"></i> Register</button>
               </li>
               <li class="nav-item" role="presentation">
                  <button class="nav-link yetu-bold nav-link-mobile shadow-none yetu-reg-toggle-sign" id="login-yetu-init-tab" data-bs-toggle="pill" data-bs-target="#login-yetu-init" type="button" role="tab" aria-controls="login-yetu-init" aria-selected="false"><i class="fas fa-sign-in"></i> Login</button>
               </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
               <div class="tab-pane show active" id="reg-yetu-customer" role="tabpanel" aria-labelledby="reg-yetu-customer-tab" tabindex="0">
                  <form id="yetu-register-form" method="POST" action="{{ route('register') }}" autocomplete="off">
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
                           <input class="form-check-input yetu-round" type="checkbox" role="switch" id="Customer-toggle-password" onclick="regtogglePassword()">
                           <label class="form-check-label yetu-pointer" for="Customer-toggle-password">Show Password</label>
                        </div>
                     </div>
                     <div class="mt-1 text-start mb-3">
                        <div class="form-check form-switch">
                           <input required class="form-check-input" type="checkbox" role="switch" id="yetu-agree-terms" checked>
                           <label class="form-check-label" for="yetu-agree-terms">I Agree With <a class="yetu-text-primary" 
                              href="javascript:void();">Yetu Stores Terms & Conditions</a></label>
                        </div>
                     </div>
                     <div class="form-button-group mt-2 mb-3">
                        <div class="d-grid gap-2 w-100">
                           <button type="submit" class="btn btn-primary yetu-btn-primary border-0 yetu-round"><i class="fa fa-user-plus"></i> Create New Account</button>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="tab-pane" id="login-yetu-init" role="tabpanel" aria-labelledby="login-yetu-init-tab" tabindex="0">
                  <form id="yetu-login-form" method="POST" action="{{ route('login') }}" autocomplete="off">
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
                              <label class="form-check-label yetu-pointer ms-1" for="login-toggle-password">Show Password</label>
                           </div>
                        </div>
                     </div>
                     <div class="text-start mb-3">
                        <div class="form-check form-switch">
                           <input name="remember" class="form-check-input" type="checkbox" role="switch" id="remember_me" checked>
                           <label class="form-check-label yetu-pointer ms-1" for="remember_me">Remember me?</label>
                        </div>
                     </div>
                     <div class="form-button-group mt-2">
                        <div class="d-grid gap-2">
                           <button type="submit" class="btn btn-primary border-0 yetu-round w-100 font-weight-bold"><i class="fa fa-sign-in"></i> Login</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>