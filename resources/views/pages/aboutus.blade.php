@extends('layouts.master')
@push('css')
<title>FG Expense - About</title>
<link rel="stylesheet" href="{{asset('css/breadcrumb.css') }}">
<link rel="stylesheet" href="{{ asset('css/aboutus.style.css')}}">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-174166304-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-174166304-1');
</script>

@endpush

@section('content')
    <div class="container">
        {{ Breadcrumbs::render('about') }}
    </div>
<main role="main" class="">

	<svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg" class="black_tr d-lg-block sla d-md-block d-sm-none">
		<path d="M0.871167 4.9915L9.97402 1.64165L14.0098 0.156494L5.70617 18.1301L0.871167 4.9915Z" fill="#353A45" />
	</svg>

	<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="green_bottom d-lg-block sla d-md-block d-sm-none">
		<path d="M0 18V5.52901V0L18 18H0Z" fill="#00945E" />
	</svg>

	<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="green_right d-lg-block sla d-md-block d-sm-none">
		<path d="M0 18V5.52901V0L18 18H0Z" fill="#00945E" />
	</svg>

	<section class="hero">

		<div class="container">

			<div class="row d-flex justify-content-between">
				<div class="col-lg-8 col-md-8 col-sm-12 left">
					<h1 class="section-big-font">About ExpenseNG</h1>

					<p class="paragraph-small-font">
						Expenseng.com is a dedicated expense tracker and allows for transparency on all national budgets and government spending.
						Tracking federal spending to ensure citizens can see how their money is being used in communities across Nigeria.
						It was created to promote transparency and accountability in government operations and transactions.
					</p>

					<div class="twitter">
						<a href="https://twitter.com/expenseng" target="_blank">
							<img src="{{ asset('images/aboutus/twitter.jpg') }}" alt="">
						</a>
					</div>

				</div>
				<div class="col-lg-3 col-md-3 right d-lg-block d-md-block sla d-sm-none">

					<div class="image_div">
						<svg width="169" height="145" viewBox="0 0 189 165" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M13.0419 112.501L41.5994 108.282L23.6667 85.6596L13.0419 112.501ZM175.179 8.39052L146.639 12.7304L164.667 35.2763L175.179 8.39052ZM91.4781 50.3232L93.6103 49.018L92.1368 46.6108L89.9251 48.3641L91.4781 50.3232ZM101.751 67.1048L99.6186 68.41L101.098 70.8275L103.312 69.0573L101.751 67.1048ZM32.2269 100.483L93.0311 52.2823L89.9251 48.3641L29.1209 96.5645L32.2269 100.483ZM89.3459 51.6284L99.6186 68.41L103.883 65.7996L93.6103 49.018L89.3459 51.6284ZM103.312 69.0573L159.167 24.3946L156.045 20.4895L100.19 65.1523L103.312 69.0573Z" fill="#00945E" />
							<path d="M13.0419 156.501L41.5994 152.282L23.6667 129.66L13.0419 156.501ZM175.179 52.3905L146.639 56.7304L164.667 79.2763L175.179 52.3905ZM91.4781 94.3232L93.6103 93.018L92.1368 90.6108L89.9251 92.3641L91.4781 94.3232ZM101.751 111.105L99.6186 112.41L101.098 114.827L103.312 113.057L101.751 111.105ZM32.2269 144.483L93.0311 96.2823L89.9251 92.3641L29.1209 140.564L32.2269 144.483ZM89.3459 95.6284L99.6186 112.41L103.883 109.8L93.6103 93.018L89.3459 95.6284ZM103.312 113.057L159.167 68.3946L156.045 64.4895L100.19 109.152L103.312 113.057Z" fill="#353A45" />
						</svg>
					</div>
				</div>
			</div>

		</div>

	</section>

	{{-- Overlay Section --}}

	<section class="overlay_section">
		<div class="container col-md-7 col-sm-9 text-center">
			<p class="paragraph-big-font">We help increase your knowledge about how much each ministry gets allocated every month. and how much they spend.</p>
		</div>
	</section>


	{{-- Mission Vision Section --}}

	<section class="mission_vision">

		<div class="container">
			<div class="row d-flex justify-content-around">
				<div class="col-lg-5 col-md-5 col-sm-12">
					<div class="mission_img stunts">
						<img src="{{ asset('images/aboutus/our_mission.jpg') }}" alt="">
					</div>
				</div>
				<div class="col-lg-5 col-md-5 col-sm-12 mission_text d-flex flex-column justify-content-center">
					<h2 class="section-small-font">
						Our Mission
					</h2>
					<p class="paragraph-small-font">
						Bringing transparency to government. We’re simplifying and creating access of Government funds to citizens on how the spending of the funds allocated to them is being put to improvve the economy.
					</p>
				</div>
			</div>

			<div class="row d-flex justify-content-around">
				<div class="col-lg-5 col-md-5 col-sm-12 vision_text d-flex flex-column justify-content-center">

					<h2 class="section-small-font">
						Our Vision
					</h2>
					<p class="paragraph-small-font">
						We believe that all Nigerian Citizens will have direct access to know where their Tax money goes to and the list of projects the Nigerian Government is working on.
					</p>

				</div>

				<div class="col-lg-5 col-md-5 col-sm-12">
					<div class="vision_img stunts">
						<img src="{{ asset('images/aboutus/our_vision.jpg') }}" alt="">

					</div>

				</div>

			</div>

		</div>

	</section>

	{{-- Policy Section --}}

	<section class="policy">
		<div class="container">

			<h2 class="section-big-font">
				Policy Objectives
			</h2>

			<div class="commit contents stunts">
				<h3 class="section-small-font">
					Government Commitment to Transparency
				</h3>

				<p class="paragraph-small-font">
					A financial transparency policy will cement government commitment at improving governance and supplement the recently launched Whistleblower Policy and equip the general population with the tools they need to report financial wrongdoing. Furthermore, the government has also pledged to ensure full implementation of the Freedom of Information Act so that government held data sets can be requested and used by the media and the public at large, and then published on regular basis.
					These guidelines are in fulfillment of the Presidents promise to Nigerians in an effort to build public trust in Government.
				</p>

			</div>
			<div class="partner contents stunts">
				<h3 class="section-small-font">
					Partnership Building for the Fight against Corruption
				</h3>

				<p class="paragraph-small-font">
					To facilitate the fight against corruption, it is crucial that more transparency is not only encouraged but also enforced at all levels. These guidelines are aimed at enabling timely availability of financial information to the civil society organizations and the public at large by all MDAs of the Federal Government. Through this initiative, the foundation for a strong partnership against corruption will be laid.
				</p>
			</div>
			<div class="setting contents stunts">
				<h3 class="section-small-font">
					Setting the Threshold for Transparency.
				</h3>

				<p class="paragraph-small-font">
					These guidelines are also aimed at setting the minimum requirements for financial transparency by all MDAs. While full and complete disclosure should be encouraged, a minimum needs to be set to ensure that non-compliance can be established and addressed.
				</p>
			</div>
			<div class="responsible contents stunts">
				<h3 class="section-small-font">
					Defining Responsibility for Transparency
				</h3>

				<p class="paragraph-small-font">
					These guidelines are also targeted at setting the deadlines and allocation responsibility for financial transparency.
					In addition to the responsibility for publication outlined in section 2.2, all MDAs are required to promptly respond to additional requests for information beyond what is published.
				</p>
			</div>

		</div>


	</section>

