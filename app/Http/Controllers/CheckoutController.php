<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\shopping_cart;
use App\product_info;
use App\delivery_info;
use App\thana;
use App\delivery_charge;
use App\district;
use App\invoice;
use App\coupon;
use App\contact_us;
use Session;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Lib\Adnsms\lib\AdnSmsNotification;
class CheckoutController extends Controller
{
    public function Checkout_order()
    {
        $deliverycharge = delivery_charge::all();
        $district = district::all();
    	return view('User.checkout',compact('deliverycharge','district'));
    }



    public function add_to_cart(Request $request)
    {
        $session_id = Session::getId();
           $productcheck = product_info::find($request->product_id);
 
 
 $stock = DB::table('productstocks')
             ->where('product_id',$request->product_id)
             ->where('size',$request->size)
             ->where('color',$request->color)
             ->sum('quentity');
             
             
 $salequntshopping = DB::table('shopping_carts')
            ->where('size',$request->size)
            ->where('color',$request->color)
            ->where('status','1')
            ->where('product_id',$request->product_id)
            ->sum('quantity');
            
            
        $stockchek = shopping_cart::where('product_id',$request->product_id)->where('size',$request->size)->where('color',$request->color)->where('session_id',$session_id)->sum('quantity');     
     if(($stock-$salequntshopping)>0 && ($stock-($salequntshopping+$stockchek))>=$request->Quantity)
                                            // 200-(8+190)>190
     {                                      
                                            //  2>190
         
     
         $check = shopping_cart::where('product_id',$request->product_id)->where('session_id',$session_id)->where('color',$request->color)->where('size',$request->size)->first();

if ($productcheck->min_qunt >= $request->Quantity) 
{
      if ($check) {
        
        $quntityup = array(
            'quantity' => $check->quantity+$productcheck->min_qunt, 
            );

        $update = shopping_cart::where('product_id',$request->product_id)->where('session_id',$session_id)->where('size',$request->size)->where('color',$request->color)->update($quntityup);
    if ($update) 
        {
            return 'Add to cart successfully';
        }
        else
        {
            return 'error';
        }

        }
        else
        {

            $quntityadd = array(
            'product_id' =>$request->product_id, 
            'size' =>$request->size, 
            'color' =>$request->color, 
            'session_id' => $session_id, 
            'quantity' =>$productcheck->min_qunt, 
            'status' =>'0', 
            );

        $insert = shopping_cart::create($quntityadd);

    if ($insert) 
        {
            return 'Add to cart successfully';
        }
        else
        {
            return 'error';
        }


        }
}
else
{
     if ($check) {

        $quntityup = array(
            'quantity' => $check->quantity+$request->Quantity, 
            );

        $update = shopping_cart::where('product_id',$request->product_id)->where('session_id',$session_id)->where('size',$request->size)->where('color',$request->color)->update($quntityup);
    if ($update) 
        {
            return 'Add to cart successfully';
        }
        else
        {
            return 'error';
        }

        }
        else
        {

            $quntityadd = array(
            'product_id' =>$request->product_id, 
            'session_id' => $session_id, 
            'size' =>$request->size, 
            'color' =>$request->color, 
            'quantity' =>$request->Quantity, 
            'status' =>'0', 
            );

        $insert = shopping_cart::create($quntityadd);

    if ($insert) 
        {
            return 'Add to cart successfully';
        }
        else
        {
            return 'error';
        }


        }
            }
         
         
     }
     
     
     else
     {
          return 'Stock Available Only '.($stock-($salequntshopping+$stockchek));
     }
   
    }




    public function shoppingcart_view(Request $request)
    {
    	$session_id = Session::getId();

    	// $view = shopping_cart::where('session_id',$session_id)->get();
    	$view = DB::table('shopping_carts')
    	->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
    	->where('shopping_carts.session_id',$session_id)
    	->select('shopping_carts.*','product_productinfo.product_id as proID','product_productinfo.product_name','product_productinfo.current_price','product_productinfo.image')
    	->get();
    	return view('User.viewCart',compact('view'));
    	
    }


    public function placeorder_show(Request $request)
    {
    	$session_id = Session::getId();

    	// $view = shopping_cart::where('session_id',$session_id)->get();
    	$view = DB::table('shopping_carts')
    	->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
    	->where('shopping_carts.session_id',$session_id)
    	->select('shopping_carts.*','product_productinfo.product_id as proID','product_productinfo.product_name','product_productinfo.current_price','product_productinfo.shipping_id','product_productinfo.image')
    	->get();
    	return view('User.placeordershow',compact('view'));
    	
    }

    public function totalprice()
    {
    	$session_id = Session::getId();

    	// $view = shopping_cart::where('session_id',$session_id)->get();
    	$view = DB::table('shopping_carts')
    	->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
    	->where('shopping_carts.session_id',$session_id)
    	->select('shopping_carts.*','product_productinfo.current_price')
    	->get();
    	return view('User.total_price',compact('view'));
    	
    }

    public function totalcartqunt()
    {
    	$session_id = Session::getId();

    	// $view = shopping_cart::where('session_id',$session_id)->get();
    	return $view = DB::table('shopping_carts')
    	->where('shopping_carts.session_id',$session_id)
    	->count('shopping_carts.id');

    	
    }

    public function totalcartamount()
    {
    	$session_id = Session::getId();

    	$view = DB::table('shopping_carts')
    	->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
    	->where('shopping_carts.session_id',$session_id)
    	->select('shopping_carts.*','product_productinfo.current_price')
    	->get();
    	return view('User.total_price',compact('view'));

    	
    }

