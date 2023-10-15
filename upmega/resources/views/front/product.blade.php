<?php
   use App\Models\Category;
   use App\Models\Product;
   ?>  
@extends('upmega.layouts.main')
<title>Upmega @if(!empty($product))  :: {{$product->name }} 
   @endif
</title>
@section('content')
<link rel="stylesheet" type="text/css" href="https://raw.githubusercontent.com/bbbootstrap/libraries/main/xzoom.css" media="all" />
<style>
   .fill_cart_loading{
   display: none;
   }
   .upmega-rating {
   display: inline-block;
   position: relative;
   height: 50px;
   line-height: 50px;
   font-size: 50px;
   }
   .upmega-rating label {
   position: absolute;
   top: 0;
   left: 0;
   height: 100%;
   cursor: pointer;
   }
   .upmega-rating label:last-child {
   position: static;
   }
   .upmega-rating label:nth-child(1) {
   z-index: 5;
   }
   .upmega-rating label:nth-child(2) {
   z-index: 4;
   }
   .upmega-rating label:nth-child(3) {
   z-index: 3;
   }
   .upmega-rating label:nth-child(4) {
   z-index: 2;
   }
   .upmega-rating label:nth-child(5) {
   z-index: 1;
   }
   .upmega-rating label input {
   position: absolute;
   top: 0;
   left: 0;
   opacity: 0;
   }
   .upmega-rating label .upmega-rating-icon {
   float: left;
   color: transparent;
   }
   .upmega-rating label:last-child .upmega-rating-icon {
   color: #000;
   }
   .upmega-rating:not(:hover) label input:checked ~ .upmega-rating-icon,
   .upmega-rating:hover label:hover input ~ .upmega-rating-icon {
   color: #09f;
   }
   .upmega-rating label input:focus:not(:checked) ~ .upmega-rating-icon:last-child {
   color: #000;
   text-shadow: 0 0 5px #09f;
   }  
</style>
<?php
   if (empty($product->price_offer)) {
       $product_price = $product->price;
   } else {
       $product_offer_price = ($product->price_offer / 100) * $product->price;
   
       // $product_offer_price = $product->price*($product->price_offer/100);
       $product_offer_price = $product->price + $product_offer_price;
   }
   
   $idd = $product->category_id;
   $showC = Category::where("id", $idd)->first();
   ?>
<div class="py-5"></div>
<div class="container mb-3">
   <div class="row mb-3">
      <div class="col-md-12 pr-2 mb-3">
         <div class="row">
            <div class="large-5 column">
               <div class="xzoom-container">
                  <img style="height: 480px; object-fit: cover;" class="xzoom w-100" id="xzoom-default" src="{{url('images/placeholder.png')}}" data-src="{{url('images/products',$product->image)}}" xoriginal="{{url('images/products',$product->image)}}"/>
                  <div class="xzoom-thumbs"> 
                     <a href="{{url('images/products',$product->image)}}"><img class="xzoom-gallery" width="80" src="{{url('images/placeholder.png')}}" data-src="{{url('images/products',$product->image)}}"></a>
                     <?php $product_images = App\Models\ProductImage::where(
                        "product_id",
                        "=",
                        $product->id
                        )->get(); ?>
                     @forelse($product_images as $product_image)
                     <a href="{{url('images/productimages',$product_image->image)}}"><img class="xzoom-gallery" height="80" width="80" src="{{url('images/productimages',$product_image->image)}}"></a>
                     @empty
                     @endforelse
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <p><span class="badge badge-primary bg-warning upmega-round"> {{  $showC->name }}</span></p>
            <h3 class="mb-3">{{  $product->name }}</h3>
         </div>
         <div class="col-md-6">
            @if(!empty($product->price_offer)) 
            <h1><span class="badge badge-primary bg-primary upmega-round">On Sale {{$product->price_offer}}%</span></h1>
            @else  @endif
            <h1 class="upmega-bold">Ksh {{ number_format($product->price) }} @if(!empty($product->price_offer)) <del>Ksh {{ number_format($product_offer_price) }}</del>@else  @endif</h1>
            <p>{{  $product->description }}</p>
            <?php $pname = $product->name; ?>
                     <a data-productid="{{$product->id}}" class="btn btn-primary btn-lg w-100 upmega-round upmega-shop-cart mb-3" href="javascript:void(0)"><i class="fa fa-shopping-cart"></i>Add to Basket</a>
            <a target="_blank" href="https://wa.me/254700422699?text=I'm%20interested%20in%20purchasing%20one%20of%20your%20products+{{$pname}}" class="btn btn-primary border-0 btn-lg upmega-round mobile-font w-100"><i class="fa fa-whatsapp"></i> Whatsapp Checkout</a>
         </div>
      </div>
   </div>
</div>
<div class="container mb-3">
  <div class="card upmega-round shadow-lg">
     <div class="card-body">
         <h3 class="upmega-bold">Specifications</h3>
   <div class="mb-3">{!!  $product->product_details !!}</div>
     </div>
  </div>
</div>

<div class="container"> 
   <h3 class="upmega-bold">Related Products</h3>
      
<?php 
$products = App\Models\Product::where('category_id','=',$product->category_id)->get();
 ?>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.js" integrity="sha512-qRj8N7fxOHxPkKjnQ9EJgLJ8Ng1OK7seBn1uk8wkqaXpa7OA13LO6txQ7+ajZonyc9Ts4K/ugXljevkFTUGBcw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/xzoom.min.js"></script>
