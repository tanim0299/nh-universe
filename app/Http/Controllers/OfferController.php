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
use App\offer_setup;
use App\product_info;
use App\seller;
use Validator;
use DB;
use Auth;

class OfferController extends Controller
{
    public function index()
    {
         $data = offer_setup::get();
    	return view('Admin.offer.index',compact('data'));
    }

    public function create()
    {
    	$iteminfo = product_item::all();
       
       return view('Admin.offer.create',compact('iteminfo'));
    }

    public function store(Request $request)
    {
    	// return $request->all();
    	date_default_timezone_set('Asia/Dhaka');
    	 $validator = Validator::make($request->all(), [

        'item_id'=>'required',
        'category_id'=>'required',
      
        'product_id'=>'required',
        'start_date'=>'required',
        'end_date'=>'required',
        'type'=>'required',
       
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }
        
        
         for ($i=0; $i < count($request->type); $i++) { 

        $product_id = $this->offerAutoId();
      $admin_id = Auth::guard('admin')->user()->id;
        $insert = array(
            'id'=>$product_id,
            'item_id'=>$request->item_id,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'product_id'=>$request->product_id,
            'start_date_time'=>$request->start_date,
            'end_date_time'=>$request->end_date,
            'type'=>$request->type[$i],
            'admin_id'=>$admin_id,
            'status'=>'1',
                        );


        $query = offer_setup::create($insert);
        
         }
        
        $update = product_info::where('id',$request->product_id)
        ->update([
            'sale_price'=>$request->sale_price,
            'discount_price'=>$request->discount_price,
            'discount_per'=>$request->discount_per,
            'current_price'=>$request->current_price,
            ]);


         $notification=array(
            'messege'   =>'offer Added Successfull',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification);
    }


    public function destroy(Request $request,$id)
    {
        $query = offer_setup::where('id',$id)->delete();

         $notification=array(
            'messege'   =>'Offer Delete Successfull',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification);
    }


    public function activeoffer($id)
    {
         $query = offer_setup::where('id',$id)->update(['status'=>'1']);

         $notification=array(
            'messege'   =>'Offer active Successfull',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification);
    }

    public function inactiveoffer($id)
    {
         $query = offer_setup::where('id',$id)->update(['status'=>'0']);

         $notification=array(
            'messege'   =>'Offer inactive Successfull',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification);
    }
}
