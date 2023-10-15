 
    <script src="{{asset('toastr/toastr.min.js')}} "></script>
 
    <link rel="stylesheet" href="{{asset('toastr/toastr.min.css')}}">


<script>
@if(Session::has('success'))
toastr.options.closeButton = true;
toastr.options.positionClass = 'toast-bottom-right';
toastr.options.timeOut = 300000;
toastr.success("{{ Session::get('success') }}");
@endif


@if(Session::has('error'))
toastr.options.closeButton = true;
toastr.options.positionClass = 'toast-bottom-right';
toastr.options.timeOut = 300000;
toastr.error("{{ Session::get('error') }}");
@endif
</script>
