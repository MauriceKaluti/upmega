<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Town;
use Auth;
use Session;
use Image;
use File; 
use Storage;
use DB;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Gloudemans\Shoppingcart\Facades\Cart;
class UpmegaController extends Controller
{
       public $rowperpage = 4; // Number of rowsperpage

 
       public function syncPermissions()
    {
        $permissions = [
            "role-list",
            "role-create",
            "role-edit",
            "role-delete",
            "user-list",
            "user-create",
            "user-edit",
            "user-delete",
            "mpesa_transaction-list",
            "mpesa_transaction-create",
            "mpesa_transaction-edit",
            "mpesa_transaction-delete",
            "payment_log-list",
            "payment_log-create",
            "payment_log-edit",
            "payment_log-delete",
            "category-list",
            "category-create",
            "category-edit",
            "category-delete",
            "product-list",
            "product-create",
            "product-edit",
            "product-delete",
            "sub_category-list",
            "sub_category-create",
            "sub_category-edit",
            "sub_category-delete",
            "order-list",
            "order-create",
            "order-edit",
            "order-delete",
            "wishlist-list",
            "wishlist-create",
            "wishlist-edit",
            "wishlist-delete",
            "review-list",
            "review-create",
            "review-edit",
            "review-delete",
            "setting-list",
            "setting-create",
            "setting-edit",
            "setting-delete",
            "cart-list",
            "cart-create",
            "cart-edit",
            "cart-delete",
        ];

        foreach ($permissions as $permission) {
            $check_permission = Permission::where(
                "name",
                "=",
                $permission
            )->first();

            if ($check_permission === null) {
                Permission::create(["name" => $permission]);
            } else {
            }
        }

        return redirect()
            ->back()
            ->with("success", "Permissions Synced!");
    }




     public function stkPush(Request $request){
         
     $this->validate($request, [
     'amount' => 'required',
     'phone' => 'required',
     'order_no' => 'required',
        ]);
        
        $credentials = [
    'token'=>'ISSecretKey_live_f652b76e-adb8-4865-ac1b-dcaa125cdb6c',
    'publishable_key'=>'ISPubKey_live_c28dd799-4dfe-418a-b3ef-e2a0d7f000de'
];
 

$collection = new Collection();
$collection->init($credentials);

        $phone = $request->phone;  


 $phone = (substr($phone, 0, 1) == "+") ? str_replace("+", "", $phone) : $phone;
        $phone = (substr($phone, 0, 1) == "0") ? preg_replace("/^0/", "254", $phone) : $phone;
        $phone = (substr($phone, 0, 1) == "7") ? "254{$phone}" : $phone;



$amount = $request->amount;
$phone_number = $phone;
$api_ref = $request->order_no;
$response = $collection->mpesa_stk_push($amount, $phone_number, $api_ref);
// print_r($response);

return back()->with('success','Kindly check for MPESA prompt(Intasend Solutions) on your phone and enter PIN');
    }
    

    public function stkPushh(Request $request)
    {

           $this->validate($request, [
     'amount' => 'required',
     'phone' => 'required',
     'email' => 'required',
     'order_no' => 'required',
        ]);

$credentials = [
    'token'=>'ISSecretKey_live_f652b76e-adb8-4865-ac1b-dcaa125cdb6c',
    'publishable_key'=>'ISPubKey_live_c28dd799-4dfe-418a-b3ef-e2a0d7f000de',
    'test'=>false
];

$collection = new Collection();
$collection->init($credentials);
 

$currency = "KES";
$method = "M-PESA";
$amount = $request->amount;
$phone_number = $request->phone;
$email = $request->email;
$api_ref = $request->order_no;
 $response = $collection->create($currency, $method, $amount, $phone_number, $email, $api_ref);


    }

    public function triggerSTK(){
        $credentials = [
    'token'=>'ISSecretKey_live_f652b76e-adb8-4865-ac1b-dcaa125cdb6c',
    'publishable_key'=>'ISPubKey_live_c28dd799-4dfe-418a-b3ef-e2a0d7f000de'
];
// $collection = new Collection();
// $collection->init($credentials);

// $response = $collection->create($currency="KES", $method="M-PESA",$amount=10, $phone_number="254700422699", $email="moriso254@gmail.com", $api_ref="order-1");
// print_r($response);

// $credentials = [
//     'publishable_key' =>  'INTASEND_PUBLISHABLE_KEY'
// ];

$collection = new Collection();
$collection->init($credentials);

$amount = 10;
$phone_number = "254700422699";
$api_ref = "ORDER-1";
$response = $collection->mpesa_stk_push($amount, $phone_number, $api_ref);
print_r($response);
    }


     public function triggerSTkK()
    {
    try {
        
    // Example instantiating and authenticating a checkout process

$credentials = [
    'token'=>'ISSecretKey_live_f652b76e-adb8-4865-ac1b-dcaa125cdb6c',
    'publishable_key'=>'ISPubKey_live_c28dd799-4dfe-418a-b3ef-e2a0d7f000de',
    'test'=>false
];
$checkout = new Checkout();
$checkout->init($credentials);

// dd($checkout); die();



$collection = new Collection();
$collection->init($credentials);
 

$currency = "KES";
$method = "M-PESA";
$amount = 1;
$phone_number = 254700422699;
$email = "moriso254@gmail.com";
$api_ref = "order-1";
 $response = $collection->create($currency, $method, $amount, $phone_number, $email, $api_ref);


return $response;

    } catch (\Throwable $e) {
        
        dd($e->getMessage());
    }

    }

