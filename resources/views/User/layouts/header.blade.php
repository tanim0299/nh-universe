

@php $setting = DB::table('settings')->first();  @endphp


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{ $setting->title }}</title>
  <link rel="icon" href="{{asset('public')}}/favicon.png" type="image/x-icon" style="height: auto;" />
  <link href="https://fonts.googleapis.com/css2?family=Kufam:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">



  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="{{asset('public/Frontend')}}/css/jquery.simpleLens.css">
  <link rel="stylesheet" type="text/css" href="{{asset('public/Frontend')}}/css/jquery.simpleGallery.css">



  <link rel="stylesheet" type="text/css" href="{{asset('public/Frontend')}}/css/bootstrap.min.css">
  
  <link rel="stylesheet" type="text/css" href="{{asset('public/Frontend')}}/style.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/Frontend') }}/css/main_styles.css">

  <link rel="stylesheet" type="text/css" href="{{asset('public/Frontend')}}/css/uikit.min.css">

  <script type="text/javascript" src="{{asset('public/Frontend')}}/js/jquery-3.3.1.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript" src="{{asset('public/Frontend')}}/js/main.js"></script> 
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <style type="text/css">
    .uk-notification-message{
      background-color: #000;
      border-radius: 5px;
      color: #fff;
      font-size: 15px;

    }
  </style>


<script src="//widget.manychat.com/103971201355474.js" defer="defer"></script>
<script src="https://mccdn.me/assets/js/widget.js" defer="defer"></script>
<script src="//widget.manychat.com/103971201355474.js" defer="defer"></script>
<script src="https://mccdn.me/assets/js/widget.js" defer="defer"></script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MGVJGKS');</script>
<!-- End Google Tag Manager -->



<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BWGSKJ9K8P"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-BWGSKJ9K8P');
</script>


</head>
<body>



  <div class="col-sm-12 col-12 topheader">
   
   
    <div class="container-fluid">
      <div class="row">

        <div class="col-lg-3 col-md-12 col-sm-12 col-12 mt-1">
         <div class="col-sm-12">
           <span class="toptitle text-light" style="front-size:18px;">
               <i class="fa fa-phone-square" aria-hidden="true"></i>&nbsp;&nbsp;{{ $setting->hotline }}</span>
         </div>
       </div>

       <div class="col-lg-6 col-md-12 col-sm-12 col-12">
         <div class="topmenu text-center" style="padding-left:7px;">
              <li><a href="{{url('/Export')}}">Export</a></li>
               <li><a href="{{url('/Import')}}">Import</a></li>
                 <li><a href="{{url('/Wholesale')}}">Wholesale</a></li>
          <li><a href="{{url('/Track_order')}}">track order</a></li>
        
         
         

         
          
        </div>
      </div>
      
      
      
        <div class="col-lg-3 col-md-12 col-sm-12 col-12 mt-1 text-center text-md-right d-sm-block d-none">
         <div class="col-sm-12">
             <a href="{{url('/Checkout')}}" class="text-light"> <i class="fa fa-cart-plus" aria-hidden="true" style="font-size:20px;"></i></a>

         </div>
       </div>
      

    </div>
  </div>
  
</div><!----------End Top Header------>




    
    <div style="background:#657383;">



  <div class="col-sm-12 col-12 logosection">
    <div class="container-fluid">
      <div class="row align-items-center">

        <div class="col-md-3 col-sm-3 col-3 d-block d-lg-none text-center">
          <span  uk-toggle="target: #offcanvas-flip" uk-icon="icon: menu; ratio: 1.2"  style="background-color: #025505; color: #fff; padding: 6px 10px; border-radius:2px; cursor:pointer;"></span>
        </div><!-----Mobile Device Menu Icone-------->


        <div class="col-lg-3 col-md-6 col-sm-6 col-6 text-lg-left text-center pt-2 pt-lg-0">
          <a href="{{url('/')}}"><img src="{{asset('public')}}/halal_logo.png
