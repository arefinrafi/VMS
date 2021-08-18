@extends('layouts.adminLayout.admin_design')
@section('content')
<br><br>
<div id="content">
  <div id="content-header">
    <h1> Edit Category</h1>
  </div>

  
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Category</h5>
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


          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ URL::to('/backend/edit-category/'.$categoryDetails->id) }}" name="add_category" id="add_category" novalidate="novalidate"> {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Category Name</label>
                <div class="controls">
                  <input type="text" name="category_name" id="category_name" value="{{ $categoryDetails->name }}">
           
                </div>
              </div>
                <div class="control-group">
                <label class="control-label">Category Level</label>
                <div class="controls">
                   <select name="parent_id" style="width: 220px;">
                    <option value="0">Main Category</option>
                    @foreach($levels as $val)
                      <option value="{{ $val->id }}" @if($val->id == $categoryDetails->parent_id)selected @endif>{{ $val->category_name }}</option>
                      @endforeach
                   </select>
              </div>
            </div>
              {{-- <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea name="description" id="description">{{ $categoryDetails->description }} </textarea> 
           
                </div>
              </div> --}}
              <div class="control-group">
                <label class="control-label">URL</label>
                <div class="controls">
                  <input type="text" name="url" id="url" value="{{ $categoryDetails->url }}">
     
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Edit Category" class="btn btn-success btn-block">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>




@endsection