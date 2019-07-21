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
                  <th>Book ID</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Description</th>
                  <th>price</th>
                  <th>Status</th>
                  <th>Book Image</th>
                  <th>Action</th>
                  <!-- <th>Product Image</th> -->
                </tr>
              </thead>
              <tbody>
              @foreach($myBooks as $book)
                <tr class="gradeX">
                  <td>{{$book->id}}</td>
                  <td>{{$book->book_title}}</td>
                  <td>{{$book->category}}</td>
                  <td>{{$book->description}}</td>
                  <td>$ {{$book->price}}</td>
                  <td>@if($book->status == 1) Active @else Inactive @endif</td>
                  <td>
                      @if(!empty($book->image))
                      <img src="{{asset('image/backend_img/books/'.$book->image)}}" style="width: 50px;">
                      @endif
                  </td>
                  <td>
                  <a href="{{url('/author/edit-book/'.$book->id)}}" class="btn btn-primary btn-mini">Edit</a>
                  <a href="{{url('/author/add-attr/'.$book->id)}}" class="btn btn-primary btn-mini">Add Attr</a>
                  <a href="{{url('/author/edit-attr/'.$book->id)}}" class="btn btn-primary btn-mini">Edit Attr</a>
                  <a rel="{{$book->id}}" rel1="delete-book" rel2="Do you want to delete this Book?" class="btn btn-danger btn-mini deleteRecord">Delete</a></div>
                   
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