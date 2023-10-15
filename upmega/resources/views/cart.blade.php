@extends('upmega.layouts.main')
@section('content') 
@include('upmega.layouts.data_tables')
<title>Upmega :: Cart</title>
<section>
   <div class="container-fluid">
   <div class="py-5"></div>
   <div class="card shadow-lg upmega-round mb-3">
      <div class="card-body">
         <div class="table-responsive">
            <table id="upmegaDisplay" class="row-border stripe" style="width:100%">
               <thead>
                  <tr>
                     <th>Product</th>
                     <th>Price</th>
                     <th>Quantity</th>
                     <th>Total</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @forelse($cartItems as $cartItem)
                  <?php 
                     $cartProduct = App\Models\Product::where('name', '=', $cartItem->name)->first();
                      ?>
                  @if(empty($cartProduct))
                  @else
                  <?php 
                     $prod_name = $cartItem->name;
                      $prod_id = App\Models\Product::where( 'name', '=', $prod_name )->first();
                      $id=$prod_id->id;
                      $prod = App\Models\Product::where( 'id', '=', $id )->first();
                      ?>
                  <tr class="cart-row">
                     <td>
                        <img style="width: 100px;" class="img-thumbnail" src="{{url('images/products',$prod->image)}}" alt="">
                        <div>
                           <h6 class="mobile-font">{{Str::words($cartItem->name, 20, '...')}}</h6>
                        </div>
                     </td>
                     <td>Ksh {{ $cartItem->price }}</td>
                     <td>
                        {{$cartItem->qty}}
                     </td>
                     <td>Ksh. {{ $cartItem->price * $cartItem->qty}}</td>
                     <td>
                        <form action="{{route('cart.destroy',$cartItem->rowId)}}" method="POST">
                           {{csrf_field()}}
                           {{method_field('DELETE')}}
                           <input type="hidden" name="product_id" id="product_id" value="{{ $cartItem->id }}">
                           <button style="color: red; background-color: transparent; border-color: none; border-style: none;" type="submit"><i class="fa fa-trash"></i></button>
                        </form>
                     </td>
                  </tr>
                  @endif
                  @empty
                  <tr>
                     <td>
                        <p>No Products. Kindly <a class="text-warning" href="{{url('/shop')}}"> Shop Now <i class="fa fa-shopping-cart"></i></a> To Fill Your Shopping Cart/Basket</p>
                     </td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>
                  @endforelse
               </tbody>
            </table>
         </div>
         <div class="text-center mt-3">
            <h6>Cart Summation</h6>
            <ul class="list-unstyled">
               <li>Total <span>Ksh. {{Cart::subtotal()}}</span></li>
            </ul>
            <?php 
               // $data = json_decode('[{"id":49},{"id":61},{"id":5},{"id":58}]', true);
               $items = collect($cartItems)->pluck('name')->implode(', ');
               // dd($items); die();
               ?>
            @if(!empty($items))
            <div class="col-md-4 offset-md-4">
               <a target="_blank" href="https://wa.me/254700422699?text=Hello%20upmega%20furniture,%20I'm%20interested%20in%20purchasing%20the%20following%20products+{{$items}}" class="btn btn-primary btn-lg upmega-round mb-3 w-100"><i class="fa fa-phone"></i> Whatsapp Checkout</a>
               <a href="{{url('shop')}}" class="btn btn-secondary btn-lg upmega-round w-100"><i class="fa fa-shopping-cart"></i> Complete Order</a>
            </div>
            @else
            <div class="col-md-4 offset-md-4">
               <a href="{{url('shop')}}" class="btn btn-primary btn-lg upmega-round w-100"><i class="fa fa-shopping-cart"></i> Start Shopping</a>
            </div>
            @endif
         </div>
      </div>
   </div>
</div>
</section>
@endsection