@if(Session::has('register_success'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
<strong><i class="fa fa-check-circle"></i> Hello {{Auth::user()->name}},</strong> Karibu <span class="upmega-text-secondary upmega-bold">upmega!</span> You're transacting with us as a <span class="badge badge-warning bg-warning upmega-round">{{$userRole}}</span>
<button type="button" class="btn-close alert-close upmega-text-secondary text-warning" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif