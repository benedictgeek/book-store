@extends('layouts.adminLayout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Users</a> </div>
    <h1>View Users</h1>

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
            <h5>Orders</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>User ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>city</th>
                  <th>State</th>
                  <th>Country</th>
                  <th>Status</th>
                  <th>Registered At</th>
                </tr>
              </thead>
              <tbody>
              @foreach($users as $user)
                <tr class="gradeX">
                  <td class="center">{{$user->id}}</td>
                  <td class="center">{{$user->name}}</td>
                  <td class="center">{{$user->email}}</td>
                  <td class="center">{{$user->mobile}}</td>
                  <td class="center">{{$user->city}}</td>
                  <td class="center">{{$user->state}}</td>
                  <td class="center">{{$user->country}}</td>
                  <td class="center">
                      @if($user->status == 1)
                      <span style="color: green;"> Active </span>
                      @else
                      <span style="color: red;"> Inactive </span>
                      @endif
                  </td>
                  <td class="center">{{$user->created_at}}</td>
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