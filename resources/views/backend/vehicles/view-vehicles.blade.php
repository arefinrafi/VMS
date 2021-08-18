@extends('layouts.adminLayout.admin_design')
@section('content')

<br><br>
<div id="content">
   <div id="content-header">
    <h1>Vehicles</h1>


    @if(Session::has('flash_message_error'))
     <div class="alert alert-error alert-block">
     	<button type="button" class="close" data-dismiss="alert">x</button>
     	<strong>{!! session('flash_message_error') !!}</strong>
     </div>
     @endif
     @if(Session::has('flash_message_success'))
     <div class="alert alert-success alert-block">
     	<button type="button" class="close" data-dismiss="alert">x</button>
     	<strong>{!! session('flash_message_success') !!}</strong>
     </div>
     @endif

  </div>
  
    <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Vehicles</h5>
          </div>
          <div class="widget-content nopadding">
            <div class="wrapper">
          
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Vehicle ID</th>
                  <th>Category ID</th>
                  <th>Category Name</th>
                  <th>Brand</th>
                  <th>Model</th>
                  <th>Year</th>  
                  <th>Mileage</th>
                  <th>Engine Capacity</th>
                  <th>Fuel Type</th>
                  <th>Max Power</th>
                  <th>Max Speed</th>
                  <th>Torque</th>
                  <th>Fuel Consumption</th> 
                  <th>Door</th>
                  <th>Drive Type</th>
                  <th>Seats</th>
                  <th>Wheel Base</th>
                  <th>Weight</th>
                  <th>Length</th>
                  <th>Width</th>
                  <th>Height</th>
                  <th>Fuel Tank Capacity</th>
                  <th>Color</th>
                  <th>No of Cylinder</th>
                  <!-- <th>Description</th> -->
                  <th>Price</th>
                  <th>Showroom Name</th>
                  <th>Address</th>
                  <th>Contact</th>
                  <th>Image</th>
                  <th>Purchase</th>
                  <th>Selling</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($vehicles as $vehicle)
                <tr class="gradeX">
                	<td>{{ $vehicle->id }}</td>
                	<td>{{ $vehicle->category_id }}</td>
                  <td>{{ $vehicle->category_name }}</td>
                  <td>{{ $vehicle->brand }}</td>
                	<td>{{ $vehicle->model }}</td>
                  <td>{{ $vehicle->year }}</td><td>{{ $vehicle->mileage }}</td>
                  <td>{{ $vehicle->engine_capacity }}</td>
                  <td>{{ $vehicle->fuel_type }}</td>
                  <td>{{ $vehicle->max_power }}</td>
                  <td>{{ $vehicle->max_speed }}</td>
                  <td>{{ $vehicle->torque }}</td>
                  <td>{{ $vehicle->fuel_consumption }}</td>
                  <td>{{ $vehicle->door }}</td>
                  <td>{{ $vehicle->drive_type }}</td>
                  <td>{{ $vehicle->seats }}</td>
                  <td>{{ $vehicle->wheel_base }}</td>
                  <td>{{ $vehicle->weight }}</td>
                  <td>{{ $vehicle->length }}</td>
                  <td>{{ $vehicle->width }}</td>
                  <td>{{ $vehicle->height }}</td>
                  <td>{{ $vehicle->fuel_tank_capacity }}</td>
                  <td>{{ $vehicle->color }}</td>
                  <td>{{ $vehicle->no_of_cylinder }}</td>
                  <!-- <td>{{ $vehicle->description }}</td> -->
                  <td>{{ $vehicle->price }}</td>
                  <td>{{ $vehicle->showroom_name }}</td>
                  <td>{{ $vehicle->address }}</td>
                  <td>{{ $vehicle->contact }}</td>
                  <td>{{ $vehicle->purchase }}</td>
                  <td>{{ $vehicle->selling }}</td>
                  <td>
                    @if(!empty($vehicle->image))
                    <img src="{{ asset('/images/backend_images/vehicles/small/'.$vehicle->image) }}" style="width: 60px;">
                    @endif
                  </td>

                	<td class="center"><a href="#myModal{{ $vehicle->id }}" data-toggle="modal" class="btn btn-success btn" title="View Vehicle Information">View</a> 
                    <a href="{{ URL::to('/backend/edit-vehicle/'.$vehicle->id) }}" class="btn btn-primary btn-xs" title="Edit Vehicle ">Edit</a>
                    <a href="{{ URL::to('/backend/add-images/'.$vehicle->id) }}" class="btn btn-info btn-xs" title="Add Images">Add</a>  
                    <a id="deleteModal" data-toggle="modal" data-target="#deleteModal{!! $vehicle->id !!}" href="#" class="btn btn-danger btn-xsi" title="Delete Vehicle">Delete</a></td>  
                </tr>

                <div class="modal fade" id="deleteModal{!! $vehicle->id !!}" tabindex="2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><strong><i>ARE YOU SURE ?</strong></i></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body"> <strong><i>Select "Delete" below if you want to delete.</i></strong></div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal"><strong>Cancel</strong></button>
            <a class="btn btn-primary" href="{{ URL::to('/backend/delete-vehicle/'.$vehicle->id) }}"><strong>Delete</strong></a>
          </div>
        </div>
      </div>
    </div>

          <div id="myModal{{ $vehicle->id }}" class="modal hide">
              <div class="modal-header">
                <div class="center">  
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h2><strong><font color="black">Full Details : {{ $vehicle->brand }}  </strong></h2>
              </div>
              <div class="modal-body">
                <strong><font color="#0E6655">
                <p>Vehicle ID: {{ $vehicle->id }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Category ID: {{ $vehicle->category_id }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Category Name: {{ $vehicle->category_name }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Brand: {{ $vehicle->brand }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Model: {{ $vehicle->model }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Year: {{ $vehicle->year }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Mileage: {{ $vehicle->mileage }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Engine Capacity: {{ $vehicle->engine_capacity }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Fuel Type: {{ $vehicle->fuel_type }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Max Power: {{ $vehicle->max_power }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Max Speed: {{ $vehicle->max_speed }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Torque: {{ $vehicle->torque }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Fuel Consumption: {{ $vehicle->fuel_consumption }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Door: {{ $vehicle->door }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Drive Type: {{ $vehicle->drive_type }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Seats: {{ $vehicle->seats }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Wheel Base: {{ $vehicle->wheel_base }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Weight: {{ $vehicle->weight }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Length: {{ $vehicle->length }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Width: {{ $vehicle->width }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Height: {{ $vehicle->height }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Fuel Tank Capacity: {{ $vehicle->fuel_tank_capacity }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Color: {{ $vehicle->color }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>No of Cylinder: {{ $vehicle->no_of_cylinder }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Description: {{ $vehicle->description }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Price: {{ $vehicle->price }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Showroom Name: {{ $vehicle->showroom_name }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Address: {{ $vehicle->address }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
                <p>Contact: {{ $vehicle->contact }} </p>
                <hr style="height:2px;margin-top:-0.5em;border-width:0;color:gray;background-color:#0E6655">
              </font>

                </strong>
              </div>
            </div>
            </div>
          </div>
                @endforeach

              </tbody>

            </table>
        </div>
      </div>
    </div>
  </div>
</div>





@endsection
