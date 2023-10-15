<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\Attribute;
use App\Models\AttributeGroup;
use App\Models\Product;
use App\Models\ProductDesign;
use App\Models\ProductGroup;
use App\Models\ProductsAttribute;
use DB;
use Illuminate\Support\Facades\Input;
use Image;
use Session;
use Illuminate\Http\Response;
use File; 
use Auth;

use Illuminate\Pagination\Paginator;

class CategoryController extends Controller {

           function __construct()
    {
         $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index','store']]);
         $this->middleware('permission:category-create', ['only' => ['create','store']]);
         $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //get all the categories

        $categories = Category::get();

        return view( 'category.index', compact( 'categories' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        //storing categories to database


                $category = Category::create( $request->all() );

        // New Upload Method //

        if ( $request->hasFile( 'image_big' ) ) {

            $image_tmp =$request->image_big;
            if ( $image_tmp->isValid() ) {
                $extension         = $image_tmp->getClientOriginalExtension();
                $filename          = rand( 111, 9999 ) . '.' . $extension;
                $small_image_path  = 'images/categories/' . $filename;

            
                Image::make( $image_tmp )->save( $small_image_path );
                // Storing Image
                // $category->image_big = $filename;
                $category['image_big'] = $filename;
            }
        }


        if ( $request->hasFile( 'image_small' ) ) {
            $image_tmp_small =$request->image_small;
            if ( $image_tmp_small->isValid() ) {
            $extension_small = $image_tmp_small->getClientOriginalExtension();
            $filename_small          = rand( 111, 9999 ) . '.' . $extension_small;
            $small_image_path_small  = 'images/categories/' . $filename_small;

            Image::make( $image_tmp_small )->save( $small_image_path_small );
            // Storing Image
            // $category->image_small = $filename_small;
            $category['image_small'] = $filename_small;
            }
        }

        $category->save();

         $cid =  $category->id;
    $cname = $category->name;
    // lowercase
    $strr = strtolower($cname);
    // replace non letter or digits by -
    $str = preg_replace('~[^\\pL\d]+~u', '-', $strr);
    // trim
    $str_trim = trim($str, '-');
      // remove unwanted characters
      $url_slug = preg_replace('~[^-\w]+~', '-', $str_trim);
    
        if (Category::where('slug', '=', $url_slug)->exists()) {

    $url_slug = preg_replace('~[^-\w]+~', '-', $str_trim). '-'. $cid;

        }else{

    $url_slug = preg_replace('~[^-\w]+~', '-', $str_trim);

        }
         Category::where( 'id', '=', $cid)->update(['slug' => $url_slug]);

        return back()->with('success', 'Category Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {

        $products = Category::find( $id )->products;

        return view( 'category.categories', compact( [ 'categories', 'products' ] ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::latest()->get();
        $category = Category::findOrFail($id);
        return view('category.update_category', compact('categories','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
        public function update(Request $request, $id)
    {
       $this->validate($request, [
               'name' => 'required'

        ]);
        $category = Category::find($id);
        $input = $request->all();

      if ( $request->hasFile( 'image_big' ) ) {

            $image_tmp =$request->image_big;
            if ( $image_tmp->isValid() ) {
                $extension         = $image_tmp->getClientOriginalExtension();
                $filename          = rand( 111, 9999 ) . '.' . $extension;
                $small_image_path  = 'images/categories/' . $filename;
                Image::make( $image_tmp )->save( $small_image_path );
            }
        }else{

            $filename = $category->image_big;
        }


        if ( $request->hasFile( 'image_small' ) ) {
            $image_tmp_small =$request->image_small;
            if ( $image_tmp_small->isValid() ) {
            $extension_small         = $image_tmp_small->getClientOriginalExtension();
            $filename_small          = rand( 111, 9999 ) . '.' . $extension_small;
            $small_image_path_small  = 'images/categories/' . $filename_small;

            Image::make( $image_tmp_small )->save( $small_image_path_small );
            }
        }else{

            $filename_small = $category->image_small;
        }

        $input['image_big'] = $filename;
        $input['image_small'] = $filename_small;

        $slug = \Str::slug($request->name);

        $string = str_replace(array('[\', \']'), '', $slug);
        $string = preg_replace('/\[.*\]/U', '', $string);
        $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
        $string = htmlentities($string, ENT_COMPAT, 'utf-8');
        $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
        $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
        $string = strtolower(trim($string, '-'));

        if (Category::where('slug', '=', $string)->exists()) {
        $category_id = $category->id;
        $slug = preg_replace('~[^-\w]+~', '-', $string). '-'. $category_id;
           
        }else{
            
        $slug = strtolower(trim($string, '-'));

        }

        $input['slug'] = $slug;
             
     

        if (empty($category->user_id)) {
        $input['user_id'] = Auth::user()->id;
        }

        $input['updated_by'] = Auth::user()->id;
        $category->update($input);
        return redirect()->back()
                        ->with('success','Category Updated!');
    }

  public function categoryPage($slug) {
        $category = Category::where( 'slug', $slug )->first();
        $catid = $category->id;
      
         $products = Product::where('status','=', 1)->where('category_id', '=', $catid)->get(['id','name','image','price','slug','price_badge']);
        // $products = Product::where('status','=', 1)->where('category_id', '=', $catid)->get();

        return view( 'front.category', compact( 'products', 'category' ) );
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        Category::find($id)->delete();
        return redirect()->back()->with('success','Category Deleted!');
    }
}
