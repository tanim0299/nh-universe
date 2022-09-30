<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Monjur ajad">
<meta http-equiv="Pragma" content="no-cache" />
<!--favicon icon-->

<title>Admin Dashboard</title>
<link rel="icon" href="{{asset('public')}}/favicon.png" type="image/x-icon" style="height: auto;" />

<!--google font-->
<link href="http://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">


<!--common style-->
<link href="{{asset('/public')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="{{asset('/public')}}/assets/vendor/lobicard/css/lobicard.css" rel="stylesheet">
<link href="{{asset('/public')}}/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="{{asset('/public')}}/assets/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
<link href="{{asset('/public')}}/assets/vendor/themify-icons/css/themify-icons.css" rel="stylesheet">
<link href="{{asset('/public')}}/assets/vendor/weather-icons/css/weather-icons.min.css" rel="stylesheet">

<!--easy pie chart-->
<link href="{{asset('/public')}}/assets/vendor/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet">

<!--custom css-->
<link href="{{asset('/public')}}/assets/css/main.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.8/dist/css/uikit.min.css" />

<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.8/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.8/dist/js/uikit-icons.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
 <link media="all" type="text/css" rel="stylesheet" href="{{asset('public/Frontend')}}/js/select2.min.css">
 <style>
     .select2-container--default .select2-selection--single{
  line-height: 25px;
  height: 45px;
  border-radius: 0px;
  border:1px solid #f1f1f1;
  font-size: 13px;
  color: gray;
}



.select2-container--default .select2-selection--single .select2-selection__rendered{
  line-height: 25px;

}

.select2-container--default .select2-selection--single .select2-selection__arrow b{
  margin-top: 5px;
}
 </style>
