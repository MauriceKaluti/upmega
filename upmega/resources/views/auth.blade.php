<div class="col-md-6">
   @if(Auth::guest())
   @include('auth_before')
   @else
   @include('auth_after')
   @endif
</div>