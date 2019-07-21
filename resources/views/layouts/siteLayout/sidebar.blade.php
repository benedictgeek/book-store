<?php

use App\Category;

    $categories = Category::with('booksTotal')->get();

    $forcatbybooks = [];

    foreach($categories as $key=>$value){
        $forcatbybooks[$value->category_name.' '.$value->url] = $value->booksTotal->count();
    }
    arsort($forcatbybooks);
    $n = 0;

?>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
								<aside id="tg-sidebar" class="tg-sidebar">
									<div class="tg-widget tg-widgetsearch">
										<form method="post" class="tg-formtheme tg-formsearch" action="{{url('search')}}">
											<div class="form-group">
												<button type="submit"><i class="icon-magnifier"></i></button>
												<input class="typeahead form-control" type="search" name="search"  placeholder="Search">
											</div>
										</form>
									</div>
									<div class="tg-widget tg-catagories">
										<div class="tg-widgettitle">
											<h3>Categories</h3>
										</div>
										<div class="tg-widgetcontent">
											<ul>
                                                @foreach($forcatbybooks as $key=>$value)
                                                <li><a href="{{url('/books/'.explode(' ',$key)[1])}}"><span>{{explode(' ',$key)[0]}}</span><em>{{$value}}</em></a></li>
                                                <?php 
                                                $n = $n + 1;
                                                ?>
                                                @if($n==5)
                                                @break
                                                @endif
												@endforeach
												<li><a href="{{url('/books')}}"><span>View all</span></a></li>
											</ul>
										</div>
									</div>
									<!-- <div class="tg-widget tg-widgettrending">
										<div class="tg-widgettitle">
											<h3>Trending Products</h3>
										</div>
										<div class="tg-widgetcontent">
											<ul>
												<li>
													<article class="tg-post">
														<figure><a href="javascript:void(0);"><img src="images/products/img-04.jpg" alt="image description"></a></figure>
														<div class="tg-postcontent">
															<div class="tg-posttitle">
																<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
															</div>
															<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														</div>
													</article>
												</li>
												<li>
													<article class="tg-post">
														<figure><a href="javascript:void(0);"><img src="images/products/img-05.jpg" alt="image description"></a></figure>
														<div class="tg-postcontent">
															<div class="tg-posttitle">
																<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
															</div>
															<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														</div>
													</article>
												</li>
												<li>
													<article class="tg-post">
														<figure><a href="javascript:void(0);"><img src="images/products/img-06.jpg" alt="image description"></a></figure>
														<div class="tg-postcontent">
															<div class="tg-posttitle">
																<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
															</div>
															<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														</div>
													</article>
												</li>
												<li>
													<article class="tg-post">
														<figure><a href="javascript:void(0);"><img src="images/products/img-07.jpg" alt="image description"></a></figure>
														<div class="tg-postcontent">
															<div class="tg-posttitle">
																<h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
															</div>
															<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
														</div>
													</article>
												</li>
											</ul>
										</div>
									</div> -->
								</aside>
							</div>