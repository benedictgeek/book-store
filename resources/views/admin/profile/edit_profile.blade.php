@extends('layouts.adminLayout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="#" class="current">Profile</a> </div>
    <h1>Profile</h1>
</div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
        @if (Session::has('flash-message-s'))
        <div class="alert alert-success alert-block">
                 {!! session('flash-message-s') !!}
         </div>
        @endif  
        @if (Session::has('flash-message-e'))
        <div class="alert alert-error alert-block">
                 {!! session('flash-message-e') !!}
         </div>
    @endif  
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Product</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{url('/author/edit-profile')}}" name="add_product" id="add_product" novalidate="novalidate">
            {{csrf_field()}}
            <div class="control-group">
              <div class="controls ">
                <img class="profile-img" src="{{asset('image/backend_img/profile/'.$author->image)}}">
              </div>
            </div>
            <div class="control-group">
                <label class="control-label">First Name :</label>
                <div class="controls">
                <input type="text" value="{{$author->first_name}}" name="first_name" id="first_name">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Last Name :</label>
                <div class="controls">
                    <input type="text" value="{{$author->last_name}}" name="last_name" id="last_name">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Email :</label>
                <div class="controls">
                    <input type="email" value="{{$author->email}}" name="email" id="email" disabled>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Number :</label>
                <div class="controls">
                    <input type="text" value="{{$author->phone_number}}" name="phone_number" id="phone_number" >
                </div>
            </div>
              <div class="control-group">
                <label class="control-label">Bio :</label>
                <div class="controls">
                <textarea type="text" value="{{$author->bio}}" name="bio" id="bio"></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Facebook :</label>
                <div class="controls">
                    <input type="text" value="{{$author->facebook}}" name="facebook" id="facebook" >
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Twitter :</label>
                <div class="controls">
                    <input type="text" value="{{$author->twitter}}" name="twitter" id="twitter" >
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">LinkedIn :</label>
                <div class="controls">
                    <input type="text" value="{{$author->linkedin}}" name="linkedin" id="linkedin" >
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Image :</label>
                <div class="controls">
                    <input type="file" name="image" id="image">
                </div>
            <div class="form-actions">
            <input type="submit" value="Update Profile" class="btn btn-success">
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection