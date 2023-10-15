<?php 
use Carbon\Carbon;
use Carbon\CarbonPeriod;
?>
@extends('upmega.layouts.main')
@section('content')
<title>upmega :: Reports</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<!-- upmega reports -->
<div class="container-fluid mb-2 mt-2">
   @if($reportsuserRole == 'System Admin' || $reportsuserRole == 'Super Admin')

<?php 

$current_year = date("Y");


// monthly users data

$upmega_monthly_users = DB::table('users')
    ->selectRaw("
        count(id) as total,
        date_format(created_at, '%b %Y') as period
    ")
    ->whereYear('created_at', '>=', $current_year)
    ->groupBy('period')
    ->get()
    ->keyBy('period');

$userperiods = collect([]);
 

foreach (CarbonPeriod::create($current_year.'-01-01', '1 month', now()->subMonth()) as $userperiod) {
 $userperiods->push($userperiod->format('M Y'));
 
}

$totals = $userperiods->map(function ($userperiod) use ($upmega_monthly_users) {
    return $upmega_monthly_users->get($userperiod)->total ?? 0;
});
 

 $userperiods = $userperiods->toArray();

$monthly_appusersdata = [];

 foreach ($userperiods as $key => $userperiod) {

  $monthly_appusersdata['label'][] = $userperiod;
  $monthly_appusersdata['data'][] = $upmega_monthly_users->get($userperiod)->total ?? 0;
    
 }
 

$monthlyusers_data = json_encode($monthly_appusersdata);

 // end monthly user data
 
 


// monthly mpesa logs

$mpesa_payments_logs = DB::table('mpesa_transactions')
    ->selectRaw("
        count(id) as total,
        sum(TransAmount) as totalmpesa,
        date_format(created_at, '%b %Y') as period
    ")
    ->whereYear('created_at', '>=', $current_year)
    ->groupBy('period')
    ->get()
    ->keyBy('period');

$mpesaperiods = collect([]);
 

foreach (CarbonPeriod::create($current_year.'-01-01', '1 month', now()->subMonth()) as $mpesaperiod) {
 $mpesaperiods->push($mpesaperiod->format('M Y'));
 
}

$totals = $mpesaperiods->map(function ($mpesaperiod) use ($mpesa_payments_logs) {
    return $mpesa_payments_logs->get($mpesaperiod)->totalmpesa ?? 0;
});
 
 $mpesaperiods = $mpesaperiods->toArray();

$mpesamonthlydata = [];

 foreach ($mpesaperiods as $key => $mpesaperiod) {

  $mpesamonthlydata['label'][] = $mpesaperiod;
  $mpesamonthlydata['data'][] = $mpesa_payments_logs->get($mpesaperiod)->totalmpesa ?? 0;
    
 }
 
$mpesamonthly_data = json_encode($mpesamonthlydata);

// end mpesa monthly annualy



// current mpesa logs month by date

$mpesasmonthly = DB::table('mpesa_transactions')
 ->whereMonth('created_at', date('m'))
->whereYear('created_at', date('Y'))
     ->select(DB::raw('sum(TransAmount) as totalmpesa'),DB::raw('date(created_at) as dates'))
     ->groupBy('dates')
     ->orderBy('dates','desc')
    ->get();
 

$mpesacurrentmdata = [];

 foreach ($mpesasmonthly as $key => $monthlysale) {

  $mpesacurrentmdata['label'][] = $monthlysale->dates;
  $mpesacurrentmdata['data'][] =  $monthlysale->totalmpesa;
    
 }
 
$mpesacurrentm_data = json_encode($mpesacurrentmdata);

// end current mpesa logs month by date

 ?>
   <!-- admin charts reports -->

 
       <!-- 1 -->
      <div class="col-md-12 mb-3">
         <div class="chart-container">
            <div class="users-monthly-container">
               <canvas id="users-monthly"></canvas>
            </div>
         </div>
      </div>
<hr>

      <!-- 2 -->
        <div class="col-md-12 mb-3">
         <div class="chart-container">
            <div class="mpesa-monthly-container">
               <canvas id="mpesa-monthly"></canvas>
            </div>
         </div>
      </div>
<hr>
 
 
          <!-- 4 -->
        <div class="col-md-12 mb-3">
         <div class="chart-container">
            <div class="mpesa-mdate-container">
               <canvas id="mpesa-mdate"></canvas>
            </div>
         </div>
      </div>
 
<hr>

      <!-- 5 -->
      <div class="col-md-12 mb-3">
         <div class="chart-container">
            <div class="upmega-users-weekly-container">
               <canvas id="upmega-users-weekly"></canvas>
            </div>
         </div>
      </div>
 
 
  
   <!-- end admin charts reports -->

   <!-- admin charts js scripts  -->
   <script>
 

    // monthly user script

$(function(){

      //get the pie chart canvas
      var allusersData = JSON.parse(`<?php echo $monthlyusers_data; ?>`);
      var ctx = $("#users-monthly");
      //pie chart data
      var data = {
        labels: allusersData.label,
        datasets: [
          {
            label: "Total Users",
            data: allusersData.data,
            backgroundColor: [
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
            ],
            borderColor: [
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
              "#1D7A46",
              "#F4A460",
              "#CDA776",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };
 
      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Monthly New Users",
          fontSize: 18,
          fontColor: "#b2b9bf"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#b2b9bf",
            fontSize: 16
          }
        }
      };
 
      //create Pie Chart class object
      var chart1 = new Chart(ctx, {
        type: "line",
        data: data,
        options: options
      });
 
  });

    // end monthly user script


      // current month by date

  $(function(){

      //get the pie chart canvas
      var mpesadateMonthData = JSON.parse(`<?php echo $mpesacurrentm_data; ?>`);
      var ctx = $("#mpesa-mdate");
      //pie chart data
      var data = {
        labels: mpesadateMonthData.label,
        datasets: [
          {
            label: "Total Amount(Ksh.)",
            data: mpesadateMonthData.data,
            backgroundColor: [
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
            ],
            borderColor: [
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
              "#1D7A46",
              "#F4A460",
              "#CDA776",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };
 
      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "This Month Daily Mpesa Logs",
          fontSize: 18,
          fontColor: "#b2b9bf"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#b2b9bf",
            fontSize: 16
          }
        }
      };
 
      //create Pie Chart class object
      var chart1 = new Chart(ctx, {
        type: "bar",
        data: data,
        options: options
      });
 
  });

  // end current month by date
 


// monthly mpesa logs

$(function(){

      //get the pie chart canvas
      var mpesamonthlyData = JSON.parse(`<?php echo $mpesamonthly_data; ?>`);
      var ctx = $("#mpesa-monthly");
      //pie chart data
      var data = {
        labels: mpesamonthlyData.label,
        datasets: [
          {
            label: "Total Mpesa Amount(Ksh.)",
            data: mpesamonthlyData.data,
            backgroundColor: [
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
            ],
            borderColor: [
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
              "#1D7A46",
              "#F4A460",
              "#CDA776",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };
 
      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Monthly Mpesa Logs",
          fontSize: 18,
          fontColor: "#b2b9bf"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#b2b9bf",
            fontSize: 16
          }
        }
      };
 
      //create Pie Chart class object
      var chart1 = new Chart(ctx, {
        type: "line",
        data: data,
        options: options
      });
 
  });

  // end monthly logs


  $(function(){

      //get the pie chart canvas
      var cData = JSON.parse(`<?php echo $appuser_data; ?>`);
      var ctx = $("#upmega-users-weekly");
 
      //pie chart data
      var data = {
        labels: cData.label,
        datasets: [
          {
            label: "Users Count",
            data: cData.data,
            backgroundColor: [
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
            ],
            borderColor: [
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
              "#1D7A46",
              "#F4A460",
              "#CDA776",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };
 
      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "This Week Users -  Daily Count",
          fontSize: 18,
          fontColor: "#ffff"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
      };
 
      //create Pie Chart class object
      var chart1 = new Chart(ctx, {
        type: "pie",
        data: data,
        options: options
      });
 
  });

 
</script>
   <!-- end admin charts js scripts  -->
   @else
 

   @endif
</div>
<!-- upmega reports -->
<div class="py-5"></div>
@endsection