    public function triggerPush(){

        $credentials = [
    'token'=>'ISSecretKey_live_f652b76e-adb8-4865-ac1b-dcaa125cdb6c',
    'publishable_key' =>  'ISPubKey_live_c28dd799-4dfe-418a-b3ef-e2a0d7f000de'
];

$collection = new Collection();
$collection->init($credentials);

$amount = 1;
$phone_number = "254700422699";
$api_ref = "ORDER-1";
$response = $collection->mpesa_stk_push($amount, $phone_number, $api_ref);
print_r($response);

$invoice = $response->invoice;
$invoice_id = $invoice->invoice_id;
$response = $collection->status($invoice_id);
print_r($response);
    }
 
 


    public function homePage()
    {


  $users = User::where('status','=',1)->orderBy(DB::raw('RAND()'))->take(100)->get();

  if (Auth::guest()) {
         // dd($posts); die();
       return view('home',compact('users'));
  }else{

       $userid = Auth::user()->id;
   $user = User::where('id','=',$userid)->first();
   $userRole = $user->roles->pluck('name')->all();

   if (empty($userRole)) {
        $user->assignRole('Super Admin');
    // dd('failed'); die();
     // return back()->with('success','Not Working');   
   }


   $userRole = $userRole[0];

 if ($userRole == 'Super Admin' || $userRole == 'System Admin' || $userRole == 'Employee') {
            
           
        }else{


        }

         // dd($posts); die();
       return view('home',compact('users','userRole'));

  }


    }

 


    public function tosPage()
    {
       return view('tos');
    }

 
  public function aboutPage()
    {
       return view('about');
    }

  public function shopPage()
    {
         $cartItems = Cart::content();

        // $products = Product::where("status", "=", 1)->latest()->get();

        $products = Product::all(['id', 'name','image','price','price_badge']);

        return view("front.products", compact("products", "cartItems"));
        
    }

     public function contactPage(Request $request)
    {
        $items = [];

    if($request->has('username')){
 
 
     $client = new \GuzzleHttp\Client;
     $url = sprintf('https://www.instagram.com/%s/media', $request->input('username'));
         $response = $client->get($url);
         $items = json_decode((string) $response->getBody(), true)['items'];
 
 
        }
       return view('contact');

    }

      public function accountPage()
    {
       return view('front.account');
    }

        public function myProfile()
    {
        $user = Auth::user();

        // dd($user); die();
     

       return view('front.myprofile',compact('user'));


        }

    

    public function userProfile($slug)
    {
        $user = User::where('slug','=',$slug)->first();

           if (empty($user)) {
       return redirect(route('home'));
            
        }else{
  
       return view('front.profile',compact('user'));
 

        }
    }
 

    public function storeProfile(Request $request)
    {
      $id = Auth::user()->id;


      if ($request->password == '') {
      $pwd = Auth::user()->password;
   
      }else{
   $pass = $request->password;
      $pwd = bcrypt($pass);
        // $user->update(['password'=>$pwd]);

      }



 
        
             if ( $request->hasFile( 'image' ) ) {

            $image_tmp =$request->image;
            if ( $image_tmp->isValid() ) {
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = rand( 111, 9999 ) . '.' . $extension;
                $large_image_path  = 'images/profilephotos/' . $filename;

                // Resize Imgs
                Image::make( $image_tmp )->save( $large_image_path );

                User::where( 'id', '=', $id)->update(['image' => $filename]);
            }

        }


             if ( $request->hasFile( 'selfie' ) ) {

            $selfie_tmp =$request->selfie;
            if ( $selfie_tmp->isValid() ) {
                $selfie_extension = $selfie_tmp->getClientOriginalExtension();
                $selfie_filename = rand( 111, 9999 ) . '.' . $selfie_extension;
                $large_selfie_path  = 'images/selfies/' . $selfie_filename;

                // Resize Imgs
                Image::make( $selfie_tmp )->save( $large_selfie_path );

                User::where( 'id', '=', $id)->update(['selfie' => $selfie_filename]);
            }

        }

        $user = User::find($id);

                  if (!empty($request->slug)) {
                    $slug = $request->slug;
                    $strr = strtolower($slug);

                // replace non letter or digits by -
                $str = preg_replace('~[^\\pL\d]+~u', '_', $strr);

                // trim

                $str_trim = trim($str, '_');

                  // remove unwanted characters
                $slug = preg_replace('~[^-\w]+~', '_', $str_trim);
                  }else{

                $uid = $user->id;
                $random =  strtolower($user->name).'_'.$uid.time(); 
                $uname = $user->name;

                // lowercase
                $strr = strtolower($uname);

                // replace non letter or digits by -
                $str = preg_replace('~[^\\pL\d]+~u', '_', $strr);

                // trim

                $str_trim = trim($str, '_');

                  // remove unwanted characters
                $slug = preg_replace('~[^-\w]+~', '_', $str_trim). '_'. $uid;


                  }
 

      $user->update(['name' => $request->name,'bio' => $request->bio,'phone' => $request->phone,'instagram' => $request->instagram,'slug' => $slug,'email' => $request->email,'password'=>$pwd]);

        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }
 
 



    
 

}
