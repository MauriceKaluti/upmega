@extends('upmega.layouts.main')
@section('content') 
<!-- <div class="py-5"></div> -->
<section id="upmega-home" class="upmega-home">
   <div class="col-md-12 upmega-mobile-hide">
      <img src="{{url('images/assets/promo.avif')}}" class="img-fluid w-100">
   </div>
   <div class="col-md-12">
      <img src="{{url('images/assets/landing.png')}}" class="img-fluid w-100">
   </div>
   <div class="col-md-12 mb-3">
      <img src="{{url('images/assets/catheader.jpg')}}" class="img-fluid w-100">
   </div>
   <!--   <div style="height: 1300px; width: 100%; min-width: 100%;
      background-image: url(images/assets/landing.png);
      background-repeat: no-repeat;
      background-position: top center;
      background-color: #ffffff;  
      background-size: cover;
      "></div> -->
   <?php 
      $cats = App\Models\Category::get();
      ?>
   <div class="container-fluid mb-5">
      <div class="row">
         @forelse($cats as $cat)
         <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-lg upmega-rounded">
               <div class="card-body">
                  <img style="height: 200px; object-fit: cover; min-width: 100%;" src="{{url('images/categories',$cat->image_big)}}" class="img-fluid w-100">
               </div>
            </div>
         </div>
         @empty
         @endforelse
      </div>
   </div>
   <div class="container-fluid mb-5">
      <?php 
         $colors = ["bg-white","bg-light"];
         ?>
      @forelse($cats as $cat)
      <div class="card mb-3 {{$colors[array_rand($colors)]}}">
         <div class="card-body">
            <div class="clearfix">
               <div class="float-start">
                  <h5 class="upmega-bold">{{$cat->name}}</h5>
               </div>
               <div class="float-end">
                  <a href="{{url('category',$cat->slug)}}" class="upmega-bold">View All<i class="fa fa-angle-right"></i></a>
               </div>
            </div>
         </div>
      </div>
      <?php 
         $products = App\Models\Product::where('category_id','=',$cat->id)->get();
         
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
      @empty
      @endforelse
   </div>
</section>
@endsection