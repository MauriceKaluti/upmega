<?php 
   use App\Models\Category;
   use App\Models\SubCategory;
   use App\Models\Product;
   ?>       
@extends('yetu.layouts.main')
<title>Yetu :: SubCategory - {{$subcategory->name}}</title>
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('system/ckslider.min.css')}}" />
<div class="py-3"></div>
  

<div class="container-fluid mb-3">
   <div class="card bg-primary">
      <div class="card-body">
         <div class="clearfix">
            <div class="float-start">
               <h5 class="yetu-bold text-white">@if(!empty($subcategory)) {{$subcategory->name }} @else
                  @endif</h5>
            </div>
            <div class="float-end">
               <a href="{{url('/yetushop')}}" class="text-dark yetu-bold text-white">See All <i class="fa fa-angle-right"></i></a>
            </div>
         </div>
      </div>
   </div>
   <div class="ck-intro-slider">
      <div class="app-ck-slider yetu-slider-arrow ckslider-carousel ckslider-theme">
         @foreach($products as $product)
         <?php 
            $hmproductImgPath = "images/products/" . $product->image;
            $hmproductImgPath = $hmproductImgPath;
            $hmproductImgExists = file_exists($hmproductImgPath);
            ?>
         <div class="app-ck-slider-item item">
               <div class="card shadow-lg h-100">
                  <div class="card-body position-relative">
                       <div class="position-absolute top-30" style="left: 20px; top: 6px;"> 
                        <button class="btn btn-primary" type="button"><i class="fa fa-bookmark"></i></button>
                     </div>
                     
                     @if(!empty($product->price_offer)) 
                     <div class="position-absolute top-30" style="right: 20px; top: 6px;"> 
                        <span class="badge badge-danger bg-danger yetu-round" style="font-size: .8rem!important;">On Offer -{{$product->price_offer}}%</span>
                     </div>
                     @else
                     @endif
            <a href="{{url('product',$product->slug)}}">
                     <img style="height: 200px; object-fit: contain;" @if($hmproductImgExists) src="{{url('images/placeholder.png')}}" data-src="{{url('images/products',$product->image)}}" @else src="{{url('images/placeholder.png')}}" @endif class="img-fluid mb-2">
                     <h6 class="text-primary"> {{Str::words($product->name, 10, '...')}}</h6>
                     <h6 class="yetu-bold text-dark">KES. {{ number_format($product->price) }} </h6>
                     <h6 class="yetu-bold text-dark"><small>@if(!empty($product->price_offer)) Was <del>KES. {{ number_format(($product->price + $product->price_offer/100 * $product->price)) }}</del>@else  @endif</small></h6>
            </a>
                     <!-- <div class="py-3"></div> -->
                     <div class="row position-absolute bottom-20 w-100" style="bottom:20px;">
                        <div class="col-md-6 col-6">
            <a class="btn btn-primary mobile-font w-100" target="_blank" href="https://wa.me/254710877562?text=I'm%20interested%20in%20purchasing%20one%20of%20your%20products+{{$product->name}}"><i class="fa fa-phone"></i> Buy</a>
            </div>
            <div class="col-md-6 col-6">
            <a data-productid="{{$product->id}}" class="yetu-cart-btn btn btn-warning w-100 yetu-shop-cart mobile-font shadow-none"><i  class="fa fa-shopping-cart"></i> Add to Cart</a>
            </div>
            </div>
            </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</div>

<div class="container-fluid">
   <h5 class="yetu-bold">Related Products <span class="badge badge-primary bg-warning yetu-round">{{ $subcategory->category ? $subcategory->category->name : '' }}</span></h5>
   <?php 
      $catsubCats = App\Models\SubCategory::where('category_id','=',$subcategory->category_id)->orderBy(DB::raw('RAND()'))->take(10)->get();
      $colors = ["bg-primary","yetu-bg-primary","bg-warning","bg-primary","yetu-bg-primary","bg-warning","bg-primary","yetu-bg-primary","bg-warning","bg-primary","yetu-bg-primary","bg-warning"];
      ?>
   @forelse($catsubCats as $catsubCat)
   <?php 
      $catsubCatProducts = App\Models\Product::where('sub_category_id','=',$catsubCat->id)->orderBy(DB::raw("RAND()"))->take(8)->get(['id','name','image','price','slug']);
      ?>
   @if(count($catsubCatProducts) > 0)
   <div class="card {{$colors[array_rand($colors)]}}">
      <div class="card-body">
         <div class="clearfix">
            <div class="float-start">
               <h5 class="yetu-bold text-white">{{$catsubCat->name}}</h5>
            </div>
            <div class="float-end">
               <a href="{{url('subcategory',$catsubCat->slug)}}" class="text-dark yetu-bold text-white">See All <i class="fa fa-angle-right"></i></a>
            </div>
         </div>
      </div>
   </div>
   <div class="ck-intro-slider">
      <div class="app-ck-slider yetu-slider-arrow ckslider-carousel ckslider-theme">
         @foreach($catsubCatProducts as $catsubCatProduct)
         <?php 
            $hmcproductImgPath = "images/products/" . $catsubCatProduct->image;
            $hmcproductImgPath = $hmcproductImgPath;
            $hmcproductImgExists = file_exists($hmcproductImgPath);
            ?>
         <div class="app-ck-slider-item item">
               <div class="card shadow-lg h-100">
                  <div class="card-body position-relative">
                       <div class="position-absolute top-30" style="left: 20px; top: 6px;"> 
                        <button class="btn btn-primary" type="button"><i class="fa fa-bookmark"></i></button>
                     </div>
                     @if(!empty($catsubCateProduct->price_offer)) 
                     <div class="position-absolute top-30" style="right: 20px; top: 6px;"> 
                        <span class="badge badge-danger bg-danger yetu-round" style="font-size: .8rem!important;">On Offer -{{$catsubCateProduct->price_offer}}%</span>
                     </div>
                     @else
                     @endif
            <a href="{{url('product',$catsubCatProduct->slug)}}">
                     <img style="height: 200px; object-fit: contain;" @if($hmcproductImgExists) data-src="{{url('images/products',$catsubCatProduct->image)}}" src="{{url('images/placeholder.png')}}" @else src="{{url('images/placeholder.png')}}" @endif class="img-fluid mb-2">
                     <h6 class="text-primary"> {{Str::words($catsubCatProduct->name, 10, '...')}}</h6>
                     <h6 class="yetu-bold text-dark">KES. {{number_format($catsubCatProduct->price)}}</h6>
            </a>
                     <!-- <div class="py-3"></div> -->
                     <div class="row position-absolute bottom-20 w-100" style="bottom:20px;">
                        <div class="col-md-6 col-6">
            <a class="btn btn-primary mobile-font w-100" target="_blank" href="https://wa.me/254710877562?text=I'm%20interested%20in%20purchasing%20one%20of%20your%20products+{{$catsubCatProduct->name}}"><i class="fa fa-phone"></i> Buy</a>
            </div>
            <div class="col-md-6 col-6">
            <a data-productid="{{$catsubCatProduct->id}}" class="yetu-cart-btn btn btn-warning w-100 yetu-shop-cart mobile-font shadow-none"><i  class="fa fa-shopping-cart"></i> Add to Cart</a>
            </div>
            </div>
            </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
   @else
   @endif
   @empty
   @endforelse
</div>

<script src="{{asset('system/ckslider.min.js')}}"></script>
@include('yetu.layouts.cksettings')
@endsection