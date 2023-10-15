@extends('upmega.layouts.main')
@section('content')
@include('upmega.layouts.data_tables')
@include('upmega_errors')
<title>Upmega :: Product Extra Images - Admin Dashboard</title>
<div class="container-fluid">
   <div class="py-5"></div>
   <div class="card shadow-lg upmega-round mb-3">
      <div class="card-body">

@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops! </strong>Something went wrong.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif
         <form action="{{route('storeProductImages')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-body">
               <h5 class="card-title">Upload Product Main Images</h5>
               <hr>
               <div class="row">
                <input required="" value="{{$product->id}}" name="product_id" type="hidden" readonly class="form-control" placeholder="Product ID"> 
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="control-label">Add Product Images(Upto 4 Images)</label>
                        <input required="" type="file" name="image[]" multiple="" class="form-control" title="Add Product Images">
                     </div>
                  </div>
                  <!--/span-->
               </div>
               <!--/row-->
               <hr>
            </div>
            <div class="form-actions mt-5">
                <input type="submit" class="btn btn-primary btn-lg upmega-round w-100" onClick="this.form.submit(); this.disabled=true; this.value='Uploading Image(s)...';" value="Upload Image(s)"/>
            </div>
         </form>
      </div>
   </div>
   <div class="card shadow-lg upmega-round mb-3">
            <div class="card-body">
               <h6 class="card-title upmega-bold mb-3">Manage {{$product->name}} Images</h6>
               <h6 class="card-subtitle mb-3">Use the action column to manage all product images </h6>
               <div class="table-responsive">
      <table id="upmegaDisplay" class="row-border stripe" style="width:100%">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Product Name</th>
                           <th>Action</th>
                           <th>Image</th>
                           <th>Created At</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse($showproductimages as $showproductimage)
                        <tr>
                           <td>{{$showproductimage->id}}</td>
                           <td>{{$product->name}}</td>
                           <td>
                              <form action="{{route('deleteProductImage',$showproductimage->id)}}" method="POST">
                                 {{csrf_field()}}
                                 {{method_field('DELETE')}}
                                 <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i> </button>
                              </form>
                           </td>
                           <td>@if(!empty($showproductimage->image))
                              <img style="width: 100px; height: 100px;" src="{{url('images/productimages/',$showproductimage->image)}}" class="img-thumbnail object-fit-contain">
                              @endif
                           </td>
                           <td>{{$showproductimage->created_at}}</td>
                        </tr>
                        @empty
                        @endforelse
                     </tbody>
                     <tfoot>
                        <tr>
                           <th>#</th>
                           <th>Product Name</th>
                           <th>Action</th>
                           <th>Image</th>
                           <th>Created At</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
         </div>
</div>
@endsection