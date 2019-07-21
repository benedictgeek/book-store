@extends('layouts.adminLayout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">products attribute</a> <a href="#" class="current">Add product</a> </div>
    <h1>Add Product Images</h1>
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
            <h5>Add Product Image(s)</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{url('/admin/add-product-image/'.$productDetails->id)}}" name="add-image" id="add-image" >
            {{csrf_field()}}  
            <input type="hidden" name="product_id" id="product_id" value="{{$productDetails->id}}"/>
            <div class="control-group">
                <label class="control-label">Product Name</label>
                <label class="control-label"><strong>{{$productDetails->product_name}}</strong></label>
                
            </div>
            <div class="control-group">
                <label class="control-label">Product Code</label>
                <label class="control-label"><strong> {{$productDetails->product_code}}</strong></label>
            </div>
            <div class="control-group">
                <label class="control-label">Product Color</label>
                <label class="control-label"><strong> {{$productDetails->product_color}}</strong></label>
            </div>
            <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                    <input type="file" name="image[]" id="image" multiple="multiple">
                </div>
            </div>

            <div class="form-actions">
            <input type="submit" value="Add Images" class="btn btn-success">
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Attributes</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Image ID</th>
                  <th>Product ID</th>
                  <th>Image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($images as $image)
                <tr class="gradeX">
                  <td>{{$image->id}}</td>
                  <td>{{$image->product_id}}</td>
                  <td>
                     @if(!empty($image->images))
                      <img src="{{asset('/images/backend_img/products/small/'.$image->images)}}" style="width: 50px;">
                      @endif
                  </td>
                  <td class="center">
                   <a rel="{{$image->id}}" rel1="delete-product-image" rel2="Do you want to delete this Image?" href="#" 
                       class="btn btn-danger btn-mini deleteRecord">Delete</a>
                  </td>

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