@extends('tuimarishe.layouts.main')
@section('content')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
 
    <style type="text/css">
      #results {
        padding: 20px;
        border: 1px solid;
        background: #ccc;
      }
    </style>
<!-- content here -->
 
<div class="mt-5">
   


     <div class="card upmega-popup-card">
       <div class="card-body">
 <h3 class="mt-3">Update Profile</h3>
 <hr>
      <form action="{{route('storeProfile')}}" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <input  type="hidden" value="@if (Auth::guest()) @else {{Auth::user()->id}} @endif" name="user_id" class="form-control" placeholder="Enter ID" />
                  <div class="row">
                                      
              <div class="col-md-4 mb-3">
                     <div class="form-group">
                        <div class="form-line">
                           <label class="mb-1 text-site">Update Name</label>
                           <input required="" type="text" value="@if (Auth::guest()) @else {{Auth::user()->name}} @endif" name="name" id="name" class="form-control shadow-none" placeholder="Enter Name" />
                           @error('name')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                           <span id="name-error">
                           </span>
                        </div>
                     </div>
                     </div>
                            
              <div class="col-md-4 mb-3">
                     <div class="form-group">
                        <div class="form-line">
                           <label class="mb-1 text-site">Update Email</label>
                           <input required="" type="email" name="email" id="email" value="@if (Auth::guest()) @else {{Auth::user()->email}} @endif" class="form-control shadow-none" placeholder="Enter Email"/>
                           @error('email')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                           <span id="email-error">
                           </span>
                        </div>
                     </div>
                     </div>
                      
              <div class="col-md-4 mb-3">
                     <div class="form-group">
                        <div class="form-line">
                           <label class="mb-1 text-site">Update Phone</label>
                           <input type="text" name="phone" id="phone" value="@if (Auth::guest()) @else {{Auth::user()->phone}} @endif" class="form-control shadow-none" placeholder="Enter Phone Number"/>
                           @error('email')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                           <span id="email-error">
                           </span>
                        </div>
                     </div>
                     </div>

                   
              <div class="col-md-4 mb-3">
                     <div class="form-group">
                        <div class="form-line">
                           <label class="mb-1 text-site">Update IG Username</label>
                           <input type="text" name="instagram" id="instagram" value="@if (Auth::guest()) @else {{Auth::user()->instagram}} @endif" class="form-control shadow-none" placeholder="Enter IG Username"/>
                           @error('email')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                           <span id="email-error">
                           </span>
                        </div>
                     </div>
                     </div>
                       
              <div class="col-md-4 mb-3">
                     <div class="form-group">
                        <div class="form-line">
                           <label class="mb-1 text-site">Update Password</label>
                           <input type="text" name="password" class="form-control shadow-none" placeholder="Enter New Password" autocomplete="off">
                        </div>
                     </div>
                     </div>

                
              <div class="col-md-4 mb-3">
                     <div class="form-group">
                        <div class="form-line">
                           <label class="mb-1 text-site">Update Username</label>
                              <input value="@if (Auth::guest()) @else{{Auth::user()->slug}}@endif" id="slug" name="slug" class="form-control shadow-none" onkeypress="return ValidateSlug(event);" type="text"/>
                              <p style="color:red;" id="slugErrorMsg"></p>
                           <p id="slug-error">
                           </p>
                           @error('slug')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                          
                        </div>
                     </div>
                     </div>
                  


              <div class="col-md-4 mb-3">
                     <div class="form-group">
                         @if(!empty(Auth::user()->image)) <span class="badge badge-info upmega-bg-primary">Added</span>@else <span class="badge badge-danger bg-danger">Upload Dp</span> @endif
                        <div class="form-line">
                           <label class="mb-1 text-site">Update Profile Image</label>
                           <input type="file" name="image" class="form-control shadow-none" />
                        </div>
                     </div>
                     </div>


                     <div class="col-md-4 mb-3">
                     <div class="form-group">
                         @if(!empty(Auth::user()->selfie)) <span class="badge badge-info upmega-bg-primary">Added</span>@else <span class="badge badge-danger bg-danger">Upload AUTH Image</span> @endif
                        <div class="form-line">
                           <label class="mb-1 text-site">Update AUTH Image</label>
                        <input class="form-control shadow-none" type="file" name="selfie" accept="image/*" capture="environment">
                            
                        </div>
                     </div>
                     </div>
                      

                      <div class="col-md-4 mb-3">
                      <div class="form-group">
                        <div class="form-line">
                           <label class="mb-1 text-site">Update Bio</label>
                     <textarea name="bio" class="form-control">@if(!empty(Auth::user()->bio)){{Auth::user()->bio}} @else @endif</textarea>
                        </div>
                     </div>
                     </div>


        


                  </div>

                               <!-- submit -->
                 <div class="form-group col-md-4 float-end">
                    <button type="submit" class="btn btn-primary upmega-btn-primary upmega-round"><i class="fa fa-refresh"></i> Update Profile</button>
                 </div>
               </form>
        </div>
               
       </div>

  
</div>
<!-- end content here -->
 
@endsection