<body class="app header-fixed left-sidebar-fixed right-sidebar-fixed right-sidebar-overlay right-sidebar-hidden">

    <header class="app-header navbar">

        <!--brand start-->
        <div class="navbar-brand" style="background-color:#fcf8f8">
            <a class="" href="{{asset('/Admin-dashboard')}}" style="text-decoration:none;color:black;font-family:monospace">
              {{Auth('admin')->user()->name}}
              
          </a>
      </div>
      <!--brand end-->

      <!--left side nav toggle start-->
      <ul class="nav navbar-nav mr-auto">
        <li class="nav-item d-lg-none">
            <button class="navbar-toggler mobile-leftside-toggler" type="button"><i class="ti-align-right"></i></button>
        </li>
        <li class="nav-item d-md-down-none">
            <a class="nav-link navbar-toggler left-sidebar-toggler" href="#"><i class=" ti-align-right"></i></a>
        </li>
        <li class="nav-item d-md-down-none-">
            <!--search start-->
          <!--   <a class="nav-link search-toggle" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="ti-search"></i>
            </a> -->
            <div class="search-container">
                <div class="outer-close search-toggle">
                    <a class="close"><span></span></a>
                </div>

                <div class="container search-wrap">
                    <div class="row">
                        <div class="col text-left">
                            <a class="" href="#">
                                <img src="{{asset('/public')}}/logo.png" srcset="{{asset('/public')}}/logo@2x.png 2x" alt="">
                            </a>
                            <form class="mt-3">
                                <div class="form-row align-items-center">
                                    <input type="text" class="form-control custom-search"  placeholder="Search">
                                </div>
                            </form>

                            <div class="search-list">
                                <h5 class="text-white mb-4">Search Results</h5>
                                <ul class="list-unstyled ">
                                    <li>
                                        <a href="#" class="text-white">
                                            <span class="bg-danger">

                                            </span>
                                            Simply dummy text of the printing
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-white">
                                            <span class="bg-success">
                                                C
                                            </span>
                                            Contrary Ipsum is not simply random text
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-white">
                                            <span class="bg-info">
                                                <i class="icon-basket-loaded "></i>
                                            </span>
                                            Ipsum has been industry's standard dummy
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--search end-->
        </li>
    </ul>
    <!--left side nav toggle end-->

    <!--right side nav start-->
    <ul class="nav navbar-nav ml-auto">


        <!-- <li class="nav-item dropdown dropdown-slide d-md-down-none">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="ti-bell"></i>
                <span class="badge badge-danger notification-alarm"> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">

                <div class="dropdown-header pb-3">
                    <strong>You have 6 Notifications</strong>
                </div>

                <a href="#" class="dropdown-item">
                    <i class="icon-basket-loaded text-primary"></i> New order
                </a>
                <a href="#" class="dropdown-item">
                    <i class="icon-user-follow text-success"></i> New registered member
                </a>
                <a href="#" class="dropdown-item">
                    <i class=" icon-layers text-danger"></i> Server error report
                </a>
                <a href="#" class="dropdown-item">
                    <i class=" icon-note text-warning"></i> Database report
                </a>

                <a href="#" class="dropdown-item">
                    <i class=" icon-present text-info"></i> Order confirmation
                </a>

            </div>
        </li> -->
       <!--  <li class="nav-item dropdown dropdown-slide d-md-down-none">
            <a class="nav-link nav-pill" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class=" ti-view-grid"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-ql-gird">

                <div class="dropdown-header pb-3">
                    <strong>Quick Links</strong>
                </div>

                <div class="quick-links-grid">
                    <a href="#" class="ql-grid-item">
                        <i class="  ti-files text-primary"></i>
                        <span class="ql-grid-title">New Task</span>
                    </a>
                    <a href="#" class="ql-grid-item">
                        <i class="  ti-check-box text-success"></i>
                        <span class="ql-grid-title">Assign Task</span>
                    </a>
                </div>
                <div class="quick-links-grid">
                    <a href="#" class="ql-grid-item">
                        <i class="  ti-truck text-warning"></i>
                        <span class="ql-grid-title">Create Orders</span>
                    </a>
                    <a href="#" class="ql-grid-item">
                        <i class=" icon-layers text-info"></i>
                        <span class="ql-grid-title">New Orders</span>
                    </a>
                </div>

            </div>
        </li> -->

        <li class="nav-item dropdown dropdown-slide">
            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="margin-top: -10px">
                <img src="{{asset('/public')}}/AdminImage/{{Auth('admin')->user()->image}}" alt="{{Auth('admin')->user()->name}}">
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-accout" >
                <div class="dropdown-header pb-3">
                    <div class="media d-user">
                        <img class="align-self-center mr-3" src="{{asset('/public')}}/AdminImage/{{Auth('admin')->user()->image}}" alt="{{Auth('admin')->user()->name}}">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0">{{Auth('admin')->user()->name}}</h5>
                            <span>{{Auth('admin')->user()->email}}</span>
                        </div>
                    </div>
                </div>

              <!--   <a class="dropdown-item" href="#"><i class=" ti-reload"></i> Activity</a>
                <a class="dropdown-item" href="#"><i class=" ti-email"></i> Message</a>
                <a class="dropdown-item" href="#"><i class=" ti-user"></i> Profile</a>
                <a class="dropdown-item" href="#"><i class=" ti-layers-alt"></i> Projects <span class="badge badge-primary">4</span> </a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="#"><i class=" ti-lock"></i> Lock Account</a> -->
                <a class="dropdown-item" href="{{url('/Adminlogout')}}"><i class=" ti-unlock"></i> Logout</a>
            </div>
        </li>

        <!--right side toggler-->
        <li class="nav-item d-lg-none">
            <!--<button class="navbar-toggler mobile-rightside-toggler" type="button"><i class="icon-options-vertical"></i></button>-->
        </li>
        <li class="nav-item d-md-down-none">
            <!--<a class="nav-link navbar-toggler right-sidebar-toggler" href="#"><i class="icon-options-vertical"></i></a>-->
        </li>
    </ul>

    <!--right side nav end-->
</header>
@php


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






@endphp

