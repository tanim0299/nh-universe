@extends('User.layouts.master')
@section('body')

<meta property="og:type"          content="Article">
<meta property="og:title"         content="{{ $view->title }}">
<meta property="og:description"   content="{{$view->details }}">
<meta property="og:image"         content="{{ url($view->image) }}"/>	



<div class="col-sm-12 col-12 pt-3 pb-3 bg-light">
	<div class="container-fluid">
		<div>
			<ul class="uk-breadcrumb bg-white p-0 p-3" style="border-radius: 30px;">
				<li><a href="{{ url('/') }}" class="font-weight-bold"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></li>
				<li><span class="text-dark font-weight-bold">{{ $view->title }}</span></li>
			</ul>
		</div>
		<div class="row p-2 pt-4 bg-white">

			<div class="col-lg-5 col-md-12 col-sm-12 col-12">
				<div class="simpleLens-gallery-container" id="demo-1">
					<div class="simpleLens-container" style="width: 100%; padding: 0px; border:1px solid lightgray;">
						<div class="simpleLens-big-image-container ">
							<a class="" data-lens-image="{{ url($view->image) }}">
								<img src="{{ url($view->image) }}" class="simpleLens-big-image p-2">
							</a>
						</div>
					</div>
					
			





				</div>
			</div>



			<div class="col-lg-7 col-md-12 col-sm-12 col-12">
				<div class="col-sm-12 col-12 singledetails p-0">
					<h3 class="font-weight-bold">{{ $view->title }}</h3>
				
                    <span>
					   {!! $view->short_details !!}
					</span>
                    
					<!-- Go to www.addthis.com/dashboard to customize your tools -->
					<span>Share With :</span><br>
					<div class="addthis_inline_share_toolbox_0v9d"></div>

				</div><br>
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

		</ul>


		<div class="tab-content" id="myTabContent">

			<div class="tab-pane fade show active mt-3" id="Description" role="tabpanel" aria-labelledby="home-tab">
				{!! $view->details !!}
			</div>




		</div>
	</div>
</div><!----------End Tabs----------->








@endsection





