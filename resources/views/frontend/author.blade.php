@extends('layouts.siteLayout.site')

@section('content')

<main id="tg-main" class="tg-main tg-haslayout">
			<!--************************************
					Author Detail Start
			*************************************-->
			<div class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-authordetail">
								<figure class="tg-authorimg">
									<img src="{{asset('image/backend_img/profile/'.$authorDetails->image)}}" alt="image description">
								</figure>
								<div class="tg-authorcontentdetail">
									<div class="tg-sectionhead">
										<h2><span>{{$authorDetails->books->count()}} Published Books</span>{{$authorDetails->first_name}} {{$authorDetails->last_name}}</h2>
										<ul class="tg-socialicons">
											<li class="tg-facebook"><a href="{{$authorDetails->facebook}}"><i class="fa fa-facebook"></i></a></li>
											<li class="tg-twitter"><a href="{{$authorDetails->twitter}}"><i class="fa fa-twitter"></i></a></li>
											<li class="tg-linkedin"><a href="{{$authorDetails->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
										</ul>
									</div>
									<div class="tg-description">
										<p>{{$authorDetails->bio}}</p>
									</div>
									<div class="tg-booksfromauthor">
										<div class="tg-sectionhead">
											<h2>Books of {{$authorDetails->first_name}}</h2>
										</div>
										<div class="row">
                                            @foreach($authorbooks as $book)
											<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
												<div class="tg-postbook">
													<figure class="tg-featureimg">
														<div class="tg-bookimg">
															<div class="tg-frontcover"><img src="{{asset('image/backend_img/books/'.$book->image)}}" alt="image description"></div>
															<div class="tg-backcover"><img src="{{asset('image/backend_img/books/'.$book->image)}}" alt="image description"></div>
														</div>
														<a class="tg-btnaddtowishlist" href="javascript:void(0);">
															<i class="icon-heart"></i>
															<span>add to wishlist</span>
														</a>
													</figure>
													<div class="tg-postbookcontent">
														<ul class="tg-bookscategories">
															<li><a href="javascript:void(0);">{{$book->category}}</a></li>
														</ul>
														<div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
														<div class="tg-booktitle">
															<h3><a href="javascript:void(0);">{{$book->book_title}}</a></h3>
														</div>
														<span class="tg-bookwriter">By: <a href="javascript:void(0);">{{$book->author_name}}</a></span>
														<span class="tg-stars"><span></span></span>
														<span class="tg-bookprice">
															<ins>${{$book->price}}</ins>
															<del>$27.20</del>
														</span>
														<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
															<i class="fa fa-shopping-basket"></i>
															<em>Add To Basket</em>
														</a>
													</div>
												</div>
                                            </div>
                                            @endforeach
										</div>
                                        {{$authorbooks->links()}}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--************************************
					Author Detail End
			*************************************-->
</main>

@endsection