<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class OtherController extends Controller
{
	public function about_us(){
		$about = DB::table('about_us')
		->first();
		return view('Admin.other.about', compact('about'));
	}


	public function updateabout_us(Request $request,$id){

		$data=array();
		$data['description'] = $request->details;
		DB::table('about_us')
		->where('id', $id)
		->update($data);
		$notification=array(
			'messege'   =>'Update Successfull',
			'alert-type'=>'success'
		);
		return redirect()->back()->with($notification); 
		
	}



	public function term(){
		$term = DB::table('terms_use')
		->first();
		return view('Admin.other.term', compact('term'));
	}


	public function updateterm(Request $request,$id){

		$data=array();
		$data['description'] = $request->details;
		DB::table('terms_use')
		->where('id', $id)
		->update($data);
		$notification=array(
			'messege'   =>'Update Successfull',
			'alert-type'=>'success'
		);
		return redirect()->back()->with($notification); 
		
	}




	public function privacy(){
		$privacy = DB::table('privacy_policy')
		->first();
		return view('Admin.other.privacy', compact('privacy'));
	}


	public function updateprivacy(Request $request,$id){

		$data=array();
		$data['description'] = $request->details;
		DB::table('privacy_policy')
		->where('id', $id)
		->update($data);
		$notification=array(
			'messege'   =>'Update Successfull',
			'alert-type'=>'success'
		);
		return redirect()->back()->with($notification); 
		
	}




	public function faq(){
		$faq = DB::table('faq_infos')
		->first();
		return view('Admin.other.faq', compact('faq'));
	}


	public function updatefaq(Request $request,$id){

		$data=array();
		$data['description'] = $request->details;
		DB::table('faq_infos')
		->where('id', $id)
		->update($data);
		$notification=array(
			'messege'   =>'Update Successfull',
			'alert-type'=>'success'
		);
		return redirect()->back()->with($notification); 
		
	}



	public function contact_us(){
		$contact_us = DB::table('contact_us')
		->first();
		return view('Admin.other.contact_us', compact('contact_us'));
	}


	public function updatecontact_us(Request $request,$id){

		$data=array();
		$data['description'] = $request->details;
		DB::table('contact_us')
		->where('id', $id)
		->update($data);
		$notification=array(
			'messege'   =>'Update Successfull',
			'alert-type'=>'success'
		);
		return redirect()->back()->with($notification); 
		
	}



	public function howtobuy(){
		$buys = DB::table('how_buys')
		->first();
		return view('Admin.other.how_buys', compact('buys'));
	}


	public function updatehowtobuy(Request $request,$id){

		$data=array();
		$data['description'] = $request->details;
		DB::table('how_buys')
		->where('id', $id)
		->update($data);
		$notification=array(
			'messege'   =>'Update Successfull',
			'alert-type'=>'success'
		);
		return redirect()->back()->with($notification); 
		
	}


	public function COD(){
		$cod = DB::table('cod_us')
		->first();
		return view('Admin.other.cod', compact('cod'));
	}


	public function updatecod(Request $request,$id){

		$data=array();
		$data['description'] = $request->details;
		DB::table('cod_us')
		->where('id', $id)
		->update($data);
		$notification=array(
			'messege'   =>'Update Successfull',
			'alert-type'=>'success'
		);
		return redirect()->back()->with($notification); 
		
	}


	public function CareerAdd(){
		$career = DB::table('career_infos')
		->first();
		return view('Admin.other.CareerAdd', compact('career'));
	}


	public function updateCareerAdd(Request $request,$id){

		$data=array();
		$data['description'] = $request->details;
		DB::table('career_infos')
		->where('id', $id)
		->update($data);
		$notification=array(
			'messege'   =>'Update Successfull',
			'alert-type'=>'success'
		);
		return redirect()->back()->with($notification); 
		
	}
	
	
	public function announcementadd(){
		$data = DB::table('announcement')
		->orderby('id','DESC')
		->first();
		return view('Admin.other.announcement', compact('data'));
	}


	public function insertannouncement(Request $request){

		$data=array();
		$data['description'] = $request->description;
		$data['title'] = $request->title;
		DB::table('announcement')
		->insert($data);
		$notification=array(
			'messege'   =>'Update Successfull',
			'alert-type'=>'success'
		);
		return redirect()->back()->with($notification); 
		
	}
	
	public function newsadd(){
		$data = DB::table('news')
		->orderby('id','DESC')
		->first();
		return view('Admin.other.news', compact('data'));
	}


	public function insertnews(Request $request){

		$data=array();
		$data['description'] = $request->description;
		DB::table('news')
		->insert($data);
		$notification=array(
			'messege'   =>'Update Successfull',
			'alert-type'=>'success'
		);
		return redirect()->back()->with($notification); 
		
	}
	
	public function customermessage()
	{
		$data = DB::table('customer_messages')
		->get();
		return view('Admin.other.customer_sms', compact('data'));
	}


	public function customersmsdelete($id){


		DB::table('customer_messages')
		->where('id', $id)
		->delete();
		$notification=array(
			'messege'   =>'Delete Successfull',
			'alert-type'=>'error'
		);
		return redirect()->back()->with($notification); 
		
	}


	public function setting(){

		$view  = DB::table('settings')->first();
		return view('Admin.other.settings', compact('view'));
	}



	public function updatesetting(Request $request,$id){

		$data=array();
		$data['title'] = $request->title;
		$data['hotline'] = $request->hotline;
		$data['facebook'] = $request->facebook;
		$data['twitter'] = $request->twitter;
		$data['instragram'] = $request->instragram;
		$data['youtube'] = $request->youtube;
		DB::table('settings')
		->where('id',$id)
		->update($data);
		$notification=array(
			'messege'   =>'Update Successfull',
			'alert-type'=>'success'
		);
		return redirect()->back()->with($notification); 
		
	}


	public function addimportexport(){
		return view('Admin.other.addimportexport');
	}


	public function addimportexports(Request $request){

		$data = array();
		$data['title']   = $request->title;
		$data['type']   = $request->type;
		$data['short_details']   = $request->short_details;
		$data['details']   = $request->details;
		$image               = $request->file('image');

		if ($image) {
			$image_name= date('dmy_H_s_i');

			$ext=strtolower($image->getClientOriginalExtension());
			$image_full_name=$image_name.'.'.$ext;
			$upload_path='public/import_export_img/';
			$image_url=$upload_path.$image_full_name;
			$success=$image->move($upload_path,$image_full_name);
			$data['image']=$image_url;
			$insert=DB::table('import_exports')
			->insert($data);
			$notification=array(
				'messege'=>'Add Successfull',
				'alert-type'=>'success'
			);
			return Redirect()->back()->with($notification);                      
		}else{
			$insert=DB::table('import_exports')
			->insert($data);
			$notification=array(
				'messege'=>'Add Successfull',
				'alert-type'=>'success'
			);
			return Redirect()->back()->with($notification); 
		}



	}

	
	public function viewimportexport(){
		$view = DB::table('import_exports')->get();
		return view('Admin.other.viewimportexport',compact('view'));
	}



	public function DeleteImportExport($id){

		$data = DB::table('import_exports')->where('id',$id)->first();
		$image  = $data->image;
		unlink($image);
		DB:: table('import_exports')->where('id', $id)->delete();
		$notification=array(
			'messege'   =>'Delete Successfull',
			'alert-type'=>'error'
		);
		return Redirect()->back()->with($notification);	
	}



	
	public function EditImportExport($id){
		$view = DB::table('import_exports')->where('id',$id)->first();
		return view('Admin.other.EditImportExport',compact('view'));
	}


	public function updateimportexports(Request $request,$id){

		$old_image=$request->old_images;
		$data = array();
		$data['title']   = $request->title;
		$data['type']   = $request->type;
		$data['short_details']   = $request->short_details;
		$data['details']   = $request->details;
		$image               = $request->file('image');


		if ($image) {
			unlink($old_image);
			$image_name= date('dmy_H_s_i');

			$ext=strtolower($image->getClientOriginalExtension());
			$image_full_name=$image_name.'.'.$ext;
			$upload_path='public/import_export_img/';
			$image_url=$upload_path.$image_full_name;
			$success=$image->move($upload_path,$image_full_name);
			$data['image']=$image_url;
			$insert=DB::table('import_exports')->where('id', $id)->update($data);
			$notification=array(
				'messege'=>'Update Successfull',
				'alert-type'=>'success'
			);
			return Redirect()->back()->with($notification);                      
		}else{
			$insert=DB::table('import_exports')->where('id', $id)->update($data);
			$notification=array(
				'messege'=>'Update Successfull',
				'alert-type'=>'success'
			);
			return Redirect()->back()->with($notification); 
		}




	}




}
