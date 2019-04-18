@extends('usercalonmagang.app')

@section('content')
<section id="hero" style="position: relative">
		<div class="container position-relative">
			<img src="{{asset('frontend/images/4.svg')}}" class="img-fluid" alt="home" width="590" height="500">
			<div class="info-internship">
				<h1 class="font-rubik title">Internship</h1>
				<h2 id="subtitle">We Are Hiring For Internship</h2>
				<div style="margin-top: 33px;"> 
					<a class="btn btn-success btn-lg round" href="#position" role="button">Available Position</a>
				</div>
			</div>
		</div>
	</section>

	<section class="bg-section" id="activities">
		<div class="container">
			<h2 class="font-rubik subheading">Our <span>Activities</span></h2>
			<div class="customer-logos slider">
			@foreach($activity as $act)
			<div class="slide"><img src="{{ url('/storage'.str_replace('public','',$act->gambar)) }}"><span class="slide--title">{{$act->title}}</span></div>
			@endforeach
			</div>
		</div>
	</section>
	<section id="event">
		<div class="container">
			<h2 class="font-rubik subheading">Routine <span>Event</span></h2>
			<div class="row">
				<div class="col-lg-4">
					<img src="{{asset('frontend/images/daily.svg')}}" alt="daily meeting" width="315" height="224.58">
				</div>
				<div class="col-lg-5">
					<h2 class="font-rubik routine--title">Daily Goal Meeting</h2>
					<h3 class="routine--desc">Daily routine activities are conducting meetings
							to convey the target that day what you will work. 
							this activity makes communication 
							more open between individuals</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3"></div>
				<div class="col-lg-5">
						<h2 class="font-rubik routine--title text-right">Weekly Tech Talk</h2>
						<h3 class="routine--desc text-right">
								Weekly Tech Talk is a routine activity every once a week
								on Friday afternoon where there are mentors 
								who are experts in their fields,
								present something new with the open discuss system</h3>
				</div>
				<div class="col-lg-4">
					<img src="{{asset('frontend/images/tech.svg')}}" alt="tech talk" width="314.05" height="251.01">
				</div>
			</div>
			<h2 class="font-rubik subheading" id="benefits"><span>Benefits</span></h2>
			<div class="col-lg-11 bg-section bg-shadow">
				<div class="row">
					<div class="col-lg-3 benefits--style">
						<img src="{{asset('frontend/images/B1.png')}}" alt="public speaking" width="83" height="83">
						<h3 class="benefits--title">Public Speaking</h3>
						<p class="benefits--desc">You can learn to speak in public 
								with events that are always done,
								namely daily meetings and 
								weekly tech talks</p>
					</div>
					<div class="col-lg-1"></div>
					<div class="col-lg-3 benefits--style">
							<img src="{{asset('frontend/images/B2.png')}}" alt="sharing knowledge" width="83" height="83">
							<h3 class="benefits--title">Sharing Knowledge</h3>
							<p class="benefits--desc">You can share any knowledge 
									between employees and also 
									supported by the techtalk event.</p>
					</div>
					<div class="col-lg-1"></div>
					<div class="col-lg-3 benefits--style">
							<img src="{{asset('frontend/images/B3.png')}}" alt="team work" width="83" height="83">
							<h3 class="benefits--title">Team Work</h3>
							<p class="benefits--desc">You will learn how to work in a team. 
									About division of tasks, 
									communication within the team 
									and others</p>
					</div>
				</div>
				<div class="row">
						<div class="col-lg-3 benefits--style">
							<img src="{{asset('frontend/images/B4.png')}}" alt="expert mentor" width="83" height="83">
							<h3 class="benefits--title">Expert Mentor</h3>
							<p class="benefits--desc">You can learn to speak in public 
									with events that are always done,
									namely daily meetings and 
									weekly tech talks</p>
						</div>
						<div class="col-lg-1"></div>
						<div class="col-lg-3 benefits--style">
								<img src="{{asset('frontend/images/b5.png')}}" alt="Certificate" width="83" height="83">
								<h3 class="benefits--title">Get Certificate</h3>
								<p class="benefits--desc">You can share any knowledge 
										between employees and also 
										supported by the techtalk event.</p>
						</div>
						<div class="col-lg-1"></div>
						<div class="col-lg-3 benefits--style">
								<img src="{{asset('frontend/images/b6.png')}}" alt="public speaking" width="83" height="83">
								<h3 class="benefits--title">Recruitment</h3>
								<p class="benefits--desc">You will learn how to work in a team. 
										About division of tasks, 
										communication within the team 
										and others</p>
						</div>
					</div>
			</div>
		</div>
	</section>
	<section id="about">
		<div class="container">
			<h2 class="font-rubik subheading"><span>About</span> Us</h2>
			<div class="row">
				<div class="col-lg-6">
					<p>We are full-timers strategists, designers, technologists, 
							experts and part-timers thinkers, explorers, makers and 
							creators with full plate of experiences and high dose of 
							curiosity, creativity and passion. We’re serious about 
							delivering great outcomes. We strive to deliver
							intelligent-out of the box-competitive advantage products, 
							engaging experiences and exceptional outcomes for our 
							incredible clients.</p>
				</div>
				<div class="col-lg-1"></div>
				<div class="col-lg-5">
					<img src="{{asset('frontend/images/Untitled-1.png')}}" class="img-about__us img-fluid" alt="" width="381" height="245">
				</div>
			</div>
		</div>
	</section>
	<section id="position">
		<div class="container">		
			<h2 class="font-rubik subheading"><span>Position</span></h2>
			<?php
				$count_false = 0;
				$count_pos = count($posisi);
			?>
			<div class="card-deck card-position">
			@foreach($posisi as $pos)
				@if($pos->aksi == "true")
					<div class="item">
						<div class="card text-center card-style bg-shadow">
							<div class="card-body">
								<img src="{{ url('/storage'.str_replace('public','',$pos->gambar)) }}" alt="">
								<h5 class="card-title">{{$pos->nama_posisi}}</h5>
								<a href="{{ route('position-detail', $pos->id) }}" class="menu--item btn btn-success btn-lg round outline">Read More</a>
							</div>
						</div>
					</div>
				@else
					<?php
					if($pos->aksi == "false"){
						$count_false++;
					}
					?>
					@if($count_pos == $count_false)
						<div class="warning-position font-rubik" style="!important">
							<img src="{{asset('frontend/images/closed.png')}}" class="img-close" alt="">
							Pendaftaran sedang ditutup
						</div>
					@endif
				@endif	
			@endforeach
			</div>
		</div>
	</section>
	<section class="bg-section" id="testi">
		<div class="container">
			<h2 class="font-rubik subheading"><span>Testimonial</span></h2>
			<div class="card-deck single-item" >
				@foreach($testimoni as $testi)
				<div class="card text-center card-style--testi bg-shadow">
					<div class="card-body">
						<img src="{{Storage::url($testi->gambar)}}" alt="">
						<h5 class="card-title">{{ $testi->nama }}</h5>
						<h6>{{ $testi->posisi->nama_posisi }}</h6>
						<p>{{ $testi->content }} </p>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<section id="information" class="dark">
		<div class="container">
			<nav class="navbar">
				<h2 class="font-rubik subheading white">Information</h2>
				<div class="d-flex flex-row-reverse menu">
					<img class="menu--item" src="{{asset('frontend/images/DOT Logo white rectangle-01.png')}}" alt="logo" width="165" height="86">
				</div>
			</nav>
			<div class="row">
				<div class="col-lg-4">
					<p class="info--desc">DOT Techno Valley. Permata Hijau A.15 
							Tlogomas Malang</p>
					<a href="" class="btn btn-success btn-lg round outline--white">Malang Office</a>
					<p class="info--desc">Tofin - 081290090671 ( WA )</p>
					<a href="https://wa.me/+6281290090671" class="btn btn-success btn-lg round outline--white">Contact</a>
					<p class="info--desc">internship@dot-indonesia.com</p>
					<a href="#" class="btn btn-success btn-lg round outline--white">Email</a>
				</div>
				<div class="col-lg-1"></div>
				<div class="col-lg-7">
					<img class="info--pics img-fluid" src="{{asset('frontend/images/kopi.svg')}}" alt="Information" width="528" height="345.57">
				</div>
			</div>
			<footer>
				<div class="row">
					<div class="col-lg-5">
						<p style="color: white;">2019 All rights reserved. PT. Digdaya Olah Teknologi Indonesia</p>
					</div>
					<div class="col-lg-7">
						<ul class="social_footer_ul">
							<li><a class="white" href="https://www.linkedin.com/company/dot-indonesia/"><i class="fab fa-linkedin"></i></a></li>
							<li><a class="white" href="https://medium.com/dot-lab"><i class="fab fa-medium"></i></a></li>
							<li><a class="white" href="https://www.instagram.com/dot.indonesia/"><i class="fab fa-instagram"></i></a></li>
							<li><a class="white" href="https://www.facebook.com/dotindonesia/"><i class="fab fa-facebook-f"></i></a></li>
							<li><a class="white" href="https://dribbble.com/dot_indonesia"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</footer>
		</div>
	</section>

@endsection