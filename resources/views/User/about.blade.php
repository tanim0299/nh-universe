@extends('User.layouts.master')
@section('body')


<div class="col-sm-12 col-12 mt-4">
	<div class="container border p-3">
		<div>
			<ul class="uk-breadcrumb">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li ><span>About Us</span></li>
			</ul>
		</div>


</br> 

<P style="font-weight:800;font-size:30px">OUR STORY</P>

	<p style="font-weight:700;font-size:18px">
	    	<span class="detailspage">
			@if(isset($about))
			<P font-weight:800;font-size:30px>{!! $about->description !!}</P>
			@endif
		</span>
		
	</p>

		
	</div>
</div>



@endsection