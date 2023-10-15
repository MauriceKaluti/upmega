@extends('front.layouts.main')
@section('content')
<title>upmega :: Dashboard</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
 
<div class="container-fluid">
    <div class="row">
   <!-- dash stats content -->
 
      @can('user-list')
      <div class="col-md-3 mb-2">
         <div class="card shadow-lg upmega-round">
            <div class="card-body position-relative">
               <div class="position-relative">
                  <span class="badge badge-warning bg-warning">{{$userscount}}</span>
                  <h6 class="upmega-stat-title">Users</h6>
                  <a href="{{url('/users')}}" class="btn btn-outline-primary upmega-btn-primary upmega-round"><i class="fa fa-external-link"></i> Manage</a>
               </div>
               <div class="position-absolute upmega-stat-icon">
                  <i class="fa fa-users"></i>
               </div>
            </div>
         </div>
      </div>
      @endcan

 
      @can('role-list')
      <div class="col-md-3 mb-2">
         <div class="card shadow-lg upmega-round">
            <div class="card-body position-relative">
               <div class="position-relative">
                  <span class="badge badge-warning bg-warning">{{$rolescount}}</span>
                  <h6 class="upmega-stat-title">Roles</h6>
                  <a href="{{url('/roles')}}" class="btn btn-outline-primary upmega-btn-primary upmega-round"><i class="fa fa-external-link"></i> Manage</a>
               </div>
               <div class="position-absolute upmega-stat-icon">
                  <i class="fa fa-user-shield"></i>
               </div>
            </div>
         </div>
      </div>
      @endcan
 
 
 
   </div>
   <!-- end dash stats -->
   <hr>
   <!-- dash creates hypers content -->
   <div class="row">
 
     
      @can('role-create')
      <div class="col-md-3 mb-2">
         <div class="card shadow-lg upmega-round">
            <div class="card-body position-relative">
               <div class="position-relative">
                  <a href="{{ route('roles.create') }}" class="btn btn-outline-primary upmega-btn-primary upmega-round"><i class="fa fa-user-shield"></i> Create Role</a>
               </div>
               <div class="position-absolute upmega-stat-icon">
                  <i class="fa fa-user-shield"></i>
               </div>
            </div>
         </div>
      </div>
      @endcan
 
      @can('user-create')
      <div class="col-md-3 mb-2">
         <div class="card shadow-lg upmega-round">
            <div class="card-body position-relative">
               <div class="position-relative">
                  <a href="{{ route('users.create') }}" class="btn btn-outline-primary upmega-btn-primary upmega-round"><i class="fa fa-user"></i> Create User</a>
               </div>
               <div class="position-absolute upmega-stat-icon">
                  <i class="fa fa-user"></i>
               </div>
            </div>
         </div>
      </div>
      @endcan
  
  
   </div>
   <!-- end creates hypers content -->

   @if(Auth::guest())

@else
 

@if(Auth::user()->account_id == 2 || $userRole == 'Super Admin' || $userRole == 'System Admin')
   <div class="row">
      @can('saving-list')
      <div class="col-md-6 mt-3">
         <div class="card upmega-round h-100">
            <div class="card-body">
               <h4 class="card-title upmega-bold text-site">Current Investments</h4>
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th class="text-site" scope="col">Trans Code</th>
                        <th class="text-site" scope="col">Amount</th>
                      
                     </tr>
                  </thead>
                  <tbody>
                     @forelse($my_deposits as $my_deposit)
                     <tr>
                        <td class="text-site">{{$my_saving->transaction_code}}</td>
                        <td class="text-site"> {{$my_saving->amount}}</td>
                     </tr>
                     @empty
                     <tr>
                        <td class="text-site"></td>
                        <td class="text-site"> No Deposits Available</td>
                     </tr>
                     @endforelse
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      @endcan
 

         @can('loan-list')
      <div class="col-md-6 mt-3">
         <div class="card upmega-round h-100">
            <div class="card-body">
               <h4 class="card-title upmega-bold text-site">Current Loans</h4>
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th class="text-site" scope="col">Loan Code</th>
                        <th class="text-site" scope="col">Amount</th>
                         <th class="text-site" scope="col">Deadline</th>
                     </tr>
                  </thead>
                  <tbody>
                     @forelse($my_loans as $my_loan)
                     <tr>
                        <td class="text-site">{{$my_loan->loan_code}}</td>
                        <td class="text-site"> {{$my_loan->amount}}</td>
                          <td class="text-site"> <small>{{$my_saving->repay_at}}  ({{\Carbon\Carbon::parse($my_loan->repay_at)->diffForHumans()}})</small></td>
                     </tr>
                     @empty
                     <tr>
                        <td class="text-site"></td>
                        <td class="text-site"> No Loans Available</td>
                     </tr>
                     @endforelse
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      @endcan
   </div>
@endif

@endif
  @endsection


</div>