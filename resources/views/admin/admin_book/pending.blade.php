@extends('layouts.adminLayout.admin_design')

@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">products</a> </div>

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
                  <th>Author</th>
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
              @foreach($pending_books as $book)
                <tr class="gradeX">
                  <td>{{$book->id}}</td>
                  <td>{{$book->book_title}}</td>
                  <td>{{$book->author_name}}</td>
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
                  <a rel="{{$book->id}}" rel1="approve-book" rel2="Ensured to have checked the book well for listing?" class="btn btn-primary btn-mini deleteRecord">Approve</a>
                  <a rel="{{$book->id}}" rel1="reject-book" rel2="Are you sure this book is unfit for listing?" class="btn btn-danger btn-mini deleteRecord">Reject</a></div>
                   
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