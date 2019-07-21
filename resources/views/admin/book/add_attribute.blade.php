@extends('layouts.adminLayout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#"></a> <a href="#" class="current">Add Attribute</a> </div>
 
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Atrribute</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url('/author/add-attr/'.$myBook->id)}}" name="add-attribute" id="add-attribute" novalidate="novalidate">
            {{csrf_field()}}  
            <div class="control-group">
                <label class="control-label">Book Title</label>
                <div class="controls">
                  <input type="text" value="{{$myBook->book_title}}" disabled>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Category</label>
                <div class="controls">
                  <input type="text" value="{{$myBook->category}}" disabled>
                </div>
              </div>
              <hr>
              <div class="control-group">
                <label class="control-label">Pages</label>
                <div class="controls">
                  <input type="text" name="pages" id="pages">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Language</label>
                <div class="controls">
                  <input type="text" name="language" id="language">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Dimension</label>
                <div class="controls">
                <textarea type="text" name="dimensions" id="dimensions"></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Publication Date</label>
                <div class="controls">
                  <input type="text" name="pub_date" id="pub_date">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Publisher</label>
                <div class="controls">
                  <input type="text" name="publisher" id="publisher">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Illustration Notes</label>
                <div class="controls">
                  <input type="text" name="notes" id="notes">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">ISBN</label>
                <div class="controls">
                    <input type="text" name="ISBN" id="ISBN">
                </div>
              </div>
              <input type="hidden" name="book_id" id="book_id" value="{{$myBook->id}}">
              <div class="form-actions">
                <input type="submit" value="Add Attribute" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection