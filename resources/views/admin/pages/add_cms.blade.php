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
            <h5>Add Cms page</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal"  method="post" action="{{url('/admin/add-cms')}}" name="add-cms" id="add-cms" novalidate="novalidate">
            {{csrf_field()}} 
            <div class="control-group">
                <label class="control-label">Under Footer Header</label>
                <div class="controls">
                  <select name="header" id="header" style="width: 250px;">
                    <option value=""> Select </option>
                    @foreach($footerCat as $foo)
                    <option value="{{$foo->id}}"> {{$foo->category_name}} </option>
                    @endforeach
                  </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Title</label>
                <div class="controls">
                <input type="text"  name="title" id="title">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Url</label>
                <div class="controls">
                <input type="text"  name="url" id="url">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                <input type="text"  name="description" id="description">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Meta Title</label>
                <div class="controls">
                <input type="text"  name="meta_title" id="meta_title">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Meta Description</label>
                <div class="controls">
                <input type="text"  name="meta_description" id="meta_description">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Meta Keywords</label>
                <div class="controls">
                <input type="text"  name="meta_keywords" id="meta_keywords">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Add Cms Page" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection