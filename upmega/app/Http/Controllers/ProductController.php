<?php
namespace App\Http\Controllers;
use App\Models\Attribute;
use App\Models\AttributeGroup;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductImageAlt;
use App\Models\CategoryImage;
use App\Models\CategoryImageAlt;
use App\Models\ProductDesign;
use App\Models\ProductGroup;
use App\Models\ProductsAttribute;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;
use Session;
use Illuminate\Http\Response;
use Gloudemans\Shoppingcart\Facades\Cart;
use File; 

class ProductController extends Controller {

           function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','store']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        //Displaying all products

           $products = Product::latest()->get(['id','name','image','price','slug']);
         // $products = Product::latest()->get();
        $subcategories = SubCategory::get();

        $categories = Category::get();

        return view( 'product.index', compact( [ 'categories','subcategories','products'] ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //

         $products = Product::latest()->get(['id','name','image','price','slug']);
         // $products = Product::latest()->get();
        

        $subcategories = SubCategory::where('status','=',1)->get(); 
        $categories = Category::where('status','=',1)->get(); 

 return view( 'product.create', compact('categories','products','subcategories') );



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {

        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'product_details' => 'required',
            'image' => 'required'
        ]);
     
 
        // Storing data
        $product = Product::create( $request->all() );

        // New Upload Method //

        if ( $request->hasFile( 'image' ) ) {
            $image_tmp =$request->image;
            if ( $image_tmp->isValid() ) {
                $extension         = $image_tmp->getClientOriginalExtension();
                $filename          = rand( 111, 9999 ) . '.' . $extension;
                $small_image_path  = 'images/products/' . $filename;
                Image::make( $image_tmp )->save( $small_image_path );
                // $product->image = $filename;
                $product['image'] = $filename;
            }

        }
 

        $product->save();

    $pid =  $product->id;
    $pname = $product->name;

    // lowercase
    $strr = strtolower($pname);

    // replace non letter or digits by -
    $str = preg_replace('~[^\\pL\d]+~u', '-', $strr);

    // trim

    $str_trim = trim($str, '-');

         $url_slug = preg_replace('~[^-\w]+~', '-', $str_trim);
    
        if (Product::where('slug', '=', $url_slug)->exists()) {

    $url_slug = preg_replace('~[^-\w]+~', '-', $str_trim). '-'. $pid;

        }else{

    $url_slug = preg_replace('~[^-\w]+~', '-', $str_trim);

        }
         Product::where( 'id', '=', $pid)->update(['slug' => $url_slug]);
 
        // redirect to another page


        return back()->with('success', 'Product Added!');

    }



    
    // add exta product images

        public function addProductImages($id, Request $request)
    {

        $product = Product::where( 'id', $id )->first(); 
 
        $showproductimages = ProductImage::where( 'product_id', $id )->get();


        // return view        

        return view( 'product.add_product_images', compact('product','showproductimages') );

    } 
    // add exta product alt images

        public function addProductImagesAlt($id, Request $request)
    {

        $product = Product::where( 'id', $id )->first(); 
 
        $showproductimages = ProductImageAlt::where( 'product_id', $id )->get();


        // return view        

        return view( 'product.add_product_images_alt', compact('product','showproductimages') );

    } 

    public function storeProductImages(Request $request){


        $this->validate($request, [
            'image' => 'required'
        ]);


        if ($request->isMethod('post')) {
            
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

                // New Upload Method //

         if ( $request->hasFile( 'image' ) ) {

            // new main upload method 

              $files = $request->file('image');

                foreach($files as $file){
                $productimages = new ProductImage;
                $extension = $file->getClientOriginalExtension();
                $filename = rand( 111, 9999 ) . '.' . $extension;

                $small_image_path  = 'images/productimages/' . $filename;

                Image::make( $file )->save( $small_image_path );
                
                $productimages->image = $filename;

                $productimages->product_id = $data['product_id'];

                $productimages->save();
            }


        }

            // return back();

             return redirect()->back()->with('success', 'Product Main Plus Images Created!'); 

        }
    }


      public function storeProductImagesAlt($id=null, Request $request){


        if ($request->isMethod('post')) {
            
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

                // New Upload Method //

    if ( $request->hasFile( 'image_alt' ) ) {

            // new main upload method 

              $files_alt = $request->file('image_alt');

                foreach($files_alt as $file_alt){
                $productimages_alt = new ProductImageAlt;
                $extension_alt = $file_alt->getClientOriginalExtension();
                $filename_alt = rand( 111, 9999 ) . '.' . $extension_alt;

                $large_image_path_alt  = 'images/productplusimages/large/' . $filename_alt;
                $medium_image_path_alt = 'images/productplusimages/medium/' . $filename_alt;
                $small_image_path_alt  = 'images/productplusimages/small/' . $filename_alt;

                // Resize Imgs
                Image::make( $file_alt )->save( $large_image_path_alt );
                Image::make( $file_alt )->save( $medium_image_path_alt );
                Image::make( $file_alt )->save( $small_image_path_alt );
                // Storing Image
                
                $productimages_alt->image_alt = $filename_alt;

                $productimages_alt->product_id = $data['product_id'];

                $productimages_alt->save();
            }


        }

            // return back();

             return redirect()->back()->with('success', 'Product Alt Plus Images Created!'); 

        }
    }


     // add extra cat images

    public function addCategoryImages($id, Request $request)
    {

        $category = Category::where( 'id', $id )->first(); 
 
        $showcategoryimages = CategoryImage::where( 'category_id', $id )->get();


        // return view        

        return view( 'admin.category.add_category_images', compact('category','showcategoryimages') );

    } 

        public function addCategoryImagesAlt($id, Request $request)
    {

      $category = Category::where( 'id', $id )->first(); 
 
        $showcategoryimages  = CategoryImageAlt::where( 'category_id', $id )->get();


        // return view        

        return view( 'admin.category.add_category_images_alt', compact('category','showcategoryimages') );

    } 


        public function storeCategoryImages($id=null, Request $request){


        if ($request->isMethod('post')) {
            
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

                // New Upload Method //

         if ( $request->hasFile( 'image_big' ) ) {

            // new main upload method 

              $files = $request->file('image_big');

                foreach($files as $file){
                $categoryimages = new CategoryImage;
                $extension = $file->getClientOriginalExtension();
                $filename = rand( 111, 9999 ) . '.' . $extension;

                $large_image_path  = 'images/categoryplusimages/large/' . $filename;
                $medium_image_path = 'images/categoryplusimages/medium/' . $filename;
                $small_image_path  = 'images/categoryplusimages/small/' . $filename;

                // Resize Imgs
                Image::make( $file )->save( $large_image_path );
                Image::make( $file )->save( $medium_image_path );
                Image::make( $file )->save( $small_image_path );
                // Storing Image
                
                $categoryimages->image_big = $filename;

                $categoryimages->category_id = $data['category_id'];

                $categoryimages->save();
            }


        }

            // return back();

             return redirect()->back()->with('success', 'Category Main Plus Images Created!'); 

        }
    }


      public function storeCategoryImagesAlt($id=null, Request $request){


        if ($request->isMethod('post')) {
            
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

                // New Upload Method //

    if ( $request->hasFile( 'image_small' ) ) {

            // new main upload method 

              $files_alt = $request->file('image_small');

                foreach($files_alt as $file_alt){
                $categoryimages_alt = new CategoryImageAlt;
                $extension_alt = $file_alt->getClientOriginalExtension();
                $filename_alt = rand( 111, 9999 ) . '.' . $extension_alt;

                $large_image_path_alt  = 'images/categoryplusimages/large/' . $filename_alt;
                $medium_image_path_alt = 'images/categoryplusimages/medium/' . $filename_alt;
                $small_image_path_alt  = 'images/categoryplusimages/small/' . $filename_alt;

                // Resize Imgs
                Image::make( $file_alt )->save( $large_image_path_alt );
                Image::make( $file_alt )->save( $medium_image_path_alt );
                Image::make( $file_alt )->save( $small_image_path_alt );
                // Storing Image
                
                $categoryimages_alt->image_small = $filename_alt;

                $categoryimages_alt->category_id = $data['category_id'];

                $categoryimages_alt->save();
            }

        }

            // return back();

             return redirect()->back()->with('success', 'Category Alt Plus Images Created!'); 

        }
    }

    public function catPage($id){

          $category = Category::where( 'id', $id )->first(); 

        $categories = Category::get();

        return view('admin.category.update_category', compact('category','categories'));

    }

