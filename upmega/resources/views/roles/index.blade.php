@extends('upmega.layouts.main')
@section('content')
@include('upmega.layouts.data_tables')
<title>Upmega :: Roles</title>
<section id="roles">
   <div class="py-5"></div>
   <div class="container-fluid mb-3">
 <div class="card upmega-round shadow-lg">
    <div class="card-body">
         <div class="row mb-3">
      <div class="col-lg-12 margin-tb">
         <div class="float-start">
            <h4>Roles</h4>
         </div>
         <div class="float-end">
            @can('role-create')
            <a class="btn btn-success upmega-btn-primary upmega-round" href="{{ route('roles.create') }}"><i class="fa fa-user-shield"></i> Create </a>
            @endcan
         </div>
      </div>
   </div>
   <hr>
   @if ($message = Session::get('success'))
   <div class="alert alert-success">
      <p>{{ $message }}</p>
   </div>
   @endif
   <div class="table-responsive">
      <table id="upmegaDisplay" class="row-border stripe" style="width:100%">
         <thead>
            <tr>
               <th>Name</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($roles as $key => $role)
            <tr>
               <td>{{ $role->name }}</td>
               <td>
                  <div class="upmega-flex">
                     @can('role-list')
                     <a class="btn upmega-btn-primary" href="{{ route('roles.show',$role->id) }}"> <i class="fa fa-external-link"></i> <span class="upmega-mobile-hide"> View</span></a> 
                     @endcan
                     @can('role-edit')
                     <a class="btn btn-primary upmega-btn-outline-primary" href="{{ route('roles.edit',$role->id) }}"> <i class="fa fa-edit"></i> <span class="upmega-mobile-hide"> Edit</span></a> 
                     @endcan
                     @can('role-delete')
                     {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                     <button class="btn upmega-btn-secondary" type="submit"><i class="fa fa-trash"></i> <span class="upmega-mobile-hide"> Delete</span> </button>
                     {!! Form::close() !!}
                     @endcan
                  </div>
               </td>
            </tr>
            @endforeach
         </tbody>
         <tfoot>
            <tr>
               <th>Name</th>
               <th>Action</th>
            </tr>
         </tfoot>
      </table>
   </div>
    </div>
 </div>
 
</div>
</section>
@endsection