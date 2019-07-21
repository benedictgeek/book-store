@extends('layouts.siteLayout.site')

@section('content')
<main id="tg-main" class="tg-main tg-haslayout">
			<!--************************************
					Authors Start
			*************************************-->
			<div class="tg-authorsgrid">
				<div class="container">
					<div class="row">
						<div class="tg-authors">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="tg-sectionhead">
									<h2><span>Meet Our Authors</h2>
								</div>
                            </div>
                            @foreach($authors as $author)
							<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
								<div class="tg-author">
									<figure><a href="{{url('writer/'.$author->id)}}"><img src="{{asset('image/backend_img/profile/'.$author->image)}}" alt="image description"></a></figure>
									<div class="tg-authorcontent">
										<h2><a href="{{url('writer/'.$author->id)}}">{{$author->first_name}} {{$author->last_name}}</a></h2>
										<span>{{$author->books->count()}} Books Published</span>
										<ul class="tg-socialicons">
											<li class="tg-facebook"><a href="{{$author->facebook}}"><i class="fa fa-facebook"></i></a></li>
											<li class="tg-twitter"><a href="{{$author->twitter}}"><i class="fa fa-twitter"></i></a></li>
											<li class="tg-linkedin"><a href="{{$author->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
										</ul>
									</div>
								</div>
                            </div>
                            @endforeach
                            {{$authors->links()}}
						</div>
					</div>
				</div>
			</div>
			<!--************************************
					Authors End
			*************************************-->
			<!--************************************
					Testimonials Start
			*************************************-->
			<section class="tg-parallax tg-bgtestimonials tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-05.jpg">
				<div class="tg-sectionspace tg-haslayout">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-push-2">
								<div id="tg-testimonialsslider" class="tg-testimonialsslider tg-testimonials owl-carousel">
									<div class="item tg-testimonial">
										<figure><img src="{{asset('image/frontend_img/author/imag-02.jpg')}}" alt="image description"></figure>
										<blockquote><q>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore tolore magna aliqua enim ad minim veniam, quis nostrud exercitation ullamcoiars nisi ut aliquip commodo.</q></blockquote>
										<div class="tg-testimonialauthor">
											<h3>Holli Fenstermacher</h3>
											<span>Manager @ CIFP</span>
										</div>
									</div>
									<div class="item tg-testimonial">
										<figure><img src="{{asset('image/frontend_img/author/imag-02.jpg')}}" alt="image description"></figure>
										<blockquote><q>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore tolore magna aliqua enim ad minim veniam, quis nostrud exercitation ullamcoiars nisi ut aliquip commodo.</q></blockquote>
										<div class="tg-testimonialauthor">
											<h3>Holli Fenstermacher</h3>
											<span>Manager @ CIFP</span>
										</div>
									</div>
									<div class="item tg-testimonial">
										<figure><img src="{{asset('image/frontend_img/author/imag-02.jpg')}}"></figure>
										<blockquote><q>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore tolore magna aliqua enim ad minim veniam, quis nostrud exercitation ullamcoiars nisi ut aliquip commodo.</q></blockquote>
										<div class="tg-testimonialauthor">
											<h3>Holli Fenstermacher</h3>
											<span>Manager @ CIFP</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Testimonials End
			*************************************-->
</main>
@endsection