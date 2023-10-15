@extends('upmega.layouts.main')
@section('content')
@include('upmega.layouts.data_tables')
<title>upmega :: Users</title>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<section id="users">
   <div class="container-fluid">
       <div class="py-5"></div>
   <?php 
      $systemadminscount = App\Models\User::role('System Admin')->count();
      $superadminscount = App\Models\User::role('Super Admin')->count();
      $employeescount = App\Models\User::role('Employee')->count();
      $customerscount = App\Models\User::role('Customer')->count();
  
      ?>
   
   @if ($message = Session::get('success'))
   <div class="alert alert-success">
      <p>{{ $message }}</p>
   </div>
   @endif
   <div class="card upmega-round shadow-lg">
      <div class="card-body">
         <div class="table-responsive">
            <table id="upmegaDisplay" class="row-border stripe" style="width:100%">
               <thead>
                  <tr>
                     <th>Name</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($data as $key => $user)
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
</section>
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
@endsection