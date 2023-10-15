@extends('upmega.layouts.main')
@section('content')
<section>
<div class="container-fluid">
    <div class="py-5"></div>
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
   <div class="col-md-8 offset-md-2">
        @include('auth_login')
   </div>
</div>
</section>
<script>
   function logintogglePassword() {
   var x = document.getElementById("logpassword");
   if (x.type === "password") {
   x.type = "text";
   } else {
   x.type = "password";
   }
   
   }
</script>
@endsection