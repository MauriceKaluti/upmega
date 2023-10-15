@if ($errors->any())

<!-- <div class="alert alert-danger">
<strong>Whoops!</strong> Sorry the following errors were found; <br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
<p>Kindly fill in all fields and retry again!</p>
</div> -->

<script>

toastr.options.closeButton = true;
toastr.options.positionClass = 'toast-bottom-right';
toastr.options.timeOut = 30000;
toastr.error('<?php echo '<p class="text-warning upmega-bold mb-3">Sorry the following errors were found; </p>'; ?>  <?php 
foreach ($errors->all() as $error){
echo '<p class="text-white upmega-bold">- '.$error.'</p>'; '<br>';
}
?> Kindly retry again, check errors on top of the subject form!');
</script>
            
@endif