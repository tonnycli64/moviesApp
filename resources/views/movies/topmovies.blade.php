@extends('layouts.app')

@section('content')



         @include('partials.breadcrub')





		<!-- portfolio section start -->
		<section class="portfolio-area pt-60">
			<div class="container">
				<div class="row flexbox-center">
					<div class="col-lg-6 text-center text-lg-left">
					    <div class="section-title">
							<h1><i class="icofont icofont-movie"></i> Spotlight This Month</h1>
						</div>
					</div>
					<div class="col-lg-6 text-center text-lg-right">
					    <div class="portfolio-menu">
							<ul>
								<li data-filter="*" class="active">Latest</li>
								<li data-filter=".soon">Comming Soon</li>
								<li data-filter=".top">Top Rated</li>
								<li data-filter=".released">Recently Released</li>
							</ul>
						</div>
					</div>
				</div>
				<hr />
				<div class="row portfolio-item">
					<div class="col-lg-3 col-md-4 col-sm-6 soon released">
						<div class="single-portfolio">
							<div class="single-portfolio-img">
								<img src="assets/img/portfolio/portfolio1.png" alt="portfolio" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="portfolio-content">
								<h2>Boyz II Men</h2>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k voters</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 top">
						<div class="single-portfolio">
							<div class="single-portfolio-img">
								<img src="assets/img/portfolio/portfolio2.png" alt="portfolio" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="portfolio-content">
								<h2>Tale of Revemge</h2>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k voters</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 soon">
						<div class="single-portfolio">
							<div class="single-portfolio-img">
								<img src="assets/img/portfolio/portfolio3.png" alt="portfolio" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="portfolio-content">
								<h2>The Lost City of Z</h2>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k voters</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 top released">
						<div class="single-portfolio">
							<div class="single-portfolio-img">
								<img src="assets/img/portfolio/portfolio4.png" alt="portfolio" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="portfolio-content">
								<h2>Beast Beauty</h2>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k voters</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 released">
						<div class="single-portfolio">
							<div class="single-portfolio-img">
								<img src="assets/img/portfolio/portfolio5.png" alt="portfolio" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="portfolio-content">
								<h2>In The Fade</h2>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k voters</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 soon top">
						<div class="single-portfolio">
							<div class="single-portfolio-img">
								<img src="assets/img/portfolio/portfolio6.png" alt="portfolio" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="portfolio-content">
								<h2>Last Hero</h2>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k voters</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 soon">
						<div class="single-portfolio">
							<div class="single-portfolio-img">
								<img src="assets/img/portfolio/portfolio3.png" alt="portfolio" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="portfolio-content">
								<h2>The Lost City of Z</h2>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k voters</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 top released">
						<div class="single-portfolio">
							<div class="single-portfolio-img">
								<img src="assets/img/portfolio/portfolio4.png" alt="portfolio" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="portfolio-content">
								<h2>Beast Beauty</h2>
								<div class="review">
									<div class="author-review">
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
										<i class="icofont icofont-star"></i>
									</div>
									<h4>180k voters</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- portfolio section end -->
		<!-- video section start -->
		<section class="video ptb-90">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
					    <div class="section-title pb-20">
							<h1><i class="icofont icofont-film"></i> Trailers & Videos</h1>
						</div>
					</div>
				</div>
				<hr />
				<div class="row">
                    <div class="col-md-12">
						<div class="video-slider mt-20">
							<div class="video-area">
								<img src="assets/img/video/video2.png" alt="video" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="video-area">
								<img src="assets/img/video/video3.png" alt="video" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="video-area">
								<img src="assets/img/video/video4.png" alt="video" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="video-area">
								<img src="assets/img/video/video5.png" alt="video" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="video-area">
								<img src="assets/img/video/video2.png" alt="video" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="video-area">
								<img src="assets/img/video/video3.png" alt="video" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="video-area">
								<img src="assets/img/video/video4.png" alt="video" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
							<div class="video-area">
								<img src="assets/img/video/video5.png" alt="video" />
								<a href="https://www.youtube.com/watch?v=RZXnugbhw_4" class="popup-youtube">
									<i class="icofont icofont-ui-play"></i>
								</a>
							</div>
						</div>
                    </div>
				</div>
			</div>
		</section><!-- video section end -->








@endsection