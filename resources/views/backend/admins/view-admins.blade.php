@extends('layouts.adminLayout.admin_design')
@section('content')
<br><br>
<div id="content">
  <div id="content-header">
    <h1>Admins</h1>

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
            <h5>View Admins</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th style="text-align: left;font-size: 20px;">ID</th>
                  <th style="text-align: left;font-size: 20px;"> Name</th>
                  <th style="text-align: left;font-size: 20px;"> Type</th>
                  <th style="text-align: left;font-size: 20px;"> Roles</th>
                  <!-- <th style="text-align: left"> Number</th> -->
                  <th style="text-align: left;font-size: 20px;"> Status</th>
                  <th style="text-align: left;font-size: 20px;">Action</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($admins as $admin)
                <?php if($admin->type=="Super Admin"){
                  $roles = "ALL";
                }else{
                     $roles="";
                     if($admin->categories_access==1){
                      $roles .="Categories,  ";
              }   
                      if($admin->vehicles_access==1){
                      $roles .="Vehicles ";
              }
                      if($admin->categories_access==0 && $admin->vehicles_access==0){
                      $roles .="No Roles";
              }   
            }
              ?> 


                <tr class="gradeX">
                	<td class="center"><strong>{{ $admin->id }}</strong></td>
                	<td class="center"><strong>{{ $admin->name }}</strong></td>
                  <td class="center"><strong>{{ $admin->type }}</strong></td>
                  <td class="center"><strong>{{ $roles }}</strong></td>
                  @foreach($vehicles as $vehicle)
                  <td class="center"><strong>{{ $vehicle->count('admin_id') }}</td>
                  @endforeach
                  <td class="center">
                    @if($admin->status==1)
                    <span style="color:green;">Active</span>
                    @else
                    <span style="color:red">Inctive</span>
                    @endif

                  
                	<td class="center"><a href="{{ URL::to('/backend/edit-admin/'.$admin->id) }}"class="btn btn-primary btn-xs">Edit</a> <a id="deleteModal" data-toggle="modal" data-target="#deleteModal{!! $admin->id !!}" href="#" class="btn btn-danger btn-xsi">Delete</a></td>  
                </tr>

                <div class="modal fade" id="deleteModal{!! $admin->id !!}" tabindex="2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <a class="btn btn-primary" href="{{ URL::to('/backend/delete-admin/'.$admin->id) }}"><strong>Delete</strong></a>
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
</div>



@endsection