<script>
   (function ($) {
   $(document).ready(function() {
   $('.xzoom, .xzoom-gallery').xzoom({zoomWidth: 400, title: true, tint: '#333', Xoffset: 15});
   $('.xzoom2, .xzoom-gallery2').xzoom({position: '#xzoom2-id', tint: '#ffa200'});
   $('.xzoom3, .xzoom-gallery3').xzoom({position: 'lens', lensShape: 'circle', sourceClass: 'xzoom-hidden'});
   $('.xzoom4, .xzoom-gallery4').xzoom({tint: '#006699', Xoffset: 15});
   $('.xzoom5, .xzoom-gallery5').xzoom({tint: '#006699', Xoffset: 15});
   
   //Integration with hammer.js
   var isTouchSupported = 'ontouchstart' in window;
   
   if (isTouchSupported) {
   //If touch device
   $('.xzoom, .xzoom2, .xzoom3, .xzoom4, .xzoom5').each(function(){
   var xzoom = $(this).data('xzoom');
   xzoom.eventunbind();
   });
   
   $('.xzoom, .xzoom2, .xzoom3').each(function() {
   var xzoom = $(this).data('xzoom');
   $(this).hammer().on("tap", function(event) {
   event.pageX = event.gesture.center.pageX;
   event.pageY = event.gesture.center.pageY;
   var s = 1, ls;
   
   xzoom.eventmove = function(element) {
   element.hammer().on('drag', function(event) {
   event.pageX = event.gesture.center.pageX;
   event.pageY = event.gesture.center.pageY;
   xzoom.movezoom(event);
   event.gesture.preventDefault();
   });
   }
   
   xzoom.eventleave = function(element) {
   element.hammer().on('tap', function(event) {
   xzoom.closezoom();
   });
   }
   xzoom.openzoom(event);
   });
   });
   
   $('.xzoom4').each(function() {
   var xzoom = $(this).data('xzoom');
   $(this).hammer().on("tap", function(event) {
   event.pageX = event.gesture.center.pageX;
   event.pageY = event.gesture.center.pageY;
   var s = 1, ls;
   
   xzoom.eventmove = function(element) {
   element.hammer().on('drag', function(event) {
   event.pageX = event.gesture.center.pageX;
   event.pageY = event.gesture.center.pageY;
   xzoom.movezoom(event);
   event.gesture.preventDefault();
   });
   }
   
   var counter = 0;
   xzoom.eventclick = function(element) {
   element.hammer().on('tap', function() {
   counter++;
   if (counter == 1) setTimeout(openfancy,300);
   event.gesture.preventDefault();
   });
   }
   
   function openfancy() {
   if (counter == 2) {
   xzoom.closezoom();
   $.fancybox.open(xzoom.gallery().cgallery);
   } else {
   xzoom.closezoom();
   }
   counter = 0;
   }
   xzoom.openzoom(event);
   });
   });
   
   $('.xzoom5').each(function() {
   var xzoom = $(this).data('xzoom');
   $(this).hammer().on("tap", function(event) {
   event.pageX = event.gesture.center.pageX;
   event.pageY = event.gesture.center.pageY;
   var s = 1, ls;
   
   xzoom.eventmove = function(element) {
   element.hammer().on('drag', function(event) {
   event.pageX = event.gesture.center.pageX;
   event.pageY = event.gesture.center.pageY;
   xzoom.movezoom(event);
   event.gesture.preventDefault();
   });
   }
   
   var counter = 0;
   xzoom.eventclick = function(element) {
   element.hammer().on('tap', function() {
   counter++;
   if (counter == 1) setTimeout(openmagnific,300);
   event.gesture.preventDefault();
   });
   }
   
   function openmagnific() {
   if (counter == 2) {
   xzoom.closezoom();
   var gallery = xzoom.gallery().cgallery;
   var i, images = new Array();
   for (i in gallery) {
   images[i] = {src: gallery[i]};
   }
   $.magnificPopup.open({items: images, type:'image', gallery: {enabled: true}});
   } else {
   xzoom.closezoom();
   }
   counter = 0;
   }
   xzoom.openzoom(event);
   });
   });
   
   } else {
   //If not touch device
   
   //Integration with fancybox plugin
   $('#xzoom-fancy').bind('click', function(event) {
   var xzoom = $(this).data('xzoom');
   xzoom.closezoom();
   $.fancybox.open(xzoom.gallery().cgallery, {padding: 0, helpers: {overlay: {locked: false}}});
   event.preventDefault();
   });
   
   //Integration with magnific popup plugin
   $('#xzoom-magnific').bind('click', function(event) {
   var xzoom = $(this).data('xzoom');
   xzoom.closezoom();
   var gallery = xzoom.gallery().cgallery;
   var i, images = new Array();
   for (i in gallery) {
   images[i] = {src: gallery[i]};
   }
   $.magnificPopup.open({items: images, type:'image', gallery: {enabled: true}});
   event.preventDefault();
   });
   }
   });
   })(jQuery);
</script>
<script>
   $(':radio').change(function() {
   // alert('New star rating: ' + this.value);
   });
</script>
 
@endsection