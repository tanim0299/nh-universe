<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product_item;
use App\product_category;
use App\product_company;
use App\product_measurement;
use App\product_color_info;
use App\product_color;
use App\product_size;
use App\product_size_info;
use App\product_info;
use App\product_image;
use App\product_subcategory;
use App\seller;
use App\explore_banner;
use App\slider;
use App\customer_message;
use App\offer_setup;
use Validator;
use DB;
use Auth;
use Mail;
use Analytics;
use Spatie\Analytics\Period;
class HomepageController extends Controller
{
  public function index()
  {
      
    //  dd(Analytics::fetchMostVisitedPages(Period::days(7)));
      
    date_default_timezone_set('Asia/Dhaka');
    $recent = product_info::orderBy('id', 'ASC')->where('status','1')->take(6)->get();
    $men = product_info::orderBy('id', 'desc')->where('status','1')->where('item_id',21)->take(12)->get();


    $women = product_info::orderBy('id', 'desc')->where('status','1')->where('item_id',22)->take(12)->get();


    $Electronics = product_info::orderBy('id', 'desc')->where('status','1')->where('item_id',24)->take(12)->get();


    $life = product_info::orderBy('id', 'desc')->where('status','1')->where('item_id',4)->take(10)->get();
    

    $allitems = DB::table('product_item')->where('shop_by','1')->get();
    $allcats = product_category::where('shop_by','1')->orderby('sl')->get();
    $brand = DB::table('product_company')->get();

    $seller = seller::orderBy('id', 'ASC')->get();

      // ------------------Slider--------------------
    $slider=slider::orderBy('id', 'ASC')->take(1)->first();
    $slidermore=slider::orderBy('id', 'ASC')->skip(1)->take(5)->get();

      // --------------Banner------------------
    $topbannerleft=explore_banner::orderBy('sl', 'DESC')->first();
    $topbannerleftmore=explore_banner::orderBy('sl', 'DESC')->skip(1)->take(2)->get();
    $topbannerleft2=explore_banner::orderBy('sl', 'DESC')->skip(3)->take(4)->get();
    $topbannerright=explore_banner::orderBy('sl', 'DESC')->skip(7)->take(4)->get();

    
    $midbannertop=explore_banner::orderBy('sl', 'ASC')->skip(6)->take(3)->get();
    $midbannerbottom=explore_banner::orderBy('sl', 'ASC')->skip(12)->take(2)->get();
    $midbanner=explore_banner::orderBy('sl', 'ASC')->skip(14)->take(12)->get();
    $bottombannertop=explore_banner::orderBy('sl', 'ASC')->skip(26)->take(2)->get();
    $bottombannerbottom=explore_banner::orderBy('sl', 'ASC')->skip(28)->take(8)->get();
    $footerbanner=explore_banner::orderBy('sl', 'ASC')->skip(36)->take(4)->get();

    $datetime = DB::select('SELECT NOW() as dates');
    foreach ($datetime as $key => $value) 
    {

      $newdate=   $value->dates;


    }



    $flashsale = offer_setup::orderBy('id', 'DESC')
    ->where('start_date_time','<=',$newdate)
    ->where('end_date_time','>=',$newdate)
    ->where('type','1')
    ->where('status','1')
    ->get();
    

    $exclusive = offer_setup::orderBy('id', 'DESC')
    ->where('type','3')
    ->where('status','1')
    ->limit(6)
    ->get();
    
  

    return view('User.layouts.home',compact('recent','men','women','Electronics','life','topbannerleft','topbannerright','midbannertop','midbannerbottom','midbanner','bottombannertop','bottombannerbottom','footerbanner','slider','slidermore','seller','flashsale','newdate','exclusive','allitems','brand','allcats','topbannerleft2','topbannerleftmore'));
  }

