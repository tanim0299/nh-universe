@extends('User.layouts.master')

@section('body')


<div class="col-sm-12 col-12 mt-4 mb-5">
	<div class="container-fluid">
		<div>
			<ul class="uk-breadcrumb">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li><span>Dashboard</span></li>
			</ul>
		</div>


		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-5 col-12 mt-3">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#Dashboard" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</a>
					<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#Orders" role="tab" aria-controls="v-pills-profile" aria-selected="false">Orders</a>

					<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#MyProfile" role="tab" aria-controls="v-pills-profile" aria-selected="false">My Profile</a>

					<a class="nav-link" id="Profile" href="{{url('all-product')}}" role="tab" aria-controls="v-pills-profile" aria-selected="false">Go To Product Gallery</a>

					<a class="nav-link" id="Profile" href="{{url('/guest-logout')}}" role="tab" aria-controls="v-pills-profile" aria-selected="false">Logout</a>
				</div>
			</div>



			<div class="col-lg-9 col-md-8 col-sm-7 col-12 mt-3">
				<div class="tab-content" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="Dashboard" role="tabpanel" aria-labelledby="v-pills-home-tab">Welcome To {{auth('guest')->user()->first_name}} {{auth('guest')->user()->last_name}}<br>
					
										
					
					
					</div>

					<div class="tab-pane fade" id="Orders" role="tabpanel" aria-labelledby="v-pills-profile-tab">
						<div class="table-responsive">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Invoice ID</th>
										<th>Customer Name</th>
										<th>Address</th>
										<th>Phone</th>
										<th>Status</th>
									</tr>

									<tbody>
										@if($data)
										@foreach($data as $showdata)
										<tr>
											<td>{{$showdata->invoice_id}}</td>
											<td><a href="#">{{$showdata->first_name}}&nbsp; {{$showdata->last_name}} </a>&nbsp;</td>
											<td><a href="#">{{$showdata->address}}</a>&nbsp;</td>
											<td><a href="#">{{$showdata->phone}}</a>&nbsp;</td>
											<td>
												@if($showdata->status == '0')
												<span style="color:white" class="btn btn-warning btn-sm">Pending</span>
												@elseif($showdata->status == '1')
												<span  style="color:white" class="btn btn-info btn-sm">Process</span>
												@elseif($showdata->status == '2')
												<span  style="color:white" class="btn btn-primary btn-sm">On the way</span>
												@elseif($showdata->status == '3')
												<span  style="color:white" class="btn btn-success btn-sm">Success</span>
												@elseif($showdata->status == '4')
												<span  style="color:white" class="btn btn-danger btn-sm">Reject</span>
												@endif

												<a href="{{url('invoice-paper')}}/{{$showdata->session_id}}"  target="_blank"><i class="fa fa-eye"></i></a>


												</td>
										</tr>
										@endforeach
										@endif
										
									</tbody>
								</thead>
							</table>
						</div>
					</div>


					<div class="tab-pane fade" id="MyProfile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
						<form action="{{url('my-profile-update')}}" method="post" enctype="multipart/form-data"> 
							@csrf
							<div class="row">
								<div class="form-group col-sm-12">
									@if(Auth('guest')->user()->image)
									<div >
										<center><img src="{{asset('public/guestImage')}}/{{Auth('guest')->user()->image}}" style="height: 200px;padding: 10px;border: 1px dotted orange;border-radius: 50%;"><br><br>
										<input type="file" name="image" ></center>
									</div>
									@else
									<div align="center">
										<img src="{{asset('public')}}/noimage.png" style="padding: 10px;border: 1px dotted orange;border-radius: 20px;"><br><br>
										<input type="file" name="image">
									</div>
									@endif
								</div>
								<div class="form-group col-sm-12">
									<label><b></b>Name</b> <span class="text-danger">*</span></label>
									<input type="text" class="form-control textfill" name="first_name" placeholder="Name" value="{{Auth('guest')->user()->first_name}}" required="">
								</div>



								<div class="form-group col-12">
									<label><b>Email</b> <span class="text-danger">*</span></label>
									<input type="email" class="form-control textfill" name="email" value="{{Auth('guest')->user()->email}}" required="">
								</div>


								<div class="form-group col-12">
									<label><b>Address</b> <span class="text-danger">*</span></label>
									<input type="text" class="form-control textfill" name="address" placeholder="Address" value="{{Auth('guest')->user()->address}}" required="">
								</div>


								<div class="form-group col-12">
									<label><b>Phone</b> <span class="text-danger">*</span></label>
									<input type="text" class="form-control textfill" name="phone" placeholder="Phone" value="{{Auth('guest')->user()->phone}}" required="">
								</div>



								<div class="form-group col-12">
									<label><b>Password</b> <span class="text-danger">*</span></label>
									<input type="Password" class="form-control textfill" name="password" placeholder="Password" >
								</div>



							</div>
							<input type="submit" class="btn btn-danger" value="Update">
						</form>
					</div>
					
				</div>
			</div>




		</div>
	</div>
</div>


@endsection
