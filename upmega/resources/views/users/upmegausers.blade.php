<?php 
   use Spatie\Permission\Models\Role;
   ?>
@extends('upmega.layouts.main')
<?php
   if (isset($_GET['client'])) {
      $client = $_GET['client'];
   } else {
      $client = '';
   }
    
   ?>
@section('content')
@include('upmega.layouts.data_tables')
<title>upmega :: Filter Users - {{$client}}</title>
@if(!empty($client))
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<?php
   if (isset($_GET['client'])) {
      $client = $_GET['client'];
   } else {
      $client = '';
       
   }
   
     // $useers = App\Models\User::whereHas("roles", function($q){ $q->where("name", "Customer"); })->get();
   
        $users = App\Models\User::role($client)->get();
   
   ?>
<div class="container-fluid">
   <?php 
      $systemadminscount = App\Models\User::role('System Admin')->count();
      $superadminscount = App\Models\User::role('Super Admin')->count();
      $investorscount = App\Models\User::role('Investor')->count();
      $employeescount = App\Models\User::role('Employee')->count();
      $customerscount = App\Models\User::role('Customer')->count();
      
      $systemadmin = 'System Admin';
      $superadmin = 'Super Admin';
      $employee = 'Employee';
      $customer = 'Customer';
      ?>
   @if ($message = Session::get('success'))
   <div class="alert alert-success">
      <p>{{ $message }}</p>
   </div>
   @endif
   <div class="card upmega-round shadow-lg">
      <div class="card-body">
         <p class="text-site">Showing <span class="text-warning">"{{$client}}"</span> upmega users</p>
         <div class="accordion mb-3 upmega-round" id="upmegaToggleSlideHide">
            <div class="accordion-item">
               <h2 class="accordion-header" id="upmegaToggleSlideHideHdr">
                  <button class="accordion-button shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#upmegaSlideHide" aria-expanded="false" aria-controls="upmegaSlideHide"> <i class="fa fa-users me-2"></i> Add/Filter upmega Users
                  </button>
               </h2>
               <div id="upmegaSlideHide" class="accordion-collapse collapse" aria-labelledby="upmegaToggleSlideHideHdr" data-bs-parent="#upmegaToggleSlideHide">
                  <div class="accordion-body upmega-bg">
                           <div class="row">
                              <div class="col-xs-3 col-sm-3 col-md-3 mb-3">
                                 <a href="{{url('users/create')}}">
                                    <div class="card upmega-create-card shadow-lg upmega-round upmega-bg-primary">
                                       <div class="card-body">
                                          <div class="card-img-overlay text-white d-flex justify-content-center align-items-center">
                                             <i class="fa fa-plus fs-1 text-white"></i>
                                          </div>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                              <div class="col-xs-3 col-sm-3 col-md-3 mb-3">
                                 <div class="card h-100 shadow-lg upmega-round">
                                    <div class="card-body position-relative">
                                       <div class="position-relative">
                                          <span class="badge badge-primary upmega-bg-primary">Total: {{$customerscount}}</span>
                                          <hr>
                                          <h6 class="upmega-stat-title"><i class="fa-solid fa-users"></i> upmega Customers</h6>
                                          <a href="{{url('/upmegausers')}}?client={{$customer}}" class="btn upmega-btn-outline-primary"><i class="fa fa-external-link"></i> Manage</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
 
                              <div class="col-xs-3 col-sm-3 col-md-3 mb-3">
                                 <div class="card h-100 shadow-lg upmega-round">
                                    <div class="card-body position-relative">
                                       <div class="position-relative">
                                          <span class="badge badge-warning bg-warning">Total: {{$systemadminscount}}</span>
                                          <hr>
                                          <h6 class="upmega-stat-title"><i class="fa-solid fa-user-shield"></i> System Admins</h6>
                                          <a href="{{url('/upmegausers')}}?client={{$systemadmin}}" class="btn upmega-btn-outline-primary"><i class="fa fa-external-link"></i> Manage</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xs-3 col-sm-3 col-md-3 mb-3">
                                 <div class="card h-100 shadow-lg upmega-round">
                                    <div class="card-body position-relative">
                                       <div class="position-relative">
                                          <span class="badge badge-warning bg-warning">Total: {{$superadminscount}}</span>
                                          <hr>
                                          <h6 class="upmega-stat-title"><i class="fa-solid fa-user-shield"></i> Super Admins</h6>
                                          <a href="{{url('/upmegausers')}}?client={{$systemadmin}}" class="btn upmega-btn-outline-primary"><i class="fa fa-external-link"></i> Manage</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xs-3 col-sm-3 col-md-3 mb-3">
                                 <div class="card h-100 shadow-lg upmega-round">
                                    <div class="card-body position-relative">
                                       <div class="position-relative">
                                          <span class="badge badge-warning bg-warning">Total: {{$employeescount}}</span>
                                          <hr>
                                          <h6 class="upmega-stat-title"><i class="fa-solid fa-user"></i> Employees</h6>
                                          <a href="{{url('/upmegausers')}}?client={{$employee}}" class="btn upmega-btn-outline-primary"><i class="fa fa-external-link"></i> Manage</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="table-responsive mb-3">
            <table id="upmegaDisplay" class="row-border stripe" style="width:100%">
               <thead>
                  <tr>
                     <th>Name</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($users as $key => $user)
                  <?php 
                     if (!empty($user->user_id)) {
                     $added_by = App\Models\User::where('id','=',$user->user_id)->first();
                     $added_by_name = $added_by->name;
                     }else{
                     $added_by_name = '';
                     }
                     if (!empty($user->updated_by)) {
                     $updated_by = App\Models\User::where('id','=',$user->updated_by)->first();
                     $updated_by_name = $updated_by->name;  
                     }else{
                     $updated_by_name = '';  
                     }
                     ?>
                  <tr>
                     <td>
                        <p><strong>{{ $user->name }}</strong> </p>
                        <p>@if(!empty($user->getRoleNames()))
                           @foreach($user->getRoleNames() as $v)
                           <label style="font-size: 10px;" class="badge badge-primary upmega-bg-primary upmega-round">{{ $v }}</label>
                           @endforeach
                           @endif
                        </p>
                        <p>Added By: <span class="badge badge-success upmega-round bg-success">{{ $added_by_name }}</span></p>
                        <p>Updated By: <span class="badge badge-warning upmega-round bg-warning">{{ $updated_by_name }}</span></p>
                        @can('user-edit')
                        <div class="custom-control custom-switch">
                           <input data-on-label="<i class='fa-solid fa-user'></i>" data-off-label="<i class='fa-solid fa-user'></i>" data-id="{{$user->id}}" class="activate-user custom-control-input" type="checkbox" data-onstyle="warning" data-offstyle="success" data-toggle="toggle" data-on="Deactivate" data-off="Activate" {{ $user->status ? 'checked' : '' }}>
                        </div>
                        @endcan
                     </td>
                     <td>
                        <div class="upmega-flex">
                           <a class="btn upmega-btn-primary" href="{{ route('users.show',$user->id) }}"> <i class="fa fa-external-link"></i><span class="upmega-mobile-hide"> View</span>  </a> 
                           <a class="btn upmega-btn-outline-primary" href="{{ route('users.edit',$user->id) }}"> <i class="fa fa-edit"></i> <span class="upmega-mobile-hide"> Edit</span></a> 
                           {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                           <button class="btn upmega-btn-secondary" type="submit"><i class="fa fa-trash"></i> <span class="upmega-mobile-hide"> Delete</span> </button>
                           {!! Form::close() !!}
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
   <div class="py-3"></div>
</div>
<script>
   var token = '{{ Session::token() }}';
   var activateUser = '{{ route('activateUser') }}';
   
</script>
<script>
   $(function() {
   
        $(document).on('change', '.activate-user', function(){
          // $('.activate-shop').on('change', function(){
             
         var status = $(this).prop('checked') == true ? 1 : 0; 
         var user_id = $(this).data('id'); 
          
         $.ajax({
             type: "GET",
             dataType: "json",
             url: activateUser,
             data: {'status': status, 'user_id': user_id},
             success: function(data){
   
    // toastr.options = {
    // "preventDuplicates": true,
    // "preventOpenDuplicates": true
    // };
    toastr.options.closeButton = true;
    toastr.options.positionClass = 'toast-bottom-right';
    
    if (data.status == "on") {
   
     toastr.success('User Activated!');
    }
   
      if (data.status == "off") {
   
     toastr.error('User Deactivated!');
    }
               // console.log(data.success);
             }
         });
     })
   })
</script>
@else
<script type="text/javascript">
   window.location = "{{ url('/users') }}"; 
</script>
@endif
@endsection