  public function fetch_time(Request $request)
  {
   $datetime = DB::select('SELECT NOW() as dates');
   foreach ($datetime as $key => $value) 
   {

    $newdate=   $value->dates;


  }

  return $newdate;
}


public function About_us()
{ 
  $about = DB::table('about_us')
  ->first();
  return view('User.about', compact('about'));
}


public function Term_Condition()
{ 
  $term = DB::table('terms_use')
  ->first();
  return view('User.term', compact('term'));
}


public function Privacy_Policy()
{ 
  $privacy_policy = DB::table('privacy_policy')
  ->first();
  return view('User.privacy_policy', compact('privacy_policy'));
}


public function FAQ()
{ 
  $faq_infos = DB::table('faq_infos')
  ->first();
  return view('User.faq_infos', compact('faq_infos'));
}


public function Contact_us()
{ 

  $contact_us = DB::table('contact_us')
  ->first();
  return view('User.contact_us', compact('contact_us'));
}


public function howbuy()
{
 $type="How To Buy";
 $data = DB::table('how_buys')
 ->first();
 return view('User.details',compact('data','type'));
}
public function replacement()
{
 return view('User.details');
}
public function Career()
{
  $type="Career";
  $data = DB::table('career_infos')
  ->first();
  return view('User.details',compact('data','type'));
}
public function COD()
{
  $type="COD";
  $data = DB::table('cod_us')
  ->first();
  return view('User.details',compact('data','type'));
}

public function customermessage(Request $request)
{
 $validator = Validator::make($request->all(), [
  'name' => 'required',
  'description' => 'required',
]);

 if ($validator->fails()) {
  return redirect()->back()
  ->withErrors($validator)
  ->withInput();
}
customer_message::create($request->all());

$notification=array(
  'messege'   =>'Message Send Successfully',
  'alert-type'=>'success'
);

return redirect()->back()->with($notification); 
}

public function shop()
{    
 $shop = DB::table('product_productinfo')
 ->where('status','1')
 ->orderBy('id', 'DESC')
 ->paginate(48);
 $brand =product_company::all();
 $size =product_size_info::all();
 $color =product_color_info::all();
 return view('User.shop',compact('shop','brand','size','color'));
}


public function newproduct_show()
{
 $shop = DB::table('product_productinfo')
 ->where('status','1')
 ->orderBy('id', 'DESC')
 ->paginate(48);
 $brand =product_company::all();
 $size =product_size_info::all();
 $color =product_color_info::all();
 return view('User.shop',compact('shop','brand','size','color'));

}
public function item_wise($name,$id)
{   
 $product_cat = DB::table('product_productinfo')
 ->join('product_category','product_productinfo.category_id','product_category.id')
 ->where('product_productinfo.item_id', $id)
 ->select('product_productinfo.*', 'product_category.category_name')
 ->orderBy('product_productinfo.id', 'DESC')
 ->where('product_productinfo.status','1')
 ->paginate(16); 
 $item =product_item::find($id);
  $brand =product_company::join('product_productinfo','product_productinfo.brand_id','product_company.id')->where('product_productinfo.item_id', $id)->select('product_company.*')
  ->groupby('product_company.id')
  ->get();
 $color = DB::table('product_color')
 ->join('product_productinfo','product_productinfo.id','product_color.product_id')
 ->where('product_productinfo.item_id', $id)
 ->select('product_color.*')
 ->orderBy('product_color.color', 'ASC')
 ->groupby('product_color.color')
 ->get(); 
 
 $size = DB::table('product_size')
 ->join('product_productinfo','product_productinfo.id','product_size.product_id')
 ->where('product_productinfo.item_id', $id)
 ->select('product_size.*')
 ->orderBy('product_size.size', 'ASC')
 ->groupby('product_size.size')
 ->get();
 
 
 $category = DB::table('product_category')->where('item_id', $id)->get();
 
 
 
 
 
 return view('User.item', compact('product_cat','brand','size','color','id','item','category'));
}


public function category_wise($name,$id)
{   
 $product_cat = DB::table('product_productinfo')
 ->join('product_category','product_productinfo.category_id','product_category.id')
 ->where('product_productinfo.category_id', $id)
 ->select('product_productinfo.*', 'product_category.category_name')
 ->orderBy('product_productinfo.id', 'DESC')
 ->where('product_productinfo.status','1')
 ->paginate(16); 

 $category=product_category::find($id);
   $brand =product_company::join('product_productinfo','product_productinfo.brand_id','product_company.id')->where('product_productinfo.category_id', $id)->select('product_company.*')->groupby('product_company.id')->get();
 $color = DB::table('product_color')
 ->join('product_productinfo','product_productinfo.id','product_color.product_id')
 ->where('product_productinfo.category_id', $id)
 ->select('product_color.*')
 ->orderBy('product_color.color', 'ASC')
 ->groupby('product_color.color')
 ->get(); 
 
 $size = DB::table('product_size')
 ->join('product_productinfo','product_productinfo.id','product_size.product_id')
 ->where('product_productinfo.category_id', $id)
 ->select('product_size.*')
 ->orderBy('product_size.size', 'ASC')
 ->groupby('product_size.size')
 ->get();
 
 
  
 $subcategory = DB::table('product_subcategory')->where('category_id', $id)->get();
 
 

 return view('User.category', compact('product_cat','brand','size','color','id','category','subcategory'));
}

public function subcategory_wise($name,$id)
{   
 $product_cat = DB::table('product_productinfo')
 ->join('product_category','product_productinfo.category_id','product_category.id')
 ->where('product_productinfo.subcategory_id', $id)
 ->select('product_productinfo.*', 'product_category.category_name')
 ->orderBy('product_productinfo.id', 'DESC')
 ->where('product_productinfo.status','1')
 ->paginate(16); 


 $subcategory=product_subcategory::find($id);
  $brand =product_company::join('product_productinfo','product_productinfo.brand_id','product_company.id')->where('product_productinfo.subcategory_id', $id)->groupby('product_company.id')->select('product_company.*')->get();
 $color = DB::table('product_color')
 ->join('product_productinfo','product_productinfo.id','product_color.product_id')
 ->where('product_productinfo.subcategory_id', $id)
 ->select('product_color.*')
 ->orderBy('product_color.color', 'ASC')
 ->groupby('product_color.color')
 ->get(); 
 
 $size = DB::table('product_size')
 ->join('product_productinfo','product_productinfo.id','product_size.product_id')
 ->where('product_productinfo.subcategory_id', $id)
 ->select('product_size.*')
 ->orderBy('product_size.size', 'ASC')
 ->groupby('product_size.size')
 ->get();

 return view('User.subcategory', compact('product_cat','brand','size','color','id','subcategory'));
}


public function single_product($name,$id)
{

 $viewproduct = DB::table('product_productinfo')
 ->join('product_item','product_item.id','product_productinfo.item_id')
 ->join('product_category','product_category.id','product_productinfo.category_id')
 ->join('product_measurement','product_measurement.id','product_productinfo.measurement_type')
 ->join('product_company','product_company.id','product_productinfo.brand_id')
 ->select('product_productinfo.*','product_item.item_name','product_category.category_name','product_measurement.measurement_type as measurementName','product_company.company_name')
 ->where('product_productinfo.product_id', $id)
 ->first();

 $stock = DB::table('productstocks')->where('product_id',$viewproduct->id)->sum('quentity');
 $salequntshopping = DB::table('shopping_carts')
 ->where('status','1')
 ->where('product_id',$viewproduct->id)
 ->sum('quantity');
 $related_product1 = DB::table('product_productinfo')->limit(2)->get();

 $related_product = DB::table('product_productinfo')
 ->where('subcategory_id',$viewproduct->subcategory_id)
 ->take(6)
 ->get();

 $cod = DB::table('cod_us')->where('id','1')->first(); 
 $product_image = product_image::all(); 
  $product_color = DB::table('productstocks')->where('product_id',$viewproduct->id)->groupby('color')->get(); 
 $product_size = DB::table('productstocks')->where('product_id',$viewproduct->id)->groupby('size')->get(); 
 $product_image = product_image::all(); 
$review = DB::table('reviews')
->join('product_productinfo','product_productinfo.id','reviews.product_id')
->join('guest','guest.id','reviews.customer_id')
->where('reviews.status','1')
->where('reviews.product_id',$viewproduct->id)
->select('reviews.*','guest.image')
->get();
 return view('User.single-product',compact('viewproduct','related_product','related_product1','product_image','product_color','product_size','stock','salequntshopping','cod'));

}

public function getProductcolor(Request $request)
{
    $product_color = DB::table('productstocks')->where('product_id',$request->product_id)->where('size',$request->size)->groupby('color')->get(); 
    
    if($product_color)
    {
        foreach($product_color as $color)
        {
          echo '<option>'.$color->color.'</option>';  
        }
    }
}




public function AddCarts($id)
{

 $viewproduct = DB::table('product_productinfo')
 ->join('product_item','product_item.id','product_productinfo.item_id')
 ->join('product_category','product_category.id','product_productinfo.category_id')
 ->join('product_measurement','product_measurement.id','product_productinfo.measurement_type')
 ->join('product_company','product_company.id','product_productinfo.brand_id')
 ->select('product_productinfo.*','product_item.item_name','product_category.category_name','product_measurement.measurement_type as measurementName','product_company.company_name')
 ->where('product_productinfo.product_id', $id)
 ->first();

 $stock = DB::table('productstocks')->where('product_id',$viewproduct->id)->sum('quentity');
 $salequntshopping = DB::table('shopping_carts')
 ->where('status','1')
 ->where('product_id',$viewproduct->id)
 ->sum('quantity');
 $related_product1 = DB::table('product_productinfo')->limit(2)->get();

 $related_product = DB::table('product_productinfo')
 ->where('subcategory_id',$viewproduct->subcategory_id)
 ->take(6)
 ->get();

 $cod = DB::table('cod_us')->where('id','1')->first(); 
 $product_image = product_image::all(); 
  $product_color = DB::table('productstocks')->where('product_id',$viewproduct->id)->groupby('color')->get(); 
 $product_size = DB::table('productstocks')->where('product_id',$viewproduct->id)->groupby('size')->get(); 
 $product_image = product_image::all(); 
$review = DB::table('reviews')
->join('product_productinfo','product_productinfo.id','reviews.product_id')
->join('guest','guest.id','reviews.customer_id')
->where('reviews.status','1')
->where('reviews.product_id',$viewproduct->id)
->select('reviews.*','guest.image')
->get();
 return view('User.AddCarts',compact('viewproduct','related_product','related_product1','product_image','product_color','product_size','stock','salequntshopping','cod'));

}