    public function delete_product(Request $request)
    {

    	$session_id = Session::getId();

    	 $delete = shopping_cart::where('id',$request->product_id)->where('session_id',$session_id)->delete();

    	
    	
    }
    
     public function thana_info(Request $request)
    {

       echo "<option>-- Select thana or Area --</option>";

       $thana = thana::where('district_id',$request->district_id)->get();

       foreach ($thana as $key => $value) {
           echo "<option value=".$value->id.">".$value->thana_name."</option>";
       }
        
        
    }

    public function district_charge(Request $request)
    {
       // dd($request->shipping_id);

       // $chargesystem = delivery_charge::whereIn('shipping_id',$request->shipping_id)
       //                 ->where('district_id',$request->id)
       //                 ->get();

       $chargesystem = DB::table('delivery_charges')
                        ->join('zone_districts','zone_districts.zone_id','delivery_charges.zone_id')
                        ->whereIn('delivery_charges.shipping_id',$request->shipping_id)
                        ->where('zone_districts.thana_id',$request->thana_id)
                        ->get();

       // dd($chargesystem);
       $totalcharge =0;
       foreach ($chargesystem as $key => $value) 
       {
           $totalcharge += $value->charge;
       }

        return $totalcharge;
    }

     public function Applypromo_check(Request $request)
    {
           $startdate = date('Y-m-d');
           $enddate = date('Y-m-d');


             $couponcheck = DB::table('coupons')
                        ->where('coupon_name',$request->code)
                        ->get();
            if ($couponcheck) {


                 $startcheck = DB::table('coupons')
                        ->where('start_date','<=',$startdate)
                        ->first();
            if ($startcheck) 
            {
                $endcheck = DB::table('coupons')
                        ->where('end_date','>=',$enddate)
                        ->first();
            if ($endcheck) 
            {
              $pricecheck =DB::table('coupons')
                        ->where('min_price','<=',$request->subamount)
                        ->first();
            
              if ($pricecheck ) 
            {
                 $discountprice = DB::table('coupons')
                        ->where('coupon_name',$request->code)
                        ->where('start_date','<=',$startdate)
                        ->where('end_date','>=',$enddate)
                        ->where('min_price','<=',$request->subamount)
                        ->first();



        if (isset($discountprice)) 
        {
        
        return $discountprice->discout_price;
        }
        else
        {
            return 'false';
        }
            } 
            else
            {
                return 'min_price';
            }         
            
            }  
            else
            {
                return 'end_date';
            }   
            }
            else
            {
                return 'date_invalid';
            }
            }
            else
            {
                return 'wrong_coupon';
            }
           

           
            

            
    }

    public function ordesystem(Request $request)
    {
        
        
         $validator = Validator::make($request->all(), [
          'delivery_type' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }



        $session_id = Session::getId();
        $deliveryinfo  = array(
            'first_name' => $request->fname, 
            'last_name' => $request->lname, 
            'email' => $request->email, 
            'address' => $request->address, 
            'phone' => $request->phone, 
            'country' => $request->country, 
            'district_id' => $request->district_id, 
            'session_id' => $session_id, 
        );

        $insertdel = delivery_info::create($deliveryinfo);

        $invoice_id = $this->invoiceAutoId();
        if (Auth('guest')->user()) {
            $cus_id = Auth('guest')->user()->id;
        }
        else
        {
            $cus_id='1';
        }
        $invoiceinfo  = array(
            'invoice_id'=>$invoice_id,
            'delivery_id'=>$insertdel->id,
            'guest_id'=>$cus_id,
            'coupon_id'=>$request->super_code,
            'delivery_charge'=>$request->deliverycharge,
            'payment_type'=>$request->delivery_type,
            'trans_id'=>$request->trans_id,
            'mobile_acc'=>$request->mobile_acc,
            'discount'=>$request->discount,
            'sub_total'=>$request->subamount,
            'grand_total'=>$request->totalamount,
            'session_id'=>$session_id,
        );

        $insertinv = invoice::create($invoiceinfo);


        shopping_cart::where('session_id',$session_id)->update(['status'=>'1']);
        
        
         $message = "Your order has been completed,your order ID: ".$invoice_id."from Buynfeel.com";
        $recipient=$request->phone;  
        $requestType = 'SINGLE_SMS';
        $messageType = 'TEXT';         
        $sms = new AdnSmsNotification();
        $sms->sendSms($requestType, $message, $recipient, $messageType);

        $notification=array(
            'messege'   =>'Your Order submitted',
            'alert-type'=>'success'
        );
        
        

        Session::regenerate();
        return redirect('/invoice-paper/'.$session_id.'')->with($notification);


    }

    public function invoicepaper($session)
    {
         $viewcart =  DB::table('invoices')
                    ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                    ->join('districts','districts.id','delivery_infos.district_id')
                    ->where('invoices.session_id',$session)
                    ->select('invoices.*','delivery_infos.*','shopping_carts.quantity','shopping_carts.color','shopping_carts.size','product_productinfo.product_name','product_productinfo.current_price','product_productinfo.product_id','districts.district_name')
                    ->get();

            // $viewcart = invoice::where('session_id',$session)->get();
            $contact = contact_us::where('id','1')->first();
                    // dd($viewcart);

        return view('User.invoicepaper',compact('viewcart','contact'));
    }
    
}
