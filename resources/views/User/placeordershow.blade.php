											
	@php
		$total =0;
		@endphp
			@if(isset($view))
			@foreach($view as $viewdata)
				@php
		$total +=$viewdata->current_price*$viewdata->quantity;
		@endphp
			<tr class="text-center">
				
			<td>{{$viewdata->product_name}}
 <input type="checkbox" name="shipping_id[]" id="shipping_id" value="{{$viewdata->shipping_id}}" checked=""  disabled="">
			</td>
			<td>{{$viewdata->quantity}}</td>
			<td>{{$viewdata->current_price}}</td>
			<td>{{$viewdata->current_price*$viewdata->quantity}}</td>
			<td><a><span uk-icon="icon: trash; ratio: 0.8" class="text-danger" onclick="delete_product('{{$viewdata->id}}')"></span></a></td>
			</tr>
				@endforeach
				@endif
			<tr class="text-center">
				<td></td>
				<td></td>
				<td>SubTotal</td>
				<td>
					<input type="hidden" name="subamount" id="subamount" value="{{$total}}" required="">
					Tk.{{$total}}.00
				</td>
				<td></td>
			</tr>

			<tr class="text-center">
				<th></th>
				<th></th>
				<td>Delivery Charge</td>
				<td>
					<input type="hidden" name="deliverycharge" id="deliverycharge" value="0">
					Tk.<span id="ddcharge">0</span>.00
				</td>
				<td></td>
			</tr>	

			<tr class="text-center">
				<th></th>
				<th></th>
				<td>Discount</td>
				<td>
					<input type="hidden" name="discount" id="discount" value="0">
					<input type="hidden" name="super_code" id="super_code">
					Tk.<span id="promo_price">0</span>.00
				</td>
				<td></td>
			</tr>	


			<tr class="text-center">
				<td></td>
				<td></td>
				<td>Grand Total</td>
				<td>
					<input type="hidden" name="totalamount" id="totalamount" value="{{$total}}" required="">
					Tk.<span id="gtotal">{{$total}}</span>.00

				</td>
				<td></td>
			</tr>