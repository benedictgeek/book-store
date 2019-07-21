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
            <h5>Edit Book</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{url('/author/edit-book/'.$myBook->id)}}" name="edit-book" id="edit-book" novalidate="novalidate">
            {{csrf_field()}}  
                <div class="control-group">
                <label class="control-label">Title</label>
                <div class="controls">
                  <input type="text" name="book_title" id="book_title" value="{{$myBook->book_title}}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Under Category</label>
                <div class="controls">
                  <select name="category" style="width: 220px;">
                    <option value="" disabled>Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->category_name}}" @if($myBook->category == $category->category_name) selected @endif>{{$category->category_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                <textarea type="text" name="description" id="description">{{$myBook->description}}</textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Old Price</label>
                <div class="controls">
                  <input type="text" name="price" id="price" value="{{$myBook->price}}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">New Price</label>
                <div class="controls">
                  <input type="text" name="new_price" id="new_price" value="{{$myBook->new_price}}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Paperback</label>
                <div class="controls">
                  <input type="checkbox" name="paperback_status" id="paperback_status" @if($myBook->paperback =="Yes") checked @endif >
                  &nbsp;
                  &nbsp;
                  <span id="paperback_price"> old Price: <input type="text" name="paperback_price" value="{{$myBook->paperback_price}}"> </span>
                  <span id="paperback_Nprice"> New Price: <input type="text" name="paperback_Nprice"value="{{$myBook->paper_Nprice}}"> </span>
                  <span id="paperback_quantity"> Quantity: <input type="text" name="paperback_quantity" value="{{$myBook->paper_quantity}}"> </span>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Cd-Audio</label>
                <div class="controls">
                  <input type="checkbox" name="cd_status" id="cd_status" @if($myBook->cd_audio =="Yes") checked @endif >
                  &nbsp;
                  &nbsp;
                  <span id="cd_price"> old Price: <input type="text" name="cd_price" id="cd_price" value="{{$myBook->cd_price}}"> </span>
                  <span id="cd_Nprice"> New Price: <input type="text" name="cd_Nprice" value="{{$myBook->cd_Nprice}}"> </span>
                  <span id="cd_quantity"> Quantity: <input type="text" name="cd_quantity" value="{{$myBook->cd_quantity}}"> </span>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                    <input type="file" name="image" id="image"> @if(!empty($myBook->image))| <img src="{{asset('image/backend_img/books/'.$myBook->image)}}" style="width: 30px;"> @endif
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" @if($myBook->status =="1") checked @endif value="1">
                </div>
              </div>
              <input type="hidden" name="author_name" id="author_name" value="{{$name}}">
              <input type="hidden" name="book-id" id="book-id" value="{{$myBook->id}}">
              <input type="hidden" name="image_name" id="image_name" value="{{$myBook->image}}">
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