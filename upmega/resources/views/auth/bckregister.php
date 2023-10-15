@extends('upmega.layouts.main')
@section('content')
<div class="container">
   @if (count($errors) > 0)
   <div class="alert alert-danger">
      <strong>Whoops!</strong>Something went wrong.<br><br>
      <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
   @endif
   <div class="row">
      <div class="col-md-6 offset-md-3">
         <h3 align="center" class="mb-2">Register Account</h3>
         <div class="form-style">
            <form id="upmega-register-form" method="POST" action="{{ route('register') }}" autocomplete="off">
               @csrf
               <div class="form-group mb-2">
                 

                        <div class="input-wrapper">
                  <label class="upmega-material-input">
                  <input name="name" type="text" id="name" placeholder=" " autocomplete="new-name" required>
                  <span class="upmega-material-input-label">Name</span>
                  </label>
                    @error('name')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
               </div>
               </div>
               <div class="form-group mb-2">
          

                    <div class="input-wrapper">
                  <label class="upmega-material-input">
                  <input name="email" type="email" id="email" placeholder=" " autocomplete="new-email">
                  <span class="upmega-material-input-label">Email Address</span>
                  </label>

                    @error('email')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                     <span id="email-error"></span>
               </div>
               </div>
               <div class="form-group mb-2">
                              <div class="input-wrapper">
                  <label class="upmega-material-input">
                  <input name="phone" type="number" id="phone" placeholder=" " autocomplete="new-phone" required>
                  <span class="upmega-material-input-label">Phone Number (E.g 254712345678)</span>
                  </label>
                    @error('phone')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
               </div>

             
               </div>
               <div class="form-group mb-1">
          

                      <div class="input-wrapper">
                  <label class="upmega-material-input">
                  <input name="password" type="password" id="regpassword" placeholder=" " autocomplete="new-password">
                  <span class="upmega-material-input-label">Password</span>
                  </label>
                    @error('password')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
               </div>
               </div>
               <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" role="switch" id="toggle-password" onclick="regtogglePassword()">
                  <label class="form-check-label upmega-pointer ms-1" for="toggle-password">Show Password</label>
               </div>
               <div class="pb-2 mt-2">
                  <button type="submit" class="btn btn-warning upmega-btn-primary upmega-round w-100 font-weight-bold mt-2"><i class="fa fa-user-plus"></i> Create Account</button>
               </div>
            </form>

                   <div class="mt-2">
                  <a href="{{url('login')}}" class="btn btn-warning upmega-btn-secondary upmega-round w-100 font-weight-bold mt-2"><i class="fa fa-sign-in"></i> Login Instead</a>
               </div>
            <div>
              
            </div>
         </div>
      </div>
   </div>
   <div class="py-3"></div>
</div>
<script>
   function regtogglePassword() {
   var x = document.getElementById("regpassword");
   if (x.type === "password") {
   x.type = "text";
   } else {
   x.type = "password";
   }
   }
   
   $(document).on('click', '.upmega-reg-toggle-next', function(){
   $(".upmega-reg-toggle-sign").trigger('click'); 
   });
</script>
@endsection