 // ================Search=======================


public function seller()
{

  $shopdata = seller::all();
  return view('User.Seller.shop',compact('shopdata'));

}



public function sellerProduct($name,$id)
{   
 $product_cat = DB::table('product_productinfo')
 ->join('product_category','product_productinfo.category_id','product_category.id')
 ->where('product_productinfo.seller_id', $id)
 ->select('product_productinfo.*', 'product_category.category_name')
 ->orderBy('product_productinfo.id', 'DESC')
 ->where('product_productinfo.status','1')
 ->paginate(12); 


 $brand =product_company::join('product_productinfo','product_productinfo.brand_id','product_company.id')->where('product_productinfo.seller_id', $id)->select('product_company.*')->groupby('product_company.id')->get();
  $color = DB::table('product_color')
 ->join('product_productinfo','product_productinfo.id','product_color.product_id')
 ->where('product_productinfo.seller_id', $id)
 ->select('product_color.*')
 ->orderBy('product_color.color', 'ASC')
 ->groupby('product_color.color')
 ->get(); 
 
 $size = DB::table('product_size')
 ->join('product_productinfo','product_productinfo.id','product_size.product_id')
 ->where('product_productinfo.seller_id', $id)
 ->select('product_size.*')
 ->orderBy('product_size.size', 'ASC')
 ->groupby('product_size.size')
 ->get();
 $seller =seller::where('id',$id)->first();
    //   dd($seller);
 return view('User.Seller.seller_product', compact('product_cat','brand','size','color','seller'));
}



public function offer(){

 $offer = product_info::orderBy('id', 'desc')->where('status','1')->take(12)->get();
 return view('User.offer', compact('offer'));
}



public function allcategory(){

 $allcategory = product_item::orderBy('id', 'ASC')->get();
 return view('User.allcategory', compact('allcategory'));
}

public function Full_filled()
{
  $type = '1';
  $brand = product_company::orderBy('id', 'ASC')->get();
  $size = product_size_info::orderBy('id', 'ASC')->get();
  $color = product_color_info::orderBy('id', 'ASC')->get();
  $shop = product_info::orderBy('id', 'DESC')->where('seller_id','45')->where('status','1')->paginate(10);
  return view('User.offer-page', compact('shop','brand','size','color','type'));
}

public function special_offer()
{
  $type = '2';
  $brand = product_company::orderBy('id', 'ASC')->get();
  $size = product_size_info::orderBy('id', 'ASC')->get();
  $color = product_color_info::orderBy('id', 'ASC')->get();
  $shop = offer_setup::orderBy('id', 'DESC')->where('type','2')->where('status','1')->paginate(10);
  return view('User.offer-page', compact('shop','brand','size','color','type'));
}
public function exclusive_offer()
{
  $type = '3';
  $brand = product_company::orderBy('id', 'ASC')->get();
  $size = product_size_info::orderBy('id', 'ASC')->get();
  $color = product_color_info::orderBy('id', 'ASC')->get();
  $shop = offer_setup::orderBy('id', 'DESC')->where('type','3')->where('status','1')->paginate(10);
  return view('User.offer-page', compact('shop','brand','size','color','type'));
}
public function Best_sale()
{

 $type = '4';
 $brand = product_company::orderBy('id', 'ASC')->get();
 $size = product_size_info::orderBy('id', 'ASC')->get();
 $color = product_color_info::orderBy('id', 'ASC')->get();
 $shop = offer_setup::orderBy('id', 'DESC')->where('type','4')->where('status','1')->paginate(10);
 return view('User.offer-page', compact('shop','brand','size','color','type'));

}
public function express_offer()
{

 $type = '7';
 $brand = product_company::orderBy('id', 'ASC')->get();
 $size = product_size_info::orderBy('id', 'ASC')->get();
 $color = product_color_info::orderBy('id', 'ASC')->get();
 $shop = offer_setup::orderBy('id', 'DESC')->where('type','5')->where('status','1')->paginate(10);
 return view('User.offer-page', compact('shop','brand','size','color','type'));

}
        public function flash_offer()
    {

       $type = '8';
       $brand = product_company::orderBy('id', 'ASC')->get();
       $size = product_size_info::orderBy('id', 'ASC')->get();
       $color = product_color_info::orderBy('id', 'ASC')->get();
       
        $datetime = DB::select('SELECT NOW() as dates');
          foreach ($datetime as $key => $value) 
          {
              
          $newdate=   $value->dates;
            
              
          }
          
                
                
      $shop = offer_setup::orderBy('id', 'DESC')
      ->where('start_date_time','<=',$newdate)
      ->where('end_date_time','>=',$newdate)
      ->where('type','1')
      ->where('status','1')
      ->get();
      return view('User.flash-page', compact('shop','brand','size','color','type','newdate'));

    }

