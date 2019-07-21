<?php
use App\AdminAuthor;

$authors = AdminAuthor::with('books')->get();

// $authors_foot = [];
foreach($authors as $key=>$value){
	$authors[$key]->book_count = $authors[$key]->books->count();
}

$authors = json_decode(json_encode($authors));

	function sort_by_total_books($a,$b){
		if($a->book_count == $b->book_count){
			return 0;
		}
		return $a->book_count < $b->book_count ? 1: -1;
	}

usort($authors, 'sort_by_total_books');
$n = 0;

$footerlinks = []

// $authors = array_multisort(array_column($authors,'book_count'),SORT_DESC);

?>

<footer id="tg-footer" class="tg-footer tg-haslayout">
			<div class="tg-footerarea">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<ul class="tg-clientservices">
								<li class="tg-devlivery">
									<span class="tg-clientserviceicon"><i class="icon-rocket"></i></span>
									<div class="tg-titlesubtitle">
										<h3>Fast Delivery</h3>
										<p>Shipping Worldwide</p>
									</div>
								</li>
								<li class="tg-discount">
									<span class="tg-clientserviceicon"><i class="icon-tag"></i></span>
									<div class="tg-titlesubtitle">
										<h3>Open</h3>
										<p>Offering Open Discount</p>
									</div>
								</li>
								<li class="tg-quality">
									<span class="tg-clientserviceicon"><i class="icon-leaf"></i></span>
									<div class="tg-titlesubtitle">
										<h3>Eyes On Quality</h3>
										<p>Publishing Quality Work</p>
									</div>
								</li>
								<li class="tg-support">
									<span class="tg-clientserviceicon"><i class="icon-heart"></i></span>
									<div class="tg-titlesubtitle">
										<h3>24/7 Support</h3>
										<p>Serving Every Moments</p>
									</div>
								</li>
							</ul>
						</div>
						<div class="tg-threecolumns">
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<div class="tg-footercol">
									<!-- <strong class="tg-logo"><a href="javascript:void(0);"><img src="images/flogo.png" alt="image description"></a></strong> -->
									<ul class="tg-contactinfo">
										<li>
											<i class="icon-apartment"></i>
											<address>Somewhere in the world</address>
										</li>
										<li>
											<i class="icon-phone-handset"></i>
											<span>
												<em>(234) 8139 - 1946 - 25</em>
											</span>
										</li>
										<li>
											<i class="icon-clock"></i>
											<span>24/7</span>
										</li>
										<li>
											<i class="icon-envelope"></i>
											<span>
												<em><a href="mailto:support@domain.com">olushola251@gmail.com</a></em>
											</span>
										</li>
									</ul>
									<ul class="tg-socialicons">
										<li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
										<li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
										<li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
										<li class="tg-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
										<li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<div class="tg-footercol tg-widget tg-widgetnavigation">
									<div class="tg-widgettitle">
										<h3>Shipping And Help Information</h3>
									</div>
									<div class="tg-widgetcontent">
										<ul>
											@foreach($footerlinks as $footerlink)
											<li><a href="{{url('/'.$footerlink->url)}}">{{$footerlink->title}}</a></li>
											@endforeach
										</ul>
										<ul>
											<li><a href="{{url('/contact-us')}}">Contact Us</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
								<div class="tg-footercol tg-widget tg-widgettopsellingauthors">
									<div class="tg-widgettitle">
										<h3>Top Selling Authors</h3>
									</div>
									<div class="tg-widgetcontent">
										<ul>
											<li>
												@foreach($authors as $value)
												<figure style="width: 70px; height: 70px;"><a href="javascript:void(0);"><img src="{{asset('image/backend_img/profile/'.$value->image)}}" alt="image description"></a></figure>
												<div class="tg-authornamebooks">
													<h4><a href="{{url('/writer/'.$value->id)}}">{{$value->first_name.' '.$value->last_name}}</a></h4>
													<p>{{$value->book_count}} Published Books</p>
												</div>
													@if($n == 2)
														@break
													@endif
												 <?php $n = $n + 1; ?>
												@endforeach
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tg-newsletter">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<h4>Signup Newsletter!</h4>
							<h5>Register your email here to have access to our Newsletter.</h5>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<newsletter-component></newsletter-component>
						</div>
					</div>
				</div>
			</div>
			<div class="tg-footerbar">
				<a id="tg-btnbacktotop" class="tg-btnbacktotop" href="javascript:void(0);"><i class="icon-chevron-up"></i></a>
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<span class="tg-paymenttype"><img src="{{asset('image/frontend_img/paymenticon.png')}}" alt="image description"></span>
							<span class="tg-copyright">2019 Olushola By &copy; Book store project</span>
						</div>
					</div>
				</div>
			</div>
		</footer>