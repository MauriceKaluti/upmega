@extends('upmega.layouts.main')
@section('content')
<title>upmega :: Payments</title>
<div class="container-fluid">
   <hr>
   <div class="row mb-3">
      <div class="col-lg-12 margin-tb">
         <div class="float-start">
            <h2>Payments</h2>
         </div>
         <div class="float-end">
            @can('subscribe-create')
            <a class="btn btn-success" href="{{ route('subscribe.index') }}"> Create </a>
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

   <!-- payment logs -->
   <div class="card mb-3">
      <div class="card-header">
         Payment Logs
      </div>
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
                  @foreach ($payment_logs as $key => $payment_log)
                  <?php 
                     $payment_shop_name = '';
                      
                      $payment_shop = App\Models\Shop::where('id','=',$payment_log->shop_id)->first();
                      
                     
                     if (!empty($payment_shop)) {
                      $payment_shop_name = $payment_shop->name;   
                     
                     }
                     
                     
                       ?>

               <?php 
 if (!empty($payment_log->user_id)) {
$added_by = App\Models\User::where('id','=',$payment_log->user_id)->first();
$added_by_name = $added_by->name;
 }else{
$added_by_name = '';
 }
 if (!empty($payment_log->updated_by)) {
 $updated_by = App\Models\User::where('id','=',$payment_log->updated_by)->first();
$updated_by_name = $updated_by->name;  
 }else{
$updated_by_name = '';  
 }
  ?>
                  <tr>

                     <td>
                        <p>{{$payment_shop_name}}</p>
                        <p>Ksh. {{$payment_log->amount}}</p>
                        <p>{{$payment_log->created_at}}</p>
                             <p>Added By: <span class="badge badge-success upmega-round bg-success">{{ $added_by_name }}</span></p>
        <p>Updated By: <span class="badge badge-warning upmega-round bg-warning">{{ $updated_by_name }}</span></p>
                        <p>@if($payment_log->plan == '3 Day Trial') <span class="badge badge-warning">Free 3 Day Trial</span> @else  @endif  @if($payment_log->plan == '1 Month') <span class="badge badge-success">1 Month Activated</span> @else  @endif  </p>
                        <p>Renew Date: <span class="badge badge-info">{{$payment_log->renew_date}} </span></p>
                        <p>Expiry Date: <span class="badge badge-danger">{{$payment_log->expiry_date}}</span></p>
                     </td>
                     <td>
                        <div class="upmega-flex">
                           @can('payment-list')
                           <a class="btn btn-info" href="{{ route('payments.show',$payment_log->id) }}"> <i class="fa fa-external-link"></i> <span class="upmega-mobile-hide"> Show</span></a> 
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
   <!-- end payment logs card -->

@if(!empty($mpesa_logs))
<div class="card">
      <div class="card-header">
         Mpesa Logs
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table id="upmegaDisplay2" class="row-border stripe" style="width:100%">
               <thead>
                  <tr>
                     <th>Details</th>
                     <th>Time</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($mpesa_logs as $key => $mpesa_log)
              
                  <tr>
                     <td>
                 <p>{{$mpesa_log->FirstName.$mpesa_log->MiddleName.$mpesa_log->LastName}}</p>
                 <p>{{$mpesa_log->TransID}}</p>
                 <p>{{$mpesa_log->TransAmount}}</p>
                 <p>{{$mpesa_log->BillRefNumber}}</p>
                 <p>{{$mpesa_log->MSISDN}}</p>
                 <p>Added By <span class="badge badge-success">{{$added_by_name}}</span></p>
                 <p><span class="badge badge-warning">{{$mpesa_log->created_at}}</span></p>
                     </td>
                     <td>
                     
                     </td>
                  </tr>
                  @endforeach
               </tbody>
               <tfoot>
                  <tr>
                     <th>Details</th>
                     <th>Time</th>
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
</div>
   <!-- mpesa logs card -->

   @else


   @endif


   <!-- end mpesa logs card -->
   <div class="py-3"></div>
</div>
@endsection