" class="img-fluid logo" style="max-height:80px;"></a>
        </div><!-----All Device Logo-------->
        
        <!--<div class="col-md-1 col-sm-1 col-1 d-none d-lg-block text-center mt-3">-->
        <!--  <i class="fa fa-bars" aria-hidden="true" uk-toggle="target: #offcanvas-flip" style="background-color: #025505; color: #fff; padding: 10px 15px; border-radius:2px; cursor:pointer; font-size: 20px;"></i>-->

        <!--</div>-->
        
        
        <!-----Mobile Device Menu Icone-------->



        <div class="col-md-3 col-sm-3 col-3 d-block d-lg-none text-center">
          <a href="{{ url('user-login') }}"><span uk-icon="icon: user; ratio: 1.2"  style="background-color: #025505; color: #fff; padding: 6px 10px; border-radius:2px;"></span></a>
        </div><!-----Mobile Device Menu Icone-------->



        <div class="col-lg-7 col-md-12 col-sm-12 col-12 text-center">
          <form method="get" action="{{ url('/searchproducts') }}">
            @csrf
            <div class="col-sm-12 col-12 searchsection">
             <div class="input-group">
               <input type="text" class="form-control" id="searchbox" placeholder="What are you looking for?" name="search" onkeyup="Searchproduct();"  autocomplete="off" required="">
               <div class="input-group-append">
                 <button class="btn btn-outline-secondary" type="submit" id="button"><i class="fa fa-search text-light"></i></button>
               </div>
             </div>
           </div>
         </form>
       </div>

       <div id="searchdata"></div>


       <div class="col-lg-2 col-md-12 col-sm-12 col-12 d-none d-lg-block ">
        <div class="accountmenu text-sm-right">
          <span style="font-size: 14px;" class="text-dark"></span><br>
          @if(Auth('guest')->user())
      
            
            
            <div class="dropdown">
  <button class="btn btn-success btn-sm dropdown-toggle rounded" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="{{asset('public/guestImage')}}/{{Auth('guest')->user()->image}}" style="height: 30px;  border-radius: 50%; object-fit:cover;">&nbsp;&nbsp;My Account
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{url('/userdashboard')}}">Dashboard</a>
    <a class="dropdown-item" href="{{url('/guest-logout')}}">Logout</a>
  </div>
</div>
            
            
            @else
            <li><a href="{{url('/user-login')}}" title="SIGN IN" data-toggle="tooltip" data-placement="bottom" class="btn btn-dark  btn-sm">SIGN IN</a></li>
            <li><a href="{{route('user-Register.index')}}" title="REGISTER" data-toggle="tooltip" data-placement="bottom" class="btn btn-dark btn-sm">REGISTER</a></li>
            @endif
          </div>
        </div>



      </div>
    </div>
  </div><!--------------End Logo------------>

</div><!----------End Desktop Menu---------->


<style>

  .list-unstyled li{
    padding-top: 5px;
  }


  .list-unstyled li a{
    font-size: 13px;
    color: #414141;
    font-weight: normal;
  }
</style>






















@php
$item = DB::table('product_item')->orderby('sl','ASC')->get();
$category = DB::table('product_category')->orderby('sl','ASC')->get();
$subcategory = DB::table('product_subcategory')->orderby('sl','ASC')->get();

@endphp




<div id="offcanvas-flip" id="offcanvas-slide" uk-offcanvas="flip: false; overlay: true;">
  <div class="uk-offcanvas-bar d-block sidemenu" id="mobilemenuoff" style="transition: 0.9s; border:none;">
   <button class="uk-offcanvas-close" type="button" uk-close></button>
   <br>
   <br>
   

   <ul class="uk-nav p-3" uk-nav duration='800'>

     @if(isset($item))
     @foreach($item as $itemdata)
     @php 
     $item_name=str_replace(" ","-",$itemdata->item_name)
     @endphp
     <li class="uk-parent text-dark">
      <a href="{{url('item')}}/{{$item_name}}/{{$itemdata->id}}">{{$itemdata->item_name}} <span uk-icon="icon: chevron-right; ratio: 0.9" class="float-right"></span>&nbsp;&nbsp;</a>
      <ul class="uk-nav-sub">
        @if(isset($category))
        @foreach($category as $categorydata)
        @if($categorydata->item_id == $itemdata->id)
        @php 
        $category_name=str_replace(" ","-",$categorydata->category_name)
        @endphp
        <li>
          <a href="{{url('category')}}/{{$category_name}}/{{$categorydata->id}}"  style="color: #ffc107">{{$categorydata->category_name}}</a>
          <ul>

            @if(isset($subcategory))
            @foreach($subcategory as $subcategorydata)
            @if($subcategorydata->category_id == $categorydata->id)
            @php 
            $subcategory_name=str_replace(" ","-",$subcategorydata->subcategory_name)
            @endphp

            <li><a href="{{url('subcategory')}}/{{$subcategory_name}}/{{$subcategorydata->id}}">{{$subcategorydata->subcategory_name}}</a></li>


            @endif
            @endforeach
            @endif


          </ul>
        </li>

        @endif
        @endforeach
        @endif

      </ul>
    </li>


    @endforeach
    @endif


     <li><a href="{{ url('user-login') }}">Login</a></li>
     <li><a href="{{ url('user-Register') }}">Register</a></li>
     <li><a href="{{ url('About-us') }}">About Company</a></li>
     <li><a href="{{ url('Contact_us') }}">Contact Info.</a></li>
     <li><a href="{{ url('/Career') }}">Career</a></li>


  </ul>


</div>
</div> <!----------------End Mobile Menu------------->


<script type="text/javascript">
  function Searchproduct()
  {
    var search = $("#searchbox").val();


    if(search != '')
    {

      $.ajax({

        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
        url: '{{ url("Searchproduct") }}',
        type: 'POST',
        data: {search:search},
        success: function(data)
        {
          $('#searchdata').html(data);
        }
      })

    }
    else
    {
      $('#searchdata').html('');
    }
  }
</script>


