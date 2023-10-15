@extends('upmega.layouts.main')

@section('content')
<title>upmega :: Role Details - {{$role->name}}</title>
 <section>
       <div class="py-5"></div>
            <div class="container-fluid">
            <hr>
   <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
        @can('role-list')
            <a class="btn btn-primary upmega-btn-primary upmega-round" href="{{ route('roles.index') }}"> Back </a>
        @endcan
        </div>
        <div class="float-end">
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $role->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permissions:</strong>
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                    <label class="label label-success">{{ $v->name }},</label>
                @endforeach
            @endif
        </div>
    </div>
</div>

</div>
        <div class="py-5"></div>
 </section>
      

@endsection