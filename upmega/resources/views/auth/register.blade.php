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
   <div class="row">
      <div class="col-md-8 offset-md-2">
        @include('auth_before')
      </div>
   </div>
   <div class="py-3"></div>
</div>
</section>
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