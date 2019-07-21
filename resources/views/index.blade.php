@extends('layouts.siteLayout.site')

@section('content')

<div id="tg-homeslider" class="tg-homeslider tg-haslayout owl-carousel">
	@foreach($bannerbooks as $bannerbook)
			<div class="item" data-vide-bg="poster: image/frontend_img/comingsoon-bg.jpg" data-vide-options="position: 0% 0%">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-10 col-md-push-1 col-lg-8 col-lg-push-2">
							<div class="tg-slidercontent">
								<figure class="tg-authorimg"><a href="javascript:void(0);"><img src="{{asset('image/backend_img/profile/'.$bannerbook->author_image)}}" alt="image description"></a></figure>
								
								<h1 style="color: white;">{{$bannerbook->author_name}}</h1> 
								<h2 style="color: white;">Latest 2019 Release</h2>
								<div class="tg-description" style="color: white;">
									<p>{{$bannerbook->description}}.</p>
								</div>
								<div class="tg-btns">
									<a class="tg-btn" href="{{url('/book/'.$bannerbook->id)}}">buy now</a>
									<a class="tg-btn" href="{{url('/book/'.$bannerbook->id)}}">read more</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	@endforeach
</div>
		<!--************************************
				Home Slider End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
			<!--************************************
					All Status Start
			*************************************-->
			<section class="tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-allstatus">
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<div class="tg-parallax tg-bgbookwehave" data-z-index="2" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{asset('image/frontend_img/parallax/bgparallax-01.jpg')}}">
									<div class="tg-status">
										<div class="tg-statuscontent">
											<span class="tg-statusicon"><i class="icon-book"></i></span>
											<h2>Books we have<span>{{$bookCount}}</span></h2>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<div class="tg-parallax tg-bgtotalmembers" data-z-index="2" data-appear-bottom-offset="600" data-parallax="scroll" data-image-src="{{asset('image/frontend_img/parallax/bgparallax-02.jpg')}}">
									<div class="tg-status">
										<div class="tg-statuscontent">
											<span class="tg-statusicon"><i class="icon-user"></i></span>
											<h2>Authors<span>{{$authorsCount}}</span></h2>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<div class="tg-parallax tg-bghappyusers" data-z-index="2" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{asset('image/frontend_img/parallax/bgparallax-03.jpg')}}">
									<div class="tg-status">
										<div class="tg-statuscontent">
											<span class="tg-statusicon"><i class="icon-heart"></i></span>
											<h2>Happy users<span>{{$usersCount}}</span></h2>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					All Status End
			*************************************-->
			<!--************************************
					Best Selling Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-sectionhead">
								<h2><span>People’s Choice</span>Bestselling Books</h2>
								<a class="tg-btn" href="javascript:void(0);">View All</a>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div id="tg-bestsellingbooksslider" class="tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">
								@foreach($allbooks as $book)
								<div class="item">
									<div class="tg-postbook">
										<figure class="tg-featureimg">
											<div class="tg-bookimg">
												<div class="tg-frontcover"><img src="{{asset('image/backend_img/books/'.$book->image)}}" alt="image description"></div>
												<div class="tg-backcover"><img src="{{asset('image/backend_img/books/'.$book->image)}}" alt="image description"></div>
											</div>
											<!-- <a class="tg-btnaddtowishlist" href="javascript:void(0);">
												<i class="icon-heart"></i>
												<span>Add to wishlist</span>
											</a> -->
										</figure>
										<div class="tg-postbookcontent" >
											<ul class="tg-bookscategories">
												<li><a href="javascript:void(0);">{{$book->category}}</a></li>
												<!-- <li><a href="javascript:void(0);">Fun</a></li> -->
											</ul>
											<div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
											<div class="tg-booktitle">
												<h3><a href="{{url('book/'.$book->id)}}">{{$book->book_title}}</a></h3>
											</div>
											<span class="tg-bookwriter">By: <a href="javascript:void(0);">{{$book->author_name}}</a></span>
											<div class="tg-bookprice rateYo" rel="{{$book->rating}}" style="margin-bottom: 10px; margin-left: -5px;"></div>
											
											<span class="tg-bookprice">
												@if($book->new_price != null)
												<ins>${{$book->new_price}}</ins>
												<del>${{$book->price}}</del>
												@else
												<ins>${{$book->price}}</ins>
												@endif
											</span>
											<wishlistbutton-component :bookid = "{{$book->id}}" :isadmin="{{$admin}}"></wishlistbutton-component>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Best Selling End
			*************************************-->
			<!--************************************
					Featured Item Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-sectionhead">
								<h2><span>For you</span>Featured Books</h2>
								<a class="tg-btn" href="javascript:void(0);">View All</a>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div id="tg-featuredbookslider" class="tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">
								@foreach($featuredbooks as $book)
								<div class="item">
									<div class="tg-postbook">
										<figure class="tg-featureimg">
											<div class="tg-bookimg">
												<div class="tg-frontcover"><img src="{{asset('image/backend_img/books/'.$book->image)}}" alt="image description"></div>
												<div class="tg-backcover"><img src="{{asset('image/backend_img/books/'.$book->image)}}" alt="image description"></div>
											</div>
											<!-- <a class="tg-btnaddtowishlist" href="javascript:void(0);">
												<i class="icon-heart"></i>
												<span>Add to wishlist</span>
											</a> -->
										</figure>
										<div class="tg-postbookcontent">
											<ul class="tg-bookscategories">
												<li><a href="javascript:void(0);">{{$book->category}}</a></li>
												<!-- <li><a href="javascript:void(0);">Fun</a></li> -->
											</ul>
											<div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
											<div class="tg-booktitle">
												<h3><a href="{{url('book/'.$book->id)}}">{{$book->book_title}}</a></h3>
											</div>
											<span class="tg-bookwriter">By: <a href="javascript:void(0);">{{$book->author_name}}</a></span>
											<div class="tg-bookprice rateYo" rel="{{$book->rating}}" style="margin-bottom: 10px; margin-left: -5px;"></div>
											<span class="tg-bookprice">
													@if($book->new_price != null)
													<ins>${{$book->new_price}}</ins>
													<del>${{$book->price}}</del>
													@else
													<ins>${{$book->price}}</ins>
													@endif
											</span>
											<wishlistbutton-component :bookid = "{{$book->id}}" :isadmin="{{$admin}}"></wishlistbutton-component>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Featured Item End
			*************************************-->
			<!--************************************
					New Release Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-newrelease">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="tg-sectionhead">
									<h2><span>Taste The New Spice</span>New Release Books</h2>
								</div>
								<div class="tg-description">Dive in here to have a peak through our lates release books, you are definitely going to be awed!.</p>
								</div>
								<div class="tg-btns">
									<a class="tg-btn tg-active" href="javascript:void(0);">View All</a>
									<a class="tg-btn" href="javascript:void(0);">Read More</a>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="row">
									<div class="tg-newreleasebooks">
										@foreach($newrelease as $book)
										<div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
											<div class="tg-postbook">
												<figure class="tg-featureimg">
													<div class="tg-bookimg">
														<div class="tg-frontcover"><img src="{{asset('image/backend_img/books/'.$book->image)}}" alt="image description"></div>
														<div class="tg-backcover"><img src="{{asset('image/backend_img/books/'.$book->image)}}" alt="image description"></div>
													</div>
													<!-- <a class="tg-btnaddtowishlist" href="javascript:void(0);">
														<i class="icon-heart"></i>
														<span>add to wishlist</span>
													</a> -->
												</figure>
												<div class="tg-postbookcontent">
													<ul class="tg-bookscategories">
														<li><a href="javascript:void(0);">{{$book->category}}</a></li>
													</ul>
													<div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
													<div class="tg-booktitle">
														<h3><a href="{{url('book/'.$book->id)}}">{{$book->book_title}}</a></h3>
													</div>
													<span class="tg-bookwriter">By: <a href="javascript:void(0);">{{$book->author_name}}</a></span>
													<div class="tg-bookprice rateYo" rel="{{$book->rating}}" style="margin-bottom: 10px; margin-left: -5px;"></div>
													<span class="tg-bookprice">
															@if($book->new_price != null)
															<ins>${{$book->new_price}}</ins>
															<del>${{$book->price}}</del>
															@else
															<ins>${{$book->price}}</ins>
															@endif
													</span>
													<wishlistbutton-component :bookid = "{{$book->id}}" :isadmin="{{$admin}}"></wishlistbutton-component>
												</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					New Release End
			*************************************-->
			<!--************************************
					Collection Count Start
			*************************************-->
			<section class="tg-parallax tg-bgcollectioncount tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{asset('image/frontend_img/parallax/bgparallax-04.jpg')}}">
				<div class="tg-sectionspace tg-collectioncount tg-haslayout">
					<div class="container">
						<div class="row">
							<div id="tg-collectioncounters" class="tg-collectioncounters">
								<div class="tg-collectioncounter tg-drama">
									<div class="tg-collectioncountericon">
										<i class="icon-bubble"></i>
									</div>
									<div class="tg-titlepluscounter">
										<h2>Drama</h2>
										<h3 data-from="0" data-to="{{$dramaCount}}" data-speed="8000" data-refresh-interval="50"></h3>
									</div>
								</div>
								<div class="tg-collectioncounter tg-horror">
									<div class="tg-collectioncountericon">
										<i class="icon-heart-pulse"></i>
									</div>
									<div class="tg-titlepluscounter">
										<h2>Horror</h2>
										<h3 data-from="0" data-to="{{$horrorCount}}" data-speed="8000" data-refresh-interval="50"></h3>
									</div>
								</div>
								<div class="tg-collectioncounter tg-romance">
									<div class="tg-collectioncountericon">
										<i class="icon-heart"></i>
									</div>
									<div class="tg-titlepluscounter">
										<h2>Romance</h2>
										<h3 data-from="0" data-to="{{$romansCount}}" data-speed="8000" data-refresh-interval="50"></h3>
									</div>
								</div>
								<div class="tg-collectioncounter tg-fashion">
									<div class="tg-collectioncountericon">
										<i class="icon-star"></i>
									</div>
									<div class="tg-titlepluscounter">
										<h2>Fashion</h2>
										<h3 data-from="0" data-to="{{$fashionCount}}" data-speed="8000" data-refresh-interval="50"></h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Collection Count End
			*************************************-->
			<!-- ************************************
					Picked By Author Start
			*************************************-->
			<!-- <section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-sectionhead">
								<h2><span>Some Great Books</span>Picked By Authors</h2>
								<a class="tg-btn" href="javascript:void(0);">View All</a>
							</div>
						</div>
						<div id="tg-pickedbyauthorslider" class="tg-pickedbyauthor tg-pickedbyauthorslider owl-carousel">
							<div class="item">
								<div class="tg-postbook">
									<figure class="tg-featureimg">
										<div class="tg-bookimg">
											<div class="tg-frontcover"><img src="{{asset('image/frontend_img/books/img-10.jpg')}}" alt="image description"></div>
										</div>
										<div class="tg-hovercontent">
											<div class="tg-description">
												<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua enim adia minim veniam, quis nostrud.</p>
											</div>
											<strong class="tg-bookpage">Book Pages: 206</strong>
											<strong class="tg-bookcategory">Category: Adventure, Fun</strong>
											<strong class="tg-bookprice">Price: $23.18</strong>
											<div class="tg-ratingbox"><span class="tg-stars"><span></span></span></div>
										</div>
									</figure>
									<div class="tg-postbookcontent">
										<div class="tg-booktitle">
											<h3><a href="javascript:void(0);">Seven Minutes In Heaven</a></h3>
										</div>
										<span class="tg-bookwriter">By: <a href="javascript:void(0);">Sunshine Orlando</a></span>
										<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
											<i class="fa fa-shopping-basket"></i>
											<em>Add To Basket</em>
										</a>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="tg-postbook">
									<figure class="tg-featureimg">
										<div class="tg-bookimg">
											<div class="tg-frontcover"><img src="{{asset('image/frontend_img/books/img-11.jpg')}}" alt="image description"></div>
										</div>
										<div class="tg-hovercontent">
											<div class="tg-description">
												<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua enim adia minim veniam, quis nostrud.</p>
											</div>
											<strong class="tg-bookpage">Book Pages: 206</strong>
											<strong class="tg-bookcategory">Category: Adventure, Fun</strong>
											<strong class="tg-bookprice">Price: $23.18</strong>
											<div class="tg-ratingbox"><span class="tg-stars"><span></span></span></div>
										</div>
									</figure>
									<div class="tg-postbookcontent">
										<div class="tg-booktitle">
											<h3><a href="javascript:void(0);">Slow And Steady Wins The Race</a></h3>
										</div>
										<span class="tg-bookwriter">By: <a href="javascript:void(0);">Drusilla Glandon</a></span>
										<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
											<i class="fa fa-shopping-basket"></i>
											<em>Add To Basket</em>
										</a>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="tg-postbook">
									<figure class="tg-featureimg">
										<div class="tg-bookimg">
											<div class="tg-frontcover"><img src="{{asset('image/frontend_img/books/img-12.jpg')}}" alt="image description"></div>
										</div>
										<div class="tg-hovercontent">
											<div class="tg-description">
												<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua enim adia minim veniam, quis nostrud.</p>
											</div>
											<strong class="tg-bookpage">Book Pages: 206</strong>
											<strong class="tg-bookcategory">Category: Adventure, Fun</strong>
											<strong class="tg-bookprice">Price: $23.18</strong>
											<div class="tg-ratingbox"><span class="tg-stars"><span></span></span></div>
										</div>
									</figure>
									<div class="tg-postbookcontent">
										<div class="tg-booktitle">
											<h3><a href="javascript:void(0);">There’s No Time Like The Present</a></h3>
										</div>
										<span class="tg-bookwriter">By: <a href="javascript:void(0);">Patrick Seller</a></span>
										<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
											<i class="fa fa-shopping-basket"></i>
											<em>Add To Basket</em>
										</a>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="tg-postbook">
									<figure class="tg-featureimg">
										<div class="tg-bookimg">
											<div class="tg-frontcover"><img src="{{asset('image/frontend_img/books/img-10.jpg')}}" alt="image description"></div>
										</div>
										<div class="tg-hovercontent">
											<div class="tg-description">
												<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua enim adia minim veniam, quis nostrud.</p>
											</div>
											<strong class="tg-bookpage">Book Pages: 206</strong>
											<strong class="tg-bookcategory">Category: Adventure, Fun</strong>
											<strong class="tg-bookprice">Price: $23.18</strong>
											<div class="tg-ratingbox"><span class="tg-stars"><span></span></span></div>
										</div>
									</figure>
									<div class="tg-postbookcontent">
										<div class="tg-booktitle">
											<h3><a href="javascript:void(0);">Seven Minutes In Heaven</a></h3>
										</div>
										<span class="tg-bookwriter">By: <a href="javascript:void(0);">Sunshine Orlando</a></span>
										<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
											<i class="fa fa-shopping-basket"></i>
											<em>Add To Basket</em>
										</a>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="tg-postbook">
									<figure class="tg-featureimg">
										<div class="tg-bookimg">
											<div class="tg-frontcover"><img src="{{asset('image/frontend_img/books/img-11.jpg')}}" alt="image description"></div>
										</div>
										<div class="tg-hovercontent">
											<div class="tg-description">
												<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua enim adia minim veniam, quis nostrud.</p>
											</div>
											<strong class="tg-bookpage">Book Pages: 206</strong>
											<strong class="tg-bookcategory">Category: Adventure, Fun</strong>
											<strong class="tg-bookprice">Price: $23.18</strong>
											<div class="tg-ratingbox"><span class="tg-stars"><span></span></span></div>
										</div>
									</figure>
									<div class="tg-postbookcontent">
										<div class="tg-booktitle">
											<h3><a href="javascript:void(0);">Slow And Steady Wins The Race</a></h3>
										</div>
										<span class="tg-bookwriter">By: <a href="javascript:void(0);">Drusilla Glandon</a></span>
										<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
											<i class="fa fa-shopping-basket"></i>
											<em>Add To Basket</em>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section> -->
			<!--************************************
					Picked By Author End
			************************************* -->
			<!--************************************
					Testimonials Start
			*************************************-->
			<section class="tg-parallax tg-bgtestimonials tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{asset('image/frontend_img/parallax/bgparallax-05.jpg')}}">
				<div class="tg-sectionspace tg-haslayout">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-push-2">
								<div id="tg-testimonialsslider" class="tg-testimonialsslider tg-testimonials owl-carousel">
									@foreach($testimonials as $testimonial)
									<div class="item tg-testimonial">
										<figure><img src="{{asset('image/frontend_img/users_medium/'.$testimonial->image)}}" alt="image description"></figure>
										<blockquote><q>{{$testimonial->feedback}}</q></blockquote>
										<div class="tg-testimonialauthor">
											<h3>{{$testimonial->user}}</h3>
											<!-- <span>Manager @ CIFP</span> -->
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Testimonials End
			*************************************-->
			<!--************************************
					Authors Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-sectionhead">
								<h2><span>Strong Minds Behind Us</span>Most Popular Authors</h2>
								<a class="tg-btn" href="javascript:void(0);">View All</a>
							</div>
						</div>
						<div id="tg-authorsslider" class="tg-authors tg-authorsslider owl-carousel">
							@foreach($authors as $author)
							<div class="item tg-author">
								<figure><a href="javascript:void(0);"><img src="{{asset('image/backend_img/profile/'.$author->image)}}" alt="image description"></a></figure>
								<div class="tg-authorcontent">
									<h2><a href="{{url('writer/'.$author->id)}}">{{$author->first_name}} {{$author->last_name}}</a></h2>
									<span>{{$author->books->count()}} Books published</span>
									<ul class="tg-socialicons">
										@if(!empty($author->facebook))
										<li class="tg-facebook"><a href="{{$author->facebook}}"><i class="fa fa-facebook"></i></a></li>
										@endif
										@if(!empty($author->twitter))
										<li class="tg-twitter"><a href="{{$author->twitter}}"><i class="fa fa-twitter"></i></a></li>
										@endif
										@if(!empty($author->linkedin))
										<li class="tg-linkedin"><a href="{{$author->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
										@endif
									</ul>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Authors End
			*************************************-->
			<!--************************************
					Call to Action Start
			*************************************-->
			<!-- <section class="tg-parallax tg-bgcalltoaction tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{asset('image/frontend_img/parallax/bgparallax-06.jpg')}}">
				<div class="tg-sectionspace tg-haslayout">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="tg-calltoaction">
									<h2>Open Discount For All</h2>
									<h3>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore.</h3>
									<a class="tg-btn tg-active" href="javascript:void(0);">Read More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section> -->
			<!--************************************
					Call to Action End
			*************************************-->
			<!--************************************
					Latest News Start
			*************************************-->
			<!-- <section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-sectionhead">
								<h2><span>Latest News &amp; Articles</span>What's Hot in The News</h2>
								<a class="tg-btn" href="javascript:void(0);">View All</a>
							</div>
						</div>
						<div id="tg-postslider" class="tg-postslider tg-blogpost owl-carousel">
							<article class="item tg-post">
								<figure><a href="javascript:void(0);"><img src="{{asset('image/frontend_img/blog/img-01.jpg')}}" alt="image description"></a></figure>
								<div class="tg-postcontent">
									<ul class="tg-bookscategories">
										<li><a href="javascript:void(0);">Adventure</a></li>
										<li><a href="javascript:void(0);">Fun</a></li>
									</ul>
									<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
									<div class="tg-posttitle">
										<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
									</div>
									<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
									<ul class="tg-postmetadata">
										<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
									</ul>
								</div>
							</article>
							<article class="item tg-post">
								<figure><a href="javascript:void(0);"><img src="{{asset('image/frontend_img/blog/img-02.jpg')}}" alt="image description"></a></figure>
								<div class="tg-postcontent">
									<ul class="tg-bookscategories">
										<li><a href="javascript:void(0);">Adventure</a></li>
										<li><a href="javascript:void(0);">Fun</a></li>
									</ul>
									<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
									<div class="tg-posttitle">
										<h3><a href="javascript:void(0);">All She Wants To Do Is Dance</a></h3>
									</div>
									<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
									<ul class="tg-postmetadata">
										<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
									</ul>
								</div>
							</article>
							<article class="item tg-post">
								<figure><a href="javascript:void(0);"><img src="{{asset('image/frontend_img/blog/img-03.jpg')}}" alt="image description"></a></figure>
								<div class="tg-postcontent">
									<ul class="tg-bookscategories">
										<li><a href="javascript:void(0);">Adventure</a></li>
										<li><a href="javascript:void(0);">Fun</a></li>
									</ul>
									<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
									<div class="tg-posttitle">
										<h3><a href="javascript:void(0);">Why Walk When You Can Climb?</a></h3>
									</div>
									<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
									<ul class="tg-postmetadata">
										<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
									</ul>
								</div>
							</article>
							<article class="item tg-post">
								<figure><a href="javascript:void(0);"><img src="{{asset('image/frontend_img/blog/img-04.jpg')}}" alt="image description"></a></figure>
								<div class="tg-postcontent">
									<ul class="tg-bookscategories">
										<li><a href="javascript:void(0);">Adventure</a></li>
										<li><a href="javascript:void(0);">Fun</a></li>
									</ul>
									<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
									<div class="tg-posttitle">
										<h3><a href="javascript:void(0);">Dance Like Nobody’s Watching</a></h3>
									</div>
									<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
									<ul class="tg-postmetadata">
										<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
									</ul>
								</div>
							</article>
							<article class="item tg-post">
								<figure><a href="javascript:void(0);"><img src="{{asset('image/frontend_img/blog/img-02.jpg')}}" alt="image description"></a></figure>
								<div class="tg-postcontent">
									<ul class="tg-bookscategories">
										<li><a href="javascript:void(0);">Adventure</a></li>
										<li><a href="javascript:void(0);">Fun</a></li>
									</ul>
									<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
									<div class="tg-posttitle">
										<h3><a href="javascript:void(0);">All She Wants To Do Is Dance</a></h3>
									</div>
									<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
									<ul class="tg-postmetadata">
										<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
									</ul>
								</div>
							</article>
							<article class="item tg-post">
								<figure><a href="javascript:void(0);"><img src="{{asset('image/frontend_img/blog/img-03.jpg')}}" alt="image description"></a></figure>
								<div class="tg-postcontent">
									<ul class="tg-bookscategories">
										<li><a href="javascript:void(0);">Adventure</a></li>
										<li><a href="javascript:void(0);">Fun</a></li>
									</ul>
									<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
									<div class="tg-posttitle">
										<h3><a href="javascript:void(0);">Why Walk When You Can Climb?</a></h3>
									</div>
									<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
									<ul class="tg-postmetadata">
										<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
										<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
									</ul>
								</div>
							</article>
						</div>
					</div>
				</div>
			</section> -->
			<!--************************************
					Latest News End
			*************************************-->
		</main>
    
@endsection