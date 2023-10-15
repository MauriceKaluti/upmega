@extends('upmega.layouts.main')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<div class="container upmega-mobile-pushleft">
<div class="user-profile">
<div class="row">
<div class="col-md-4">
<div class="profile-info-left">
<div class="text-center">
 
<?php 
$profile_member = $user->name;
$profile_member_phone = $user->phone;

if ($profile_member_phone == '') {
$profile_member_phone =  '0700422699';
}else{
$profile_member_phone = $user->phone;
}
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

<h2>{{$user->name}} <?php    
  $profileslug = url('p', $user->slug);
 ?><a data-profile="{{$profileslug}}" class="text-warning copyprofilelink" href="javascript:"><i class="fa-solid fa-copy me-1"></i> </a></h2>
</div>
 
</div>
</div>
<div class="col-md-8">
<div class="profile-info-right">
<ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
<li class="nav-item" role="presentation">
<button class="nav-link upmega-bold active" id="profile-details-tab" data-bs-toggle="pill" data-bs-target="#profile-details" type="button" role="tab" aria-controls="profile-details" aria-selected="true"><span class="upmega-mobile-resize"><i class="fa fa-users"></i> Profile Details</span></button>
</li>
<li class="nav-item" role="presentation">
<button class="nav-link upmega-bold" id="trader-activity-tab" data-bs-toggle="pill" data-bs-target="#trader-activity" type="button" role="tab" aria-controls="trader-activity" aria-selected="false"> <span class="upmega-mobile-resize"><i class="fa fa-image"></i> Trader Activity</span></button>
</li>
</ul>
<div class="tab-content" id="pills-tabContent">

 
<div class="tab-pane show active" id="profile-details" role="tabpanel" aria-labelledby="profile-details-tab" tabindex="0">
      <hr>

      <div class="row">
         <div class="col-md-6 float-start">
            <h6 class="text-site">Age</h6>
         </div>
         <div class="col-md-6 float-end">
            <span class="text-site">{{$user->age}}</span>
         </div>
      </div>
      <hr>
      <div class="row">
         <div class="col-md-6 float-start">
            <h6 class="text-site">Joined</h6>
         </div>
         <div class="col-md-6 float-end">
            <span class="text-site">{{$user->created_at->diffForHumans()}}</span>
         </div>
      </div>
      <hr>
      <div class="row">
         <div class="col-md-6 float-start">
            <h6 class="text-site">Last Seen </h6>
         </div>
         <div class="col-md-6 float-end"> @if(!empty($user->last_seen)) @if(Cache::has('is_online' . $user->id))
            <span class="text-success"> Online Now </span>  @else  <span class="text-site">{{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span>  @endif  @else  @endif
         </div>
      </div>

   

         <hr>
      <div class="row">
         <div class="col-md-6 float-start">
            <h6 class="text-site">Gender</h6>
         </div>
         <div class="col-md-6 float-end">
            <span class="text-site">{{$user->gender}}</span>
         </div>
      </div>

         <hr>
      <div class="row">
         <div class="col-md-6 float-start">
            <h6 class="text-site">Username</h6>
         </div>
         <div class="col-md-6 float-end">
            <span class="text-site">@<?php echo $user->slug; ?></span>
         </div>
      </div>

    
 

     

</div>
<!-- end profile-details -->

<!-- posts -->
<div class="tab-pane" id="trader-activity" role="tabpanel" aria-labelledby="trader-activity-tab" tabindex="0">
<!-- user posts -->
<div class="row" id="upmega_models_app">
   <?php 
      $user_posts = App\Models\Post::where('image','!=','')->where('user_id','=',$user->id)->latest()->get();
      
       ?>
   @forelse($user_posts as $user_post)
   @if(empty($user_post->image))
   @else
   <?php
      $pop_user_id = $user_post->user_id;
      $user_postimg_path = 'images/posts/' . $user_post->image;
      $user_postimgExists = file_exists($user_postimg_path);
      
      $user_poster = App\Models\User::where('id','=',$pop_user_id)->first();
      
      $user_posted_by = $user_poster->name;
      
      $user_post_smashes = App\Models\SmashPass::where('post_id','=',$user_post->id)->where('smash','=',1)->count();
      
      ?>
   @if($user_postimgExists)    
   <!-- user post -->
   <div data-postid="{{$user_post->id}}" class="col-md-6 mb-3 upmega_post">
      <div class="card h-100 upmega-popup-card upmega-round">
         <div class="card-body p-0">
            <img loading="lazy" class="img-fluid upmega-round upmega-round" src="{{url('images/posts',$user_post->image)}}">
            <div id="upmega_profile_{{$user_post->id}}" class="upmega-profile upmega_profile_{{$user_post->id}}">
            </div>
         </div>
      </div>
   </div>
   <!-- end user post -->
   @else  
   @endif
   @endif
   @empty
   @endforelse
</div>
<!-- end user posts -->
</div>
<!-- end posts -->
</div>
</div>
</div>
</div>
</div>
</div>
<!-- end content here -->


@include('front.layouts.floater_menu')

@endsection