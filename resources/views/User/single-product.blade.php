@extends('User.layouts.master')
@section('body')

<meta property="og:type"          content="Article">
<meta property="og:title"         content="{{ $viewproduct->product_name }}">
<meta property="og:description"   content="{{$viewproduct->product_details }}">
<meta property="og:image"         content="{{ url('/public/productImage') }}/{{$viewproduct->image}}"/>	



<div class="col-sm-12 col-12 pt-3 pb-3 bg-light">
	<div class="container-fluid">
		<div>
			<ul class="uk-breadcrumb bg-white p-0 p-3" style="border-radius: 30px;">
				<li><a href="{{ url('/') }}" class="font-weight-bold"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></li>
				<li><span class="text-dark font-weight-bold">{{ $viewproduct->product_name }}</span></li>
			</ul>
		</div>
		<div class="row p-2 pt-4 bg-white">

			<div class="col-lg-4 col-md-12 col-sm-12 col-12">
				<div class="simpleLens-gallery-container" id="demo-1">
					<div class="simpleLens-container" style="width: 100%; padding: 0px; border:1px solid lightgray;">
						<div class="simpleLens-big-image-container ">
							<a class="simpleLens-lens-image" data-lens-image="{{asset('public/productImage')}}/{{$viewproduct->image}}">
								<img src="{{asset('public/productImage')}}/{{$viewproduct->image}}" class="simpleLens-big-image p-2">
							</a>
						</div>
					</div>
					
					
					
					<div class="uk-position-relative uk-visible-toggle uk-light mt-4" tabindex="-1" uk-slider uk-lightbox="animation: fade">
						<ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-4@m uk-grid" >
							@if($product_image)
							@foreach($product_image as $image)
							@if($image->product_id == $viewproduct->id) 
							<li>
								<label>
									<a class="uk-inline" href="{{asset('public/productImage')}}/{{$image->image}}" data-caption="{{ $viewproduct->product_name }}">
										<img src="{{asset('public/productImage')}}/{{$image->image}}" alt="">
									</a>
								</label>
							</li>
							@endif
							@endforeach
							@endif
						</ul>

					</div>





				</div>
			</div>



			<div class="col-lg-5 col-md-12 col-sm-12 col-12">
				<div class="col-sm-12 col-12 singledetails p-0">
					<h3 class="font-weight-bold">{{ $viewproduct->product_name }}</h3>
					#Product Code: {{ $viewproduct->product_id }}<br><br>
					
						<span style="font-size: 22px;
					font-weight: 700;
					line-height: 20px;
					color: #2c3e50">BDT {{number_format($viewproduct->current_price,2)}} Tk</span><br>
				
			
			
			 <input type="hidden" id="product_id" value="{{ $viewproduct->product_id }}">
			 <input type="hidden" id="productid" value="{{ $viewproduct->id }}">
			         
			     
			      
                                <div class="col-xs-12 mt-3" id="myDIV"> <span class="product_options " style="color:#414141; font-size:15px;">Size :</span>&nbsp;&nbsp;<br>
                                <select class="size-{{ $viewproduct->id }}" name="size" id="size" onclick="return productcolor()" onchange="return productcolor()" class="form-control">
                                    <option value="">Select Size</option>
                            @if(count($product_size)>0)
							@foreach($product_size as $size)
                                    <option>{{$size->size}}</option>
                            @endforeach
                            @endif
                                </select>
                                

                             

						
					</div>
					
			
					              <div class="col-xs-12 mt-3 mb-2" id="myDIVs" ><span class="product_options" style="color:#414141; font-size:15px;">Color :</span>&nbsp;&nbsp;<br>
					              
					              <select class="color-{{ $viewproduct->id }}" name="color" id="color">
					                  <option value="">select color</option>
					               </select>
     <!--                    	@if(count($product_color)>0)-->

					<!--		@foreach($product_color as $color)-->

     <!--                           <button class="btn btn-sm color" id="color-{{$viewproduct->id}}">{{$color->color}}</button>-->
							
							

					<!--			@endforeach-->
                                
							

					<!--@endif-->
					</div>


					

					@if(($stock - $salequntshopping)>0)
				
				
					
					<!--<label>Quantity:&nbsp;<input type="number" value="{{ $viewproduct->min_qunt }}" min="{{ $viewproduct->min_qunt }}" name="Quantity-{{$viewproduct->id}}" id="Quantity-{{$viewproduct->id}}"><br><br>&nbsp;&nbsp;-->
					
				<div class="mb-4">
				    <label>Quentity</label>
				    	<form id='myform' method='POST' action='' class="mt-2">
								<input type='button' value='-' class='qtyminus' field='quantity' />
								<input type='text' value="{{ $viewproduct->min_qunt }}" min="{{ $viewproduct->min_qunt }}"  id="Quantity-{{$viewproduct->id}}" name='quantity' class='qty' / readonly>
								<input type='button' value='+' class='qtyplus' field='quantity' />
							</form>
				</div>
					
					
					<a  onclick="AddCart('{{$viewproduct->id}}')" class="d-inline bag" style="color:white; cursor:pointer;">&nbsp;Add To Cart</a>
					
					
					
					&nbsp;
					@if(Auth('guest')->user())
					<a href="{{url('Checkout')}}"  onclick="AddCart('{{$viewproduct->id}}')"  class="d-inline buy">&nbsp;Buy Now</a>

					@else

					<a class="d-inline buy" data-toggle="modal" data-target="#staticBackdrop"  onclick="AddCart('{{$viewproduct->id}}')" style="color:white">Buy Now</a>

					@endif
				</label>
				<br>
				<br>
				<span id="status_sms"></span>
				<span style="font-size: 12px;font-weight: bold;">Minimum quantity:{{ $viewproduct->min_qunt }}</span>
				<br>
				@else
				<span style="color:red;font-size:18px; font-weight: 700;
				line-height: 20px;">STOCK OUT</span>
				<br>
				<br>

				<label>Quantity:&nbsp;<input type="number" value="{{ $viewproduct->min_qunt }}" min="{{ $viewproduct->min_qunt }}" name="Quantity-{{$viewproduct->id}}" id="Quantity-{{$viewproduct->id}}">&nbsp;&nbsp;<br><br><a href="#" class="d-inline bag" disabled style="color:white; cursor:not-allowed;">&nbsp;Add To Cart</a>
					&nbsp;

					<a  href="#" class="d-inline buy" disabled style="color:white;cursor: not-allowed;">&nbsp;Buy Now</a></label>
					<br>
					<br>
					@endif
					
					<br>
					

					<!-- Go to www.addthis.com/dashboard to customize your tools -->
					<span>Share With :</span><br>
					<div class="addthis_inline_share_toolbox_0v9d"></div>

				</div><br>
			</div>



			<div class="col-lg-3 col-md-12 col-sm-12 col-12 bg-light p-4  text-dark border" style="font-size: 14px;">

				{!! $cod->description !!}


			</div>


		</div>
	</div>
