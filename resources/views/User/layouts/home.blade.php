@extends('User.layouts.master')

@section('body')
@php
date_default_timezone_set('Asia/Dhaka');
@endphp





@php
$itemhome = DB::table('product_item')->where('show_home','1')->orderby('sl','ASC')->get();
$categoryhome = DB::table('product_category')->where('shop_by','1')->orderby('sl','ASC')->get();
$item = DB::table('product_item')->where('left_menu','1')->limit(11)->orderby('sl','ASC')->get();
$category = DB::table('product_category')->orderby('sl','ASC')->get();
$subcategory = DB::table('product_subcategory')->orderby('sl','ASC')->get();
@endphp



<div class="col-sm-12 col-12 bg-light pt-2">
  <div class="container-fluid">
    <div class="row">
        

      <div class="col-lg-2 col-md-2 col-sm-2 col-2 pr-0 d-none d-md-block" style="z-index: 1;">
        <div class="col-sm-12 bg-white">
         <nav class="main_nav bg-white">
          <div class="row ">
            <div class="col ">
              <div class="main_nav_content d-flex flex-row bg-white">
                <div class="cat_menu_container bg-white">

                  <ul class="cat_menu p-0 bg-white">
                    <li class="hassubs text-light p-2" style="background-color: #253c47; text-transform: uppercase;">
                      <span uk-icon="icon: list; ratio: 1"></span>&nbsp;&nbsp;Popular Categorie's
                    </li>

                    @if(isset($item))
                    @foreach($item as $itemdata)
                    @php 
                    $item_name=str_replace(["%","/"," "],"-",$itemdata->item_name)
                    @endphp

                    <li class="hassubs">
                      <a href="{{url('item')}}/{{$item_name}}/{{$itemdata->id}}">{{$itemdata->item_name}}<span uk-icon="icon: chevron-right; ratio: 1"class="float-right"></span></a>



                      <ul style="width: auto;">
                        @if(isset($category))
                        @foreach($category as $categorydata)
                        @if($categorydata->item_id == $itemdata->id)
                        @php 
                        $category_name=str_replace(["%","/"," "],"-",$categorydata->category_name)
                        @endphp
                        <li class="hassubs">
                          <a href="{{url('category')}}/{{$category_name}}/{{$categorydata->id}}">{{$categorydata->category_name}}<span uk-icon="icon: chevron-right; ratio: 1"class="float-right"></span></a>



                          <ul style="width: auto;">

                            @if(isset($subcategory))
                            @foreach($subcategory as $subcategorydata)
                            @if($subcategorydata->category_id == $categorydata->id)
                            @php 
                            $subcategory_name=str_replace(["%","/"," "],"-",$subcategorydata->subcategory_name)
                            @endphp


                            <li><a href="{{url('subcategory')}}/{{$subcategory_name}}/{{$subcategorydata->id}}">{{ $subcategory_name }}</a></li>


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









                  </ul>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </div>




      <div class="col-lg-10 col-md-10 col-sm-12 col-12 padd">
        <div class="col-sm-12 col-12 p-0">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              @if(isset($slidermore))
              @for($i=1;$i<=count($slidermore);$i++)
              <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
              @endfor
              @endif
            </ol>
            <div class="carousel-inner">

              @if(isset($slider))
              <div class="carousel-item active">
                <a href="{{$slider->url}}"><img class="d-block w-100" src="{{asset('public/sliderImage')}}/{{$slider->image}}" id="sliderimage"></a>
              </div>
              @endif
              @if(isset($slidermore))
              @foreach($slidermore as $slidermoredata)
              <div class="carousel-item">
                <a href="{{$slidermoredata->url}}"><img class="d-block w-100" src="{{asset('public/sliderImage')}}/{{$slidermoredata->image}}" id="sliderimage"></a>
              </div>
              @endforeach
              @endif
            </div>
          </div>


        </div>

        <style>
          .special i{
            font-size:26px;
            color:#2c404c;

          }
          
          .special{
            margin-top:10px;
          }
          
          
          .special b{
            color:#2c404c;
            font-size:15px;
          }
          
          .special span{
            color:gray;
            font-size:13px;

          }
        </style>
        <style type="text/css">

          #countdown{
            width: 465px;
            height: 52px;
            border-radius: 5px;


          }

          #countdown:before{
            content:"";
            width: 8px;
            height: 65px;
            background: #444;
            background-image: -webkit-linear-gradient(top, #555, #444, #444, #555); 
            background-image:    -moz-linear-gradient(top, #555, #444, #444, #555);
            background-image:     -ms-linear-gradient(top, #555, #444, #444, #555);
            background-image:      -o-linear-gradient(top, #555, #444, #444, #555);
            border: 1px solid #111;
            border-top-left-radius: 6px;
            border-bottom-left-radius: 6px;
            display: block;
            position: absolute;
            top: 48px; left: -10px;
          }

          #countdown:after{
            content:"";
            width: 8px;
            height: 65px;
            background: #444;
            background-image: -webkit-linear-gradient(top, #555, #444, #444, #555); 
            background-image:    -moz-linear-gradient(top, #555, #444, #444, #555);
            background-image:     -ms-linear-gradient(top, #555, #444, #444, #555);
            background-image:      -o-linear-gradient(top, #555, #444, #444, #555);
            border: 1px solid #111;
            border-top-right-radius: 6px;
            border-bottom-right-radius: 6px;
            display: block;
            position: absolute;
            top: 48px; right: -10px;
          }

          #countdown #tiles{
            /*position: relative;*/
            z-index: 1;
          }

          #countdown #tiles > span{
            width: 50px;
            max-width: 92px;
            font: bold 25px;
            text-align: center;
            color: #fff;
            background-color: #000;
            border-radius: 3px;
            margin: 0 5px;
            display: inline-block;
            position: relative;
            padding:3px;
            margin-top:5px;
          }

          #countdown #tiles > span:before{
            content:"";
            width: 100%;
            height: 13px;
            background: #111;
            display: block;
            padding: 0 3px;
            position: absolute;
            top: 41%; left: -3px;
            z-index: -1;
          }


          #countdown .labels{
            width: 100%;
            height: 25px;
            bottom: 8px;
          }

          #countdown .labels li{
            width: 58px;
            font: bold 10px;
            color: #000;
            text-align: center;
            text-transform: uppercase;
            display: inline-block;
          }
        </style>


        <div class="col-md-12 col-12">
          <div class="row">

            <div class="col-lg-3 col-md-3 col-sm-6 col-12 bg-white p-3 special border-right">
              <div class="row">
                <div class="col-md-3 col-3 mt-2">
                  <i class="fa fa-rocket" aria-hidden="true"></i>
                </div>

                <div class="col-md-9 col-9">
                  <span><b><a href="{{ url('Import') }}" style="text-decoration:none; color:#000;">Import</a> </b><br>
                  Products Import</span>
                </div>

              </div>
            </div>


            <div class="col-lg-3 col-md-3 col-sm-6 col-12 bg-white p-3 special border-right">
              <div class="row">
                <div class="col-md-3 col-3 mt-2">
                  <i class="fa fa-refresh" aria-hidden="true"></i>
                </div>

                <div class="col-md-9 col-9">
                  <span><b><a href="{{ url('Export') }}" style="text-decoration:none; color:#000;">Export</a> </b><br>
                  Products Export</span>
                </div>

              </div>
            </div>




            <div class="col-lg-3 col-md-3 col-sm-6 col-12 bg-white p-3 special border-right">
              <div class="row">
                <div class="col-md-3 col-3 mt-2">
                  <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                </div>

                <div class="col-md-9 col-9">
                  <span><b><a href="{{ url('Wholesale') }}" style="text-decoration:none; color:#000;">Wholesale</a> </b><br>
                   Wholesale</span>
                </div>

              </div>
            </div>



            <div class="col-lg-3 col-md-3 col-sm-6 col-12 bg-white p-3 special">
              <div class="row">
                <div class="col-md-3 col-3 mt-2">
                 <i class="fa fa-comments" aria-hidden="true"></i>

               </div>

               <div class="col-md-9 col-9">
                <span><b>24H Support</b><br>
                Dedicated Support</span>
              </div>

            </div>
          </div>



        </div>

      </div>
      
      
      
    </div>






 </div>
</div>
</div><!---------------End Category & Slider----------------->




<div class="col-sm-12 col-12 bg-light pt-3">
  <div class="container-fluid">
    <div class="row">
      @if($topbannerleft2)
      @foreach($topbannerleft2 as $topbanner)
      <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt-4">
       <a href="{{$topbanner->url}}"><center><img src="{{ asset('public/exploreImage') }}/{{$topbanner->image}}" class="img-fluid border"></center></a>
     </div>
     @endforeach
     @endif
     


   </div>
 </div>
</div>









@if(count($flashsale)>0)

<div class="col-sm-12 col-12 pt-5 bg-light">
  <div class="container-fluid">
    <div id="countdown"  class="text-left">
     <span class="headproducttitle" style="letter-spacing:1px;"><b>Flash <span class="text-success">Sale :</span></b></span>

     <div id='tiles'></div>
     <div class="labels">
      <li>Days</li>
      <li>Hours</li>
      <li>Mins</li>
      <li>Secs</li>
    </div>



  </div>

  <div class="float-right">
    <a href="{{ url('Flash-Sale') }}" class="viewproducts">View All</a>
  </div>
  <br>

  <hr>

  <div>



  </div>

  <div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slider="autoplay: true; autoplay-interval: 2000;">
    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-6@m">

      <input type="hidden" name="end_date" id="end_date" value="{{$flashsale[0]->end_date_time}}">
      <input type="hidden" name="start" id="start">

      @foreach($flashsale as $data)
      @php
      $productname = str_replace(["%","/"," "],"-",$data->product->product_name);
      @endphp
      
      


      <li class="homeproducts">
        <div class="col-sm-12 col-12">
          <center>
            <a href="{{url('product')}}/{{$productname}}/{{$data->product->product_id}}"><img src="{{asset('public/productImage')}}/{{$data->product->image}}" class="img-fluid" style=""></a>
          </center>

          <div>
            <a href="{{url('product')}}/{{$productname}}/{{$data->product->product_id}}"><center>{{$data->product->product_name}}<br>
              <span><del class="text-dark" style="color:gray;">TK.{{$data->product->sale_price}}</del>&nbsp;&nbsp;TK.{{$data->product->current_price}}</span></center></a>
            </div>
          </div>
        </li>

        @endforeach


      </ul>
      <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"   style="color: #fff; background-color: darkred;"></a>
      <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"  style="color: #fff; background-color: darkred;"></a>
    </div>

  </div>
</div>






<script>



  function date() {


   $.ajax({

    headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
    url: '{{ url("fetch_time") }}',
    type: 'POST',
    data: {},
    success: function(data)
    {
      $('#start').val(data);

    }
  })


 }



 $(document).ready(function(){
   setTimeout(date,5000);
 });

 var end = $("#end_date").val();

var target_date = new Date(end).getTime(); // set the countdown date
// alert(target_date)
var days, hours, minutes, seconds; // variables for time units

var countdown = document.getElementById("tiles"); // get tag element

getCountdown();

setInterval(function () { getCountdown(); }, 1000);

function getCountdown(){

 date();
 var start = $("#start").val();
 // find the amount of "seconds" between now and target
 var current_date = new Date(start).getTime();


 var seconds_left = (target_date - current_date) / 1000;

 days = pad( parseInt(seconds_left / 86400) );
 seconds_left = seconds_left % 86400;

 hours = pad( parseInt(seconds_left / 3600) );
 seconds_left = seconds_left % 3600;

 minutes = pad( parseInt(seconds_left / 60) );
 seconds = pad( parseInt( seconds_left % 60 ) );

  // format countdown string + set tag value
  countdown.innerHTML = "<span>" + days + "</span><span>" + hours + "</span><span>" + minutes + "</span><span>" + seconds + "</span>"; 
}

function pad(n) {
  return (n < 10 ? '0' : '') + n;
}

</script>


@endif






<div class="col-sm-12 col-12 pt-5 bg-light">
  <div class="container-fluid">
    <div class="col-sm-12 col-12 bg-white p-3" style="border-left: 5px solid gray; ">
      <span class="headingsection">Feature <span class="text-success">Product's</span></span>
    </div>


    <div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slider="autoplay: true; autoplay-interval: 2000;">
      <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-6@m">

        {{-- @if(isset($exclusive))
        @foreach($exclusive as $product)
        @php
        $productname = str_replace(" ","-",$product->product->product_name);
        @endphp
        <li class="homeproducts">
          <div class="col-lg-12 col-md-12 col-sm-12 col-12 bg-white p-3">
            <a href="{{url('product')}}/{{$productname}}/{{$product->product->product_id}}">
              <center><img src="{{asset('public/productImage')}}/{{$product->product->image}}" class="img-fluid"></center><br>
              {{ substr($product->product->product_name, 0,30) }}<br>
              <del>৳{{$product->product->sale_price}}</del>&nbsp;&nbsp;
              <span>৳{{$product->product->current_price}}</span>
              

            </a>
          </div>
        </li>
        @endforeach
        @endif --}}
        



      </ul>
      <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"   style="color: #fff; background-color: #000; border-radius: 30px; "></a>
      <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"  style="color: #fff; background-color: #000; border-radius: 30px; "></a>
    </div>


  </div><!----------End Product Slider--------->
</div>











<div class="col-sm-12 col-12 pt-5 pb-5 bg-light">
 <div class="container-fluid">
  <div class="col-sm-12 col-12 bg-white p-3" style="border-left: 5px solid gray;">
    <span class="headingsection">Shop by <span class="text-success">Category's</span></span>
  </div>
</div>
<div class="container-fluid">
  <div class="col-sm-12 col-12">
    <div class="row">


      @if(isset($allcats))
      @foreach($allcats as $data)

      @php
      $productcount = DB::table('product_productinfo')
      ->where('category_id',$data->id)
      ->get();

      $products = DB::table('product_productinfo')
      ->where('category_id',$data->id)
      ->orderBy('id','DESC')
      ->limit(3)
      ->get();

      @endphp
      



      <div class="col-lg-2 col-md-4 col-sm-4 col-6 p-0">
          
          
       <div class="col-sm-12 col-12 collections bg-white p-2">
         <center>
           <a href="{{url('category')}}/{{ str_replace(' ', '-', $data->category_name) }}/{{$data->id}}">
            <img src="{{asset('public/categoryImage')}}/{{$data->image}}" class="img-fluid" style="min-height:50px;"><br>

            {{ $data->category_name }}<br>
            <span>{{ count($productcount) }} Product's ></span>
          </a>
        </center>
      </div>

       
    </div>

    @endforeach
    @endif



  </div>
</div>
</div>
</div><!--------------End Categories Product------------->










@if($categoryhome)
@foreach($categoryhome as $catdata)

@php
$all = DB::table('product_productinfo')->orderBy('id', 'desc')->where('status','1')->where('home_item_show','1')->where('category_id',$catdata->id)->take($catdata->paginate)->get();
@endphp

@if(count($all)>0)


<div class="col-sm-12 col-12 bg-light pb-5">
  <div class="container-fluid">

    <div class="col-sm-12 col-12 bg-white p-3" style="border-left: 5px solid gray;">
     <div class="row">
      <div class="col-sm-8 col-8 text-left">
        <span class="headingsection">{{$catdata->category_name}}</span>
      </div>
      
      @if(count($all)>6)

      <div class="col-sm-4 col-4 text-right">
        <a href="{{ url('/category') }}/{{str_replace(['%','/',' '],'-',$catdata->category_name)}}/{{$catdata->id}}" class="viewproducts">View All</a>
      </div>
      @endif
    </div>
  </div>


  <div class="col-sm-12 col-12 p-0">
    <div class="row" id="showproduct-{{$catdata->id}}">

      @if(isset($all))
      @foreach($all as $data)
      @php
      $productname = str_replace(["%","/"," "],"-",$data->product_name);
      
 $stock = DB::table('productstocks')->where('product_id',$data->id)->sum('quentity');
 $salequntshopping = DB::table('shopping_carts')
 ->where('status','1')
 ->where('product_id',$data->id)
 ->sum('quantity');
      @endphp
      
      

      <div class="col-lg-3 cl-md-4 col-sm-6 col-6 mt-4">
        
    @if(($stock - $salequntshopping)>=1)
        <div class="overlay p-2">
         <span>Stock In</span>
       </div>
       
       @else 
       <div class="overlayss p-2">
         <span>Stock Out</span>
       </div>
       
       
    
       @endif

       <div class="homeproducts">
        <center>
          <a href="{{url('product')}}/{{$productname}}/{{$data->product_id}}"><img src="{{asset('public/productImage')}}/{{$data->image}}" class="img-fluid" style="z-index:1;"></a>
        </center>


<!-- Cart start from Hare -->

        <div class="pt-2">
         
          <a id="title" href="{{url('product')}}/{{$productname}}/{{$data->product_id}}">{{ substr($data->product_name, 0,20) }}
          <br>
          
            @if($data->discount_price>0)&nbsp;&nbsp;<del>TK.{{$data->sale_price}}</del>@endif&nbsp;&nbsp;<span>BDT.{{$data->current_price}}</span></a><br><br>
            
            	<a  onclick="AddCarts('{{$data->product_id}}')" data-toggle="modal" data-target="#myModal" class="btn btn-success btn-sm w-100 " style="color:white; cursor:pointer;">&nbsp;Add To Cart</a>
          </div>
        </div>
      </div>
      @endforeach
      @endif



    </div>

  </div>

</div>
</div><!----------End Product Slider--------->

@endif
@endforeach
@endif





<div class="col-sm-12 col-12 bg-light pb-5">
  <div class="container-fluid">
    <div class="row">

      @if($topbannerright)
      @foreach($topbannerright as $topbanner)
      <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt-4">
       <a href="{{$topbanner->url}}"><center><img src="{{ asset('public/exploreImage') }}/{{$topbanner->image}}" class="img-fluid border"></center></a>
     </div>
     @endforeach
     @endif

   </div>
 </div>
</div>


@php
$brand = DB::table('product_company')->get();
@endphp



<div class="col-sm-12 col-12 pt-5 pb-5">
  <div class="container-fluid">
    <center><h4 class="text-uppercase font-weight-bold">Our Trusted <span class="text-success">Partner</span></h4></center>


    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>

      <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-6@m uk-grid">


      @if(isset($brand))
      @foreach($brand as $sellers)


        <li>
          <div class="uk-panel">
            <img src="{{ asset('public/companyImage') }}/{{$sellers->image}}" alt="" class="img-fluid">
          </div>
        </li>

     @endforeach
     @endif


      </ul>
      <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
      <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

    </div>


  </div>
</div>









{{-- 
<div class="col-sm-12 col-12 pt-3 pb-3 bg-light">
  <div class="container-fluid">
    <span class="headingsection">All Brands</span><hr>
    
    <div class="row">


      @if(isset($brand))
      @foreach($brand as $sellers)


      <div class="col-lg-1 col-md-3 col-sm-4 col-6 p-3">

       @if($sellers->image == !NULL)
       <a href=""><center><img src="{{ asset('public/companyImage') }}/{{$sellers->image}}" class="img-fluid" alt="{{$sellers->company_name}}" style="height:30px;"></center></a>
       @else
       <a href=""><center><img src="{{ asset('public/br.png') }}" class="img-fluid" alt="{{$sellers->company_name}}"></center></a>
       @endif
     </div>

     @endforeach
     @endif


   </div>


 </div><!----------End Product Slider--------->
</div>
--}}














<!--<div class="col-sm-12 col-12 bg-light pb-5">-->
  <!--  <div class="container-fluid">-->
    <!--    <div class="row">-->

      <!--     @if($midbannertop)-->
      <!--    @foreach($midbannertop as $topbanner)-->
      <!--      <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-4">-->
        <!--       <a href="{{$topbanner->url}}"><center><img src="{{ asset('public/exploreImage') }}/{{$topbanner->image}}" class="img-fluid"></center></a>-->
        <!--     </div>-->
        <!--    @endforeach-->
        <!--    @endif-->


        <!--   </div>-->
        <!-- </div>-->
        <!--</div>-->







        @endsection

        <script>
          function searchproductlist(cate_id)
          {

            var searchtext = $("#searchproduct-"+cate_id).val();
            if(searchtext != '')
            {

              $.ajax({

                headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                url: '{{ url("search-product-list") }}',
                type: 'POST',
                data: {searchtext:searchtext,cate_id:cate_id},
                success: function(data)
                {
                  $('#showproduct-'+cate_id).html(data);
                  $("#searchproduct-"+cate_id).val('');
                }
              })

            }
            else
            {
              $("#searchproduct-"+cate_id).val('');
            }

          }
        </script>