
<link href="{{asset('selects/select2.min.css')}}" rel="stylesheet" />

<script src="{{asset('selects/select2.min.js')}} "></script>

<script type="text/javascript">
$(document).ready(function() {


$("#upmega_customers").select2({
placeholder: "Select Customer",
allowClear: true,
width: '100%'
});
 
$("#upmega_roles").select2({
placeholder: "Select Role",
 maximumSelectionLength: 1,
allowClear: true,
width: '100%'
});
 

$("#status").select2({
placeholder: "Select Status",
allowClear: true,
width: '100%'
});
 

$("#update_status").select2({
placeholder: "Select Status",
allowClear: true,
width: '100%'
});

$("#upmega_gender").select2({
placeholder: "Select Gender",
allowClear: true,
width: '100%'
});

 $("#upmega_categories").select2({
placeholder: "Select Category",
allowClear: true,
width: '100%'
});

$("#upmega_sub_categories").select2({
placeholder: "Select Sub Category",
allowClear: true,
width: '100%'
});
 

});
</script>