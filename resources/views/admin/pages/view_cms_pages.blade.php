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
            <h5>Cms Pages</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>CMS ID</th>
                  <th>Title</th>
                  <th>Url</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($cms_pages as $cms)
                <tr class="gradeX">
                  <td class="center">{{$cms->id}}</td>
                  <td class="center">{{$cms->title}}</td>
                  <td class="center">{{$cms->url}}</td>
                  <td class="center">{{$cms->description}}</td>
                  <td class="center">
                      @if($cms->status == 1)
                       Active
                      @else
                      Inactive
                      @endif
                  </td>
                  <td class="center"><a href="#myModal{{$cms->id}}" data-toggle="modal"  class="btn btn-success btn-mini">View</a> <a href="{{url('admin/edit-cms/'.$cms->id)}}" class="btn btn-primary btn-mini">Edit</a> <a rel="{{$cms->id}}" rel1="delete-cms" rel2="Do you want to delete this Cms page?" href="#" class="btn btn-danger btn-mini deleteRecord">Delete</a></div></td>
                </tr>

                <div id="myModal{{$cms->id}}" class="modal hide">
                    <div class="modal-header">
                        <button data-dismiss="modal" class="close" type="button">×</button>
                        <h3>Product Info</h3>
                    </div>
                    <div class="modal-body">
                        <p>ID : {{$cms->id}}</p>
                        <p>Title : {{$cms->title}}</p>
                        <p>Url: {{$cms->url}}</p>
                        <p>Description : {{$cms->description}}</p>
                        <p>Status : 
                          @if($cms->status == 1)
                            Active
                            @else
                            Inactive
                          @endif
                        </p>
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