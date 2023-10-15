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
<title>Upmega :: Update Product {{$product->name}} - Admin Dashboard</title>
<div class="container-fluid">
   <div class="py-5"></div>
   <div class="row">
      <div class="col-lg-12">
         <div class="card mb-3 shadow-lg upmega-round">
            <div class="card-body">
                  <div class="row">
         <div class="col-md-3 mb-3">
         <a href="{{route('products.create')}}">
            <div class="card bg-primary upmega-create-card shadow-lg upmega-round">
               <div class="card-body">
                  <div class="card-img-overlay text-white d-flex justify-content-center align-items-center">
                     <i class="fa fa-plus fs-1 text-white"></i>
                  </div>
               </div>
            </div>
         </a>
      </div>
   </div>

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
               <form action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}
                  @method('PUT')
                  <div class="form-body">
                     <h5 class="card-title">Update Product</h5>
                     <hr>
                     <div class="row">
                        <div class="col-md-6 mb-3">
                           <div class="form-group">
                              <label class="control-label">Product Name</label>
                              <input required="" value="{{$product->name}}" name="name" type="text" class="form-control shadow-none" placeholder="Product Name"> 
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <div class="form-group">
                              <label>Price</label>
                                <input value="{{$product->price}}" required="" name="price" type="text" class="form-control shadow-none" placeholder="price" aria-label="price">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <?php 
                           $subcat = SubCategory::where('id','=',$product->sub_category_id)->first();
                           ?>
                        <div class="col-md-6 mb-3">
                           @if(!empty($product->category))
   @if($product->category->status == 1)
                           <span class="badge badge-success bg-success">Active</span>
                           @else
                           <span class="badge badge-warning bg-warning">Switch to Active</span>
                           @endif
                           @else


                           @endif

                        
                     <div class="form-group">
                     <label class="control-label">Select Category</label>
                     <select id="upmega_categories" required="" name="category_id" class="form-control shadow-none">
                     @if(!empty($product->category))
                     <option value="{{$product->category->id}}"> {{$product->category->name}}</option>
                     @else

                     <option></option>
                     @endif

                     @foreach($categories as $category)
                     <option value="{{$category->id}}">{{$category->name}}</option>
                     @endforeach
                     </select>
                     </div>
                        </div>
                   
                     </div>
                     <div class="row">
                        <div class="col-md-6 mb-3">
                           <div class="form-group">
                              <label>Price Badge</label>
                                <input value="{{$product->price_badge}}" required="" name="price_badge" type="text" class="form-control shadow-none" placeholder="E.g Per Unit" aria-label="Price Badge">
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <div class="form-group">
                              <label>Product Main Image </label><br>
                              <div class="btn btn-primary waves-effect waves-light"><span>  Main Image</span><input accept="image/png, image/jpeg" value="{{$product->image}}" name="image" type="file" class="upload"></div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                                <div class="col-md-6 mb-3">
                           <div class="form-group">
                              <label>Product Description</label>
                              <textarea required=""  name="description" class="form-control shadow-none" rows="4">{{$product->description}}</textarea> 
                           </div>
                        </div>
             
                        <div class="col-md-6 mb-3">
                           @if($product->status == 1)
                           <span class="badge badge-success bg-success">Active</span>
                           @else
                           <span class="badge badge-warning bg-warning">Off</span>
                           @endif
                           <div class="form-group">
                              <label>Status</label>
                              <br/>
                              <div class="custom-control custom-radio custom-control-inline">
                                 <input value="1" id="customRadioInline1" type="radio" name="status" class="custom-control-input"  @if($product->status == 1) checked @else  @endif>
                                 <label class="custom-control-label" for="customRadioInline1">Live</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                 <input value="0" id="customRadioInline2" type="radio" name="status" class="custom-control-input"  @if($product->status == 0) checked @else  @endif>
                                 <label class="custom-control-label" for="customRadioInline2">Not Live</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6 mb-3">
                           <div class="form-group">
                              <label>Product Quantity(Min 1)</label>
                              <input value="{{$product->quantity}}" required="" min="1" name="quantity" type="text" class="form-control shadow-none" placeholder="Enter Quantity" aria-label="Product Quantity" aria-describedby="basic-addon2">
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <div class="form-group">
                              <label>Price Offer(% Value)</label>
                               <input value="{{$product->price_offer}}"name="price_offer" type="number" class="form-control shadow-none" placeholder="E.g 12" aria-label="Price Offer">
                           </div>
                        </div>
                     </div>
                                        <div class="col-md-12">
<div class="form-group">
<strong>Product Details:</strong>
<textarea required="" type="text" name="product_details" class="form-control custom_data">{!!$product->product_details!!}</textarea>
</div>
</div>
                     <hr>
                  </div>
                  <div class="form-actions col-md-4 mt-5">
                     <!-- <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button> -->

                     <input onClick="this.form.submit(); this.disabled=true; this.value='Updating Prouct...'; "type="submit" class="btn btn-primary btn-lg upmega-round w-100" value="Update Product">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-12">
         <div class="card mb-3 shadow-lg upmega-round">
            <div class="card-body">
               <h4 class="card-title mb-3">Manage Products</h4>
               <h6 class="card-subtitle mb-3">Use the action column to manage all products </h6>
               <div class="table-responsive">
      <table id="upmegaDisplay" class="row-border stripe" style="width:100%">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Name</th>
                           <th>Action</th>
                           <th>Desc</th>
                           <th>Image</th>
                           <th>Created At</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse($products as $product)
                        <tr>
                           <td>{{$product->id}}</td>
                           <td>{{$product->name}}</td>
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
                           <td>{{Str::words($product->description, 5, '...')}}</td>
                           <td>@if(!empty($product->image))
                              <img height="100" width="100" src="{{url('images/products',$product->image)}}" class="img-thumbnail">
                              @endif
                           </td>
                           <td>{{$product->created_at}}</td>
                        </tr>
                        @empty
                        @endforelse
                     </tbody>
                     <tfoot>
                        <tr>
                           <th>#</th>
                           <th>Name</th>
                           <th>Action</th>
                           <th>Desc</th>
                           <th>Image</th>
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
$('.custom_data').summernote({
    tabsize: 2,
    height: 300,
});
</script>
@endsection