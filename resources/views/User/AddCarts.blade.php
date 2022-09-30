

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

         
            
        <div class="row">
                
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



			<div class="col-lg-8 col-md-12 col-sm-12 col-12">
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
                                	              <select class="size-{{ $viewproduct->id }}" name="size" id="size" onclick="return productcolor()" onchange="return productcolor()">
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
					</div>
					<br>


					

					@if(($stock - $salequntshopping)>0)
				
				
					
					<label>Quantity:&nbsp;<input type="number" value="{{ $viewproduct->min_qunt }}" min="{{ $viewproduct->min_qunt }}" name="Quantity-{{$viewproduct->id}}" id="Quantity-{{$viewproduct->id}}"><br><br>&nbsp;&nbsp;
					

					
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
					
	

				</div><br>
			</div>

                </div>
           
           
           
           

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('public/Frontend')}}/src/jquery.simpleGallery.js"></script>
<script type="text/javascript" src="{{asset('public/Frontend')}}/src/jquery.simpleLens.js"></script>

<script>
	$(document).ready(function(){
		$('#demo-1 .simpleLens-thumbnails-container img').simpleGallery({
			loading_image: 'demo/images/loading.gif'
		});

		$('#demo-1 .simpleLens-big-image').simpleLens({
			loading_image: 'demo/images/loading.gif'
		});
	});
</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5eff60d26f9c1b7b"></script>
<script type="text/javascript" src="{{asset('public/Frontend')}}/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('public/Frontend')}}/js/uikit.min.js"></script>
<script type="text/javascript" src="{{asset('public/Frontend')}}/js/uikit-icons.min.js"></script>

<script type="text/javascript">
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});

</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
	@if(Session::has('messege'))
	var type="{{Session::get('alert-type','info')}}"
	switch(type){
		case 'info':
		toastr.info("{{ Session::get('messege') }}");
		break;
		case 'success':
		toastr.success("{{ Session::get('messege') }}");
		break;
		case 'warning':
		toastr.warning("{{ Session::get('messege') }}");
		break;
		case 'error':
		toastr.error("{{ Session::get('messege') }}");
		break;
	}
	@endif
</script>


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
  
