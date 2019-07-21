@extends('layouts.siteLayout.site')

@section('content')

<main id="tg-main" class="tg-main tg-haslayout">
			<!--************************************
					Contact Us Start
			*************************************-->
			<div class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-contactus">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="tg-sectionhead">
                                    @if(Session::has('flash-message-s'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" aria-label="Close">x</button>
                                        {!!session::get('flash-message-s')!!}
                                    </div>
                                    @endif
                                    @if(Session::has('flash-message-e'))
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" aria-label="Close">x</button>
                                        {!!session::get('flash-message-e')!!}
                                    </div>
                                    @endif
									<h2><span>Log in or Register</h2>
								</div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
								<form class="tg-formtheme tg-formcontactus" action="{{url('/reg-login')}}" method="post">
								{{csrf_field()}}
                                            <div class="form-group">
                                                <input type="text" name="email" class="form-control" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="password" class="form-control" placeholder="Password">
                                            </div>
                                            <div class="form-group">
											<button type="submit" class="tg-btn tg-active">Login</button>
                                            </div>
                                </form>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">
                            </div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
								<form class="tg-formtheme tg-formcontactus" method="post" action="{{url('/user/register')}}" id="userRegister">
                                {{csrf_field()}}        
                                        <div class="form-group">
											<input type="text" name="first_name" class="form-control" placeholder="First Name*">
										</div>
										<div class="form-group">
											<input type="text" name="last_name" class="form-control" placeholder="Last Name*">
										</div>
										<div class="form-group">
											<input type="email" name="email" class="form-control" placeholder="Email">
                                        </div>
                                        <div class="form-group">
											<input type="text" name="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-group">
											<input type="text" name="confirm_pwd" class="form-control" placeholder="Confirm password">
										</div>
										<div class="form-group">
											<button type="submit" class="tg-btn tg-active">Register</button>
										</div>
                                </form>
                                <a href="{{url('/author/register')}}">Are you an author ? Register here</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--************************************
					Contact Us End
			*************************************-->
</main>

@endsection