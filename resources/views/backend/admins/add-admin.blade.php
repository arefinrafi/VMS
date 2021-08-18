@extends('layouts.adminLayout.admin_design')

@section('style')
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

@endsection

@section('content')
<br><br>
<div id="content">
  <div id="content-header">
    <h1> Add Admin</h1>
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
            <h5>Add Admin</h5>
          </div>
            <br>

             <div class="widget-content nopadding">

            <form class="form-horizontal" method="post" action="{{ URL::to('/backend/add-admin') }}" name="add_admin" id="add_admin" novalidate="novalidate"> {{ csrf_field() }}
                <h4>User Information:</h4>
                <div class="control-group">
                    <label class="control-label"><strong>User Name</strong></label>
                    <div class="controls">
                        <input required minlength="6" type="text" name="name" id="name" placeholder="User Name">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><strong>Email</strong></label>
                    <div class="controls">
                        <input required minlength="6" type="email" name="email" id="email" placeholder="Password">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><strong>Password</strong></label>
                    <div class="controls">
                      <input required minlength="6" type="Password" name="pass" id="pass" placeholder="Password">
                    </div>
                </div>
             <h4>Account Information:</h4>
              <div class="control-group">
                <label class="control-label"><strong>Holder Name</strong></label>
                <div class="controls">
                  <input type="text" name="acc_holder_name" id="acc_holder_name" placeholder="Holder Name" required >
                </div>
              </div>

              <div class="control-group">
                <label class="control-label"><strong>Account Number</strong></label>
                <div class="controls">
                  <input type="Number" name="acc_number" id="acc_number" placeholder="Account Number" required >
                </div>
              </div>

            <div class="control-group">
                <label class="control-label"><strong>Initialize Amount</strong></label>
                <div class="controls">
                    <input type="Number" name="acc_amount" id="acc_amount" placeholder="Amount" required >
                </div>
            </div>
 			 <!--  <div class="control-group">
                <label class="control-label">Access</label>
                <div class="controls">
                  <input type="checkbox" name="categories_access" id="categories_access" value="1"
                  style="margin-top: -3px;">&nbsp;Categories&nbsp;&nbsp;&nbsp;
                  <input type="checkbox" name="vehicles_access" id="vehicles_access" value="1"
                  style="margin-top: -3px;">&nbsp;Vehicles&nbsp;&nbsp;&nbsp;

                 
          	 </div>
              </div>
 -->
              <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" value="1">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Add Admin" class="btn btn-success btn-block">
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