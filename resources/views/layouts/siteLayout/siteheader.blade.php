<?php

use App\Category;
use App\AdminAuthor;

$categories = Category::orderBy('category_name','asc')->get();
	$authors = AdminAuthor::where('type','author')->get();

?>

<header id="tg-header" class="tg-header tg-haslayout">
			<div class="tg-topbar">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<ul class="tg-addnav">
								<li>
									<a href="{{url('/contact-us')}}">
										<i class="icon-envelope"></i>
										<em>Contact</em>
									</a>
								</li>
								<li>
									<a href="{{url('/help')}}">
										<i class="icon-question-circle"></i>
										<em>Help</em>
									</a>
								</li>
							</ul>
							<!-- <div class="dropdown tg-themedropdown tg-currencydropdown">
								<a href="javascript:void(0);" id="tg-currenty" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="icon-earth"></i>
									<span>Currency</span>
								</a>
								<ul class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-currenty">
									<li>
										<a href="javascript:void(0);">
											<i>£</i>
											<span>British Pound</span>
										</a>
									</li>
									<li>
										<a href="javascript:void(0);">
											<i>$</i>
											<span>Us Dollar</span>
										</a>
									</li>
									<li>
										<a href="javascript:void(0);">
											<i>€</i>
											<span>Euro</span>
										</a>
									</li>
								</ul>
							</div> -->
							<div class="tg-userlogin">
								<ul class="tg-addnav">
										@if(Auth::check())
										<li>
											<a href="{{url('/user-account')}}">
												<i class="icon-cogs"></i>
												<em>Account</em>
											</a>
										</li>
										<li>
											<a href="{{url('/user-logout')}}">
												<i class="icon-exit"></i>
												<em>Logout</em>
											</a>
										</li>
										<li>
											@if(!empty(Auth::user()->image))
											<figure><a href="javascript:void(0);"><img src="{{asset('image/frontend_img/users/'.Auth::user()->image)}}" alt="image description"></a></figure>
											@endif
											<em> Hi, {{Auth::user()->first_name}}</em>
										</li>
										@else
										<li>
											<a href="{{url('/reg-login')}}">
												<i class="icon-enter"></i>
												<em>Login</em>
											</a>
										</li>
										@endif
									</ul>
								</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tg-middlecontainer">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<!-- <strong class="tg-logo"><a href="index.html"><img src="{{asset('image/frontend_img/logo.png')}}" alt="company name here"></a></strong> -->
							<strong class="tg-logo"><a href="{{url('/')}}"><h2>eLibrary</h2></a></strong>
							<header-component></header-component>
							<div class="tg-searchbox">
								<form class="tg-formtheme tg-formsearch" action="{{url('search')}}" method="post">
									{{csrf_field()}}
									<fieldset>
										<input type="text" name="search" class="typeahead form-control" placeholder="Search by title, author, keyword, ISBN...">
										<button type="submit"><i class="icon-magnifier"></i></button>
									</fieldset>
									<!-- <a href="javascript:void(0);">+  Advanced Search</a> -->
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tg-navigationarea">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<nav id="tg-nav" class="tg-nav">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
									<ul>
										<!-- <li class="menu-item-has-children menu-item-has-mega-menu">
											<a href="javascript:void(0);">All Categories</a>
											<div class="mega-menu">
												<ul class="tg-themetabnav" role="tablist">
													<li role="presentation" class="active">
														<a href="index.html#artandphotography" aria-controls="artandphotography" role="tab" data-toggle="tab">Art &amp; Photography</a>
													</li>
													<li role="presentation">
														<a href="index.html#biography" aria-controls="biography" role="tab" data-toggle="tab">Biography</a>
													</li>
													<li role="presentation">
														<a href="index.html#childrensbook" aria-controls="childrensbook" role="tab" data-toggle="tab">Children’s Book</a>
													</li>
													<li role="presentation">
														<a href="index.html#craftandhobbies" aria-controls="craftandhobbies" role="tab" data-toggle="tab">Craft &amp; Hobbies</a>
													</li>
													<li role="presentation">
														<a href="index.html#crimethriller" aria-controls="crimethriller" role="tab" data-toggle="tab">Crime &amp; Thriller</a>
													</li>
													<li role="presentation">
														<a href="index.html#fantasyhorror" aria-controls="fantasyhorror" role="tab" data-toggle="tab">Fantasy &amp; Horror</a>
													</li>
													<li role="presentation">
														<a href="index.html#fiction" aria-controls="fiction" role="tab" data-toggle="tab">Fiction</a>
													</li>
													<li role="presentation">
														<a href="index.html#fooddrink" aria-controls="fooddrink" role="tab" data-toggle="tab">Food &amp; Drink</a>
													</li><li role="presentation">
														<a href="index.html#graphicanimemanga" aria-controls="graphicanimemanga" role="tab" data-toggle="tab">Graphic, Anime &amp; Manga</a>
													</li>
													<li role="presentation">
														<a href="index.html#sciencefiction" aria-controls="sciencefiction" role="tab" data-toggle="tab">Science Fiction</a>
													</li>
												</ul>
												<div class="tab-content tg-themetabcontent">
													
												</div>
											</div>
										</li> -->
										<li class="menu-item-has-children current-menu-item">
											<a href="javascript:void(0);">All Categories</a>
											<ul class="sub-menu">
												@foreach($categories as $cat)
												<li><a href="{{url('/books/'.$cat->url)}}">{{$cat->category_name}}</a></li>
												@endforeach
											</ul>
										</li>
										<li class="menu-item-has-children">
											<a href="javascript:void(0);">Authors</a>
											<ul class="sub-menu">
												@foreach($authors as $author)
												<li><a href="{{url('/writer/'.$author->id)}}">{{$author->first_name.' '.$author->last_name}}</a></li>
												@endforeach
											</ul>
										</li>
										<li><a href="javascript:void(0);">Best Selling</a></li>
										<li><a href="javascript:void(0);">Weekly Sale</a></li>
										<!-- <li class="menu-item-has-children">
											<a href="javascript:void(0);">Latest News</a>
											<ul class="sub-menu">
												<li><a href="newslist.html">News List</a></li>
												<li><a href="newsgrid.html">News Grid</a></li>
												<li><a href="newsdetail.html">News Detail</a></li>
											</ul>
										</li>
										<li><a href="contactus.html">Contact</a></li>
										<li class="menu-item-has-children current-menu-item">
											<a href="javascript:void(0);"><i class="icon-menu"></i></a>
											<ul class="sub-menu">
												<li class="menu-item-has-children">
													<a href="aboutus.html">Products</a>
													<ul class="sub-menu">
														<li><a href="products.html">Products</a></li>
														<li><a href="productdetail.html">Product Detail</a></li>
													</ul>
												</li>
												<li><a href="aboutus.html">About Us</a></li>
												<li><a href="404error.html">404 Error</a></li>
												<li><a href="comingsoon.html">Coming Soon</a></li>
											</ul>
										</li> -->
									</ul>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>