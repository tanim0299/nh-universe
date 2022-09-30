@include('User.modal')

<div class="col-sm-12 col-12 p-3 pt-5 pb-5" id="footerdiv" style="background: #657383; color:white;">
    
    
	<div class="container-fluid ">
	    
	    
		<div class="row">
		    
		    
	
	<!--Service Sectio Start From Here-->
		    
	@php
			$allitems = DB::table('product_item')->limit('8')->get();


			@endphp
			
			
			  


				<div class="col-lg-3   col-md-6 col-sm-6 col-8 text-lg-left">
				    
				     <img src="{{asset('public')}}/halal_logo.png" class="img-fluid" style="max-height:80px;"><br><br>
				    
				<strong style="font-weight:800;font: normal normal normal 23px/1 FontAwesome;  " >Services</strong>
				<br><br>

				<div class="footermenu">
					 
					
					
			
					<li><a style=" font-weight:700;font: normal normal normal 16px/1 FontAwesome;" href="{{ url('/Wholesale') }}">Wholesale</a></li>
					<li><a style=" font-weight:700;font: normal normal normal 16px/1 FontAwesome;" href="{{ url('/Import') }}">Import</a></li>
					<li><a style=" font-weight:700;font: normal normal normal 16px/1 FontAwesome;" href="{{ url('/Export') }}">Export </a></li>  
					




				</div><br>
			</div>

	
	<!--Service section Ends at here-->
	
	

	
	
			
		<!-- About us Section Start from here-->
			
			<div class="col-lg-3  col-12 col-md-6 col-sm-6 col-8 text-lg-left">
				<strong  style="font-weight:800;font: normal normal normal 23px/1 FontAwesome;  ">About Company</strong>
				<br><br>

				<div class="footermenu" style="font-family:'Titillium web';">

					<li><a style=" font-weight:700;font: normal normal normal 16px/1 FontAwesome;" href="{{ url('/Contact_us') }}">Contact info</a></li>
				
					<li><a style=" font-weight:700;font: normal normal normal 16px/1 FontAwesome;" href="{{ url('/FAQ') }}">FAQ</a></li>  
				
					<li><a style=" font-weight:700;font: normal normal normal 16px/1 FontAwesome;"" href="{{ url('/About-us') }}">About us</a></li> 
				
					
				
				
					
						<li><a style=" font-weight:700;font: normal normal normal 16px/1 FontAwesome;" href="{{ url('/Term_Condition') }}">Privacy Policy</a></li> 
					
					
					
						<li><a style=" font-weight:700;font: normal normal normal 16px/1 FontAwesome;" href="{{ url('/Term_Condition') }}">Term & Condition</a></li> 
					
					
	
				</div><br>
			</div>
			
			
			<!-- About us Section Ends At here-->
			
						
		

<!-- Find Us SEction Start At here -->

			@php $setting = DB::table('settings')->first();  @endphp



			<div class="col-lg-3 col-md-8  col-md-6 col-sm-6 col-12 text-lg-left">
				<strong style="font-weight:800;font: normal normal normal 23px/1 FontAwesome; ">Find us on</strong><br><br>
				
				
			   	<div class="social" >
			   	
			   		
					<a href="{{ $setting->facebook }}" data-toggle="tooltip" data-placement="left" title="Facebook" class="fa fa-facebook" target="_blank" style="padding-bottom:15px; font-weight:700;font: normal normal normal 16px/1 FontAwesome;" > &nbsp;&nbsp;Facebook</a> 
					    
					  
					    
					<a href="{{ $setting->twitter }}" data-toggle="tooltip" data-placement="left" title="Twitter" class="fa fa-twitter"  target="_blank" style=" padding-bottom:15px;  font-weight:700;font: normal normal normal 16px/1 FontAwesome;"> &nbsp;Twitter</a>
					
				
					
					
					<a href="{{ $setting->instragram }}" data-toggle="tooltip" data-placement="left" title="Instagram" class="fa fa-instagram" target="_blank" style=" padding-bottom:12px;  font-weight:700;font: normal normal normal 16px/1 FontAwesome;">&nbsp; Instagram</a>
					
					
			
					
					<a href="{{ $setting->youtube }}" data-toggle="tooltip" data-placement="left" title="Youtube" class="fa fa-youtube" target="_blank"  style="font-size:16px; padding-bottom:25px"> &nbsp;Youtube</a>
				</div>
				
			</div>




