
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
 
<style>
.dt-buttons button{
      color: #fff!important;
      background-color: #120638!important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    color: #ffff!important;
}

 button.dt-button, div.dt-button, a.dt-button, input.dt-button {
background: linear-gradient(to bottom, #120638 0%, #120638 100%)!important;
    color: #ffff!important;
font-weight: bold!important;
border-radius: 30px!important;
 }

 .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
    color: #747794!important;
}

 .dataTables_wrapper .dataTables_paginate .paginate_button {
    color: #747794!important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
/*    color: #747794!important;*/
    background-color: transparent!important;
    background: transparent!important;
}

 .dataTables_wrapper .dataTables_paginate .paginate_button.current {
    color: #ffff!important;
}
 

.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background: linear-gradient(to bottom,#120638 0%,#120638 100%)!important;
}
</style>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script type="text/javascript">
   $(document).ready(function() {
   $('#upmegaDisplay').DataTable( {
   dom: 'Bfrtip',
   buttons: [
   'copy', 'csv', 'excel', 'pdf', 'print'
   ]
   } );
   
   $('#upmegaDisplay2').DataTable( {
   dom: 'Bfrtip',
   buttons: [
   'copy', 'csv', 'excel', 'pdf', 'print'
   ]
   } );
   
   
   $('#upmegaDisplay3').DataTable( {
   dom: 'Bfrtip',
   buttons: [
   'copy', 'csv', 'excel', 'pdf', 'print'
   ]
   } );
   
   });
</script>