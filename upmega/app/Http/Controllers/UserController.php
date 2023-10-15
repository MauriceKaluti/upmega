<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Town;
use Spatie\Permission\Models\Role;
use DB;
use Auth;
use Hash;
use Image;
use File; 
use Illuminate\Support\Arr;

class UserController extends Controller
{

         public function updateTraderAccount(Request $request)
    {
      $this->validate($request, [
            'package_id' => 'required'
        ]);
    
        $input = $request->all();

        $id = Auth::user()->id;

         $user = User::find($id);

 
        $user->update($input);
    
        return redirect()->back()->with('success','Trader Account Updated!');
    }

       public function updateInvestorAccount(Request $request)
    {
 
    
        $input = $request->all();

          $id = Auth::user()->id;

         $user = User::find($id);
 
        $user->update($input);
    
        return redirect()->back()->with('success','Investor Account Updated!');
    }

    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->get();
        return view('users.index',compact('data'));
    }

      public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $userid = Auth::user()->id;
        $user = User::where('id','=',$userid)->first();
        $userRole = $user->roles->pluck('name')->all();

        $userRole = $userRole[0];
 
    
        $roles = Role::get();
             

        return view('users.create',compact('roles'));
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['user_id'] = Auth::user()->id;

       
                   
    $statement = DB::select("SHOW TABLE STATUS LIKE 'users'");
        $uid = $statement[0]->Auto_increment;

                $random =  strtolower($request->name).'_'.$uid.time(); 
                $uname = $request->name;

                // lowercase
                $strr = strtolower($uname);

                // replace non letter or digits by -
                $str = preg_replace('~[^\\pL\d]+~u', '_', $strr);

                // trim

                $str_trim = trim($str, '_');

                  // remove unwanted characters
                $slug = preg_replace('~[^-\w]+~', '_', $str_trim). '_'. $uid;


          if ( $request->hasFile( 'image' ) ) {

            $image_tmp =$request->image;
            if ( $image_tmp->isValid() ) {
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = rand( 111, 9999 ) . '.' . $extension;
                $large_image_path  = 'images/profilephotos/' . $filename;

                // Resize Imgs
                Image::make( $image_tmp )->save( $large_image_path );

            }

        $input['image'] = $filename;
        }

       if ( $request->hasFile( 'selfie' ) ) {

            $selfie_tmp =$request->selfie;
            if ( $selfie_tmp->isValid() ) {
                $selfie_extension = $selfie_tmp->getClientOriginalExtension();
                $selfie_filename = rand( 111, 9999 ) . '.' . $selfie_extension;
                $large_selfie_path  = 'images/selfies/' . $selfie_filename;

                // Resize Imgs
                Image::make( $selfie_tmp )->save( $large_selfie_path );

               
            }

        $input['selfie'] = $selfie_filename;
        }

 

       // dd($services); die();

    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->back()
                        ->with('success','User Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::get();
        // $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name')->all();
        if (!empty($userRole)) {
        $userRole = $userRole[0];
             
        }else{

        $userRole = '';

        }

        // dd($userRole); die();
     
        
        return view('users.edit',compact('user','roles','userRole'));
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
      $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
         $user = User::find($id);
        $userRole = $user->roles->pluck('name')->all();

                    if (!empty($input['slug'])) {
                    $slug = $input['slug'];
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


      if ( $request->hasFile( 'image' ) ) {

            $image_tmp =$request->image;
            if ( $image_tmp->isValid() ) {
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = rand( 111, 9999 ) . '.' . $extension;
                $large_image_path  = 'images/profilephotos/' . $filename;

                // Resize Imgs
                Image::make( $image_tmp )->save( $large_image_path );

              
            }

        }else{

            $filename = $user->image;
        }


         if ( $request->hasFile( 'selfie' ) ) {

            $selfie_tmp =$request->selfie;
            if ( $selfie_tmp->isValid() ) {
                $selfie_extension = $selfie_tmp->getClientOriginalExtension();
                $selfie_filename = rand( 111, 9999 ) . '.' . $selfie_extension;
                $large_selfie_path  = 'images/selfies/' . $selfie_filename;

                // Resize Imgs
                Image::make( $selfie_tmp )->save( $large_selfie_path );

               
            }

        }else{

            $selfie_filename = $user->selfie;
        }


        $input['image'] = $filename;
        $input['selfie'] = $selfie_filename;
        $input['updated_by'] = Auth::user()->id;
        $input['slug'] = $slug;

        // $userRole = $userRole[0];
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        if(!empty($input['roles'])){ 

        $user->assignRole($request->input('roles'));

        }else{
            $user->assignRole($userRole);
        }
    
    
        return redirect()->back()->with('success','User Updated!');
    }


    public function updateProfile(Request $request, $id)
    {
      $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
         $user = User::find($id);
        $userRole = $user->roles->pluck('name')->all();

                    if (!empty($input['slug'])) {
                    $slug = $input['slug'];
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


      if ( $request->hasFile( 'image' ) ) {

            $image_tmp =$request->image;
            if ( $image_tmp->isValid() ) {
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = rand( 111, 9999 ) . '.' . $extension;
                $large_image_path  = 'images/profilephotos/' . $filename;

                // Resize Imgs
                Image::make( $image_tmp )->save( $large_image_path );

              
            }

        }else{

            $filename = $user->image;
        }
 
        $input['image'] = $filename;
        $input['updated_by'] = Auth::user()->id;
        $input['slug'] = $slug;

        // $userRole = $userRole[0];
        $user->update($input);
    
        return redirect()->back()->with('success','Profile Updated!');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User Deleted!');
    }
}
