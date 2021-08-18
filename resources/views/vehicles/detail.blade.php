@extends('layouts.frontLayout.front_design')
@section('content')

<section>

		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
				@include('layouts.frontLayout.front_sidebar')
				</div>
				
				<div class="col-sm-9 padding-right">
			<div class="product-details"><!--product-details-->
		<div class="col-sm-5">
					<div class="view-product">
						<div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
						<a href="{{ asset('images/backend_images/vehicles/large/'.$vehicleDetails->image) }}">
							<img class="mainImage" style="width:360px;height: 280px;" src="{{ asset('images/backend_images/vehicles/large/'.$vehicleDetails->image) }}" alt=""/>
						</a>
						</div>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active thumbnails">
											<a href="{{ asset('images/backend_images/vehicles/large/'.$vehicleDetails->image) }}" data-standard="{{ asset('images/backend_images/vehicles/large/'.$vehicleDetails->image) }}">
												<img class="changeImage" style="width:90px;"  src="{{ asset('images/backend_images/vehicles/large/'.$vehicleDetails->image) }}" alt=""/>
											</a>
											@foreach($vehicleAltImages as $altimage)
										<a href="{{ asset('images/backend_images/vehicles/large/'.$altimage->image) }}" data-standard="{{ asset('images/backend_images/vehicles/large/'.$altimage->image) }}">
										  <img class="changeImage" style="width:90px; cursor: pointer;" src="{{ asset('images/backend_images/vehicles/large/'.$altimage->image) }}" alt="">
										</a>
										  @endforeach
										</div>
											
									</div>
							</div>
						</div>
						<div class="col-sm-7">
							<a href="{{ URL::to('/booking', ["id" => $vehicleDetails->id]) }}" class="btn btn-primary"> Booking </a>

							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />

								<span>
									<h3>Brand : <span>{{ $vehicleDetails->brand }}</span></h3>
									<h3>Model : <span>{{ $vehicleDetails->model }}</span></h3>
									<h3>Year : <span>{{ $vehicleDetails->year }}</span></h3>
									<h3>Price : <span>{{ $vehicleDetails->price }} Tk</span></h3>
								</span>

								{{-- <p>Model : {{ $vehicleDetails->model }}</p> --}}
								<img src="images/product-details/rating.png" alt="" />
								{{-- <span>
									<span>Price : {{ $vehicleDetails->price }} Tk</span>
									<!-- <label>Quantity:</label>
									<input type="text" value="3" /> -->
									<!-- <button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button> -->
								</span> --}}
								{{-- <p><b>Year:</b> {{ $vehicleDetails->year }}</p>
								<!-- <p><b>Showroom Name:</b> {{ $vehicleDetails->showroom_name }}</p> -->
								<!-- <p><b>Details:</b>{{ $vehicleDetails->description }}</p> -->
								<!-- <p><b>Address:</b> {{ $vehicleDetails->address }}</p>
								<p><b>Contact:</b> {{ $vehicleDetails->contact }}</p> -->								 --}}
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#description" data-toggle="tab">Description</a></li>
								<li class="#other"><a href="#other" data-toggle="tab">Others Information</a></li>
								<li><a href="#showroom" data-toggle="tab">Showroom Information</a></li>
								<!-- <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li> -->
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane active in" id="description" >
								<div class="col-sm-12">
									<div class="borderclass">
										{{-- <p><strong>{{ $vehicleDetails->description }}</strong></p> --}}
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
									</div>
									
								</div>
							</div>

							<div class="tab-pane fade" id="other" >
								<div class="col-sm-12">
									<h4><strong>{{ $vehicleDetails-> description}}</strong></h4>
									{{-- <p><strong>{{ $vehicleDetails->description }}</strong></p> --}}
								</div>
							</div>
							
							<div class="tab-pane fade" id="showroom" >
								<div class="col-sm-12">
									<div class="borderclass">
										<h4>Showroom Name: <strong>{{ $vehicleDetails-> showroom_name}}</strong></h4>
										<h4>Address: <strong>{{ $vehicleDetails-> address}}</strong></h4>
										<h4>Contact: <strong>{{ $vehicleDetails-> contact}}</strong></h4>
									</div>
									{{-- <p><b>Showroom Name:</b> {{ $vehicleDetails->showroom_name }}</p>
									<p><b>Address:</b> {{ $vehicleDetails->address }}</p>
									<p><b>Contact:</b> {{ $vehicleDetails->contact }}</p> --}}
								</div>
							</div>
							</div>
						
							
						
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php $count=1; ?>
								@foreach($relatedVehicles->chunk(3) as $chunk)
								<div <?php if($count==1){ ?> class="item active" <?php } else {
									?> class="item" <?php } ?>>	
									@foreach($chunk as $item)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="{{ URL::to('/vehicle/'.$item->id) }}">
													<img src="{{ asset('images/backend_images/vehicles/large/'.$item->image) }}" alt="" />
													<h2>{{ $item->price }}</h2>
													<p>{{ $item->model }}</p>
												</a>
												
												</div>
											</div>
										</div>
									</div>
									@endforeach
								</div>
								<?php $count++; ?>
								@endforeach
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>	
</section>

@endsection
