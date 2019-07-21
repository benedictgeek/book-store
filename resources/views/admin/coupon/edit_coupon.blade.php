@extends('layouts.adminLayout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">coupon</a> <a href="#" class="current">Edit coupon</a> </div>
    <h1>Edit Coupon</h1>
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
            <h5>Edit Coupon</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url('/admin/edit-coupon/'.$CouponDetails->id)}}" name="edit_coupon" id="edit_coupon" >
            {{csrf_field()}}  
            <div class="control-group">
                <label class="control-label">Coupon Code</label>
                <div class="controls">
                    <input type="text" value="{{$CouponDetails->coupon_code}}"  name="coupon_code" id="coupon_code" minlength="5" maxlength="15" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Amount</label>
                <div class="controls">
                    <input type="number" value="{{$CouponDetails->amount}}" name="amount" id="amount" min="1" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Amount Type</label>
                <div class="controls">
                    <select name="amount_type" id="amount_type" style="width: 220px">
                        <option value="percentage" @if($CouponDetails->amount_type == "percentage") selected @endif>Percentage</option>
                        <option value="Fixed" @if($CouponDetails->amount_type == "Fixed") selected @endif>Fixed</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Expiry Date</label>
                <div class="controls">
                    <input value="{{$CouponDetails->expiry_date}}"  type="text"  name="expiry_date" id="expiry_date">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" @if($CouponDetails->status == 1) checked @endif>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Edit Coupon" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection