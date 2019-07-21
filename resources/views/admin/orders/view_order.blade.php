@extends('layouts.adminLayout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Order Details</a> </div>
    <h1>Order {{$orderDetails->id}}</h1>

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
      <div class="span6">
      <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
            <h5>Order Details</h5>

          
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td class="taskDesc">Order Date</td>
                  <td class="taskStatus">{{$orderDetails->created_at}}</td>
                </tr>
                <tr>
                  <td class="taskDesc">Order Status</td>
                  <td class="taskStatus">{{$orderDetails->order_status}}</td>
                </tr>
                <tr>
                  <td class="taskDesc">Shipping Amount</td>
                  <td class="taskStatus">$ {{$orderDetails->shipping_charges}}</td>
                </tr>
                <tr>
                  <td class="taskDesc">Total Amount</td>
                  <td class="taskStatus">$ {{$orderDetails->grand_total}}</td>
                </tr>
                <tr>
                  <td class="taskDesc">Coupon Code</td>
                  <td class="taskStatus">{{$orderDetails->coupon_code}}</td>
                </tr>
                <tr>
                  <td class="taskDesc">Coupon Amount</td>
                  <td class="taskStatus">$ {{$orderDetails->coupon_amount}}</td>
                </tr>
                <tr>
                  <td class="taskDesc">Payment Method</td>
                  <td class="taskStatus">{{$orderDetails->payment_method}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="accordion">
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title">
                <h5>Billing Details</h5> 
              </div>
            </div>
            <div>
              <div class="widget-content">
                  {{$userDetails->first_name.' '.$userDetails->last_name}} <br>
                  {{$userDetails->address}} <br>
                  {{$userDetails->city}} <br>
                  {{$userDetails->state}} <br>
                  {{$userDetails->country}} <br>
                  {{$userDetails->phone}} <br>
                  {{$userDetails->zip_code}} <br>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
            <h5>Customer Details</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td class="taskDesc">Customer Name</td>
                  <td class="taskStatus">{{$orderDetails->first_name.' '.$orderDetails->last_name}}</td>
                </tr>
                <tr>
                  <td class="taskDesc">Customer Email</td>
                  <td class="taskStatus">{{$orderDetails->email}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        
        <form action="{{url('admin/update-order-status')}}" method="post">
        {{ csrf_field()}}
        <div class="accordion">
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title">
                <h5>Update Order Status</h5> 
              </div>
            </div>
            <div>
              <div class="widget-content">
                  <table width="100%">
                      <tr>
                          <td><input type="hidden" value="{{$orderDetails->id}}" name="order_id">
                              <select name="order_status" id="order_status" required>
                                  <option value="New" @if($orderDetails->order_status == "New") selected @endif >New</option>
                                  <option value="Pending" @if($orderDetails->order_status == "Pending") selected @endif>Pending</option>
                                  <option value="In progress" @if($orderDetails->order_status == "In progress") selected @endif>In Progress</option>
                                  <option value="Shipped" @if($orderDetails->order_status == "Shipped") selected @endif>Shipped</option>
                                  <option value="Cancelled" @if($orderDetails->order_status == "Cancelled") selected @endif>Cancelled</option>
                                  <option value="Delivered" @if($orderDetails->order_status == "Delivered") selected @endif>Delivered</option>
                              </select>
                          </td>
                          <td><input type="submit" value="Update"></td>
                      </tr>
                  </table>
              </div>
            </div>
          </div>
        </div>
        </form>
        <div class="accordion">
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title">
                <h5>Shipping Details</h5> 
              </div>
            </div>
            <div>
              <div class="widget-content">
                {{$orderDetails->first_name.' '.$orderDetails->last_name}} <br>
                {{$orderDetails->address}} <br>
                {{$orderDetails->city}} <br>
                {{$orderDetails->state}} <br>
                {{$orderDetails->country}} <br>
                {{$orderDetails->phone}} <br>
                {{$orderDetails->zip_code}} <br>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
    <div class="row-fluid">
        <table id="example" class="table table-striped table-bordered" >
            <thead>
                <tr>
                    <th>Book Name</th>
                    <th>Book Code</th>
                    <th>Book Type</th>
                    <th>Book Qty</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderDetails->ordered_items as $pro)
                <tr>
                    <td>{{$pro->book_title}}</td>
                    <td>
                    {{$pro->code}}
                    </td>
                    <td>{{$pro->price}}</td>
                    <td>{{$pro->quantity}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>
</div>

@endsection