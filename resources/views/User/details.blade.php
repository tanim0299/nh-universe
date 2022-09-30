@extends('User.layouts.master')

@section('body')


<div class="col-sm-12 col-12 mt-4">
	<div class="container border p-3">
		<div>
			<ul class="uk-breadcrumb">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li><span>{{$type}}</span></li>
			</ul>
		</div>

		<span class="detailspage">
	    {!!$data->description!!}

		</span>
		

		
	</div>
</div>



@endsection