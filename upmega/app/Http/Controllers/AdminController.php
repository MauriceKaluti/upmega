<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Town;
use App\Models\Service;
use App\Models\User;
use Auth;
use Session;
use Image;
use File; 
use Storage;
use DB;
use Illuminate\Http\Response;

class AdminController extends Controller
{

      public function activateUser(Request $request)
    {
  $statusz = $request->status;
     if ($statusz == 0) {
            
            $status = "off";
        }else{

            $status = "on";

        }
        $member = User::find($request->user_id);
        $member->status = $request->status;
        $member->save();
  
        return response()->json(['success'=>'Status Changed Successfully','status'=>$status,'statuss'=>$statusz]);
    }

 

 

      public function allServices(){

    $services = Service::get();
   
    return view('admin.services.index',compact('services'));

   }

      public function allBanners(){

    $banners = Banner::get();
   
    return view('admin.banners.index',compact('banners'));

   }

         public function storeBanner(Request $request)
    {
       $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'image' => 'required'
           
        ]);
    
        $input = $request->all();

        if ( $request->hasFile( 'image' ) ) {
        $image =$request->image;
        if ( $image->isValid() ) {
        $extension = $image->getClientOriginalExtension();
        $filename = rand( 111, 9999 ) . '.' . $extension;
        $image_path  = 'images/imgs/' . $filename;
        // Resize Imgs
        Image::make( $image )->save($image_path);
        // Storing Image
        }
        }

        $input['image'] = $filename;
        $input['user_id'] = Auth::user()->id;

        $service = Banner::create($input);
    
        return redirect()->back()
                        ->with('success','Promo Banner Created');
    }


      public function updateBanner(Request $request, $id)
    {
      $this->validate($request, [
            'name' => 'required',
            'phone' => 'required'
        ]);
         $banner = Banner::find($id);

        $input = $request->all();

        if ( $request->hasFile( 'image' ) ) {


        $image =$request->image;


        if ( $image->isValid() ) {
        $extension = $image->getClientOriginalExtension();
        $imgfilename = rand( 111, 9999 ) . '.' . $extension;

        // dd($filename); die();

        $image_path  = 'images/imgs/' . $imgfilename;
        // Resize Imgs
        Image::make( $image )->save($image_path);
        // Storing Image
        }

        }else{

               $imgfilename = $banner->image;
        }
       

        $input['image'] = $imgfilename;

        $input['user_id'] = Auth::user()->id;

        $banner->update($input);
    
        return redirect()->back()->with('success','Banner Updated!');
    }

 public function storeService(Request $request)
    {
       $this->validate($request, [
            'name' => 'required',
            'title' => 'required'
           
        ]);
    
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        $service = Service::create($input);


                $svcid = $service->id;
                 
                $svctitle = $service->title;

                // lowercase
                $strr = strtolower($svctitle);

                // replace non letter or digits by -
                $str = preg_replace('~[^\\pL\d]+~u', '_', $strr);

                // trim

                $str_trim = trim($str, '_');

                  // remove unwanted characters
                $slug = preg_replace('~[^-\w]+~', '_', $str_trim). '_'. $svcid;

                $upd_service = Service::find($svcid);


                $upd_service->update(['slug' => $slug]);
    
        return redirect()->back()
                        ->with('success','Service created!');
    }


    public function updateService(Request $request, $id)
    {
      $this->validate($request, [
            'name' => 'required',
            'title' => 'required'
        ]);
    
        $input = $request->all();
      
    
         $service = Service::find($id);
            
               $svcid = $service->id;
                $random =  strtolower($request->title).'_'.$svcid.time(); 
                $svctitle = $request->title;

                // lowercase
                $strr = strtolower($svctitle);

                // replace non letter or digits by -
                $str = preg_replace('~[^\\pL\d]+~u', '_', $strr);

                // trim

                $str_trim = trim($str, '_');

                  // remove unwanted characters
                $slug = preg_replace('~[^-\w]+~', '_', $str_trim). '_'. $svcid;

        $input['user_id'] = Auth::user()->id;
        $input['slug'] = $slug;

        // $userRole = $userRole[0];
        $service->update($input);
    
        return redirect()->back()->with('success','Service Updated!');
    }
 
 

public function allTowns(){

    $towns = Town::get();
   
return view('admin.towns.index',compact('towns'));

   }
 

 


   public function storeTown(Request $request){

         $this->validate($request, [
            'name' => 'required',
            'title' => 'required' 
        ]);

      $input = $request->all();
      $statement = DB::select("SHOW TABLE STATUS LIKE 'towns'");
        $nextId = $statement[0]->Auto_increment;

      // $random =  strtolower($request->title).'_'.$nextId.time(); 
    $title = $request->title;

    // lowercase
    $strr = strtolower($title);

    // replace non letter or digits by -
    $str = preg_replace('~[^\\pL\d]+~u', '_', $strr);

    // trim

    $str_trim = trim($str, '_');

      // remove unwanted characters
    $url_slug = preg_replace('~[^-\w]+~', '_', $str_trim). '_'. $nextId;
      
        $input['user_id'] = Auth::user()->id;
        $input['slug'] = $url_slug;

        $town = Town::create($input);
    
        return redirect()->back()->with('success','Town Created!');
   }
 


  public function updateTown(Request $request, $id){



            $this->validate($request, [
          'name' => 'required',
            'title' => 'required' 
        ]);


        $town = Town::find($id);

$nextId = $town->id;
           $title = $request->title;
        $input = $request->all();

    // lowercase
    $strr = strtolower($title);

    // replace non letter or digits by -
    $str = preg_replace('~[^\\pL\d]+~u', '_', $strr);

    // trim

    $str_trim = trim($str, '_');

      // remove unwanted characters
    $url_slug = preg_replace('~[^-\w]+~', '_', $str_trim). '_'. $nextId;
      
        $input['slug'] = $url_slug;
        $input['user_id'] = Auth::user()->id;
        $town->update($input);
        return redirect()->back()
                        ->with('success','Town Updated!');
}

 

       public function deleteService ($id=null){
        $deleteService = Service::where('id', '=', $id)->firstOrFail();
        $deleteService->delete();
        return redirect()->back()->with('success', 'Service Deleted!');
    }

   public function deleteTown ($id=null){
        $deleteTown = Town::where('id', '=', $id)->firstOrFail();
        $deleteTown->delete();
        return redirect()->back()->with('success', 'Town Deleted!');
    }
 
 

         public function deleteBanner ($id=null){
        $deleteBanner = Banner::where('id', '=', $id)->firstOrFail();
        $deleteBanner->delete();
        return redirect()->back()->with('success', 'Banner Deleted!');
    }

         public function deleteNaiMember ($id=null){
        $deleteNaiMember = User::where('id', '=', $id)->firstOrFail();
        $deleteNaiMember->delete();
        return redirect()->back()->with('success', 'Member Deleted!');
    }

       public function deleteSubscription ($id=null){
        $deleteSubscription = SubscriptionLog::where('id', '=', $id)->firstOrFail();
        $deleteSubscription->delete();
        return redirect()->back()->with('success', 'Subscription Deleted!');
    }
}