<!--left sidebar start-->
<div class="left-sidebar">
    <nav class="sidebar-menu" style="height: 100vh; overflow-y: scroll;">
        <ul id="nav-accordion">
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class=" ti-home"></i>
                    <span>Dashboard</span>
                </a>

            </li>
            @if($id->id=="1")
            <li class="nav-title">
                <h5 class="text-uppercase">Developer</h5>
            </li>

            @php   
            $path = "http://" .$_SERVER['HTTP_HOST'].'/MainMenu'; 
            $paths = "http://" .$_SERVER['HTTP_HOST'].'/SubMenu'; 
            @endphp
            <li class="sub-menu">
                <a href="javascript:;"  class="@if(Request::url() === $path || Request::url() === $paths ){{'active'}}@else @endif">
                    <i class=" icon-grid"></i>
                    <span>Developer Tools</span>
                </a>
                <ul class="sub">
                    <li class="@if(Request::url() === $path){{'active'}}@else @endif"><a  href="{{url('/MainMenu')}}">Main Menu</a></li>
                    <li class="@if(Request::url() === $paths){{'active'}}@else @endif"><a  href="{{url('/SubMenu')}}">Sub Menu</a></li>

                </ul>
            </li>

            @endif
            <li class="nav-title">
                <h5 class="text-uppercase">Menu</h5>
            </li>


            @if($id->id=="1")


            @if(count($Adminminlink) > 0)
            @foreach($Adminminlink as $showMainlink)
            @if($showMainlink->routeName == '0')
            @php   
            $Mmenu = "http://" .$_SERVER['HTTP_HOST'].'/'.$showMainlink->Link_Name; 
            @endphp



            <li class="sub-menu">
                <a href="javascript" class="@if(request()->path() === $Mmenu){{'active'}}@else @endif">
                    <i class=" icon-grid"></i>
                    <span>{{$showMainlink->Link_Name}}</span>
                </a>
                <ul class="sub">
                   @if(count($adminsublink) > 0)
                   @foreach($adminsublink as $showSubLink)
                   @if($showSubLink->mainmenuId == $showMainlink->id)
                   @php   
                  $Smenu = "http://".$_SERVER['HTTP_HOST'].'/'.$showSubLink->routeName; 
                   @endphp
                   <li class="@if(Request::path() === $Smenu){{'active'}}@else @endif"><a  href="{{URL::to('/')}}/{{$showSubLink->routeName}}">{{$showSubLink->submenuname}}</a></li>
                   @endif
                   @endforeach
                   @endif
               </ul>
           </li>
           @else
           <li> <a href="#"><i class="icon icon-signal"></i> <span>{{$showMainlink->Link_Name}}</span></a> </li>
           @endif
           @endforeach
           @endif


           @else
           @if(count($mainlink) > 0)
           @foreach($mainlink as $showMainlink)
           @if($showMainlink->routeName == '0')
           @php   
           $Mmenu = "http://".$_SERVER['HTTP_HOST'].'/'.$showMainlink->Link_Name; 
           @endphp

           <li class="sub-menu">
            <a href="javascript:;"  class="@if(Request::url() === $Mmenu){{'active'}}@else @endif">
                <i class=" icon-grid"></i>
                <span>{{$showMainlink->Link_Name}}</span>
            </a>
            <ul class="sub">
             @if(count($sublink) > 0)
             @foreach($sublink as $showSubLink)
             @if($showSubLink->mainmenuId == $showMainlink->id)
             @php   
             $Smenu = "http://".$_SERVER['HTTP_HOST'].'/'.$showSubLink->routeName; 
             @endphp
             <li class="@if(Request::url() === $Smenu){{'active'}}@else @endif"><a href="{{URL::to('/')}}/{{$showSubLink->routeName}}">{{$showSubLink->submenuname}}</a></li>
             @endif
             @endforeach
             @endif
         </ul>
     </li>
     @else
     <li> <a href="#"><i class="icon icon-signal"></i> <span>{{$showMainlink->Link_Name}}</span></a> </li>
     @endif
     @endforeach
     @endif

     @endif











</nav>
</div>




<script type="text/javascript">

</script>