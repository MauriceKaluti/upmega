<!DOCTYPE html>
  <html class="no-js" lang="">  
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Toyshaven 254 | Admin Dashboard</title>
    <meta name="description" content="Toyshaven 254 is a toy and kids fun having props located in Nairobi Kenya. We have all ranges of trending and latest toys with high mark of quality serving clients across Kenya.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{url('images/mboto/toyshaven254 icon.png')}}">
    <link rel="shortcut icon" href="{{url('images/mboto/toyshaven254 icon.png')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
  
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

    <link rel="stylesheet" media="screen" href="{{asset('assets/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" media="screen" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">


 

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>

<body>
             @include('admin.layout.includes.sidebar')



    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">


         @include('admin.layout.includes.header')
    

                <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{url('/admin')}}">Dashboard</a></li>
                                    <li><a href="#">Products</a></li>
                                    <li class="active">Categories</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">All Categories</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                      
                                        <tr>
                                            <td>Donna Snider</td>
                                            <td>Customer Support</td>
                                            <td>New York</td>
                                            <td>$112,000</td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

         @include('admin.layout.includes.footer')



    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>

                <script src="{{asset('assets/js/lib/data-table/datatables.min.js')}}"></script>

    
    <script src="{{asset('assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>

    
    <script src="{{asset('assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>

    
    <script src="{{asset('assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>

    
    <script src="{{asset('assets/js/lib/data-table/jszip.min.js')}}"></script>

    
    <script src="{{asset('assets/js/lib/data-table/vfs_fonts.js')}}"></script>

    
    <script src="{{asset('assets/js/lib/data-table/buttons.html5.min.js')}}"></script>

    
    <script src="{{asset('assets/js/lib/data-table/buttons.print.min.js')}}"></script>

    
    <script src="{{asset('assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>

    
    <script src="{{asset('assets/js/init/datatables-init.js')}}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>


       <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>

    <script src="{{asset('assets/js/main.js')}}"></script>
  
 
</body>
</html>
