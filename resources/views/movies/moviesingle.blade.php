@extends('layouts.app')

@section('content')


         @include('partials.breadcrub')


		<!-- transformers area start -->
		<section class="transformers-area">
			<div class="container">
				<div class="transformers-box">
					<div class="row flexbox-center">
						<div class="col-lg-5 text-lg-left text-center">
							<div class="transformers-content">
								<img src="assets/img/slide2.png" alt="about" />
							</div>
						</div>
						<div class="col-lg-7">
							<div class="transformers-content">
								<h2>The Transformers</h2>
								<p>3D | Animation | Action | Sci-Fi</p>
								<ul>
									<li>
										<div class="transformers-left">
											Movie:
										</div>
										<div class="transformers-right">
											<a href="#">Sci-Fic</a>
										</div>
									</li>
									<li>
										<div class="transformers-left">
											Writer:
										</div>
										<div class="transformers-right">
											Stephen McFeely, Christopher Markus
										</div>
									</li>
									<li>
										<div class="transformers-left">
											Director:
										</div>
										<div class="transformers-right">
											Joe Johnston
										</div>
									</li>
									<li>
										<div class="transformers-left">
											Time: 
										</div>
										<div class="transformers-right">
											190m
										</div>
									</li>
									<li>
										<div class="transformers-left">
											Release:
										</div>
										<div class="transformers-right">
											2018-07-22
										</div>
									</li>
									<li>
										<div class="transformers-left">
											Language:
										</div>
										<div class="transformers-right">
											English, Russian
										</div>
									</li>
									<li>
										<div class="transformers-left">
											Cinema:
										</div>
										<div class="transformers-right">
											HB Movies  |  HW Town <a href="#" class="theme-btn">Movies House</a>Grand Seats  |  HB Max
											<div class="transformers-bottom">
												<p>May 19, 2018 <span>15h47</span></p>
												<p>May 19, 2018 <span>15h47</span></p>
												<p>May 19, 2018 <span>15h47</span></p>
											</div>
											
										</div>
									</li>
									<li>
										<div class="transformers-left">
											Share:
										</div>
										<div class="transformers-right">
											<a href="#"><i class="icofont icofont-social-facebook"></i></a>
											<a href="#"><i class="icofont icofont-social-twitter"></i></a>
											<a href="#"><i class="icofont icofont-social-google-plus"></i></a>
											<a href="#"><i class="icofont icofont-youtube-play"></i></a>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<a href="#" class="theme-btn"><i class="icofont icofont-ticket"></i> BUY TICKET</a>
				</div>
			</div>
		</section><!-- transformers area end -->
		<!-- details area start -->
		<section class="details-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-9">
						<div class="details-content">
							<div class="details-overview">
								<h2>Overview</h2>
								<p>Humans are at war with the Transformers, and Optimus Prime is gone. The key to saving the future lies buried in the secrets of the past and the hidden history of Transformers on Earth. Now it's up to the unlikely alliance of inventor Cade Yeager, Bumblebee, a n English lord and an Oxford professor to save the world. Transformers: The Last Knight has a deeper mythos and bigger spectacle than its predecessors, yet still ends up being mostly hollow and cacophonous. The first "Transformers" movie that could actually be characterized as badass. Which isn't a bad thing. It may, in fact, be better.</p>
							</div>
							<div class="details-reply">
								<h2>Leave a Reply</h2>
								<form action="#">
									<div class="row">
										<div class="col-lg-4">
											<div class="select-container">
												<input type="text" placeholder="Name"/>
												<i class="icofont icofont-ui-user"></i>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="select-container">
												<input type="text" placeholder="Email"/>
												<i class="icofont icofont-envelope"></i>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="select-container">
												<input type="text" placeholder="Phone"/>
												<i class="icofont icofont-phone"></i>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="textarea-container">
												<textarea placeholder="Type Here Message"></textarea>
												<button><i class="icofont icofont-send-mail"></i></button>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div class="details-comment">
								<a class="theme-btn theme-btn2" href="#">Post Comment</a>
								<p>You may use these HTML tags and attributes: You may use these HTML tags and attributes: You may use these HTML tags and attributes: </p>
							</div>
							<div class="details-thumb">
								<div class="details-thumb-prev">
									<div class="thumb-icon">
										<i class="icofont icofont-simple-left"></i>
									</div>
									<div class="thumb-text">
										<h4>Previous Post</h4>
										<p>Standard Post With Gallery</p>
									</div>
								</div>
								<div class="details-thumb-next">
									<div class="thumb-text">
										<h4>Next Post</h4>
										<p>Standard Post With Preview Image</p>
									</div>
									<div class="thumb-icon">
										<i class="icofont icofont-simple-right"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 text-center text-lg-left">
					    <div class="portfolio-sidebar">
							<img src="assets/img/sidebar/sidebar1.png" alt="sidebar" />
							<img src="assets/img/sidebar/sidebar2.png" alt="sidebar" />
							<img src="assets/img/sidebar/sidebar4.png" alt="sidebar" />
						</div>
					</div>
				</div>
			</div>
		</section><!-- details area end -->


    










@endsection