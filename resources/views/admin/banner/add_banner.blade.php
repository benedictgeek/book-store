@extends('layouts.adminLayout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">banner</a> <a href="#" class="current">Add banner</a> </div>
    <h1>Add Bannerbanner</h1>
</div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
        @if ($errors->any())
              <div class="alert alert-error alert-block">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
        @if (Session::has('flash-message-success'))
        <div class="alert alert-success alert-block">
                 {!! session('flash-message-success') !!}
         </div>
        @endif  
        @if (Session::has('flash-message-error'))
        <div class="alert alert-error alert-block">
                 {!! session('flash-message-error') !!}
         </div>
    @endif  
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Banner</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{url('/admin/add-banner')}}" name="add_banner" id="add_banner" novalidate="novalidate">
            {{csrf_field()}} 
            <div class="control-group">
                <label class="control-label">Banner Title</label>
                <div class="controls">
                <input type="text"  name="title" id="title">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Product Name</label>
                <div class="controls">
                <input type="text"  name="product_name" id="product_name">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Action</label>
                <div class="controls">
                <input type="text"  name="action" id="action">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Price</label>
                <div class="controls">
                <input type="text"  name="price" id="price">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Banner Link</label>
                <div class="controls">
                    <input type="text" name="link" id="link">
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
              <div class="form-actions">
                <input type="submit" value="Add Banner" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection