@extends('layouts.siteLayout.site')

@section('content')

<main id="tg-main" class="tg-main tg-haslayout">
			<!--************************************
					News Grid Start
			*************************************-->
			<div class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div id="tg-twocolumns" class="tg-twocolumns">
							<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
								<div id="tg-content" class="tg-content">
									<div class="tg-products">
										<div class="tg-productgrid">
											<div class="tg-refinesearch">
												@if($cat_books->count() > 0)
												<span>showing 1 to {{$cat_books->count()}} of {{$total}} total</span>
												<!-- <form class="tg-formtheme tg-formsortshoitems">
													<fieldset>
														<div class="form-group">
															<label>sort by:</label>
															<span class="tg-select">
																<select>
																	<option>name</option>
																	<option>name</option>
																	<option>name</option>
																</select>
															</span>
														</div>
														<div class="form-group">
															<label>show:</label>
															<span class="tg-select">
																<select>
																	<option>8</option>
																	<option>16</option>
																	<option>20</option>
																</select>
															</span>
														</div>
													</fieldset>
												</form> -->
                                            </div>
                                            @else
                                            <span>Your search does not match any result, kindly try again with another keyword.</span>
                                            @endif
                                            @foreach($cat_books as $book)
											<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
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
														<wishlistbutton-component :bookid = "{{$book->id}}"></wishlistbutton-component>
													</div>
												</div>
                                            </div>
                                            @endforeach
                                        </div>
                                        {{$cat_books->links()}}
									</div>
								</div>
                            </div>
    @include('layouts.siteLayout.sidebar')
						</div>
					</div>
				</div>
			</div>
			<!--************************************
					News Grid End
			*************************************-->
</main>

@endsection