       public function subCatPage($id){

          $subcategory = SubCategory::where( 'id', $id )->first(); 
        $categories = Category::where('status','=',1)->get();

        $subcategories = SubCategory::get();

        return view('admin.subcategory.update_subcategory', compact('subcategory','subcategories','categories'));

    }

        public function edit($id){

          $product = Product::where( 'id', $id )->first(); 
          $subacatid = $product->sub_category_id;
          $catid = $product->category_id;
        $products = Product::latest()->get(['id','name','image','price','slug']);
         // $products = Product::latest()->get();
        $subcategories = SubCategory::where('id','!=',$subacatid)->where('status','=',1)->get(); 
        $categories = Category::where('id','!=',$catid)->where('status','=',1)->get(); 

        return view('product.update_product', compact('product','categories','subcategories','products'));

    }


    public function updateCategory($id, Request $request)
    {

        $category = Category::where( 'id', $id )->first(); 

        $categories = Category::get();


         if ( $request->hasFile( 'image_big' ) ) {

            $image_tmp =$request->image_big;
            if ( $image_tmp->isValid() ) {
                $extension         = $image_tmp->getClientOriginalExtension();
                $filename_cat = rand( 111, 9999 ) . '.' . $extension;
                $large_image_path  = 'images/categoryimages/large/' . $filename_cat;
                $medium_image_path = 'images/categoryimages/medium/' . $filename_cat;               
                $small_image_path  = 'images/categoryimages/small/' . $filename_cat;

                // Resize Imgs
                Image::make( $image_tmp )->save( $large_image_path );
                Image::make( $image_tmp )->save( $medium_image_path );
                Image::make( $image_tmp )->save( $small_image_path );
                // Storing Image
                // $category->image_big = $filename_cat;
                // $category['image_big'] = $filename_cat;

                Category::where( 'id', '=', $id)->update(['image_big' => $filename_cat]);
            }

        }


          if ( $request->hasFile( 'image_small' ) ) {

            $image_tmp_small =$request->image_small;
            
            if ( $image_tmp_small->isValid() ) {
                $extension_small         = $image_tmp_small->getClientOriginalExtension();
                $filename_small          = rand( 111, 9999 ) . '.' . $extension_small;
                $large_image_path_small  = 'images/categoryimages/large/' . $filename_small;
                $medium_image_path_small = 'images/categoryimages/medium/' . $filename_small;
                $small_image_path_small  = 'images/categoryimages/small/' . $filename_small;

                // Resize Imgs
                Image::make( $image_tmp_small )->save( $large_image_path_small );
                Image::make( $image_tmp_small )->save( $medium_image_path_small );
                Image::make( $image_tmp_small )->save( $small_image_path_small );
                // Storing Image
                // $category->image_small = $filename_small;
                // $category['image_small'] = $filename_small;

                Category::where( 'id', '=', $id)->update(['image_small' => $filename_small]);
            }

        }


    $cid =  $category->id;
    $cname = $category->name;
    // lowercase
    $strr = strtolower($cname);
    // replace non letter or digits by -
    $str = preg_replace('~[^\\pL\d]+~u', '-', $strr);
    // trim
    $str_trim = trim($str, '-');
      // remove unwanted characters
    $url_slug = preg_replace('~[^-\w]+~', '-', $str_trim). '-'. $cid;

         Category::where( 'id', '=', $id)->update(['name' => $request->get('name'), 'description' => $request->get('description'), 'slug' => $url_slug]);

        // return view        

        return redirect()->back()->with('success', 'Category Updated!');

    }


    public function updateSubCategory($id, Request $request)
    {

        $subcategory = SubCategory::where( 'id', $id )->first(); 

        $subcategories = SubCategory::get();


         $scid =  $subcategory->id;
    $scname = $subcategory->name;

    // lowercase
    $strr = strtolower($scname);

    // replace non letter or digits by -
    $str = preg_replace('~[^\\pL\d]+~u', '-', $strr);

    // trim

    $str_trim = trim($str, '-');

      // remove unwanted characters
    $url_slug = preg_replace('~[^-\w]+~', '-', $str_trim);

        if (SubCategory::where('slug', '=', $url_slug)->exists()) {

    $url_slug = preg_replace('~[^-\w]+~', '-', $str_trim). '-'. $scid;

        }else{

    $url_slug = preg_replace('~[^-\w]+~', '-', $str_trim);

        }

         SubCategory::where( 'id', '=', $id)->update(['name' => $request->get('name'), 'description' => $request->get('description'), 'slug' => $url_slug]);

        // return view        

        return redirect()->back()->with('success', 'Sub Category Updated!');

    }
 
