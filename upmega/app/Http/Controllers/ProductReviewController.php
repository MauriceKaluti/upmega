<?php

namespace App\Http\Controllers;

use App\Models\ProductReview;
use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;

class ProductReviewController extends Controller
{

           function __construct()
    {
         $this->middleware('permission:review-list|review-create|review-edit|review-delete', ['only' => ['index','store']]);
         $this->middleware('permission:review-create', ['only' => ['create','store']]);
         $this->middleware('permission:review-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:review-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $reviews = ProductReview::paginate(5);



        return view( 'admin.reviews.index', compact( 'reviews' ) );
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

          $this->validate($request, [
               'rating' => 'required',
               'title' => 'required',
               'description' => 'required'

        ]);

    // if ($validator->fails()) {
    //     session()->flash('custom_message', 'Oops! Something went wrong...');
    // } 
        // storing user review details

      // auth()->user()->review()->create($request->all());

        // storing user review details method 2

        ProductReview::create($request->all() + ['user_id'=>auth()->id()]);
        // return redirect()->route('review.store',$request->product_id);

        return back()->with('success','Review Done!');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function show(ProductReview $productReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductReview $productReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductReview $productReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        ProductReview::destroy( $id );

        return back();
    }
}
