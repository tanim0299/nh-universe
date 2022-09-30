

<div class="d-lg-none d-sm-block">
	@if(isset($search)>0)
	<ul class="dropdown-menu"  id="tt" style="display: block;position: absolute; overflow-x: hidden;max-height:400px; overflow: scroll; width: auto; border-radius: 0px;">
		@foreach($search as $product)
		@php 
		$productname=str_replace(["%","/"," "],"-",$product->product_name)
		@endphp
		<li class="search-item" style="padding: 20px; border-bottom: 1px solid #f1f1f1;">
			<a href="{{url('product')}}/{{$productname}}/{{$product->product_id}}" style="text-decoration: none; color: #000;">
				<div class="image">
					<img src="{{asset('public/productImage')}}/{{$product->image}}" style="height:100px">
				</div><br>
				<div class="name">{{$product->product_name}}</div>
				<div class="price">{{$product->current_price}}৳</div>
			</a>
		</li>
		@endforeach
		@else
		@endif
	</div>

	<div class="d-none d-lg-block">
		@if(isset($search)>0)
		<ul class="dropdown-menu" style="display: block; position: absolute; overflow-x: hidden; max-height:350px;width: 50%; margin-left: 420px;margin-right: 420px;">
			@foreach($search as $product)
			@php 
			$productname=str_replace(["%","/"," "],"-",$product->product_name)
			@endphp
			<li class="search-item" style="padding: 20px; border-bottom: 1px solid #f1f1f1;">


				<a href="{{url('product')}}/{{$productname}}/{{$product->product_id}}" style="text-decoration: none; color: #000;">
					<div class="image">
						<img src="{{asset('public/productImage')}}/{{$product->image}}" style="height:100px">
					</div>
					<br>
					<div class="name">{{$product->product_name}}</div>
					<div class="price">{{$product->current_price}}৳</div>
				</a>
			</li>
			@endforeach
			
			@else
			@endif
		</ul>
		</div>