@extends('layouts.adminLayout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">products attribute</a> <a href="#" class="current">Add product</a> </div>
    <h1>Add Product Attribute</h1>
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
            <h5>Add Product Attribute</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{url('/admin/add-attribute/'.$productDetails->id)}}" name="add_product" id="add-attribute" >
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
            <label class="control-label"></label>
                <div class="field_wrapper">
                    <div>
                        <input type="text" required name="sku[]" id="sku" placeholder="sku" style="width: 120px;"/>
                        <input type="text" required name="size[]" id="size" placeholder="size" style="width: 120px;"/>
                        <input type="text" required  name="price[]" id="price" placeholder="price" style="width: 120px;"/>
                        <input type="text" required  name="stock[]" id="stock" placeholder="stock" style="width: 120px;"/>
                        <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                    </div>
                </div>
            </div>

            <div class="form-actions">
            <input type="submit" value="Add Atrribute" class="btn btn-success">
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
            <form action="{{url('/admin/edit-attribute/'.$productDetails->id)}}" method="post">
            {{csrf_field()}}
              <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Attribute ID</th>
                  <th>SKU</th>
                  <th>Size</th>
                  <th>Price</th>
                  <th>Stock</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($product_attributes['attributes'] as $attribute)
                <tr class="gradeX">
                  <td><input type="hidden" name="idAttr[]" value="{{$attribute->id}}" >{{$attribute->id}}</td>
                  <td>{{$attribute->sku}}</td>
                  <td>{{$attribute->size}}</td>
                  <td><input type="text" name="price[]" value="{{$attribute->price}}" ></td>
                  <td><input type="text" name="stock[]" value="{{$attribute->stock}}" ></td>
                  <td class="center">
                  <input type="submit" class="btn btn-primary btn-mini" value="Update">
                  <a rel="{{$attribute->id}}" rel1="delete-atrribute" class="btn btn-danger btn-mini deleteRecord" >Delete</a></div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection