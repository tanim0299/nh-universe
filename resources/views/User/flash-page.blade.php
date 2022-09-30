@extends('User.layouts.master')

@section('body')
  @if(count($shop)>0)
  
  <style>
      
.searchsections{
  background: #f4f4f4;
  padding: 25px;
}


.searchsections span{
  color: #fff;
  font-size: 35px;

}

.searchoption{
  border-radius: 0px;
  border:none;
  font-size: 15px;
  cursor: pointer;
}


.searchoption:focus{
  box-shadow: none;
}



.searchbutton{
  border:0px;
  padding: 6px 20px;
  color: #fff;
  background-color: #8e44ad;
  font-size: 18px;
  cursor: pointer;
}

.searchbutton:focus{
  box-shadow: none;
  border:none;
  outline: none;
  background-color: #8e44ad;
  color:#fff;

}


  </style>
  
  
  @php
  
  $iteminfo = DB::table('product_item')->get();
    
  @endphp


  <div class="col-sm-12 col-12 searchsections pt-5 pb-5">
      <div class="container-fluid">
    <div class="row">


      <div class="col-lg-4 col-md-6 col-sm-6 col-12 text-center">
          
         <select name="item_id" onchange="GetCategory();"  id="item_id" class="form-control searchjs searchoption">
                          <option value="">Select An Item</option>
                          @if(count($iteminfo))
                              @foreach ($iteminfo as $item)
                                <option value="{{$item->id}}">{{$item->item_name}}</option>
                              @endforeach
                            @endif
                          
                          </select><br>
      </div>


      <div class="col-lg-4 col-md-6 col-sm-6 col-12 text-center">
        <select name="category_id" id="category_id" onchange="getsubcat();" class="form-control searchjs1 searchoption">
                  <option value=""> Select A Category</option>
        </select><br>
      </div>


      <div class="col-lg-4 col-md-6 col-sm-6 col-12  text-center">
       <select name="subcategory_id" id="subcategory_id" onclick="Getsubcatwiseproduct()" class="form-control searchjs2 searchoption">
                            <option value=""> Select A subCategory</option>
                          </select><br>
      </div>





    </div>
  </div>




</div><!---------End Search-------->



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
  background-color: #8e44ad;
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
  
  
  
  
  

<div class="col-sm-12 col-12 mt-3 pb-3">
  <div class="container-fluid">
 <h3 class="headproducttitle">
      <div id="countdown"  class="text-left">
   <span class="headproducttitle" style="letter-spacing:1px;"><b>Flash <span class="text-danger">Sale :</span></b></span>
   
  <div id='tiles'></div>
    <div class="labels">
    <li>Days</li>
    <li>Hours</li>
    <li>Mins</li>
    <li>Secs</li>
  </div>

  


</div>
   <br>
 </h3><hr>

    <div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slider="autoplay: true; autoplay-interval: 2000;">
      <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-6@m" id="showdata">

        <input type="hidden" name="end_date" id="end_date" value="{{$shop[0]->end_date_time}}">
        <input type="hidden" name="start" id="start">
        
        @foreach($shop as $data)
        @php
        $productname = str_replace(["%","/"," "],"-",$data->product->product_name);
        @endphp
        
        <li class="homeproducts border">
          <div class="col-sm-12 col-12">
            <center>
              <a href="{{url('product')}}/{{$productname}}/{{$data->product->product_id}}"><img src="{{asset('public/productImage')}}/{{$data->product->image}}" class="img-fluid" style=""></a>
            </center>
            
              
     
            
            <div>
              <a href="{{url('product')}}/{{$productname}}/{{$data->product->product_id}}"><center>{{$data->product->product_name}}<br>
                <span><del class="text-dark">TK.{{$data->product->sale_price}}</del>&nbsp;&nbsp;TK.{{$data->product->current_price}}</span></center></a>
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


<script>
    
function GetCategory() {
  var item_id=$('#item_id').val();
  if (item_id!=0) {
      $.ajax({
        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
        url: '{{ url("CreateProductGetCategory") }}',
        type: 'POST',
        data: {id: item_id},
        success: function(data){
          $('#category_id').html(data);
          Getitemwiseproduct(item_id); 
        }
      });
  } 
  else {
    $('#category_id').html('<option value="0">Select A Category</option>');
  }
}

function getsubcat() {
  var category_id=$('#category_id').val();
  if (category_id!=0) {
      $.ajax({
        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
        url: '{{ url("CreateProductGetsubCategory") }}',
        type: 'POST',
        data: {id: category_id},
        success: function(data){
          $('#subcategory_id').html(data);
          Getcatwiseproduct(category_id); 
        }
      });
  } 
  else {
    $('#subcategory_id').html('<option value="0">Select A subCategory</option>');
  }
}
function Getitemwiseproduct(item_id) {
  
  if (item_id!=0) {
      $.ajax({
        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
        url: '{{ url("Getitemwiseproduct") }}',
        type: 'POST',
        data: {item_id: item_id},
        success: function(data){
          $('#showdata').html(data);
        }
      });
  } 
  
}
function Getcatwiseproduct(category_id) {
 
  if (category_id!=0) {
      $.ajax({
        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
        url: '{{ url("Getcatwiseproduct") }}',
        type: 'POST',
        data: {category_id:category_id},
        success: function(data){
        $('#showdata').html(data);
        }
      });
  } 
  
}
function Getsubcatwiseproduct() 
{
 var subcat_id = $("#subcategory_id").val();
  if (subcat_id!=0) 
  {
      $.ajax({
        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
        url: '{{ url("Getsubcatwiseproduct") }}',
        type: 'POST',
        data: {subcat_id: subcat_id},
        success: function(data){
        $('#showdata').html(data);
        }
      });
  } 
  
}


</script>


       @endif
@endsection