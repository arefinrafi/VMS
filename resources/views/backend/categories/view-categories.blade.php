@extends('layouts.adminLayout.admin_design')
@section('content')
<br><br>
<div id="content">
  <div id="content-header">
    <h1>Categories</h1>

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
            <h5>View Categories</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Category ID</th>
                  <th>Category Name</th>
                  <th>Category Level</th>
                  <th>Category URL</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($categories as $category)
                <tr class="gradeX">
                	<td style="text-align: center;">{{ $category->id }}</td>
                	<td style="text-align: center;">{{ $category->name }}</td>
                  <td style="text-align: center;">{{ $category->parent_id }}</td>
                	<td style="text-align: center;">{{ $category->url }}</td>
                	<td style="text-align: center;" class="center"><a href="{{ URL::to('/backend/edit-category/'.$category->id) }}" class="btn btn-primary btn-xs">Edit</a> <a id="deleteModal" data-toggle="modal" data-target="#deleteModal{!! $category->id !!}" href="#" class="btn btn-danger btn-xsi">Delete</a></td>  
                </tr>

                <div class="modal fade" id="deleteModal{!! $category->id !!}" tabindex="2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <a class="btn btn-primary" href="{{ URL::to('/backend/delete-category/'.$category->id) }}"><strong>Delete</strong></a>
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