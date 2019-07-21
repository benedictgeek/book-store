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
						<product-component :bookid = {{$myBook->id}} :authuser = "{{$auth_user}}"></product-component>
						<div class="tg-relatedproducts">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="tg-sectionhead">
                                    <h2><span>Related Products</span>You May Also Like</h2>
                                    <a class="tg-btn" href="javascript:void(0);">View All</a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div id="tg-relatedproductslider" class="tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">
									@foreach($relpro as $book)
										@if($book->id == $myBook->id)
											@continue
										@endif
                                    <div class="item">
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
                                                    <!-- <li><a href="javascript:void(0);">Fun</a></li> -->
                                                </ul>
                                                <div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
                                                <div class="tg-booktitle">
                                                    <h3><a href="javascript:void(0);">{{$book->book_title}}</a></h3>
                                                </div>
                                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">{{$book->author_name}}</a></span>
                                                <div class="tg-bookprice rateYo" rel="{{$book->rating}}" style="margin-bottom: 10px; margin-left: -4px;"></div>
                                                <span class="tg-bookprice">
                                                    @if($book->new_price != null)
                                                    <ins>${{$book->new_price}}</ins>
                                                    <del>${{$book->price}}</del>
                                                    @else
                                                    <ins>${{$book->price}}</ins>
                                                    @endif
                                                </span>
                                                <wishlistbutton-component :bookid = "{{$book->id}}" :isadmin= {{$auth_user}}></wishlistbutton-component>
                                            </div>
                                        </div>
									</div>
									@endforeach
                                </div>
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