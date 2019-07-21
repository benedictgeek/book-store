@extends('layouts.adminLayout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">products</a> <a href="#" class="current">Add product</a> </div>
    <h1>Edit Product Atrribute</h1>
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
            <h5>Edit Product Attribute</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="#" name="edit_product" id="edit_product" novalidate="novalidate">
            {{csrf_field()}}  
            <div class="control-group">
                <label class="control-label">SKU</label>
                <div class="controls">
                <input type="text" value="{{ $product_attr -> sku }}" name="sku" id="sku">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Size</label>
                <div class="controls">
                    <input type="text" value="{{ $product_attr-> size }}" name="size" id="size">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Price</label>
                <div class="controls">
                    <input type="text" value="{{ $product_attr->price }}"  name="price" id="price">
                </div>
            </div>
              
            <div class="control-group">
                <label class="control-label">Stock</label>
                <div class="controls">
                <input type="text" value="{{ $product_attr->stock }}" name="stock" id="stock">
                </div>
            </div>
            <div class="form-actions">
            <input type="submit" value="Update Attributes" class="btn btn-success">
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection