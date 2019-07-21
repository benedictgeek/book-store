@extends('layouts.adminLayout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">products</a> <a href="#" class="current">Add product</a> </div>
    <h1>Add Product</h1>
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
            <h5>Add Product</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{url('/admin/add-product')}}" name="add_product" id="add_product" novalidate="novalidate">
            {{csrf_field()}}  
            <div class="control-group">
                <label class="control-label">Under Category</label>
                <div class="controls">
                    <select name="category_id" id="category_id" style="width: 220px">
                            <?php echo $categories_dropdown; ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Product Name</label>
                <div class="controls">
                <input type="text" value="{{ old('product_name') }}" name="product_name" id="product_name">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Product Code</label>
                <div class="controls">
                    <input type="text" value="{{ old('product_code') }}" name="product_code" id="product_code">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Product Color</label>
                <div class="controls">
                    <input type="text" value="{{ old('product_color') }}"  name="product_color" id="product_color">
                </div>
            </div>
              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                <textarea type="text" value="{{ old('description') }}" name="description" id="description"></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Material & Care</label>
                <div class="controls">
                <textarea type="text" value="{{ old('care') }}" name="care" id="care"></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Price</label>
                <div class="controls">
                <input type="text" value="{{ old('price') }}" name="price" id="price">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                    <input type="file" name="image" id="image">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Featured</label>
                <div class="controls">
                  <input type="checkbox" name="featured" id="featured">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Add Product" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection