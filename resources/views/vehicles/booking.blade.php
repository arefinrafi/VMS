@extends('layouts.frontLayout.front_design')
@section('content')
<section>
	<div class="container">
		<div class="row">
			<div class="product-details"><!--product-details-->
				<div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
					<a href="{{ asset('images/backend_images/vehicles/large/'.$vehicleDetails->image) }}">
						<img class="mainImage" style="width:360px;height: 280px;" src="{{ asset('images/backend_images/vehicles/large/'.$vehicleDetails->image) }}" alt=""/>
					</a>
				</div>
				<div class="col-sm-7">
					@if(\Illuminate\Support\Facades\Session::has('flash_message_error'))
						<div class="alert alert-error alert-block">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<strong style="color:red">{!! session('flash_message_error') !!}</strong>
						</div>
					@endif
					@if(\Illuminate\Support\Facades\Session::has('flash_message_success'))
						<div class="alert alert-success alert-block">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<strong style="color:green">{!! session('flash_message_success') !!}</strong>
						</div>
					@endif
					<h3>Model : <span>{{ $vehicleDetails->model }}</span></h3>
								<span>
									<h3>Brand : <span>{{ $vehicleDetails->brand }}</span></h3>
									<h3>Year : <span>{{ $vehicleDetails->year }}</span></h3>
									<h3>Price : <span>{{ $vehicleDetails->price }} Tk</span></h3>
								</span>
					<div class="product-information">
						<span>
							<h4>Mileage : <strong>{{ $vehicleDetails-> mileage}}</strong></h4>
							<h4>Engine Capaceity : <strong>{{ $vehicleDetails-> engine_capacity}}</strong></h4>
							<h4>Fuel Type : <strong>{{ $vehicleDetails-> fuel_type}}</strong></h4>
							<h4>Max Power : <strong>{{ $vehicleDetails-> max_power}}</strong></h4>
							<h4>Max Speed : <strong>{{ $vehicleDetails-> max_speed}}</strong></h4>
							<h4>Torque : <strong>{{ $vehicleDetails-> torque}}</strong></h4>
							<h4>Fuel Consumption : <strong>{{ $vehicleDetails-> fuel_consumption}}</strong></h4>
							<h4>Door : <strong>{{ $vehicleDetails-> door}}</strong></h4>
							<h4>Drive Type : <strong>{{ $vehicleDetails-> drive_type}}</strong></h4>
							<h4>Seats : <strong>{{ $vehicleDetails-> seats}}</strong></h4>
							<h4>Wheel Base : <strong>{{ $vehicleDetails-> wheel_base}}</strong></h4>
							<h4>Weight : <strong>{{ $vehicleDetails-> weight}}</strong></h4>
							<h4>Length : <strong>{{ $vehicleDetails-> length}}</strong></h4>
							<h4>Width : <strong>{{ $vehicleDetails-> width}}</strong></h4>
							<h4>Height : <strong>{{ $vehicleDetails-> height}}</strong></h4>
							<h4>Fuel Tank Capacity : <strong>{{ $vehicleDetails-> fuel_tank_capacity}}</strong></h4>
							<h4>Color : <strong>{{ $vehicleDetails-> color}}</strong></h4>
							<h4>No of Cylinder : <strong>{{ $vehicleDetails-> no_of_cylinder}}</strong></h4>
						</span>

						<div style="margin: 0 auto">
							<legend style="margin-top: 15px; color: #1c7430">Booking Section:</legend>
							<h3 style="font-weight: bold">Price: {{$vehicleDetails->price}} TK</h3>
							<h3 style="font-weight: bold">Booking Rate: {{$vehicleDetails->booking_rate}} % of Price</h3>
							<h3 style="font-weight: bold">Amount Required For Booking: {{$amountForBooking}} TK</h3>
							<form class="form" method="post" action="{{ URL::to('/booking') }}">
								@csrf
								<input type="hidden" name="v_id" value="{{$vehicleDetails->id}}">
								<div class="control-group">
									<label class="control-label"><strong>Enter Booking Amount</strong></label>
									<div class="controls">
										<input type="text" size="45" name="booking_amount" id="booking_amount" placeholder="Amount" required >
									</div>
								</div>
								<div class="form-actions" style="margin-top: 10px; margin-right: 217px; float: right">
									<input type="submit" value="Conform Booking" class="btn btn-success">
								</div>
					    	</form>
						</div>
									<!--/product-information-->
				</div><!--/product-information-->
			</div>
			</div><!--/product-details-->
		</div>
	</div>
</section>

@endsection
