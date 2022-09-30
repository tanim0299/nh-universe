@extends('User.layouts.master')

@section('body')

@if(Auth('guest')->user())
<div class="col-sm-12 col-12 mt-4">
	<div class="container-fluid">
		<div>
			<ul class="uk-breadcrumb">
				<li><a href="">Home</a></li>
				<li><span>Checkout</span></li>
			</ul>
		</div>
		<form class="mt-5 mb-5" action="{{url('/ordesystem')}}" method="post">
			@csrf
			<div class="row" style="color: #585858;">

				<div class="col-lg-6 col-md-12 col-sm-12 col-12">
					<div>
						<ul class="list-group">
							<li class="list-group-item adhead bg-info text-light" style="border-radius: 0px;"><span>01.</span>&nbsp;&nbsp;Billing Address</li>
						</ul>
						<li class="list-group-item border-top-0">
							<div class="row">
								<div class="form-group col-sm-12">
									<label><b>Name</b> <span class="text-danger">*</span></label>
									<input type="text" class="form-control textfill" name="fname" placeholder="First Name" required="" value="{{Auth('guest')->user()->first_name}} {{Auth('guest')->user()->last_name}}">
								</div>
								
								<div class="form-group col-12">
									<label><b>Mobile</b> <span class="text-danger">*</span></label>
									<input type="text" class="form-control textfill" name="phone" placeholder="Mobile" required="" required="" value="{{Auth('guest')->user()->phone}}">
								</div>

								<!--<div class="form-group col-sm-6">-->
									<!--	<label><b>Last Name</b> <span class="text-danger">*</span></label>-->
									<!--	<input type="text" class="form-control textfill" name="lname" placeholder="Last Name" required="" value="{{Auth('guest')->user()->last_name}}">-->
									<!--</div>-->


									<div class="form-group col-12">
										<label><b>Email</b> <span class="text-danger">*</span></label>
										<input type="email" class="form-control textfill" name="email" required="" value="{{Auth('guest')->user()->email}}">
									</div>

									<div class="form-group col-12">
										<label><b>Country</b> <span class="text-danger">*</span></label>
										<select name="country" id="billing_country_id" class="form-control textfill" title="Country"  autocomplete="off" required="">
											<option value="">--Please Select Country--</option>
											<option value="BD" selected="selected">Bangladesh</option>
										</select>
									</div>



									<div class="form-group col-12">
										<label><b>Address</b> <span class="text-danger">*</span></label>
										<input type="text" class="form-control textfill" name="address" placeholder="Address" required="" value="{{Auth('guest')->user()->address}}">
									</div>


									<div class="form-group col-12">
										<label><b>District</b> <span class="text-danger">*</span></label>
										<select  id="district_id" name="district_id" title="District/State" class="form-control textfill" style="" defaultvalue="" required="" autocomplete="off" onclick="thana_info();" onchange="thana_info();">

											<option value="">Please select district, state or region</option>
											@if($district)
											@foreach($district as $districtdata)
											<option value="{{$districtdata->id}}">{{$districtdata->district_name}}</option>
											@endforeach
											@endif


										</select>
									</div>



									<div class="form-group col-12">
										<label><b>Thana/Area</b> <span class="text-danger">*</span></label>
										<select  id="thana_id" name="thana_id" title="Thana/Area" class="form-control textfill" style="" defaultvalue="" required="" autocomplete="off" onclick="charge();" onchange="charge();">

											<option value="">Please select Thana or Area</option>


										</select>
									</div>

								</div>

							</li>
						</div><br>
					</div>





					<div class="col-lg-6 col-md-12 col-sm-12 col-12">



						<div>
							<ul class="list-group">
								<li class="list-group-item adhead bg-info text-light" style="border-radius: 0px;"><span>03.</span>&nbsp;&nbsp;Payment Method</li>
							</ul>
							
							

							@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
							@endif

							<li class="list-group-item border-top-0" style="font-size: 13px;">
								<img src="{{asset('public')}}/3.png" style="height:30px;width:30px;">&nbsp;&nbsp;<input type="radio" name="delivery_type" id="delivery_type" value="COD" onclick="pay_type('{{1}}')">&nbsp;&nbsp;Cash On Delivery<br><br>
								<img src="{{asset('public')}}/4.jpg" style="height:30px;width:30px;">&nbsp;&nbsp;<input type="radio" id="delivery_type" name="delivery_type" value="bkash" onclick="pay_type('{{2}}')">&nbsp;&nbsp;Bkash<br><br>
								
								<img src="{{asset('public')}}/1.png" style="height:30px;width:30px;">&nbsp;&nbsp;<input type="radio" id="delivery_type" name="delivery_type" value="rocket" onclick="pay_type('{{3}}')">&nbsp;&nbsp;Rocket<br><br>
								
								<img src="{{asset('public')}}/2.png" style="height:30px;width:30px;">&nbsp;&nbsp;<input type="radio" id="delivery_type" name="delivery_type" value="nagad" onclick="pay_type('{{4}}')">&nbsp;&nbsp;Nagad<br><br>

								<div id="bKashfor" style="display:none;">
									
									<label>Mobile No#</label>
									<input type="text" name="mobile_acc"  id="mobile_acc" class="form-control"><br>
									<label>Transaction Id</label>
									<input type="text" name="trans_id" class="form-control">
									<br>
									<span id="set"></span>

								</div>
							</li>
						</div>



						<div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-3 p-0" >
							<div>
								<ul class="list-group">
									<li class="list-group-item adhead bg-info text-light" style="border-radius: 0px;"><span>04.</span>&nbsp;&nbsp;Order Preview</li>
								</ul>



								<li class="list-group-item border-top-0">
									<div class="discount">
										<label style="font-family: cursive;">Promo code</label>
										<input type="text"  id="coupon_code" name="coupon_code">
										<button type="button" title="Apply Promo" class="btn btn-success btn-sm" onclick="Applypromo();" value="Apply Promo">
											<b>Apply Promo</b>
										</button>
									</div>
								</li>


								<li class="list-group-item border-top-0">
									<div class="table-responsive">
										<table class="table" style="font-size: 13px;">
											<thead>
												<tr class="text-center">
													<th>Product Name</th>
													<th>Quantity</th>
													<th>Price</th>
													<th>Subtotal</th>
													<th>Remove</th>
												</tr>
											</thead>
											<tbody id="placeordershow">

											</tbody>
										</table>
									</div>
								</li>
							</div>
							<br>
							<input type="submit" name="submit" class="d-inline bag float-right" style="border:none; cursor: pointer;">
						</div>
					</div>


				</div>
			</form>
		</div>
	</div>

	@endsection
	<script type="text/javascript">
		allcalculate();
		Applypromo();
		charge();
		function charge()
		{
			let subamount = $("#subamount").val();
			let thana_id = $("#thana_id").val();
			shipping_id=[];
			$("#shipping_id:checked").each(function(index, el) {
				shipping_id.push(this.value);
			})


			$("#thana_id").change(function(){
				let thana_id = $("#thana_id").val();
				if (thana_id != '')
				{
	// alert(shipping_id);
	$.ajax({

		headers:{ 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
		url:'{{url("district_charge")}}',
		type:'POST',
		data:{thana_id:thana_id,shipping_id:shipping_id},
		success:function(data)
		{
			$("#dcharge").html('<input type="radio" name="charge" value="'+data+'" checked="">&nbsp;Home Delivery Tk.&nbsp;'+data);
			$("#ddcharge").html(data);
			$("#deliverycharge").val(data);
			allcalculate();

		}
	})	
}
else
{
	$("#dcharge").html('<input type="radio" name="charge" value="'+0+'" checked="">&nbsp;Home Delivery Tk.&nbsp;'+0);
	$("#ddcharge").html(0);
	$("#deliverycharge").val(0);
	allcalculate();
}
})
		}


		function allcalculate()
		{
			var subamount = $("#subamount").val();
			var charge = $("#deliverycharge").val();
			var discount = $("#discount").val();
			var total=0;

			if (subamount !='' && charge !='' && discount !='') 
			{
				total=(parseFloat(subamount)+parseFloat(charge))-parseFloat(discount);
				$("#totalamount").val(total);
				$("#gtotal").html(total);

			}
			else if(subamount !='' && charge !='')
			{
				total=parseFloat(subamount)+parseFloat(charge);
				$("#totalamount").val(total);
				$("#gtotal").html(total);

			}
			else if(subamount !='' &&  discount !='')
			{
				total=parseFloat(subamount)-parseFloat(discount);
				$("#totalamount").val(total);
				$("#gtotal").html(total);

			}
			else
			{
				total=parseFloat(subamount);
				$("#totalamount").val(total);
				$("#gtotal").html(total);

			}
		}

		function pay_type(id)
		{


			if (id == '1') 
			{
				$("#bKashfor").css("display", "none");
			}
			if(id == '2') 
			{
				$("#bKashfor").css("display", "block");

				$("#set").html("bKash: 01857-982966<br>Personal Account");


			}
			if(id =='3') 
			{
				
				$("#bKashfor").css("display", "block");

				$("#set").html("Rocket: 01832-3065409<br>Personal Account");


			}
			if(id == '4') 
			{
				
				$("#bKashfor").css("display", "block");

				$("#set").html("Nagad: 01857-982966<br>Personal Account");


			}
		}

		function Applypromo()
		{
			var coupon_code = $("#coupon_code").val();
			var subamount = $("#subamount").val();
			if (coupon_code !='') 
			{

				$.ajax({
					headers:{ 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
					type:'POST',
					url:"{{url('Applypromo_check')}}",
					data:{code:coupon_code,subamount:subamount},
					success:function(data)
					{
						if (data == 'false') 
						{
							alert('Promo code "'+coupon_code+'" is invalid/incorrect or did not match the criteria');
							$("#coupon_code").val('');
							$("#discount").val(0);
							$("#promo_price").html(0);
							$("#super_code").val('');
							allcalculate();
						}
						else if(data =='wrong_coupon')
						{
							alert('Promo code "'+coupon_code+'" is invalid/incorrect or did not match the criteria');
							$("#coupon_code").val('');
							$("#discount").val(0);
							$("#promo_price").html(0);
							$("#super_code").val('');
							allcalculate();
						}
						else if(data =='date_invalid')
						{
							alert('Promo code "'+coupon_code+'" is invalid/incorrect Date');
							$("#coupon_code").val('');
							$("#discount").val(0);
							$("#promo_price").html(0);
							$("#super_code").val('');
							allcalculate();
						}
						else if(data =='end_date')
						{
							alert('Promo code "'+coupon_code+'" is invalid Date');
							$("#coupon_code").val('');
							$("#discount").val(0);
							$("#promo_price").html(0);
							$("#super_code").val('');
							allcalculate();
						}
						else if(data =='min_price')
						{
							alert('Your Cart amount low ! please add to cart more product');
							$("#coupon_code").val('');
							$("#discount").val(0);
							$("#promo_price").html(0);
							$("#super_code").val('');
							allcalculate();
						}
						else
						{
							$("#super_code").val(coupon_code);
							$("#discount").val(data);
							$("#promo_price").html(data);
							allcalculate();
						}
					}

				});

			}
			else
			{
				alert('Please enter your promo code!');
			}
		}

		function thana_info()
		{
			var district_id = $("#district_id").val();

			$.ajax({

				headers:{ 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
				url:'{{url("thana_info")}}',
				type:'POST',
				data:{district_id:district_id},
				success:function(data)
				{
					$("#thana_id").html(data)

				}
			});

		}

	</script>
	@else
	<script type="text/javascript">
		window.location.href = "{{url('/user-login')}}";
	</script>
	@endif