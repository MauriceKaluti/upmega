@extends('upmega.layouts.main')

@section('content')
<title>upmega :: Payment Details - {{$payment->name}}</title>
 
        <div class="container-fluid">
            <hr>
      <div class="row mb-3">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            @can('payment-list')
            <a class="btn btn-primary" href="{{ route('payments.index') }}"> Back </a>
            @endcan
        </div>
        <div class="float-end">
            <h2> Payment </h2>
        </div>
    </div>
</div>
<hr>
   <?php 
                     $single_payment_shop_name = '';
                      
                      $single_payment_shop = App\Models\Shop::where('id','=',$payment->shop_id)->first();
                      
                     
                     if (!empty($single_payment_shop)) {
                      $single_payment_shop_name = $single_payment_shop->name;   
                     
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
<div class="card mb-3">
    <div class="card-body">
        <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
        <h4>Shop Name:</h4>

       <p>{{$single_payment_shop_name}}</p>


    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
        <div class="form-group">
            <strong>Details:</strong>
           
                        <p>Ksh. {{$payment->amount}}</p>
                        <p>{{$payment->created_at}}</p>
                        <p>@if($payment->plan == '3 Day Trial') <span class="badge badge-warning">Free 3 Day Trial</span> @else  @endif  @if($payment->plan == '1 Month') <span class="badge badge-success">1 Month Activated</span> @else  @endif  </p>
                        <p>Renew Date: <span class="badge badge-info">{{$payment->renew_date}} </span></p>
                        <p>Expiry Date: <span class="badge badge-danger">{{$payment->expiry_date}}</span></p>
        </div>
    </div>
   
       <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
        <div class="form-group">
            <strong>Activity Logs:</strong>
        <p>Added By: <span class="badge badge-success upmega-round bg-success">{{ $added_by_name }}</span></p>
        <p>Added By: <span class="badge badge-success upmega-round bg-success">{{ $updated_by_name }}</span></p>
        <p>Added On: <span class="badge badge-warning upmega-round bg-warning">{{ $payment->created_at }}</span></p>
        <p>Updated On: <span class="badge badge-warning upmega-round bg-warning">{{ $payment->updated_at }}</span></p>
        </div>
    </div>
</div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
 
<?php 

$relatedpayments = App\Models\PaymentLog::where('shop_id','=',$payment->shop_id)->get();
 

 ?>



 <!-- business shops -->
@if(count($relatedpayments) > 0)
  <div class="card">
    <div class="card-header">
        {{$single_payment_shop_name}} Shops
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
                  <tr>
                     <td>
                        <p>{{$payment_shop_name}}</p>
                        <p>Ksh. {{$payment_log->amount}}</p>
                        <p>{{$payment_log->created_at}}</p>
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

@else


@endif
        </div>
      
 
@endsection