  public function searchproducts(Request $request)
  
  {

    $search  = $request->search;


    
    $searchproducts = DB::table('product_productinfo')
    ->where('product_name','like','%'.$search.'%')
    ->where('status','1')
    ->paginate(40);

    return view('User.searchproducts', compact('searchproducts'));


  }
  public function search_Product_List(Request $request)
  
  {

      $search  = $request->searchtext;
     $cate_id  = $request->cate_id;


    
    $searchproducts = DB::table('product_productinfo')
    ->where('product_name','like','%'.$search.'%')
    ->where('status','1')
    ->where('category_id',$cate_id)
    ->get();

    return view('User.home_search_Product_List', compact('searchproducts'));


  }
  public function Get_itemwiseproduct(Request $request)
  {

    $item_id  = $request->item_id;


       $datetime = DB::select('SELECT NOW() as dates');
    foreach ($datetime as $key => $value) 
    {

      $newdate=   $value->dates;


    }

   
    
   
       $shop = offer_setup::orderBy('id', 'DESC')
    ->where('start_date_time','<=',$newdate)
    ->where('end_date_time','>=',$newdate)
    ->where('item_id','=',$item_id)
    ->where('type','1')
    ->where('status','1')
    ->get();

    return view('User.showflash', compact('shop'));


  }
  
