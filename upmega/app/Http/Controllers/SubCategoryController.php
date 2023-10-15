<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\Product;
use DB;
use Illuminate\Support\Facades\Input;
use Image;
use Session;
use Illuminate\Http\Response;
use Gloudemans\Shoppingcart\Facades\Cart;
use File; 

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //get all the subcategories

        $subcategories = SubCategory::get();

        $categories = Category::where('status','=',1)->get(); 

        return view( 'subcategory.index', compact( 'subcategories','categories' ) );
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
public function store( Request $request ) {
        //storing categories to database
          $this->validate($request, [
               'name' => 'required',
               'image' => 'required',
               'category_id' => 'required',
               'description' => 'required'

        ]);

    $subcategory = SubCategory::create( $request->all() );
 
       if ( $request->hasFile( 'image' ) ) {
            $image_tmp =$request->image;
            if ( $image_tmp->isValid() ) {
                $extension         = $image_tmp->getClientOriginalExtension();
                $filename          = rand( 111, 9999 ) . '.' . $extension;
                $small_image_path  = 'images/subcategories/' . $filename;
                Image::make( $image_tmp )->save( $small_image_path );
                // $subcategory->image = $filename;
                $subcategory['image'] = $filename;
            }

        }

        $subcategory->save();


        $scid =  $subcategory->id;
    $scname = $subcategory->name;

    // lowercase
    $strr = strtolower($scname);

    // replace non letter or digits by -
    $str = preg_replace('~[^\\pL\d]+~u', '-', $strr);

    // trim

    $str_trim = trim($str, '-');

    $url_slug = preg_replace('~[^-\w]+~', '-', $str_trim);
    
        if (SubCategory::where('slug', '=', $url_slug)->exists()) {

    $url_slug = preg_replace('~[^-\w]+~', '-', $str_trim). '-'. $scid;

        }else{

    $url_slug = preg_replace('~[^-\w]+~', '-', $str_trim);

        }

         SubCategory::where( 'id', '=', $scid)->update(['slug' => $url_slug]);

        return back()->with('success', 'SubCategory Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
              $subcategory = SubCategory::where( 'id', $id )->first(); 
        $categories = Category::where('status','=',1)->get();

        $subcategories = SubCategory::get();

        return view('subcategory.update_subcategory', compact('subcategory','subcategories','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update($id, Request $request)
    {

                  $this->validate($request, [
               'name' => 'required',
               'category_id' => 'required',
               'description' => 'required'

        ]);

        $subcategory = SubCategory::where( 'id', $id )->first(); 

        $subcategories = SubCategory::get();


        if ( $request->hasFile( 'image' ) ) {
            $image_tmp =$request->image;
            if ( $image_tmp->isValid() ) {
                $extension_main         = $image_tmp->getClientOriginalExtension();
                $filename_sc          = rand( 111, 9999 ) . '.' . $extension_main;

                $small_image_path  = 'images/subcategories/' . $filename_sc;
             
                Image::make( $image_tmp )->save( $small_image_path );
                // Storing Image
                SubCategory::where( 'id', '=', $id)->update(['image' => $filename_sc]);
                
            }

        }


         $scid =  $subcategory->id;
    $scname = $subcategory->name;
    // lowercase
    $strr = strtolower($scname);
    // replace non letter or digits by -
    $str = preg_replace('~[^\\pL\d]+~u', '-', $strr);
    // trim
    $str_trim = trim($str, '-');
      // remove unwanted characters
    $url_slug = preg_replace('~[^-\w]+~', '-', $str_trim). '-'. $scid;

         SubCategory::where( 'id', '=', $id)->update(['name' => $request->get('name'), 'description' => $request->get('description'), 'slug' => $url_slug,'category_id'=> $request->get('category_id')]);

        // return view        

        return redirect()->back()->with('success', 'Sub Category Updated!');

    }


      public function subcategoryPage($slug) {
        $subcategory = SubCategory::where( 'slug', $slug )->first();
        $subcatid = $subcategory->id;
        $cartItems = Cart::content();
        $products = Product::where('status','=', 1)->where('sub_category_id', '=', $subcatid)->get(['id','name','image','price','slug']);

        return view( 'front.subcategory', compact( 'products','cartItems', 'subcategory' ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
       public function destroy( $id ) {
        //
        $subcat = SubCategory::where( 'id', $id )->first(); 
   

        SubCategory::destroy( $id );

        return back()->with('error','Sub Category Deleted!!');
    }
}