<!-- Find Us section End at here-->



			<!-- Address Section Start At here-->

					<div class="col-lg-3 col-md-6 col-sm-6 col-8 text-lg-left">


				<span>
						<strong style="font-weight:800;font: normal normal normal 23px/1 FontAwesome;  ">Address</strong>
				<br><br>
				  <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;
				  <span  style=" font-weight:800;font-size-16px">Corporate Office:</span> 
				  <span style=" font-weight:700;font: normal normal normal 14px/1 FontAwesome;">&nbsp;15, Masjid Goli, Nayapaltan, Dhaka-1000.</span>
				  
				  </br></br>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp; <span style=" font-weight:800;font-size-16px"> China Office: </span>
                        
                        <spna style=" font-weight:700;font: normal normal normal 14px/1 FontAwesome;"> &nbsp;689, Gong Ren Bei Lu, Yiwu, Zhejiang, China.</spna>
                        <br>
                        </br>
					<span style="font-size:16px; font-weight:700;" class="text-black">E-Mail:</span><br>
				<i class="fa fa-envelope" aria-hidden="true"></i>
				
				
				<span style=" font-weight:700;font: normal normal normal 14px/1 FontAwesome;">&nbsp;&nbsp;support@halalbuy.com</span>
				<br>
				
				</br>
					<span style="font-size:16px; font-weight:700;" class="text-black">Contact No:</span><br>
					
					<span style=" font-weight:700;font: normal normal normal 14px/1 FontAwesome;">	<i class="fa fa-phone"></i>&nbsp;&nbsp;+880 1321410005</span>
				
				<br>

			</div>
			
			
<!-- Address Section Ends At here-->



		</div> 
		

		
			
			

	</div>
</div><!------------End footer------>





<div class="col-sm-12 col-12" id="footerdivs" >
	<div class="container">
	    
	    
	    <center class="text-light">
	        <a href="#"><i class="fa fa-chevron-up" aria-hidden="true" style="font-size:30px;color:#fff;"></i></a><br><br>

	        <span style="font-size:12px">&copy Copyright 2021 HalalBuy.com. All Right Reserved.</span></center>
	    
	 
	</div>
</div>





<center>
	<div class="addtocart">
		<a href="#" id="myBtns" uk-toggle="target: #offcanvas-none">
			<i class="fa fa-cart-plus" style="font-size:25px;"></i>
			<br>
			<span style="color: #fff;"><span  id="cartqunt">0</span> ITEMS</span>
			<br> 
			<span><span id="cartamount">0</span> TK</span>
		</a>
	</div>
</center><!----------End Cart------>






<div id="offcanvas-none" uk-offcanvas="mode: slide; overlay:true; flip: true;" style="transition: 5s;">
	<div class="uk-offcanvas-bar" style="background: #fff; max-width: 400px; padding: 0px; color: #000; transition: 0.9s;">


		<div class="card-header" style="color: #fff; border-radius: 0px;  border:none; font-weight: bold; background:#FED61E;">
			<div class="row">
				<div class="col-sm-6 col-6">
					My Cart
				</div>

				<div class="col-sm-6 col-6">
					<span style="top: -7px;" uk-icon="icon:close; ratio:1.2" class="uk-offcanvas-close float-right"></span>
				</div>

			</div>
		</div><!--------------End header----------------->





		<div class="card-body p-0" id="cardbody" style="height:450px; overflow-x: hidden; overflow-y: scroll;">


			<div id="cartshow"></div>



		</div><!--------------End Body----------------->



		<div class="col-sm-12 col-12 p-0" style="bottom: 0; position: absolute; width: 100%">

			<div class="card-footer bg-dark mt-2" >
				<div class="col-sm-12 col-12" >
					<center>
						<span class="total" >TOTAL =&nbsp;<span id="cartprice">0</span> TK</span>
					</center>                  
				</div>
			</div>



			<div class="card-footer" style="background-color: #025505;">
				<div class="col-sm-12 col-12" >
					<center>
						@if(Auth('guest')->user())
						<a href="{{url('/Checkout')}}" class="orders">CHECKOUT</a>
						@else
						<a class="orders" data-toggle="modal" data-target="#staticBackdrop" style="color:white">
						CHECKOUT</a>
						@endif
					</center>                  
				</div>
			</div>

		</div>

	</div>
</div><!-----------End side Cart--------->












<div id="myModal" class="modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          
                <button type="button" class="close" data-dismiss="modal">&times;</button>
     
            <div class="modal-body">
<div id="datashow"></div>
</div>

        </div>
    </div>
</div>


<script>


function AddCarts(product_id){
    var id = product_id;
    $.ajax({

                headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                url: "{{ url('AddCarts') }}/"+id,
                type: 'GET',
                data:{},
                success: function(data)
                {
                  $('#datashow').html(data);
                },
                error:function(){
                    console.log("Errors");
                }
              });
    
}


</script>















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


</body>
</html>