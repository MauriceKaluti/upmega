<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\User;

use Auth;

use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $cartItems=Cart::content();

        return view('cart',compact('cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

       
    }

        public function addItem($id)
    {
        //Adding Items to Cart
        $product=Product::find($id);
       if (empty($product->price_offer)) {

          $product_price = $product->price;

            }else{

          $product_offer_price = $product->price*($product->price_offer/100);
          $product_price = $product->price - $product_offer_price;

}
        Cart::add($id,$product->name,1,$product_price,array($product->size));


           if (Auth::check()) {
 

    $userid = Auth::user()->id;
        
        $user = User::where('id','=',$userid)->first();
        
        
        $cartItems=Cart::content();
        $cartTotal=Cart::subtotal();
        $cartSubTotal=Cart::total();

        }

        return back()->with('success', 'Product Added To Cart Successfully');
    }


            public function emailPreOrder(Request $request)
    {
 
       $email = $request['email'];
       $name = $request['name'];

 
        
        
        $cartItems=Cart::content();
        $cartTotal=Cart::subtotal();
        $cartSubTotal=Cart::total();
        
            \Mail::send('email/pre_order',
             array(
                 'name' => $name,
                 'cartItems' => $cartItems,
                 'cat_total' => $cartTotal,
                 'cat_sub_total' => $cartSubTotal,
                
             ), function($message) use ($email)
               {
                  $message->from('info@carmeltechnologies.co.ke','carmeltechnologies');
                  $message->subject('New Pre-order');
                  $message->to($email);
                  $message->cc('mauricemakau63@gmail.com');
               }); 





        return back()->with('cart_success', 'Product Added To Basket/Cart Successfully');
    }


            public function fillCart(Request $request)
    {

       $id = $request['product_id'];

        //Adding Items to Cart
        $product=Product::find($id);

          $product_price = $product->price;
        
        Cart::add($id,$product->name,1,$product_price,array($product->size));
        
    }

 public function fillWishList(Request $request){

       $id = $request['product_id'];

        $product=Product::find($id);

        $wishlist = new wishList;

        $wishlist->product_id = $product->id;

        $wishlist->user_id = $product->id;

        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

 
        Cart::update($id,['qty'=> $request->qty]);

         return back();
    }

   public function updateQnty(Request $request)
    {

            $data = $request->all();

            $qnty =$data['qnty'];
            $cartrowid =$data['cartrowid'];

            Cart::update($cartrowid,['qty'=> $qnty]);


    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // removing item from Cart

        Cart::remove($id);

       return back()->with('error', 'Product Removed!');
    }
}
