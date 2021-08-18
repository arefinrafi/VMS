@extends('layouts.adminLayout.admin_design')
@section('content')
<br><br>
<div id="content">
  <div id="content-header">
    <h1> Edit Admin</h1>
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
    <br>
  </div>

         <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Admin</h5>


          </div>
            <br>
            


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

  


          <div class="widget-content nopadding">


            <form class="form-horizontal" method="post" action="{{ URL::to('/backend/edit-admin/'.$adminDetails->id) }}" name="edit_admin" id="edit_admin" novalidate="novalidate"> {{ csrf_field() }}

              <div class="control-group">
                <label class="control-label">Showroom Name</label>
                <div class="controls">
                  <input type="text" name="name" id="name" value="{{ $adminDetails->name }}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                  <input type="Password" name="pass" id="pass" required >
                </div>
              </div>
            

 			  <div class="control-group">
                <label class="control-label">Access</label>
                <div class="controls">
                  <input type="checkbox" name="categories_access" id="categories_access" value="1"
                  style="margin-top: -3px;" @if($adminDetails->categories_access=="1")checked @endif>&nbsp;Categories&nbsp;&nbsp;&nbsp;
                  <input type="checkbox" name="vehicles_access" id="vehicles_access" value="1"
                  style="margin-top: -3px;"@if($adminDetails->vehicles_access=="1")checked @endif>&nbsp;Vehicles&nbsp;&nbsp;&nbsp;

                 
          	 </div>
              </div>

              <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" value="1" @if($adminDetails->status=="1")checked @endif>
     
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Add Category" class="btn btn-success btn-block">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>
</div>





@endsection