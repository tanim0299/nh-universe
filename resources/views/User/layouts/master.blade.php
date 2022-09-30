@include('User.layouts.header')

@yield('body')

@include('User.layouts.footer')

<script type="text/javascript">
	shopping_cart();
	placeorder_show();
	totalcartprice();
	totalcartqunt();
	totalcartamount();
	

	function AddCart(product_id)
	{
		var Quantity = $("#Quantity-"+product_id).val();
		var size = $(".size-"+product_id).val();
		var color = $(".color-"+product_id).val();
		
		
// 		var color = $(".color.active").html();
// alert(size)
// alert(color)
		if(size !=null && color !=null)
	{
	  
	   $.ajax({
			headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
			url: '{{ url("add_to_cart") }}',
			type:'POST',
			data:{product_id:product_id,Quantity:Quantity,size:size,color:color},
			success: function(data)
			{
			  
			    
		UIkit.notification({
        message: '<span uk-icon=\'icon: check\'></span>'+data,
        pos:     'top-right',
        timeout:  1000
      });
			    
			    
			    
				shopping_cart();
				totalcartprice();
				totalcartqunt();
				totalcartamount();
			}
		}); 
	}
	else
	{
	   
	   // UIkit.notification("<span uk-icon=\'icon: check\'></span> Please Select Size & Color", {status: 'danger'});
	    
	    
	    	UIkit.notification({
        message: '<span uk-icon=\'icon: check\'></span>সাইজ সিলেক্ট করুন!',
        status: 'danger',
        pos:     'top-right',
        timeout:  1200
      });
	}
		
	
         
		
	}


	function shopping_cart()
	{
		
		$.ajax({
			headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
			url: '{{ url("shoppingcart_view") }}',
			type:'POST',
			data:{},
			success: function(data)
			{
				$("#cartshow").html(data);
			}
		});
	}


	function placeorder_show()
	{
		
		$.ajax({
			headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
			url: '{{ url("placeorder_show") }}',
			type:'POST',
			data:{},
			success: function(data)
			{
				$("#placeordershow").html(data);
			}
		});
	}

	function delete_product(product_id)
	{
		
		$.ajax({
			headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
			url: '{{ url("delete_product") }}',
			type:'POST',
			data:{product_id:product_id},
			success: function(data)
			{
				UIkit.notification({
					message: '<span uk-icon=\'icon: check\'></span> Product Remove To Cart',
					pos:     'bottom-center',
					timeout:  2000
				});

				shopping_cart();
				placeorder_show();
				totalcartprice();
				totalcartqunt();
				totalcartamount();
			}
		});
	}


	function totalcartprice()
	{
		$("#cartprice").load( "{{url('totalprice')}}" );
	}
	function totalcartqunt()
	{
		$("#cartqunt").load( "{{url('totalcartqunt')}}" );
	}
	function totalcartamount()
	{
		$("#cartamount").load( "{{url('totalcartamount')}}" );
	}

	function totalcartamount()
	{
		$("#cartamount").load( "{{url('totalcartamount')}}" );
	}




</script>
