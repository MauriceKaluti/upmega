@extends('upmega.layouts.main')
@section('content')
<title>upmega :: Edit User Details - {{$user->name}}</title>

<section id="edit_user">
   <div class="container-fluid">
   <div class="row">
      <div class="col-md-4">
         <?php 
            $profileimg_path = 'images/profilephotos/' . $user->image;
            $profileimgExists = file_exists($profileimg_path);
             ?>
         @if(!empty($user->image))
         @if($profileimgExists)
         <img height="200" width="200" src="{{url('images/profilephotos',$user->image)}}" alt="image" class="upmega-rounded upmega-profile-img">
         @else
         <img height="200" width="200" src="{{url('images/avatar.png')}}" alt="image" class="upmega-rounded upmega-profile-img">
         @endif
         @else
         <img height="200" width="200" src="{{url('images/avatar.png')}}" alt="image" class="upmega-rounded upmega-profile-img">
         @endif
      </div>
   </div>
   <hr>
   @if (count($errors) > 0)
   <div class="alert alert-danger">
      <strong>Whoops!</strong> Something went wrong.<br><br>
      <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
   @endif
 

 <form action="{{route('users.update',$user->id)}}"  method="POST" enctype="multipart/form-data" autocomplete="off">
   {{csrf_field()}}
 @method('PUT')
   <div class="row">
      <div class="col-xs-4 col-sm-4 col-md-4">
         <div class="form-group">
            <strong>Name:</strong>
            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{$user->name}}">
         </div>
      </div>
      <div class="col-xs-4 col-sm-4 col-md-4">
         <div class="form-group">
            <strong>Username:</strong>
            <input type="text" name="slug" class="form-control" placeholder="Enter Username" value="{{$user->slug}}">
         </div>
      </div>
      <div class="col-xs-4 col-sm-4 col-md-4">
         <div class="form-group">
            <strong>DOB:</strong>
            <input type="date" name="dob" class="form-control" placeholder="Enter DOB" value="{{$user->dob}}">
         </div>
      </div>
      <div class="col-xs-4 col-sm-4 col-md-4">
         <div class="form-group">
            <strong>  <label class="mb-1 text-site">Update Dp @if(!empty($user->image)) <span class="badge badge-info bg-success upmega-bg-primary">Added</span>@else <span class="badge badge-danger bg-danger">Upload Dp</span> @endif</label></strong>
            <input type="file" name="image" value="{{$user->image}}" class="form-control shadow-none" />
         </div>
      </div>
      <div class="col-xs-4 col-sm-4 col-md-4">
         <div class="form-group">
            <strong>Phone:</strong>
            <input type="text" name="phone" class="form-control" placeholder="Enter Phone" value="{{$user->phone}}">
         </div>
      </div>
  
      <div class="col-xs-4 col-sm-4 col-md-4">
         <div class="form-group">
            <strong>Email:</strong>
            <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{$user->email}}">
         </div>
      </div>
      <div class="col-xs-4 col-sm-4 col-md-4">
         <div class="form-group">
            <strong>Password:</strong>
            <input type="password" name="password" class="form-control" placeholder="Enter Password" autocomplete="new-password">
         </div>
      </div>
      <div class="col-xs-4 col-sm-4 col-md-4">
         <div class="form-group">
            <strong>Confirm Password:</strong>
            <input type="password" name="confirm-password" class="form-control" placeholder="Confirm Password">
         </div>
      </div>
      <div class="col-xs-4 col-sm-4 col-md-4">
         <div class="form-group">
            <strong>Role:   @if(!empty($user->getRoleNames()))
            @foreach($user->getRoleNames() as $v)
            <label class="badge badge-success bg-success">{{ $v }}</label>
            @endforeach
            @endif </strong>
            <select class="form-control mb-3 upmega-select-2" id="upmega_roles" name="roles[]" multiple>
               @foreach($roles as $role)
               <option value="{{$role->name}}">
                  {{$role->name}} 
               </option>
               @endforeach
            </select>
         </div>
      </div>
   

 
     
      </div>
   <div class="col-md-4 text-center mb-3 mt-3">
      <button type="submit" class="btn btn-primary upmega-btn-primary upmega-round btn-block w-100"> <i class="fa fa-paper-plane"></i> Update Member</button>
   </div>
 </form>

   </div>

   <div class="py-5"></div>
</section>
 
 
@endsection