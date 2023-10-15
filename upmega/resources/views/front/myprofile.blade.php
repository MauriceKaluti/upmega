@extends('upmega.layouts.main')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<section id="my_profile">
   <div class="py-5"></div>
   <div class="container-fluid">
<div class="card shadow-lg upmega-round">
   <div class="card-body">
         <div class="user-profile">
      <div class="row">
         <div class="col-md-4">
            <div class="profile-info-left">
               <div class="text-center">
                  {{$user->id}}
                  <?php 
                     $profileimg_path = 'images/profilephotos/' . $user->image;
                     $profileimgExists = file_exists($profileimg_path);
                      ?>
                  @if(!empty($user->image))
                  @if($profileimgExists)
                  <img src="{{url('images/profilephotos',$user->image)}}" alt="image" class="upmega-rounded upmega-profile-img">
                  @else
                  <img src="{{url('images/avatar.png')}}" alt="image" class="upmega-rounded upmega-profile-img">
                  @endif
                  @else
                  <img src="{{url('images/avatar.png')}}" alt="image" class="upmega-rounded upmega-profile-img">
                  @endif
                  <h2>{{$user->name}} </h2>
                 
               </div>
               <hr>
            </div>
         </div>
         <div class="col-md-8">
            <div class="tab-pane show active" id="profile-details" role="tabpanel" aria-labelledby="profile-details-tab" tabindex="0">
               <form action="{{route('updateProfile',$user->id)}}"  method="POST" enctype="multipart/form-data" autocomplete="off">
                  {{csrf_field()}}
                  <div class="row">
                     <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                           <strong>Name:</strong>
                           <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{$user->name}}">
                        </div>
                     </div>
                     <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                           <strong>Username:</strong>
                           <input type="text" name="slug" class="form-control" placeholder="Enter Username" value="{{$user->slug}}">
                        </div>
                     </div>
                     <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                           <strong>  <label class="mb-1 text-site">Update Dp @if(!empty($user->image)) <span class="badge badge-info bg-success upmega-bg-primary">Added</span>@else <span class="badge badge-danger bg-danger">Upload Dp</span> @endif</label></strong>
                           <input type="file" name="image" value="{{$user->image}}" class="form-control shadow-none" />
                        </div>
                     </div>
                     <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                           <strong>Phone:</strong>
                           <input type="text" name="phone" class="form-control" placeholder="Enter Phone" value="{{$user->phone}}">
                        </div>
                     </div>
                     <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                           <strong>Email:</strong>
                           <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{$user->email}}" readonly>
                        </div>
                     </div>
                     <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                           <strong>Password:</strong>
                           <input type="password" name="password" class="form-control" placeholder="Enter Password" autocomplete="new-password">
                        </div>
                     </div>
                     <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                           <strong>Confirm Password:</strong>
                           <input type="password" name="confirm-password" class="form-control" placeholder="Confirm Password">
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4 text-center mb-3 mt-3">
                     <input type="submit" class="btn btn-primary upmega-btn-primary upmega-round btn-block w-100" onClick="this.form.submit(); this.disabled=true; this.value='Processing...';" value="Update Profile">  
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   </div>
</div>
</div>
</section>
 
@endsection