        public function update($id, Request $request)
    {

               $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'product_details' => 'required'
        ]);

        $product = Product::where( 'id', $id )->first(); 

        $products = Product::get();


        if ( $request->hasFile( 'image' ) ) {
            $image_tmp =$request->image;
            if ( $image_tmp->isValid() ) {
                $extension_main         = $image_tmp->getClientOriginalExtension();
                $filename_product          = rand( 111, 9999 ) . '.' . $extension_main;

                $small_image_path  = 'images/products/' . $filename_product;
             
                Image::make( $image_tmp )->save( $small_image_path );
                // Storing Image
                Product::where( 'id', '=', $id)->update(['image' => $filename_product]);
                
            }

        }
 
   $pid =  $product->id;
    $pname = $product->name;

    // lowercase
    $strr = strtolower($pname);

    // replace non letter or digits by -
    $str = preg_replace('~[^\\pL\d]+~u', '-', $strr);

    // trim

    $str_trim = trim($str, '-');

      // remove unwanted characters
    $url_slug = preg_replace('~[^-\w]+~', '-', $str_trim);

        if (Product::where('slug', '=', $url_slug)->exists()) {

    $url_slug = preg_replace('~[^-\w]+~', '-', $str_trim). '-'. $pid;

        }else{

    $url_slug = preg_replace('~[^-\w]+~', '-', $str_trim);

        }

        Product::where( 'id', '=', $id)->update(['name' => $request->get('name'),'category_id' => $request->get('category_id'),'price' => $request->get('price'),'status' => $request->get('status'),'quantity' => $request->get('quantity'),'description' => $request->get('description'),'product_details' => $request->get('product_details'),'price_badge' => $request->get('price_badge'),'price_offer' => $request->get('price_offer'),'slug'=>$url_slug]);

        return redirect()->back()->with('success', 'Product Info Updated!');
    }

        public function deleteProductImage ($id=null){

        $deleteProductImage = ProductImage::where('id', '=', $id)->firstOrFail();
        $deleteProductImage->delete();
        return redirect()->back()->with('success', 'Product Main Plus Images Deleted!');

    }

     public function deleteProductImageAlt ($id=null){

        $deleteProductImageAlt = ProductImageAlt::where('id', '=', $id)->firstOrFail();
        $deleteProductImageAlt->delete();
        return redirect()->back()->with('success', 'Product Alt Plus Images Deleted!');

    }

       public function deleteCategoryImage ($id=null){

        $deleteCategoryImage = CategoryImage::where('id', '=', $id)->firstOrFail();
        $deleteCategoryImage->delete();
        return redirect()->back()->with('success', 'Category Main Plus Images Deleted!');

    }

    public function deleteCategory ($id){

        $catID = $id;
      $category = Category::where( 'id', $catID )->first(); 


       $products = DB::table('products')->where('category_id','=',$catID)->get();

        $product_large_image_path  = 'images/productimages/large';
        $product_medium_image_path = 'images/productimages/medium';
        $product_small_image_path  = 'images/productimages/small';

        $category_large_image_path  = 'images/categoryimages/large';
        $category_medium_image_path = 'images/categoryimages/medium';
        $category_small_image_path  = 'images/categoryimages/small';

        foreach ($products as $product) {
        //large 
        if (file_exists($product_large_image_path.$product->image)) {
            unlink(realpath($product_large_image_path.$product->image));
        }
        //medium 
         if (file_exists($product_medium_image_path.$product->image)) {
            unlink($product_medium_image_path.$product->image);
        }
        //small 
         if (file_exists($product_small_image_path.$product->image)) {
            unlink($product_small_image_path.$product->image);
        }

       //large alt
        if (file_exists($product_large_image_path.$product->image_alt)) {
            unlink($product_large_image_path.$product->image_alt);
        }
        //medium alt
         if (file_exists($product_medium_image_path.$product->image_alt)) {
            unlink($product_medium_image_path.$product->image_alt);
        }
        //small alt
         if (file_exists($product_small_image_path.$product->image_alt)) {
            unlink($product_small_image_path.$product->image_alt);
        }


        }
        DB::table('products')->where('category_id','=',$catID)->delete();
      
        //large 
        if (file_exists($category_large_image_path.$category->image_big)) {
            unlink($category_large_image_path.$category->image_big);
        }
        //medium 
         if (file_exists($category_medium_image_path.$category->image_big)) {
            unlink($category_medium_image_path.$category->image_big);
        }
        //small 
         if (file_exists($category_small_image_path.$category->image_big)) {
            unlink($category_small_image_path.$category->image_big);
        }


       //large alt
        if (file_exists($category_large_image_path.$category->image_small)) {
            unlink($category_large_image_path.$category->image_small);
        }
        //medium alt
         if (file_exists($category_medium_image_path.$category->image_small)) {
            unlink($category_medium_image_path.$category->image_small);
        }
        //small alt
         if (file_exists($category_small_image_path.$category->image_small)) {
            unlink($category_small_image_path.$category->image_small);
        }

        $deleteCategory = Category::where('id', '=', $id)->firstOrFail();
        $deleteCategory->delete();
        return redirect()->back()->with('success', 'Category All Assigned Products Deleted!');

    }

        public function deleteSubCategory ($id){

        $catID = $id;
        $category = SubCategory::where( 'id', $catID )->first(); 

       $products = DB::table('products')->where('category_id','=',$catID)->get();

        $deleteSubCategory = SubCategory::where('id', '=', $id)->firstOrFail();
        $deleteSubCategory->delete();
        
        return redirect()->back()->with('success', 'SubCategory And All Assigned Products Deleted!');

    }

           public function deleteCategoryImageAlt ($id=null){

        $deleteCategoryImageAlt = CategoryImageAlt::where('id', '=', $id)->firstOrFail();
        $deleteCategoryImageAlt->delete();
        return redirect()->back()->with('success', 'Category Alt Plus Images Deleted!');

    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {
        //
    }
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        //
        $product = Product::where( 'id', $id )->first(); 
   

        Product::destroy( $id );

        return back()->with('error','Product Deleted!!');
    }

    // Getting Attributes
    public function addAttributes( Request $request, $id = null ) {
        $productDetails = Product::find( $id );

        if ( $request->isMethod( 'post' ) ) {
            ProductsAttribute::create( $request->all() );

            return redirect( 'admin/add-attributes/' . $id )->with( 'flash_message_success', 'Product Attribute(s) Added!!!' );
        }

        $product_attributes = DB::table( 'products_attributes' )->select( 'products_attributes.*', DB::raw( 'attribute_groups.name as group_name' ), DB::raw( 'attributes.name as attribute_name' ) )->leftJoin( 'attributes', 'attributes.id', '=', 'products_attributes.attribute_id' )->leftJoin( 'attribute_groups', 'attribute_groups.id', '=', 'attributes.attribute_group_id' )->where( 'products_attributes.product_id', '=', $id )->get();

        $attribute_groups = AttributeGroup::all();
        $action           = 'add';

        return view( 'product.add_attributes' )->with( compact( [
            'productDetails',
            'product_attributes',
            'attribute_groups',
            'action'
        ] ) );
    }

    // Editing Product Attributes i.e Price and Quantity

    public function editAttributes( Request $request, $id = null ) {

        if ( $request->isMethod( 'post' ) ) {

            $data                 = array();
            $data['product_id']   = $request->get( 'product_id' );
            $data['attribute_id'] = $request->get( 'attribute_id' );
            $data['price']        = $request->get( 'price' );

            $res = ProductsAttribute::where( 'id', '=', $id )->update( $data );

            return redirect()->back()->with( 'flash_message_success', 'Product Attribute(s) Added!!!' );
        }
        $attribute_groups = AttributeGroup::all();
        //$product_attribute = ProductsAttribute::find( $id );

        $action = 'edit';

        $product_attribute = DB::table( 'products_attributes' )->select( 'products_attributes.*', DB::raw( 'attribute_groups.id as attribute_group_id' ), DB::raw( 'attribute_groups.name as group_name' ), DB::raw( 'attributes.name as attribute_name' ) )->leftJoin( 'attributes', 'attributes.id', '=', 'products_attributes.attribute_id' )->leftJoin( 'attribute_groups', 'attribute_groups.id', '=', 'attributes.attribute_group_id' )->where( 'products_attributes.id', '=', $id )->first();

        $productDetails = Product::find( $product_attribute->product_id );

        $product_attributes = DB::table( 'products_attributes' )->select( 'products_attributes.*', DB::raw( 'attribute_groups.name as group_name' ), DB::raw( 'attributes.name as attribute_name' ) )->leftJoin( 'attributes', 'attributes.id', '=', 'products_attributes.attribute_id' )->leftJoin( 'attribute_groups', 'attribute_groups.id', '=', 'attributes.attribute_group_id' )->where( 'products_attributes.product_id', '=', $product_attribute->product_id )->get();

        return view( 'product.add_attributes' )->with( compact( [
            'productDetails',
            'product_attribute',
            'product_attributes',
            'attribute_groups',
            'action'
        ] ) );
    }

    // Delete Attributes Function
    public function deleteAttributes( $id = null ) {
        ProductsAttribute::destroy( [ 'id' => $id ] );

        return redirect()->back()->with( 'flash_message_success', 'Product Attribute (s) Deleted!' );
    }

    // Show product in product blade file(front view)

    public function productPage($slug) {

        $product = Product::where( 'slug', $slug )->first();

        if (!empty($product)) {

        $id = $product->id;

        // $products = Product::get();

        $productExtraImages = ProductImage::where( 'product_id', $id )->orderBy(DB::raw('RAND()'))->get();

        return view( 'front.product', compact( 'product', 'productExtraImages') );

        }else{

            return redirect(route('home'))->with('error','Product Not Available!');

        }


    }


    // Modal product Page Code

    public function modalPage( $id = null ) {

        $product = Product::with( 'attributes' )->where( 'id', $id )->first();


        $product->setRelation( 'reviews', $product->reviews()->paginate( 2 ) );

        $products = Product::all();
 

        // Getting only Category related products withouth the current one

        $relatedProducts = Product::where( 'id', '!=', $id )->where( [ 'category_id' => $product->category_id ] )->get();

        //  $relatedProducts = json_decode(json_encode($relatedProducts));

        // echo "<pre>"; product_r($relatedProducts); die;


        $product_attributes = ProductsAttribute::where( 'product_id', '=', $id )->get();
        $attribute_id_array = array();
        foreach ( $product_attributes as $product_attribute ) {
            $attribute_id_array[] = $product_attribute->attribute_id;
        }

        $attributes = Attribute::select( 'attribute_group_id' )->whereIn( 'id', $attribute_id_array )->groupBy( 'attribute_group_id' )->get();
        $attribute_group_array = array();
        foreach ( $attributes as $attribute ) {
            $attribute_group_array[] = $attribute->attribute_group_id;
        }

        $attribute_groups = AttributeGroup::whereIn( 'id', $attribute_group_array )->get();

        return view( 'front.includes.modalproduct', compact( 'product', 'products', 'relatedProducts', 'product_attributes', 'attributes', 'attribute_groups' ) );
    }


    // End of Modal product Code


    // getProductPrice function where we target to get the product attribute price using product_id and size to return exact price

    public function getProductPrice( Request $request ) {

        $product_id = $request->product_id;

        $product       = Product::where( 'id', '=', $product_id )->first();
        $product_price = 0;
        if ( $product ) {
            $product_price = $product->price;
        }

        $attribute_ids       = $request->attribute_ids;
        $attribute_ids_array = explode( ",", $attribute_ids );

        $product_attributes_price = ProductsAttribute::where( 'product_id', '=', $product_id )->whereIn( 'attribute_id', $attribute_ids_array )->sum( 'price' );
        $total_price              = number_format( $product_price + $product_attributes_price, 2, '.', '' );
        echo $total_price;
        exit;
    }

 


    // Download Image Function

public function getDownload()
{

 
    // Last Test

    $products = ProductDesign::paginate( 5 );

    foreach($products as $product){
        $file= public_path(). "/images/$product->design_path";
    }

 
return response()->download($file);
}

 
 

}

?>