</main>

@endsection

@section('js')
<script type="text/javascript">
	// Detect request animation frame
	var scroll = window.requestAnimationFrame ||
		// IE Fallback
		function(callback) {
			window.setTimeout(callback, 1000 / 60)
		};
	var elementsToShow = document.querySelectorAll('.stunts');

	function loop() {

		Array.prototype.forEach.call(elementsToShow, function(element) {
			if (isElementInViewport(element)) {
				element.classList.add('is-visible');
			} else {
				element.classList.remove('is-visible');
			}
		});

		scroll(loop);
	}

	// Call the loop for the first time
	loop();

	// Helper function from: http://stackoverflow.com/a/7557433/274826
	function isElementInViewport(el) {
		// special bonus for those using jQuery
		if (typeof jQuery === "function" && el instanceof jQuery) {
			el = el[0];
		}
		var rect = el.getBoundingClientRect();
		return (
			(rect.top <= 0 &&
				rect.bottom >= 0) ||
			(rect.bottom >= (window.innerHeight || document.documentElement.clientHeight) &&
				rect.top <= (window.innerHeight || document.documentElement.clientHeight)) ||
			(rect.top >= 0 &&
				rect.bottom <= (window.innerHeight || document.documentElement.clientHeight))
		);
	}
</script>
<script src="{{ asset('js/index.js') }}"></script>

@endsection