</div>





<div class="col-sm-12 col-12 mt-5">
	<div class="container-fluid">

		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="home" aria-selected="true">Description</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#Condition" role="tab" aria-controls="profile" aria-selected="false">Condition</a>
			</li>

		</ul>


		<div class="tab-content" id="myTabContent">

			<div class="tab-pane fade show active mt-3" id="Description" role="tabpanel" aria-labelledby="home-tab">
				{!! $viewproduct->product_details !!}
			</div>

			<div class="tab-pane fade mt-3" id="Condition" role="tabpanel" aria-labelledby="profile-tab">
				{!! $viewproduct->condition !!}

			</div>




		</div>
	</div>
</div><!----------End Tabs----------->




<div class="col-sm-12 col-12 mt-5 mb-5">
	<div class="container-fluid">
		<div class="col-sm-12 col-12 bg-light p-3" style="border-left: 5px solid gray; border-radius:30px;">
			<span class="headingsection">Related <span class="text-infos">Products</span></span>
		</div>

		<div class="col-sm-12 col-12">
			<div class="row">


				@if(isset($related_product))
				@foreach($related_product as $r)
				@if($r->category_id == $viewproduct->category_id)
				@php
				$productname = str_replace(["%","/"," "],"-",$r->product_name);
				@endphp
				<div class="col-lg-2 col-md-3 col-sm-6 col-6 mt-4">
					<div class="homeproducts border">
						<center>
							<a href="{{url('product')}}/{{$productname}}/{{$r->product_id}}"><img src="{{asset('public/productImage')}}/{{$r->image}}" class="img-fluid"></a>
						</center>


						<div>
							<center>
								<a href="{{url('product')}}/{{$productname}}/{{$r->product_id}}">{{ substr($r->product_name, 0,20) }}</a><br>
								<span>@if($r->discount_price>1)<del>{{ $r->sale_price }} Tk</del>@endif&nbsp;&nbsp;&nbsp;&nbsp;{{ $r->current_price }} Tk</span>
							</center>
						</div>
					</div>
				</div><!------End Product------------>

				@endif
				@endforeach
				@endif




			</div>
		</div>
	</div>
</div><!-------------End Related Products------------->



<style>
    
#myform .qty {
 padding: 1px;
 width: 30px;
 border: none;
 text-align: center;
}


#myform input.qtyplus { 
  padding: 1px;
  width: 30px;
  border: none;
  background-color: #fff;
  border:1px solid #e8e8e8;
  color: #414141;
  font-weight: bold;
  cursor: pointer;

}

#myform input.qtyminus {
  padding: 1px;
  width: 30px;
  border: none;
  background-color: #fff;
  border:1px solid #e8e8e8;
  color: #414141;
  font-weight: bold;
  cursor: pointer;

}

#size{
    padding:5px 20px;
    border:1px solid #e1e1e1;
}

#color{
    padding:5px 20px;
    border:1px solid #e1e1e1;
}

</style>



<script>

function productcolor() {
  var size=$('#size').val();
  var product_id=$('#productid').val();
  if (size!='' && product_id!='') {
      $.ajax({
        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
        url: '{{ url("getProductcolor") }}',
        type: 'POST',
        data: {size:size,product_id:product_id},
        success: function(data){
          $('#color').html(data);
        }
      });
  } 
  else {
    $('#color').html('<option value="">Select a color</option>');
  }
}


</script>

			


@endsection
