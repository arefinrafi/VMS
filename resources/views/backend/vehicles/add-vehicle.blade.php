@extends('layouts.adminLayout.admin_design')
@section('content')
<br><br>
<div id="content">
  <div id="content-header">
    <h1 style="color:black; font:bold">Add Vehicle</h1>
     @if(Session::has('flash_message_error'))
     <div class="alert alert-error alert-block">
      <button type="button" class="close" data-dismiss="alert">x</button>
      <strong>{!! session('flash_message_error') !!}</strong>
     </div>
     @endif
     @if(Session::has('flash_message_succes'))
     <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">x</button>
      <strong>{!! session('flash_message_succes') !!}</strong>
     </div>
     @endif
  </div>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Vehicle</h5>
          </div>
          <style>
form {
width:60%;
height:400px;
margin: 25px 50px 80px 100px;
position:relative;
}
 input {
width:60%;
height:40px;
 }
</style>
          <div style="background-color:white; " class="widget-content nopadding">
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ URL::to('/backend/add-vehicle') }}" name="add_vehicle" id="add_vehicle" novalidate="novalidate"> 
              {{ csrf_field() }}
          

          
            <div style="width:100%; height: 60px; float: right;" class="control-group">
                <label class="control-label">Under Category</label>
                <div class="controls">
                   <select name="category_id" id="category_id" style="width: 220px;">
                    <?php echo $categories_dropdown; ?>
                   </select>
             </div>
              </div>

           <!--    <div class="control-group">
                <label class="control-label">Under Admin</label>
                <div class="controls">
                   <select name="admin_id" id="admin_id" style="width: 220px;">
                    
                   </select>

             </div>
              </div> -->

              <div style="width: 50%; height: 40px;float: left;" class="control-group" >
                <label class="control-label">Brand</label>
                <div class= "controls">
                  <input type="text" name="brand" id="brand" required>
           
                </div>
              </div>

              <div style="width: 50%; height: 40px; float: left;" class="control-group">
                <label class="control-label">Model</label>
                <div class="controls">
                  <input type="text" name="model" id="model" required>
           
                </div>
              </div>

             
              <div style="width: 50%; height: 40px; float: left;" class="control-group">
                <label class="control-label">Year</label>
                <div class="controls">
                  <input type="text" name="year" id="year" required>
           
                </div>
              </div>

              <div style="width: 50%; height: 40px; float: left;" class="control-group">
                <label class="control-label">Mileage</label>
                <div class="controls">
                  <input type="text" name="mileage" id="mileage" required>
           
                </div>
              </div>

              <div style="width: 50%; height: 40px; float: left;" class="control-group">
                <label class="control-label">Engine Capacity</label>
                <div class="controls">
                  <input type="text" name="engine_capacity" id="engine_capacity" required>
           
                </div>
              </div>

              <div style="width: 50%; height: 40px; float: left;" class="control-group">
                <label class="control-label">Fuel Type</label>
                <div class="controls">
                  <input type="text" name="fuel_type" id="fuel_type" required>
           
                </div>
              </div>

              <div style="width: 50%; height: 40px; float: left;" class="control-group">
                <label class="control-label">Max Power</label>
                <div class="controls">
                  <input type="text" name="max_power" id="max_power" required>
           
                </div>
              </div>

              <div style="width: 50%; height: 40px; float: left;" class="control-group">
                <label class="control-label">Max Speed</label>
                <div class="controls">
                  <input type="text" name="max_speed" id="max_speed" required>
           
                </div>
              </div>
             
              <div style="width: 50%; height: 40px; float: left;" class="control-group">
                <label class="control-label">Torque</label>
                <div class="controls">
                  <input type="text" name="torque" id="torque" required>
           
                </div>
              </div>

              <div style="width: 50%; height: 40px; float: left;" class="control-group">
                <label class="control-label">Fuel Consumption</label>
                <div class="controls">
                  <input type="text" name="fuel_consumption" id="fuel_consumption" required>
           
                </div>
              </div>

             
              <div style="width: 50%; height: 40px; float: left;" class="control-group">
                <label class="control-label">Door</label>
                <div class="controls">
                  <input type="text" name="door" id="door" required>
           
                </div>
              </div>

              <div style="width: 50%; height: 40px; float: left;" class="control-group">
                <label class="control-label">Drive Type</label>
                <div class="controls">
                  <input type="text" name="drive_type" id="drive_type" required>
           
                </div>
              </div>

             
              <div style="width: 50%; height: 40px; float: left;" class="control-group">
                <label class="control-label">Seats</label>
                <div class="controls">
                  <input type="text" name="seats" id="seats" required>
           
                </div>
              </div>

              <div style="width: 50%; height: 40px; float: left;" class="control-group">
                <label class="control-label">Wheel Base</label>
                <div class="controls">
                  <input type="text" name="wheel_base" id="wheel_base" required>
           
                </div>
              </div>

             
              <div style="width: 50%; height: 40px; float: left;" class="control-group">
                <label class="control-label">Weight</label>
                <div class="controls">
                  <input type="text" name="weight" id="weight" required>
           
                </div>
              </div>

              <div style="width: 50%; height: 40px; float: left;" class="control-group">
                <label class="control-label">Length</label>
                <div class="controls">
                  <input type="text" name="length" id="length" required>
           
                </div>
              </div>

             
              <div style="width: 50%; height: 40px; float: left;" class="control-group">
                <label class="control-label">Width</label>
                <div class="controls">
                  <input type="text" name="width" id="width" required>
           
                </div>
              </div>

              <div style="width: 50%; height: 40px; float: left;" class="control-group">
                <label class="control-label">Height</label>
                <div class="controls">
                  <input type="text" name="height" id="height" required>
           
                </div>
              </div>

             
              <div style="width: 50%; height: 40px; float: left;" class="control-group">
                <label class="control-label">Fuel Tank Capacity</label>
                <div class="controls">
                  <input type="text" name="fuel_tank_capacity" id="fuel_tank_capacity" required>
           
                </div>
              </div>

              <div style="width: 50%; height: 40px; float: left;" class="control-group">
                <label class="control-label">Color</label>
                <div class="controls">
                  <input type="text" name="color" id="color" required>
           
                </div>
              </div>
              <div style="width: 50%; height: 40px; float: left;" class="control-group">
                <label class="control-label">No of Cylinder</label>
                <div class="controls">
                  <input type="text" name="no_of_cylinder" id="no_of_cylinder" required>
           
                </div>
              </div>

              <div style="width: 50%; height: 80px; float: left;" class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea name="description" id="description" required> </textarea> 
           
                </div>
              </div>

             
              <div style="width: 50%; height: 40px; float: left;" class="control-group">
                <label class="control-label">Price</label>
                <div class="controls">
                  <input type="number" name="price" id="price" required>
           
                </div>
              </div>

              <div style="width: 50%; height: 40px; float: left;" class="control-group">
                <label class="control-label">Showroom Name</label>
                <div class="controls">
                  <input type="text" name="showroom_name" id="showroom_name" required>
           
                </div>
              </div>

              <div style="width: 50%; height: 40px; float: left;" class="control-group">
                <label class="control-label">Address</label>
                <div class="controls">
                  <input type="text" name="address" id="address" required>
           
                </div>
              </div>

              <div style="width: 50%; height: 40px; float: left;" class="control-group">
                <label class="control-label">Contact</label>
                <div class="controls">
                  <input type="number" name="contact" id="contact" required>
                </div>
              </div>

              

              <div style="width: 50%; height: 40px; float: right;" class="control-group">
                <label class="control-label">Purchase</label>
                <div class="controls">
                  <input type="number" name="purchase" id="purchase">
           
                </div>
              </div>

              <div style="width: 50%; height: 40px; float: left;" class="control-group">
                <label class="control-label">Selling</label>
                <div class="controls">
                  <input type="number" name="selling" id="selling">
           
                </div>
              </div>

              <div style="width: 50%; height: 40px; float: left;"  class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                  <input type="file" name="image" id="image" required>
     
              </div>
              </div>

              <div style="width: 100%; height: 40px; float: left; background-color:white " class="form-actions">
                <input type="submit" value="Add Vehicle" class="btn btn-primary btn-block">
              </div>
            </form>
   



@endsection