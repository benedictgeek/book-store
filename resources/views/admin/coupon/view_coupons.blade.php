@extends('layouts.adminLayout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">coupons</a> </div>
    <h1>view coupons</h1>

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
            <h5>Coupons</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Coupon ID</th>
                  <th>Coupon Code</th>
                  <th>Amount</th>
                  <th>Amount Type</th>
                  <th>Status</th>
                  <th>Created At</th>
                  <th>Expiry Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($coupons as $coupon)
                <tr class="gradeX">
                  <td>{{$coupon->id}}</td>
                  <td>{{$coupon->coupon_code}}</td>
                  <td>
                  @if($coupon->amount_type=="Fixed") $ @endif
                  {{$coupon->amount}}
                  @if($coupon->amount_type=="percentage") % @endif
                  </td>
                  <td>{{$coupon->amount_type}}</td>
                  <td>
                      @if($coupon->status == 1) Active @else Inactive @endif
                   </td>
                  <td>{{$coupon->created_at}}</td>
                  <td>{{$coupon->expiry_date}}</td>
                  <td class="center"><a href="{{url('/admin/edit-coupon/'.$coupon->id)}}" class="btn btn-primary btn-mini">Edit</a> <a rel="{{$coupon->id}}" rel1="delete-coupon" rel2="Do you want to delete this Coupon?" href="#" class="btn btn-danger btn-mini deleteRecord">Delete</a></div></td>
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