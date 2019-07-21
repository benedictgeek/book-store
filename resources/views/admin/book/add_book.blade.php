@extends('layouts.adminLayout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">categories</a> <a href="#" class="current">Add Category</a> </div>
 
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>List a Book</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{url('/author/add-book')}}" name="add-book" id="add-book" novalidate="novalidate">
            {{csrf_field()}}  
                <div class="control-group">
                <label class="control-label">Title</label>
                <div class="controls">
                  <input type="text" name="book_title" id="book_title">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Under Category</label>
                <div class="controls">
                  <select name="category" style="width: 220px;">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                <textarea type="text" name="description" id="description"></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Price</label>
                <div class="controls">
                  <input type="text" name="price" id="price">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Paperback</label>
                <div class="controls">
                  <input type="checkbox" name="paperback_status" id="paperback_status">
                  &nbsp;
                  &nbsp;
                  <span id="paperback_price"> Price: <input type="text" name="paperback_price"> </span>
                  <span id="paperback_quantity"> Quantity: <input type="text" name="paperback_quantity"> </span>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Cd-Audio</label>
                <div class="controls">
                  <input type="checkbox" name="cd_status" id="cd_status">
                  &nbsp;
                  &nbsp;
                  <span id="cd_price"> Old Price: <input type="text" name="cd_price" > </span>
                  <span id="cd_quantity"> Quantity: <input type="text" name="cd_quantity" > </span>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                    <input type="file" name="image" id="image">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status">
                </div>
              </div>
              <input type="hidden" name="author_name" id="author_name" value="{{$name}}">
              <div class="form-actions">
                <input type="submit" value="List Book" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection