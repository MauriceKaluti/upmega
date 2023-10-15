@extends('upmega.layouts.main')

@section('content')
<title>upmega :: Create User</title>
 
        <div class="container-fluid">
  

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

  <form action="{{route('users.store')}}"  method="POST" enctype="multipart/form-data" autocomplete="off">
       {{csrf_field()}}
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Name:</strong>

            <input required="" type="text" name="name" class="form-control" placeholder="Enter Name">

        </div>
    </div>
         <div class="col-xs-4 col-sm-4 col-md-4">
         <div class="form-group">
            <strong>Username:</strong>
            <input required="" type="text" name="slug" class="form-control" placeholder="Enter Username">
         </div>
      </div>
   
          <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Phone:</strong>
          <input required="" type="text" name="phone" class="form-control" placeholder="Enter Phone" autocomplete="new-phone">

        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Email:</strong>
          <input required="" type="email" name="email" class="form-control" placeholder="Enter Email" autocomplete="new-email">
        </div>
    </div>
      <div class="col-xs-4 col-sm-4 col-md-4">
         <div class="form-group">
            <strong>Upload Dp</strong>
            <input required="" type="file" name="image"  class="form-control shadow-none" />
         </div>
      </div>
       <div class="col-xs-4 col-sm-4 col-md-4">
         <div class="form-group">
            <strong>DOB:</strong>
            <input type="date" name="dob" class="form-control" title="Enter DOB">
         </div>
      </div>
 
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Password:</strong>
            <input required="" type="password" name="password" class="form-control" placeholder="Enter Password" autocomplete="new-password">
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Confirm Password:</strong>
            <input required="" type="password" name="confirm-password" class="form-control" placeholder="Confirm Password" autocomplete="confirm-password">

           
        </div>
    </div>
 
     <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Role:</strong>
                <select required="" class="form-control mb-3 upmega-select-2" id="upmega_roles" name="roles[]" multiple>
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
      <button type="submit" class="btn btn-primary upmega-btn-primary upmega-round btn-block w-100"> <i class="fa fa-paper-plane"></i> Create Member</button>
   </div>
{!! Form::close() !!}

        </div>
      

@endsection