

<br>
<!--top-Header-menu-->

<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle" style="font-size: 16px; color: black; background: #FF0000 ;"><i class="icon icon-user"></i>  <strong><span class="text" >{{ Session::get('name') }}</</span> </strong><b class="caret"></b></a>
      <ul class="dropdown-menu">

        <li><a class="" style="font-size: 16px; color: red; background: black;" href="#" data-toggle="modal" data-target="#logoutModal"><i class="icon-key"></i> Sign Out</a></li>
      </ul>
    </li>
    
    
    <!-- <li class=""><a title="" href="#"><i class="icon icon-share-alt"></i>
     <span class="text" href="#" data-toggle="modal" data-target="#logoutModal">Signout</span></a></li> -->
     <li class="" align="right" style="font-size: 15px; color: #CACFD2; background: #000080;"><a title="" href="{{ url('/')}}" target="_blank"><i class="icon icon-home"></i>
     <span class="text" style="font-size: 16px; color: white; background: #000080;" href="{{ url('/')}}" target="_blank"><strong>Home Page </strong></span></a></li>
  </ul>
</div>


<!--close-top-Header-menu-->
<!--start-top-serch-->
<!-- <div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div> -->
<!--close-top-serch-->

  


<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><strong><i>Ready to Leave?</strong></i></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body"> <strong><i>Select "Signout" below if you are ready to end your current session.</i></strong></div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal"><strong>Cancel</strong></button>
            <a class="btn btn-primary" href="{{ url('/logout')}}"><strong>Signout</strong></a>
          </div>
        </div>
      </div>
    </div>

    <p class = "alert-info" style="font-size: 20px; color: white; background: #FF0000;">

    <?php 
      $message=Session::get('message');
      if ($message) {
        echo $message;
        Session::put('message',null);
      }
    ?>    
  </p>
    
    