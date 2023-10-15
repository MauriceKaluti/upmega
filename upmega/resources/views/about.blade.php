@extends('upmega.layouts.main')

@section('content')
<title>upmega :: About Us</title>
 
<div class="container-fluid">
 
      <div class="row mb-3 mt-5">
   <div class="col-md-6 mb-3">
      <div class="card shadow-lg h-100 upmega-round">
   <div class="card-body">
      <h2 class="upmega-bold">upmega Briefly</h2>
        <hr>
      <p class="mb-3">upmega is an...</p>
    
      <a class="btn btn-outline-primary upmega-btn-primary btn-lg btn-block w-100 mb-3 upmega-round" href="{{url('/contact')}}"><i class="fa fa-paper-plane"></i> Contact Us</a>

      <a class="btn btn-primary btn-lg btn-block upmega-btn-secondary w-100 upmega-round" href="{{url('/tos')}}"><i class="fa fa-file-text"></i> Our Terms of Service</a>

   </div>
   </div>
   </div>
   <div class="col-md-6">
   <div class="card shadow-lg h-100 upmega-round">
   <div class="card-body">

  <img class="img-fluid upmega-about-img upmega-round" src="https://codekali.com/images/codekali_icon.png">

   </div>
   </div>
   </div>
      
      </div>

 </div>
      

@endsection