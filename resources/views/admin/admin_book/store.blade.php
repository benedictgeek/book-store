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
            <h5>All Books</h5>
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
                  <th>List Status</th>
                  <th>Featured</th>
                  <th>Action</th>
                  <!-- <th>Product Image</th> -->
                </tr>
              </thead>
              <tbody>
              @foreach($store_books as $book)
                <tr class="gradeX">
                  <td>{{$book->id}}</td>
                  <td>{{$book->book_title}}</td>
                  <td>{{$book->author_name}}</td>
                  <td>{{$book->category}}</td>
                  <td>{{$book->description}}</td>
                  <td>$ {{$book->price}}</td>
                  <td>@if($book->status == 1) Active @else Inactive @endif</td>
                  <td>{{$book->list_status}}</td>
                  <td>@if($book->featured == 1) Yes @else No @endif</td>
                  <td>
                  @if($book->featured == 0)
                  <a rel="{{$book->id}}" rel1="featured-book" rel2="Do you want to mark this book as featured?" class="btn btn-primary btn-mini deleteRecord">Mark as featured</a>
                  @else
                  <a rel="{{$book->id}}" rel1="remove-feature" rel2="Do you want to remove featured attribute?" class="btn btn-danger btn-mini deleteRecord">Unmark as featured</a>
                  @endif
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