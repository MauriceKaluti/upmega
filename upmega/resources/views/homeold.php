@extends('upmega.layouts.main')
@section('content')
<div class="container-fluid">
   <div class="row">
      @include('auth')
      @include('home_swipe')
   </div>

      <div class="row">
              <div class="col-md-6 mt-3">
         <div class="card upmega-round h-100">
            <div class="card-body">
               <div class="img-square-wrapper">
                  <img class="img-fluid upmega-round" src="{{url('images/assets/upmega4.jpg')}}">
               </div>
            </div>
         </div>
      </div>
       <div class="col-md-6 mt-3">
         <div class="card upmega-round h-100">
            <div class="card-body">
                  <h6 class="text-site upmega-bold mb-3">Transact with upmega SACCO today;</h6>
                     <ul class="list-unstyled mb-3">
                        <li class="mb-3">
                           <i class="fa fa-check text-warning"></i> Simply sign up from the forms above or  use our <a href="{{url('register')}}" class="text-warning">sign up page</a> to join as a member.
                        </li>
                    
                        <li class="mb-3">
                           <i class="fa fa-check text-warning"></i> Now proceed and <a href="{{url('login')}}" class="text-warning">login</a> to access our services.
                        </li>
                     </ul>
            </div>
         </div>
      </div>
 
  
   </div>
</div>
@endsection