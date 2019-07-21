@extends('layouts.adminLayout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">banner</a> <a href="#" class="current">Edit banner</a> </div>
    <h1>Edit Banner</h1>
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
            <h5>Edit Banner</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{url('/admin/edit-banner/'.$bannerDetails->id)}}" name="edit_banner" id="edit_banner" novalidate="novalidate">
            {{csrf_field()}} 
            <div class="control-group">
                <label class="control-label">Banner Title</label>
                <div class="controls">
                <input type="text"  name="title" id="title" value="{{$bannerDetails->title}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Product Name</label>
                <div class="controls">
                <input type="text"  name="product_name" id="product_name" value="{{$bannerDetails->product_name}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Action</label>
                <div class="controls">
                <input type="text"  name="action" id="action" value="{{$bannerDetails->action}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Price</label>
                <div class="controls">
                <input type="text"  name="price" id="price" value="{{$bannerDetails->price}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Banner Link</label>
                <div class="controls">
                    <input type="text" name="link" id="link" value="{{$bannerDetails->link}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                    <input type="file" name="image" id="image">
                    <input type="hidden" name="current_image" value="{{$bannerDetails->image}}">
                    @if(!empty($bannerDetails->image))
                    <img src="{{asset('/images/backend_img/banners/'.$bannerDetails->image)}}" style="width: 50px;"> |
                    <a href="{{url('/admin/del-banner-image')}}">Delete</a>
                    @endif
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" @if($bannerDetails->status == 1) checked @endif>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Edit Banner" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection