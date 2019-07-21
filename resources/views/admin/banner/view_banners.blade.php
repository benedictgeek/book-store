@extends('layouts.adminLayout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">banners</a> </div>
    <h1>view Banners</h1>

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
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Banners</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Banner ID</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Product Name</th>
                  <th>Action</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Link</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($banners as $banner)
                <tr class="gradeX">
                  <td>{{$banner->id}}</td>
                  <td>
                      @if(!empty($banner->image))
                      <img src="{{asset('/images/backend_img/banners/'.$banner->image)}}" style="width: 80px;">
                      @endif
                  </td>
                  <td>{{$banner->title}}</td>
                  <td>{{$banner->product_name}}</td>
                  <td>{{$banner->action}}</td>
                  <td>{{$banner->price}}</td>
                  <td>{{$banner->status}}</td>
                  <td>{{$banner->link}}</td>
                  <td class="center"><a href="{{url('/admin/edit-banner/'.$banner->id)}}" class="btn btn-primary btn-mini">Edit</a> <a rel="{{$banner->id}}" rel1="delete-banner" rel2="Do you want to delete this Banner?" href="#" class="btn btn-danger btn-mini deleteRecord">Delete</a></div></td>
                </tr>
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