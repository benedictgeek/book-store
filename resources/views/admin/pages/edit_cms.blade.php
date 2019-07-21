@extends('layouts.adminLayout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Cms</a> <a href="#" class="current">Edit banner</a> </div>
    <h1>Edit Cms Page</h1>
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
            <form class="form-horizontal"  method="post" action="{{url('/admin/edit-cms/'.$cmsDetails->id)}}" name="edit-cms" id="edit-cms" novalidate="novalidate">
            {{csrf_field()}}
            <div class="control-group">
                <label class="control-label">Under Footer Header</label>
                <div class="controls">
                <select name="header" id="header" style="width: 250px;">
                  <option value="" disabled> Select </option>
                  @foreach($footerCat as $foo)
                  <option value="{{$foo->id}}" @if($cmsDetails->category_id == $foo->id) selected @endif> {{$foo->category_name}} </option>
                  @endforeach
                </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Title</label>
                <div class="controls">
                <input type="text"  name="title" id="title" value="{{$cmsDetails->title}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Url</label>
                <div class="controls">
                <input type="text"  name="url" id="url" value="{{$cmsDetails->url}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                <input type="text"  name="description" id="description" value="{{$cmsDetails->description}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Meta Title</label>
                <div class="controls">
                <input type="text"  name="meta_title" id="meta_title" value="{{$cmsDetails->meta_title}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Meta Description</label>
                <div class="controls">
                <input type="text"  name="meta_description" id="meta_description" value="{{$cmsDetails->meta_description}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Meta Keywords</label>
                <div class="controls">
                <input type="text"  name="meta_keywords" id="meta_keywords" value="{{$cmsDetails->meta_keywords}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" @if($cmsDetails->status == 1) checked @endif>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Edit Cms Page" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection