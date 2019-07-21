@extends('layouts.adminLayout.admin_design')

@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">products</a> </div>
    <h1>View Products</h1>

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
            <h5>Products</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Product ID</th>
                  <th>Category ID</th>
                  <th>Category Name</th>
                  <th>Product Name</th>
                  <th>Product Code</th>
                  <th>Product Color</th>
                  <th>Product Price</th>
                  <th>Featured</th>
                  <th>Product Image</th>
                  <!-- <th>Product Image</th> -->
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($products as $product)
                <tr class="gradeX">
                  <td>{{$product->id}}</td>
                  <td>{{$product->category_id}}</td>
                  <td>{{$product->category_name}}</td>
                  <td>{{$product->product_name}}</td>
                  <td>{{$product->product_code}}</td>
                  <td>{{$product->product_color}}</td>
                  <td>{{$product->price}}</td>
                  <td>@if($product->featured == 1) Yes @else No @endif</td>
                  <td>
                      @if(!empty($product->image))
                      <img src="{{asset('/images/backend_img/products/small/'.$product->image)}}" style="width: 50px;">
                      @endif
                  </td>
                  <td class="center">
                  <a href="#myModal{{$product->id}}" data-toggle="modal" class="btn btn-success btn-mini">View</a> 
                  <a href="{{url('/admin/edit-product/'.$product->id)}}" class="btn btn-primary btn-mini">Edit</a>
                  <a href="{{url('/admin/add-attribute/'.$product->id)}}" class="btn btn-success btn-mini">Add Attr</a>
                  <a href="{{url('/admin/add-product-image/'.$product->id)}}" class="btn btn-success btn-mini">Add Image</a>
                  <a rel="{{$product->id}}" rel1="delete-product" rel2="Do you want to delete this Product?" class="btn btn-danger btn-mini deleteRecord">Delete</a></div>
                  </td>
                </tr>
                <div id="myModal{{$product->id}}" class="modal hide">
                    <div class="modal-header">
                        <button data-dismiss="modal" class="close" type="button">×</button>
                        <h3>Product Info</h3>
                    </div>
                    <div class="modal-body">
                        <p>ID: {{$product->id}}</p>
                        <p>Category ID: Category {{$product->category_id}}</p>
                        <p>Category Name: {{$product->category_name}}</p>
                        <p>Product Name: {{$product->product_name}}</p>
                        <p>Product Code: {{$product->product_code}}</p>
                        <p>Product Color: {{$product->product_color}}</p>
                        <p>Price: {{$product->price}}</p>
                        <p>Description: {{$product->description}}</p>
                    </div>
                </div>
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