@extends('layouts.adminLayout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">categories</a> </div>
    <h1>view categories</h1>

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
            <h5>Categories</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Category ID</th>
                  <th>Category Name</th>
                  <th>Category Url</th>
                  <th>Category Description</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($categories as $category)
                <tr class="gradeX">
                  <td>{{$category->id}}</td>
                  <td>{{$category->category_name}}</td>
                  <td>{{$category->url}}</td>
                  <td>{{$category->description}}</td>
                  <td>
                    @if($category->status == 1)
                    <span style="color: green;">Active</span>
                    @else
                    <span style="color: red;">Inactive</span>
                    @endif
                  </td>
                  <td class="center"><a href="{{url('/admin/edit-category/'.$category->id)}}" class="btn btn-primary btn-mini">Edit</a> <a rel="{{$category->id}}" rel1="delete-category" rel2="Do you want to delete this Category?" href="#" class="btn btn-danger btn-mini deleteRecord">Delete</a></div></td>
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