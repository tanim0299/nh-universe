<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use App\guest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Lib\Adnsms\lib\AdnSmsNotification;
class guestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('User.Guest.register');
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

        $validator = Validator::make($request->all(), [
          'first_name' => 'required|max:100',
        //   'last_name' => 'required|max:100',
          'email' => 'unique:guest|max:100',
          'phone' => 'required|unique:guest',
          'address' => 'required',
          'password' => 'min:8',
          'confirm_password' => 'required_with:password|same:password|min:8'
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

        $data = array(
            'first_name'=>$request->first_name,
            // 'last_name'=>$request->last_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'password'=>Hash::make($request->password),
            'set_password'=>$request->password,
        );

        $insert = guest::create($data);
        
        	$session_id = Session::getId();
        $session = DB::table('shopping_carts')->where('session_id',$session_id)->first();
 
       $setcheck =  Auth::guard('guest')->loginUsingId($insert->id);
        
        if($setcheck)
        {
           $session_id_up = Session::getId();
         if ($session) {
              $sessions = DB::table('shopping_carts')->where('session_id',$session->session_id)->update(['session_id'=>$session_id_up]);
            }
            
        }
        
        if(isset($sessions)>0)
        {
             $notification=array(
            'messege'   =>'Registration Successfull',
            'alert-type'=>'success'
        );

         return redirect('Checkout')->with($notification);  
        }
        else
        {
          $notification=array(
            'messege'   =>'Registration Successfull',
            'alert-type'=>'success'
        );

         return redirect()->back()->with($notification);   
        }
       
            
        
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


        public function userLogin()
    {
        return view('User.Guest.signin');
    }

    public function guestLogin(Request $request)
    {
        	$session_id = Session::getId();
        	
        $creadential=['email'=>$request->email,'password'=>$request->password];
        
        $session = DB::table('shopping_carts')->where('session_id',$session_id)->first();
   

        if (Auth::guard('guest')->attempt($creadential)) 
        {
            
            if (Auth::guard('guest')->user()->status == '0') 
            {
                Auth::guard('guest')->logout();
                
                
                return redirect()->back()->with('error','Waiting for approval!');
                 
            }
            
            $session_id_up = Session::getId();
         if ($session) {
              $session = DB::table('shopping_carts')->where('session_id',$session->session_id)->update(['session_id'=>$session_id_up]);
            }
         
                 $notification=array(
            'messege'   =>'Login Successfull',
            'alert-type'=>'success'
        );

        return redirect('/userdashboard')->with($notification); 
            

        }
        
        $creadentials=['phone'=>$request->email,'password'=>$request->password];
        
        if (Auth::guard('guest')->attempt($creadentials)) 
        {
            
            if (Auth::guard('guest')->user()->status == '0') 
            {
                Auth::guard('guest')->logout();
                  return redirect()->back()->with('error','Wating for approval!');
            }
            
           
           
            $session_id_up = Session::getId();
          if ($session) {
              $session = DB::table('shopping_carts')->where('session_id',$session->session_id)->update(['session_id'=>$session_id_up]);
            }
         
                 $notification=array(
            'messege'   =>'Login Successfull',
            'alert-type'=>'success'
        );

        return redirect('/userdashboard')->with($notification); 
            

        }
        else
        {
        return redirect()->back()->with('error','E-mail/phone or Password Does not match!');
        }
    }

    public function guestLogin_redirect(Request $request)
    {
        
        	$session_id = Session::getId();
        	
        $creadential=['email'=>$request->email,'password'=>$request->password];
        
        $session = DB::table('shopping_carts')->where('session_id',$session_id)->first();

        if (Auth::guard('guest')->attempt($creadential)) 
        {
            
            if (Auth::guard('guest')->user()->status == '0') 
            {
                Auth::guard('guest')->logout();
                  $notification=array(
            'messege'   =>'Pending your registration',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification);
            }
            $session_id_up = Session::getId();
         $session = DB::table('shopping_carts')->where('session_id',$session->session_id)->update(['session_id'=>$session_id_up]);
            
           
                 $notification=array(
            'messege'   =>'Login Successfull',
            'alert-type'=>'success'
        );

        return redirect('/Checkout')->with($notification); 
            

        }
        
        $creadentials=['phone'=>$request->email,'password'=>$request->password];
        
        if (Auth::guard('guest')->attempt($creadentials)) 
        {
            
            if (Auth::guard('guest')->user()->status == '0') 
            {
                Auth::guard('guest')->logout();
                  $notification=array(
            'messege'   =>'Pending your registration',
            'alert-type'=>'error'
        );

       return redirect()->back()->with($notification);
            }
            
             $session_id_up = Session::getId();
         $session = DB::table('shopping_carts')->where('session_id',$session->session_id)->update(['session_id'=>$session_id_up]);
            
           
                 $notification=array(
            'messege'   =>'Login Successfull',
            'alert-type'=>'success'
        );

        return redirect('/Checkout')->with($notification); 
            

        }
        else
        {
        $notification=array(
            'messege'   =>'Password and E-mail/Mobile Does not match!',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
        }
    } 

    public function userdashboard()
    {
            $data = DB::table('invoices')
                    ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                    ->join('districts','districts.id','delivery_infos.district_id')
                    ->where('invoices.guest_id',Auth('guest')->user()->id)
                    ->select('invoices.*','delivery_infos.*','shopping_carts.quantity','product_productinfo.product_name','product_productinfo.current_price','districts.district_name')
                       ->groupby('invoices.invoice_id')
                    ->get();

        return view('User.Guest.dashboard',compact('data'));
    }


     public function myprofileupdate(Request $request)
    {

      
        if ($request->password !='') 
        {
            
              $validator = Validator::make($request->all(), [
          'first_name' => 'required|max:100',
          'password' => 'required|min:8',
          'phone' => 'required',
          'address' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

        $data = array(
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'password'=>Hash::make($request->password),
            'set_password'=>$request->password,
        );  

        }
        else
        {
            
              $validator = Validator::make($request->all(), [
          'first_name' => 'required|max:100',
          'phone' => 'required',
          'address' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

        $data = array(
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
        );

        }

        $insert = guest::where('id',Auth('guest')->user()->id)->update($data);

        $file = $request->file('image');
        if ($file) 
        {
            $imagename = Auth('guest')->user()->id.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/guestImage'),$imagename);
            DB::table('guest')->where('id',Auth('guest')->user()->id)->update(['image'=>$imagename]);
        }

        $notification=array(
            'messege'   =>'Update Successfull',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification); 
    }


    public function guestLogout()
    {
        Auth::guard('guest')->logout();
       $notification=array(
            'messege'   =>'Logout Successfull',
            'alert-type'=>'info'
        );

        return redirect('/')->with($notification);
    }

   
    // ================Facebook=============
    public function redirectTofacebook()
    {
        // dd(Socialite::driver('facebook'));
        return Socialite::driver('facebook')->redirect();
    }


      public function handleFacebookCallback() {
        try {

            $user = Socialite::driver('facebook')->user();
            //   dd($user);
            $finduser = guest::where('provider_id', $user->id)->first();
            $findusermail = guest::where('email', $user->email)->first();
            // dd($finduser);
            
            
            if ($finduser) {
                
                guest::where('provider_id', $user->id)->update([
                    'first_name' => $user->name,
                    'email' => $user->email,
                    'avatar' =>$user->avatar,
                ]);
                
                Auth::guard('guest')->loginUsingId($finduser->id);
                 return redirect('/userdashboard');
            } else if($findusermail)
            {
                 guest::where('email', $user->email)->update([
                    'provider_id'=> $user->id,
                    'first_name' => $user->name,
                    'email' => $user->email,
                    'avatar' =>$user->avatar,
                ]);
                
                 Auth::guard('guest')->loginUsingId($findusermail->id);
                 return redirect('/userdashboard');
            }
            
            else {
                
                $newUser = guest::create([
                    'first_name' => $user->name,
                    'email' => $user->email,
                    'provider_id' => $user->id,
                    'avatar' =>$user->avatar,
                ]);
                Auth::guard('guest')->loginUsingId($newUser->id);
                return redirect('/userdashboard');
            }
        }
        catch(Exception $e) {
            return redirect('/');
        }
    }





    // ================Twitter=============
    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }


      public function handleTwitterCallback() 
    {
        try {
            $user = Socialite::driver('twitter')->user();
            $finduser = guest::where('provider_id', $user->id)->first();
            if ($finduser) {
                Auth::guard('guest')->loginUsingId($finduser->id);
                // Auth::login($finduser);
                 return redirect('/userdashboard');
            } else {
                $newUser = guest::create(['name' => $user->name, 'email' => $user->email, 'provider_id' => $user->id]);
                Auth::login($newUser);
                return redirect()->back();
            }
        }
        catch(Exception $e) {
            return redirect('/');
        }
    }




    // ================Google=============
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


      public function handleGoogleCallback() 
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = guest::where('provider_id', $user->id)->first();
            if ($finduser) {
                Auth::guard('guest')->loginUsingId($finduser->id);
                // Auth::login($finduser);
                 return redirect('/userdashboard');
            } else {
                $newUser = guest::create(['name' => $user->name, 'email' => $user->email, 'provider_id' => $user->id]);
                Auth::login($newUser);
                return redirect()->back();
            }
        }
        catch(Exception $e) {
            return redirect('/');
        }
    }
    
      public function forgot_password()
    {
      return view('User.Guest.forget_pass');
    }
    public function guest_forget(Request $request)
    {
      $check = guest::where('phone',$request->phone)->first();
      if ($check) 
      {
        $getcode = rand(1000,9999);
         $code = guest::where('phone',$request->phone)->update(['code'=>$getcode]);
      
        $message = "harekmaalbd password Reset OTP: ".$getcode.".";
        $recipient=$request->phone;  
        $requestType = 'OTP';
        $messageType = 'TEXT';         
        $sms = new AdnSmsNotification();
        $sms->sendSms($requestType, $message, $recipient, $messageType);
        
         return redirect('/guest_forget_code/'.$request->phone);
      }
      else
      {

        $notification=array(
            'messege'   =>'Does not match Phone Number',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
      }
    }



    public function guest_forget_code($phone)
    {
      $check = guest::where('phone',$phone)->first();
      if ($check) 
      {
        
      return view('User.Guest.forget_pass_code',compact('check'));

      }
      
    }


    public function guest_forget_code_check(Request $request)
    {
      $check = guest::where('phone',$request->phone)->where('code',$request->code)->first();
      if ($check) 
      {
        
      return view('User.Guest.forget_pass_reset',compact('check'));

      }
      else
      {
        $notification=array(
            'messege'   =>'Does not match Code',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
      }
    }

    public function guest_forget_reset_done(Request $request)
    {
      $check = guest::where('phone',$request->phone)->first();
      if ($check) 
      {
        
      $validator = Validator::make($request->all(), [
          'password' => 'required',
          'confirm_password' => 'required_with:password|same:password|min:8',
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

        $data = array(
            'password'=>Hash::make($request->password),
            'set_password'=>$request->password,
        );

        $insert = guest::where('phone',$request->phone)->update($data);


        $notification=array(
            'messege'   =>'Update Successfull',
            'alert-type'=>'success'
        );
        return redirect('/user-login')->with($notification);

      }
      
    }
}
