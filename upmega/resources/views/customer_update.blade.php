@if(Auth::user()->package_id != '')

@if(Auth::user()->status == 0)
<h6 class="text-site"><i class="fa fa-warning"></i> Thank you for choosing upmega, upon your account approval you will be able to manage investor accounts as you make profits.</h6>
@else

@endif

<div class="row">
               @can('trade-list')
               <div class="col-md-4 mb-3 col-6">
                   <a href="{{route('trades.index')}}">
                     <div style="height: 120px;" class="card upmega-card upmega-round upmega-border-primary">
                        <div class="card-body">
                           <div class="card-img-overlay text-white d-flex justify-content-center align-items-center">
                              <h5 class="upmega-text-primary upmega-card-cta-text card-title upmega-bold"><i class="fa fa-exchange"></i> Trades</h5>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>
               @endcan
              @can('trader_profit-list')
               <div class="col-md-4 mb-3 col-6">
                   <a href="{{route('trader_profits.index')}}">
                     <div style="height: 120px;" class="card upmega-card upmega-round upmega-border-primary">
                        <div class="card-body">
                           <div class="card-img-overlay text-white d-flex justify-content-center align-items-center">
                              <h5 class="upmega-text-primary upmega-card-cta-text card-title upmega-bold"><i class="fas fa-download"></i> Withdraw</h5>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>
               @endcan
        
</div>
@else

<!-- update trader package -->
@if ($userRole == 'Trader')
<?php 
$packages = App\Models\Package::get();
?>
<div class="card upmega-round mb-3">
   <div class="card-body">
       <p class="text-site"><i class="fa fa-warning"></i> Hello <span class="upmega-text-primary">Trader {{Auth::user()->name}}</span>, kindly select your trading account package below to get started.</p>
      <form method="POST" action="{{route('updateTraderAccount')}}">
         {{csrf_field()}}
         <div class="row mb-2">
            @forelse($packages as $package)
            <div class="col-md-4 col-6 mb-2">
               <input required type="radio" class="btn-check" name="package_id" id="package_{{$package->id}}" value="{{$package->id}}" autocomplete="off" @if($loop->index == 0
               ) checked @else @endif>
               <label class="btn btn-secondary upmega-bg-primary upmega-package-label upmega-round w-100" for="package_{{$package->id}}">
                 <p class="text-white package-name upmega-bold mb-0"><i class="fa fa-tasks"></i> {{$package->name}} </p>
                 <p class="text-white upmega-bold mb-2"><span class="badge badge-warning bg-warning upmega-round">Ksh. {{$package->price}}</span> </p>
                  <h6 class="text-white upmega-bold">BENEFITS</h6>
                  <div class="package-description">
                     {!! $package->description !!}
                  </div>
                  <span class="btn upmega-btn-secondary">Select</span>
               </label>
            </div>
            @empty
            <h4 class="text-site">No Package Available</h4>
            @endforelse
         </div>
         <button type="submit" class="btn upmega-btn-outline-primary w-100">Confirm Account</button>
      </form>
   </div>
</div>
@else
@endif
<!-- end update trader package -->

@endif
