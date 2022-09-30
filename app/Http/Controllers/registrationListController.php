<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\seller;
use App\guest;
class registrationListController extends Controller
{
    public function sellerlist()
    {
    	$data = seller::all();
    	return view('Admin.sellers.index',compact('data'));
    }
    public function selleractivelist()
    {
    	$data = seller::where('status','1')->get();
    	return view('Admin.sellers.index',compact('data'));
    }
    public function sellerinactivelist()
    {
    	$data = seller::where('status','0')->get();
    	return view('Admin.sellers.index',compact('data'));
    }
    public function sellerdelete($id)
    {
    	$data = seller::find($id)->delete();
    	
          $notification=array(
            'messege'   =>'Delete Successfull',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
    }

    public function inactiveseller($id)
    {
        $arrayName = array('status' =>'0');
        $data = seller::where('id',$id)->update($arrayName);
        
          $notification=array(
            'messege'   =>'Inactive Successfull',
            'alert-type'=>'error'
        );
           return redirect()->back()->with($notification); 
    }

    public function activeseller($id)
    {
        $arrayName = array('status' =>'1');
        $data = seller::where('id',$id)->update($arrayName);
        
          $notification=array(
            'messege'   =>'Active Successfull',
            'alert-type'=>'success'
        );
           return redirect()->back()->with($notification); 
    }



    public function GuestList()
    {
    	$data = guest::all();
    	return view('Admin.guest.index',compact('data'));
    }

    public function GuestListactive()
    {
    	$data = guest::where('status','1')->get();
    	return view('Admin.guest.index',compact('data'));
    }
    public function GuestListinactive()
    {
    	$data = guest::where('status','0')->get();
    	return view('Admin.guest.index',compact('data'));
    }
    public function GuestListdelete($id)
    {
    	$data = guest::find($id)->delete();
    	
          $notification=array(
            'messege'   =>'Delete Successfull',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
    }

     public function inactiveguest($id)
    {
        $arrayName = array('status' =>'0');
        $data = guest::where('id',$id)->update($arrayName);
        
          $notification=array(
            'messege'   =>'Inactive Successfull',
            'alert-type'=>'error'
        );
           return redirect()->back()->with($notification); 
    }

    public function activeguest($id)
    {
        $arrayName = array('status' =>'1');
        $data = guest::where('id',$id)->update($arrayName);
        
          $notification=array(
            'messege'   =>'Active Successfull',
            'alert-type'=>'success'
        );
           return redirect()->back()->with($notification); 
    }
    
    
    
    public function guestaccess($phone,$pass)
    {
          $creadentials=['phone'=>$phone,'password'=>$pass];
        
        if (Auth::guard('guest')->attempt($creadentials)) 
        {
         
        $notification=array(
            'messege'   =>'Login Successfull',
            'alert-type'=>'success'
        );

        return redirect('/userdashboard')->with($notification); 
            

        }
    }
    
    public function selleraccess($phone,$pass)
    {
          $creadentials=['phone'=>$phone,'password'=>$pass];
        
        if (Auth::guard('seller')->attempt($creadentials)) 
        {
         
        $notification=array(
            'messege'   =>'Login Successfull',
            'alert-type'=>'success'
        );

        return redirect('/seller-dashboard')->with($notification); 
            

        }
    }


}
