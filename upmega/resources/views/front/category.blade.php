<?php 
   use App\Models\Category;
   use App\Models\SubCategory;
   use App\Models\Product;
   ?>       
@extends('upmega.layouts.main')
<title>Upmega :: Category - {{$category->name}}</title>
@section('content')
<div class="py-5"></div>


<div class="container-fluid">

@if(!empty($category))
<div class="py-3">
   <p>Filtering sofa results for <span class="upmega-bold upmega-text-secondary">{{$category->name }}</span>  </p>
 
</div>

                  @endif

       <div class="row">
      @forelse($products as $product)
      <?php 
         $hmproductImgPath = "images/products/" . $product->image;
         $hmproductImgPath = $hmproductImgPath;
         $hmproductImgExists = file_exists($hmproductImgPath);
         ?>
       <div class="col-md-4 mb-3">
            <div class="card shadow h-100">
               <img style="height: 250px; width: 100%; object-fit: cover;" @if($hmproductImgExists) data-src="{{url('images/products',$product->image)}}" src="{{url('images/placeholder.png')}}" @else data-src="https://carmeltechnologies.co.ke/upmegastores/images/categories/3567.jpg" src="{{url('images/placeholder.png')}}" @endif class="img-fluid card-img-top mb-2">
               <div class="card-body position-relative">
                  <a href="{{url('/product/'.$product->slug)}}">
                     <h6 class="text-dark mb-3" style="line-height: 1.6; font-size: 16px;"> {{Str::words($product->name, 18, '...')}}</h6>
                     <div class="mb-3">
                        <span><i class="fas fa-couch"></i>{{$product->price_badge}}</span>
                     </div>
                     <h5 class="text-dark upmega-bold">KES. {{number_format($product->price)}}</h5>
                  </a>
               </div>
               <div class="card-footer border-0 bg-transparent px-0">
                  <hr>
                  <div class="upmega-flex container">
                     <a class="btn btn-light fs-5 upmega-round" href="#"><i class="fa fa-whatsapp"></i> </a>
                     <a class="btn btn-light fs-5 upmega-round" href="#"><i class="fa fa-bookmark"></i> </a>
                     <a data-productid="{{$product->id}}" class="btn btn-light fs-5 upmega-round upmega-shop-cart" href="javascript:void(0)"><i class="fa fa-shopping-cart"></i></a>
                  </div>
               </div>
            </div>
         </div>
      @empty
      <span class="badge badge-primary">No Products Available!</span>
      @endforelse
   </div>
  
 
</div>
@endsection