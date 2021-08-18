@extends('layouts.adminLayout.admin_design')
@section('content')

<br><br>
<div id="content">
  <div id="content-header">
    <h1>Add Vehicle Images</h1>
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
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Vehicle Images</h5>
          </div>
          <style>
form {
width:40%;
height:200px;
margin: 25px 50px 80px 100px;
position:relative;
}
 input {
width:30%;
height:40px;
 }
</style>
<br>
<br>

            <div class="widget-content nopadding">
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ URL::to('/backend/add-images/'.$vehicleDetails->id) }}" name="add_images" id="add_images"> 
            	{{ csrf_field() }}
 			      <input type="hidden" name="vehicle_id" value="{{ $vehicleDetails->id }}">
            <div class="control-group">
                <label class="control-label">Brand</label>
                <label class="control-label"><strong>{{ $vehicleDetails->brand }}</strong></label>
            </div>
                
			      <div class="control-group">
                <label class="control-label">Model</label>
                <label class="control-label"><strong>{{ $vehicleDetails->model }}</strong></label>
                </div>


            <div class="control-group">
                <label class="control-label">Alternate Image(s)</label>
                <div class="controls">
                  <input type="file" name="image[]" id="image" multiple="multiple" required="">
     
              </div>
              </div>
              <div class="form-actions">
					       <input type="submit" value="Add Images" class="btn btn-primary btn-block">
			       </div>
            </form>
        </div>
    </div>
</div>
</div>
                  <div class="row-fluid">
                    <div class="span12">
                      <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                          <h5>View Images</h5>
                        </div>
                        <div class="widget-content nopadding">
                          <table class="table table-bordered data-table">
                            <thead>
                              <tr>
                                <th>Image ID</th>
                                <th>Vehicle ID</th>
                                <th>Image</th>
                                <th>Actions</th>
                              </tr>

                              @foreach($vehiclesImages as $image)
                              <div><tr>
                                <td>{{ $image->id }}</td>
                                <td>{{ $image->vehicle_id }}</td>
                              <td><center><img src="{{ asset('images/backend_images/vehicles/large/'.$image->image) }}" width="240px;"></center></td>

                                <td><a id="deleteModal" data-toggle="modal" data-target="#deleteModal{!! $image->id !!}" href="#" class="btn btn-danger btn-xsi" title="Delete Vehicle">Delete</a></td>
                              </tr>
                              <div class="modal fade" id="deleteModal{!! $image->id !!}" tabindex="2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <a class="btn btn-primary" href="{{ URL::to('/backend/delete-alt-image/'.$image->id) }}"><strong>Delete</strong></a>
          </div>
        </div>
      </div>
    </div>



                              @endforeach
   </div>
              
	

							              </thead>
							              <tbody>
							              	
							              </tbody>
							          </table>
							      </div>
							  </div>
							</div>
				</div>


             
</div>
</div>
</div>


             </div>

          </div>

        </div>
      </div>
    </div>
    
  </div>
</div>

@endsection