@extends('upmega.layouts.main')

@section('content')
<title>upmega :: Edit Role - {{$role->name}}</title>
 <section>
   <div class="py-5"></div>
            <div class="container-fluid">
            <hr>
          <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h4>Edit Role</h4>
        </div>
        <div class="float-end">
        @can('role-list')
            <a class="btn btn-primary upmega-btn-primary upmega-round" href="{{ route('roles.index') }}"> Back </a>
        @endcan
        </div>
    </div>
</div>
<hr>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> something went wrong.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permission:</strong>
            <br/>
            @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
        </div>
    </div>
  
</div>
 <div class="col-md-4 text-center mb-3 mt-3">
      <button type="submit" class="btn btn-primary upmega-btn-primary upmega-round btn-block w-100"> <i class="fa fa-paper-plane"></i> Update Role</button>
   </div>
{!! Form::close() !!}

        </div>

        <div class="py-5"></div>
 </section>
      

@endsection