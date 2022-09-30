<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\createadmin;
use Auth;
use Hash;
use Session;
use Validator;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Login()
    {
       return view('Login.Login');
    }

    public function Dashboard()
    {
        $user = DB::table('guest')->count();
        $inuser = DB::table('guest')->where('status','0')->count();
        $acuser = DB::table('guest')->where('status','1')->count();
        $seller = DB::table('sellers')->count();
        $inseller = DB::table('sellers')->where('status','0')->count();
        $acseller = DB::table('sellers')->where('status','1')->count();
        $order = DB::table('invoices')->count();
        $porder = DB::table('invoices')->where('status','0')->count();
        $pporder = DB::table('invoices')->where('status','1')->count();
        $onorder = DB::table('invoices')->where('status','2')->count();
        $sorder = DB::table('invoices')->where('status','3')->count();
        $reorder = DB::table('invoices')->where('status','4')->count();

        return view('Admin.index',compact('user','inuser','acuser','seller','inseller','acseller','order','porder','pporder','onorder','sorder','reorder'));
    }

    public function index()
    {
         $id =   Auth::guard('admin')->user();


    $mainlink = DB::table('linkpiority')
           ->join('adminmainmenu', 'adminmainmenu.id', '=', 'linkpiority.mainlinkid')
                 ->select('linkpiority.*','adminmainmenu.*')
           ->groupBy('linkpiority.mainlinkid')
           ->orderBy('adminmainmenu.serialNo', 'ASC')
               ->where('linkpiority.adminid',$id->id)
          ->get();

     $sublink = DB::table('linkpiority')
           ->join('adminsubmenu', 'adminsubmenu.id', '=', 'linkpiority.sublinkid')
            ->select('linkpiority.*','adminsubmenu.*')
            ->orderBy('adminsubmenu.serialno', 'ASC')
            ->where('linkpiority.adminid',$id->id)
            ->get();


     $Adminminlink = DB::table('adminmainmenu')
           ->orderBy('adminmainmenu.serialNo', 'ASC')
           ->get();

     $adminsublink = DB::table('adminsubmenu')
            ->orderBy('adminsubmenu.serialno', 'ASC')
           
            ->get();


        $mainMenu  = DB::table('adminmainmenu')
                ->orderBy('serialNo', 'asc')
                ->get();
        $submenu= DB::table('adminsubmenu') ->orderBy('serialno', 'ASC')->get();
        
        $adminwiseMain = DB::table('linkpiority')
                ->join('adminmainmenu', 'linkpiority.mainlinkid', '=', 'adminmainmenu.id')
                         ->groupBy('linkpiority.mainlinkid')
                ->where('linkpiority.adminid', $id->id)
                ->get();

        $adminwiseSub = DB::table('linkpiority')
                ->join('adminsubmenu', 'linkpiority.sublinkid', '=', 'adminsubmenu.id')
                 ->groupBy('linkpiority.sublinkid')
                ->where('linkpiority.adminid', $id->id)
                ->get();

        
        return view('Admin.Create_admin.index',compact('mainMenu','submenu','mainlink','id','sublink','Adminminlink','adminsublink','adminwiseMain','adminwiseSub'));
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
          'name' => 'required|max:100',
          'email' => 'required|unique:createadmin|max:100',
          'phone' => 'required',
          'address' => 'required',
          'password' => 'min:4',
          'confirm_password' => 'required_with:password|same:password|min:4'
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

         $file = $request->file('image');
        if (isset($file)) 
        {
            $path = rand().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/AdminImage/'),$path);
            
        }
        else
        {
            $path='';
        }

        $data = array(
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'password'=>Hash::make($request->password),
            'image'=>$path,
        );

        $insert = createadmin::create($data);

       if ($insert) {
          


            if(count($request->SublinkID) > 0){

                                for($i=0; $i<count($request->SublinkID); $i++){

                                    $expolaid=explode('and',$request->SublinkID[$i]);
                                    $fffff = DB::table('linkpiority')->insert(
                                            [
                                            'adminid' => createadmin::all()->last()->id, 
                                            'mainlinkid' => $expolaid[0], 
                                            'sublinkid' => $expolaid[1] 
                                        ]);

                                }
                        }

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
    public function show()
    {
         $data = createadmin::all();
        return view('Admin.Create_admin.view',compact('data'));
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
          $file = $request->file('image');
        if (isset($file)) 
        {
            $path = rand().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/AdminImage/'),$path);
            
        }
        else
        {
            $datas = createadmin::find($id);
            $path=$datas->image;
        }

        if ($request->password == "") 
        {
           $data = array(
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'image'=>$path,
            'status'=>'1',
        );
        }
        else
        {

        $data = array(
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'password'=>Hash::make($request->password),
            'image'=>$path,
            'status'=>'1',
        );
        
        }


        $update = createadmin::find($id)->update($data);


    if ($update) {
     if(count($request->SublinkID) > 0){

                            $deleteData= DB::table('linkpiority')->where('adminid', '=', $request->id)->delete();
                                for($i=0; $i<count($request->SublinkID); $i++){
                                    $expolaid=explode('and',$request->SublinkID[$i]);
                                    $search=DB::table('linkpiority')->where('adminid',$request->id)->where('mainlinkid',$expolaid[0])->where('sublinkid',$expolaid[1])->first();
                                    if($search){}else{
                                    $fffff = DB::table('linkpiority')->insert(
                                            ['adminid' => $request->id, 
                                            'mainlinkid' => $expolaid[0], 
                                            'sublinkid' => $expolaid[1] 
                                            ]
                                        );
                                    }

                                }
                        }

          $notification=array(
            'messege'   =>'Update Successfull',
            'alert-type'=>'info'
        );

        return redirect()->back()->with($notification); 
        }
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         $obj = DB::table('linkpiority')->where('adminid', '=', $request->id)->delete();
        $data = createadmin::find($request->id);

        $delete = createadmin::find($request->id)->delete();
        
        $path= base_path().'/public/AdminImage/'.$data->image;
            if(file_exists($path)){
                unlink($path);
            }
      
    }

    public function LoginAdmin(Request $request)
    {

        $creadintial = ['email'=>$request->email,'password'=>$request->password];
        if (Auth('admin')->attempt($creadintial)) 
        {
            if (Auth('admin')->user()->status === '0') 
            {
                Auth('admin')->logout();

                 $notification=array(
            'messege'   =>'Your Account Access Pending!',
            'alert-type'=>'warning'
        );

        return redirect()->back()->with($notification); 
            }

            else
            {
                $notification=array(
            
            'messege'   =>'Login Successfull',
            'alert-type'=>'success'
        );

        return redirect('/Admin-dashboard')->with($notification); 
            }
        }
        else
        {
            $notification=array(
            'messege'   =>'Password and E-mail Does not match!',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
        }
    }

    public function Adminlogout()
    {
        Auth('admin')->logout();

          $notification=array(
            'messege'   =>'Logout Successfull!',
            'alert-type'=>'info'
        );

        return redirect('/administrator')->with($notification);
    }

    public function inactivestatusadmin(Request $request)
    {
         $inac = DB::table('createadmin')
         ->where('id',$request->id)
         ->update(['status'=>'0']);
    }
    public function activestatusadmin(Request $request)
    {
         $inac = DB::table('createadmin')
         ->where('id',$request->id)
         ->update(['status'=>'1']);
    }

    public function editadminModal($id)
    {



    $mainlink = DB::table('linkpiority')
           ->join('adminmainmenu', 'adminmainmenu.id', '=', 'linkpiority.mainlinkid')
                 ->select('linkpiority.*','adminmainmenu.*')
           ->groupBy('linkpiority.mainlinkid')
           ->orderBy('adminmainmenu.serialNo', 'ASC')
               ->where('linkpiority.adminid',$id)
          ->get();

     $sublink = DB::table('linkpiority')
           ->join('adminsubmenu', 'adminsubmenu.id', '=', 'linkpiority.sublinkid')
            ->select('linkpiority.*','adminsubmenu.*')
            ->orderBy('adminsubmenu.serialno', 'ASC')
            ->where('linkpiority.adminid',$id)
            ->get();


     $Adminminlink = DB::table('adminmainmenu')
           ->orderBy('adminmainmenu.serialNo', 'ASC')
           ->get();

     $adminsublink = DB::table('adminsubmenu')
            ->orderBy('adminsubmenu.serialno', 'ASC')
           
            ->get();


        $mainMenu  = DB::table('adminmainmenu')
                ->orderBy('serialNo', 'asc')
                ->get();
        $submenu= DB::table('adminsubmenu') ->orderBy('serialno', 'ASC')->get();
        
        $adminwiseMain = DB::table('linkpiority')
                ->join('adminmainmenu', 'linkpiority.mainlinkid', '=', 'adminmainmenu.id')
                         ->groupBy('linkpiority.mainlinkid')
                ->where('linkpiority.adminid', $id)
                ->get();

        $adminwiseSub = DB::table('linkpiority')
                ->join('adminsubmenu', 'linkpiority.sublinkid', '=', 'adminsubmenu.id')
                 ->groupBy('linkpiority.sublinkid')
                ->where('linkpiority.adminid', $id)
                ->get();

        $data = createadmin::findOrFail($id);

        return view('Admin.Create_admin.modal',compact('mainMenu','submenu','mainlink','id','sublink','Adminminlink','adminsublink','adminwiseMain','adminwiseSub','data'));
    }
   
}
