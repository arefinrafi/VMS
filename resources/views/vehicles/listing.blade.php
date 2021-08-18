@extends('layouts.frontLayout.front_design')
@section('content')

<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<img style="width:1200px;height: 400px;" src="{{ asset('images/frontend_images/banners/banner3.jpg') }}">
							</div>
							<div class="item">
								<img style="width:1200px;height: 400px;" src="{{ asset('images/frontend_images/banners/banner4.jpg') }}">
							</div>
							
							<div class="item">
								<img style="width:1200px;height: 400px;" src="{{ asset('images/frontend_images/banners/banner2.jpg') }}">
							</div>
						</div>
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					@include('layouts.frontLayout.front_sidebar')
				</div>
				
								<div class="col-sm-9 padding-right">
								<div class="features_items"><!--features_items-->
									<h2 class="title text-center">
								@if(!empty($search_vehicle))
									{{ $search_vehicle }}
								@else
								    {{ $categoryDetails->name }}
								@endif
								</h2>
									@foreach($vehiclesAll as $vehicle)
									<div class="col-sm-4">
									<div class="product-image-wrapper">
								<div class="single-products">
								<div class="productinfo text-center">
									<a href="{{ URL::to('vehicle/'.$vehicle->id) }}" target="_blank">
									<img style="width:260px;height: 210px;" src="{{ asset('images/backend_images/vehicles/large/'.$vehicle->image) }}"  width="720px;" alt="" />
								</a>
								<h3>{{ $vehicle->brand }}</h3><h4>{{ $vehicle->model }}</h4>
								<h2>Tk.{{ $vehicle->price }}</h2>
								
									<!-- <a href="#"class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
									</div>
										<!-- <div class="product-overlay">
									<div class="overlay-content">
										<img src="{{ asset('images/backend_images/vehicles/small/'.$vehicle->image) }}" alt="" />
																		<h2>{{ $vehicle->price }}</h2>
												<p>{{ $vehicle->model }}</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div> -->
								</div>
								<!-- <div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div> -->
							</div>
		</div>
			@endforeach
		<div align="right">{{ $vehiclesAll->links() }} </div>
					
						
				
					
				</div>
			</div>
		</div>
	</section>


@endsection
