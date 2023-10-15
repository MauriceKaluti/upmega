<?php 
   use App\Models\Category;
   use App\Models\SubCategory;
   use Illuminate\Support\Str;
   
   ?>     
@extends('upmega.layouts.main')
@section('content')
@include('upmega.layouts.data_tables')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<title>Upmega :: Create Product - Admin Dashboard</title>
<div class="container-fluid">
   <div class="py-5"></div>
   <div class="row">
      <div class="col-lg-12">
         <div class="card shadow-lg mb-3 upmega-round">
            <div class="card-body">
                  @if (count($errors) > 0)
   <div class="alert alert-danger">
      <strong>Whoops!</strong>Something went wrong.<br><br>
      <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
   @endif
               <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="form-body">
                     <h5 class="card-title">Create Product</h5>
                     <hr>
                     <div class="row">
                        <div class="col-md-6 mb-3">
                           <div class="form-group">
                              <label class="control-label">Product Name</label>
                              <input value="{{ old('name') }}" id="pname" required="" name="name" type="text" class="form-control shadow-none" placeholder="Product Name"> 
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <div class="form-group">
                              <label>Price(Ksh)</label>
                              <input required="" value="{{ old('price') }}" name="price" type="number" class="form-control shadow-none" placeholder="Product Price" aria-label="price">
                           </div>
                        </div>
                         
                           <div class="col-md-6 mb-3">
                              <div class="form-group">
                                 <label class="control-label">Select Category</label>
                                 <select id="upmega_categories" required="" name="category_id" class="form-control shadow-none" data-placeholder="Select Product Category" tabindex="1">
                                    <option></option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
    
                         
                           <div class="col-md-6 mb-3">
                              <div class="form-group">
                                 <label>Price Badge</label>
                                 <input value="{{ old('price_badge') }}" value="1 Pc" required="" name="price_badge" type="text" class="form-control shadow-none" placeholder="E.g Per Unit" aria-label="Price Badge">
                              </div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <div class="form-group">
                                 <label>Product Main Image </label><br>
                                 <div class="btn btn-primary waves-effect waves-light"><span>  Main Image</span><input accept="image/png, image/jpeg" required="" name="image" type="file" class="upload"></div>
                              </div>
                           </div>
                 
                           <div class="col-md-6 ">
                              <div class="form-group">
                                 <label>Product Description</label>
                                 <textarea value="{{ old('description') }}" id="desc" required="" name="description" class="form-control shadow-none" rows="4"></textarea>
                              </div>
                           </div>
                         
                           <div class="col-md-6 mb-3">
                              <div class="form-group">
                                 <label>Product Quantity(Min 1)</label>
                                 <input required="" min="1" name="quantity" value="{{ old('quantity') }}" type="number" class="form-control shadow-none" placeholder="Enter Quantity" value="1" aria-label="Product Quantity" aria-describedby="basic-addon2">
                              </div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <div class="form-group">
                                 <label>Status</label>
                                 <br/>
                                 <div class="custom-control custom-radio custom-control-inline">
                                    <input checked="" value="1" id="customRadioInline1" type="radio" name="status" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline1">Live</label>
                                 </div>
                                 <div class="custom-control custom-radio custom-control-inline">
                                    <input value="0" id="customRadioInline2" type="radio" name="status" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline2">Not Live</label>
                                 </div>
                              </div>
                           </div>
                         
                           <div class="col-md-6 mb-3">
                              <div class="form-group">
                                 <label>Price Offer(%)</label>
                                 <input name="price_offer" type="number" class="form-control shadow-none" placeholder="E.g 12" aria-label="Price Offer">
                              </div>
                           </div>

                           <div class="col-md-12">
<div class="form-group">
<strong>Product Details:</strong>
<textarea required="" type="text" name="product_details" class="form-control custom_data"></textarea>
</div>
</div>
                     </div>
                  </div>
                  <div class="form-actions col-md-4 mt-5">
                     <input onClick="this.form.submit(); this.disabled=true; this.value='Uploading Product...'; "type="submit" class="btn btn-primary btn-lg upmega-round w-100" value="Create Product">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-12">
         <div class="card shadow-lg upmega-round">
            <div class="card-body">
               <h4 class="card-title mb-3">Manage Products</h4>
               <h6 class="card-subtitle mb-3">Use the action column to manage all products </h6>
               <div class="table-responsive">
      <table id="upmegaDisplay" class="row-border stripe" style="width:100%">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Desc</th>
                           <th>Image</th>
                           <th>Action</th>
                           <th>Created At</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse($products as $product)
                        <tr>
                           <td><p class="mobile-font">{{$product->name}}</p></td>
                         
                           <td><p class="mobile-font">{{Str::words($product->description, 5, '...')}}</p></td>
                           <td>@if(!empty($product->image))
                              <img height="100" width="100" src="{{url('images/products/',$product->image)}}" class="img-thumbnail">
                              @endif
                           </td>
                             <td>
                              <div class="upmega-flex">
                                 <!-- <a class="btn btn-success" href="{{url('/admin/add_product_main_images/'.$product->id)}}" title="Upload Product Plus Images"><i class="fa fa-image"></i></a> -->
                                 <a class="btn btn-primary" href="{{route('products.edit',$product->id)}}"><i class="fa fa-refresh"></i></a>
                                 <form action="{{route('products.destroy',$product->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> </button>
                                 </form>
                              </div>
                           </td>
                           <td>{{$product->created_at}}</td>
                        </tr>
                        @empty
                        @endforelse
                     </tbody>
                     <tfoot>
                        <tr>
                           <th>Name</th>
                           <th>Desc</th>
                           <th>Image</th>
                           <th>Action</th>
                           <th>Created At</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   function setValues(){
   $('#desc').val(
   $('#pname').val());
   
   $('#details').val(
   $('#pname').val());
   }

     $('#pname').bind("input change paste",function(event){

setValues();

      });

   
   // $('#pname').change(setValues);
</script>
<script>
$('.custom_data').summernote({
    tabsize: 2,
    height: 300,
});
</script>
@endsection