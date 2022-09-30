<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product_item;
use App\product_category;
use App\product_subcategory;
use App\product_company;
use App\product_measurement;
use App\product_color_info;
use App\product_color;
use App\product_size;
use App\product_size_info;
use App\product_info;
use App\seller;
use Validator;
use DB;
use Auth;
class orderSystemController extends Controller
{
    public function totalOrder()
    {
    	 $data = DB::table('invoices')
                    ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                    ->join('districts','districts.id','delivery_infos.district_id')
                    ->select('invoices.*','delivery_infos.*','shopping_carts.quantity','product_productinfo.product_name','product_productinfo.current_price','product_productinfo.product_id','product_productinfo.image','districts.district_name')
                    ->get();
                    
                  

    	return view('Admin.Order_system.totalorder',compact('data'));
    }

    public function pendingOrder()
    {
    	 $data = DB::table('invoices')
                    ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                    ->join('districts','districts.id','delivery_infos.district_id')
                    ->where('invoices.status','0')
                    ->select('invoices.*','delivery_infos.*','shopping_carts.quantity','product_productinfo.product_name','product_productinfo.current_price','districts.district_name','product_productinfo.product_id','product_productinfo.image')
                    ->get();

    	return view('Admin.Order_system.pending',compact('data'));
    }


    public function ProcessOrder()
    {
    	 $data = DB::table('invoices')
                    ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                     ->join('districts','districts.id','delivery_infos.district_id')
                    ->where('invoices.status','1')
                    ->select('invoices.*','delivery_infos.*','shopping_carts.quantity','product_productinfo.product_name','product_productinfo.current_price','districts.district_name','product_productinfo.product_id','product_productinfo.image')
                    ->get();

    	return view('Admin.Order_system.process',compact('data'));
    }


    public function onthewayOrder()
    {
    	 $data = DB::table('invoices')
                    ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                    ->join('districts','districts.id','delivery_infos.district_id')
                    ->where('invoices.status','2')
                    ->select('invoices.*','delivery_infos.*','shopping_carts.quantity','product_productinfo.product_name','product_productinfo.current_price','districts.district_name','product_productinfo.product_id','product_productinfo.image')
                    ->get();

    	return view('Admin.Order_system.ontheway',compact('data'));
    }


    public function CompleteOrder()
    {
    	 $data = DB::table('invoices')
                    ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                    ->join('districts','districts.id','delivery_infos.district_id')
                    ->where('invoices.status','3')
                    ->select('invoices.*','delivery_infos.*','shopping_carts.quantity','product_productinfo.product_name','product_productinfo.current_price','districts.district_name','product_productinfo.product_id','product_productinfo.image')
                    ->get();

    	return view('Admin.Order_system.complete',compact('data'));
    }

    public function RejectOrder()
    {
    	 $data = DB::table('invoices')
                    ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                    ->join('districts','districts.id','delivery_infos.district_id')
                    ->where('invoices.status','4')
                    ->select('invoices.*','delivery_infos.*','shopping_carts.quantity','product_productinfo.product_name','product_productinfo.current_price','districts.district_name','product_productinfo.product_id','product_productinfo.image')
                    ->get();

    	return view('Admin.Order_system.reject',compact('data'));
    }

    public function penToProOrder(Request $request)
    {
    	$update = DB::table('invoices')->where('invoice_id',$request->id)->update(['status'=>'1']);
    }

    public function proToontheOrder(Request $request)
    {
    	$update = DB::table('invoices')->where('invoice_id',$request->id)->update(['status'=>'2']);
    }

    public function ontheTosuccOrder(Request $request)
    {
    	$update = DB::table('invoices')->where('invoice_id',$request->id)->update(['status'=>'3']);
    }

    public function penTorejectOrder(Request $request)
    {
    	$update = DB::table('invoices')->where('invoice_id',$request->id)->update(['status'=>'4']);
    }
       public function clearshopping()
    {
    	$update = DB::table('shopping_carts')->where('status','0')->where('created_at','<',date('Y-m-d H:i:s'))->delete();
    
    		$notify=array(
			'messege'   =>'Clear Previous Shopping Data Successfull',
			'alert-type'=>'warning'
		);
    	return redirect()->back()->with($notify);
    }
}