  public function Get_catwiseproduct(Request $request)
  
  {

    $category_id  = $request->category_id;

   $datetime = DB::select('SELECT NOW() as dates');
    foreach ($datetime as $key => $value) 
    {

      $newdate=   $value->dates;


    }

    
   
       $shop = offer_setup::orderBy('id', 'DESC')
    ->where('start_date_time','<=',$newdate)
    ->where('end_date_time','>=',$newdate)
    ->where('category_id','=',$category_id)
    ->where('type','1')
    ->where('status','1')
    ->get();

    return view('User.showflash', compact('shop'));


  }
  
  public function Get_subcatwiseproduct(Request $request)
  {

    $subcat_id  = $request->subcat_id;

   $datetime = DB::select('SELECT NOW() as dates');
    foreach ($datetime as $key => $value) 
    {

      $newdate=   $value->dates;


    }

    
       $shop = offer_setup::orderBy('id', 'DESC')
    ->where('start_date_time','<=',$newdate)
    ->where('end_date_time','>=',$newdate)
    ->where('subcategory_id','=',$subcat_id)
    ->where('type','1')
    ->where('status','1')
    ->get();

    return view('User.showflash', compact('shop'));


  }

  public function Track_order(){
    return view('User.Track_order');
  }



  public function Import(){
    $view = DB::table('import_exports')->where('type',0)->get();
    return view('User.Import',compact('view'));
  }

