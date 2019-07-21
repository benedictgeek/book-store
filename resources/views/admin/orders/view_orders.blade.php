@extends('layouts.adminLayout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Orders</a> </div>
    <h1>View Orders</h1>

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
                  <th>Order ID</th>
                  <th>Order Date</th>
                  <th>Customer Name</th>
                  <th>Customer Email</th>
                  <th>Order Products</th>
                  <th>Order Amount</th>
                  <th>Order Status</th>
                  <th>Payment Method</th>
                  <!-- <th>Product Image</th> -->
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($orders as $order)
                <tr class="gradeX">
                  <td>{{$order->id}}</td>
                  <td>{{$order->created_at}}</td>
                  <td>{{$order->first_name.' '.$order->last_name}}</td>
                  <td>{{$order->email}}</td>
                  <td>
                  @foreach($order->ordered_items as $prod)
                  <ul>
                    <li> {{$prod->book_title.' '}}({{$prod->type.' '}})({{$prod->quantity}})</li>
                  </ul>
                  @endforeach
                  </td>
                  <td>{{$order->grand_total}}</td>
                  <td>{{$order->order_status}}</td>
                  <td>{{$order->payment_method}}</td>
                  <td class="center">
                  <a target="_blank" href="{{url('admin/view-order/'.$order->id)}}" class="btn btn-success btn-mini">View Oder Details</a>
                  <a target="_blank" href="{{url('admin/order-invoice/'.$order->id)}}" class="btn btn-primary btn-mini">Invoice</a>
                  </td>
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