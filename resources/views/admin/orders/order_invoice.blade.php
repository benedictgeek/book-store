<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">Order # {{$orderDetails->id}}</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
						{{$userDetails->first_name.' '.$userDetails->last_name}} <br>
						{{$userDetails->address}} <br>
						{{$userDetails->city}} <br>
						{{$userDetails->state}} <br>
						{{$userDetails->country}} <br>
						{{$userDetails->phone}} <br>
						{{$userDetails->zip_code}}
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
						<strong>Shipped To:</strong><br>
						{{$orderDetails->first_name.' '.$orderDetails->last_name}} <br>
						{{$orderDetails->address}} <br>
						{{$orderDetails->city}} <br>
						{{$orderDetails->state}} <br>
						{{$orderDetails->country}} <br>
						{{$orderDetails->phone}} <br>
						{{$orderDetails->zip_code}}
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					{{$orderDetails->payment_method}}<br>
    					{{$userDetails->email}}
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					{{$orderDetails->created_at}}<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td class="text-center"><strong> Book Title </strong></td>
        							<td class="text-center"><strong> Code </strong></td>
        							<td class="text-center"><strong> Type</strong></td>
        							<td class="text-center"><strong> Price</strong></td>
        							<td class="text-left"><strong>Quantity</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
                            <?php $total = 0; ?>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
                                @foreach($orderDetails->ordered_items as $item)
    							<tr>
    								<td class="text-center">{{$item->book_title}}</td>
    								<td class="text-center">{{$item->code}}</td>
    								<td class="text-center">{{$item->type}}</td>
    								<td class="text-center">${{$item->price}}</td>
    								<td class="text-left">{{$item->quantity}}</td>
    								<td class="text-right">${{$item->price * $item->quantity}}</td>
    							</tr>
                                  <?php  $total = $total + ($item->price * $item->quantity); ?>
                                @endforeach
                                <tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-left"><strong>Sub Total</strong></td>
    								<td class="thick-line text-right">${{$total}}</td>
    							</tr>
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-left"><strong>Coupon Amount(-)</strong></td>
    								<td class="thick-line text-right">${{$orderDetails->coupon_amount}}</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-left"><strong>Shipping(+)</strong></td>
    								<td class="no-line text-right">${{$orderDetails->shipping_charges}}</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-left"><strong>Grand Total</strong></td>
    								<td class="no-line text-right">${{$orderDetails->grand_total}}</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>