    public function View_Import($id){
    $view = DB::table('import_exports')->where('id', $id)->first();
    $cod = DB::table('cod_us')->where('id','1')->first(); 
    
    return view('User.View_Import',compact('view','cod'));
  }


  public function Export(){
    $view = DB::table('import_exports')->where('type',1)->get();
    return view('User.Export',compact('view'));
  }


  public function export_import_sent(Request $request){
      
       
        if($request->export_btn)
        {
            DB::table('import_export_mail')->insert([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'description'=>$request->description,
                'type'=>'Export',
                ]);


          $data=[];
          $type = 'Export';
          $phone = $request->phone;
          $description = $request->description;
          $to_name = $request->name;
          $to_email = $request->email;
          $datas = array('name'=>"HalalBuy Export", "body" => "mailed");
              
        
          Mail::send('User.Guest.mailsent',compact('data','phone','description','to_name','to_email','type'), function($message) use ($to_name, $to_email) {
              $message->to('thehalalbuy@gmail.com', $to_name)
                      ->subject('Halalbuy Export');
              $message->from('thehalalbuy@gmail.com','Export Information Enquery');
          });

    return redirect()->back();

        }
        else
        {
        
         DB::table('import_export_mail')->insert([
                'type'=>'Import',
                'name'=>$request->name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'description'=>$request->description
                ]);
                
          $data=[];
          $type = 'Import';
          $phone = $request->phone;
          $description = $request->description;
          $to_name = $request->name;
          $to_email = $request->email;
          $datas = array('name'=>"HalalBuy Import", "body" => "mailed");
              
          Mail::send('User.Guest.mailsent',compact('data','phone','description','to_name','to_email','type'), function($message) use ($to_name, $to_email) {
              $message->to('thehalalbuy@gmail.com', $to_name)
                      ->subject('Halalbuy Import');
              $message->from('thehalalbuy@gmail.com','Import Information Enquery');
          });
         return redirect()->back();
        }

       
          
          
  }
  
  

    public function View_Export($id){
    $view = DB::table('import_exports')->where('id', $id)->first();
       $cod = DB::table('cod_us')->where('id','1')->first(); 
    return view('User.View_Export',compact('view','cod'));
  }


  public function Wholesale(){
    $view = DB::table('import_exports')->where('type',2)->get();
    return view('User.Wholesale',compact('view'));
  }


    public function View_Wholsale($id){
    $view = DB::table('import_exports')->where('id', $id)->first();
    return view('User.View_Wholsale',compact('view'));
  }



}
