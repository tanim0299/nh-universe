			
			@if(isset($view))
			@foreach($view as $viewdata)
			<div class="col-sm-12 col-12 mt-3 p-0" id="cartborder">
				<div class="row">
					<div class="col-sm-3 col-3">
						<center><img src="{{asset('public/productImage')}}/{{$viewdata->image}}" class="img-fluid" id="cartimg"></center>
					</div>
					<div class="col-sm-7 col-7">
						<span class="carttitle"> {{$viewdata->product_name}}<br>
							<span class="carttaka">{{$viewdata->current_price}}<span>*&nbsp;{{$viewdata->quantity}}</span><span class="subtotal">=&nbsp;{{$viewdata->current_price*$viewdata->quantity}} TK</span></span>
						</div>
						<div class="col-sm-2 col-2">
							<span uk-icon="icon:trash; ratio: 0.8" class="text-danger" onclick="delete_product('{{$viewdata->id}}')"></span>
						</div>
					</div>
				</div>

				@endforeach
				@endif