<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/header.css" />
		<link rel="stylesheet" href="css/footer.css" />
		<link rel="stylesheet" href="css/contact.css" />
		<link rel="stylesheet" href="css/expenditurereport.css" />
		<link
			rel="stylesheet"
			href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
			integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
			crossorigin="anonymous"
		/>
		<link
			href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap"
			rel="stylesheet"
		/>
		<link
			href="https://fonts.googleapis.com/css?family=Mukta:700|Roboto+Slab&display=swap"
			rel="stylesheet"
		/>
		<script
			src="https://kit.fontawesome.com/8f691340fb.js"
			crossorigin="anonymous"
		></script>
		<title>ExpenseNg</title>
	</head>
	<body>
		<!-- navbar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#"
					><img
						src="img/Group 380.svg"
						class="logo1"
						alt="logo"
						srcset="" /><img
						src="img/Frame 384.svg"
						class="logo2"
						alt="logo"
						srcset=""
				/></a>

				<button
					class="navbar-toggler"
					type="button"
					data-toggle="collapse"
					data-target="#navbarNavDropdown"
					aria-controls="navbarNavDropdown"
					aria-expanded="false"
					aria-label="Toggle navigation"
				>
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="index.html">Home</a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="#"
								>Expenditure Report<span class="sr-only">(current)</span></a
							>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Ministry Info</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Company Info</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contact.html">Reference</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<!-- banner -->
		<div class="banner-section">
			<div class="home-banner">
				<div class="container">Expenditure Report</div>
			</div>
			<div class="banner">
				<div class="container">
					<h1>Expenditure Report</h1>
					<p
						>Explore the amount allocated to every ministry in both graphical
						and tabular format. Increase your knowledge about how much each
						ministry gets allocated every month. and how much they spend.</p
					>
				</div>
			</div>
		</div>

		<br />
		<br />

		<!-- The chart Begins -->
		<section class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="outsidegraph">
						<div class="graph">
							<span class="date">20th, May 2020</span>
							<span class="amount">Amount Awarded (Billions)</span>
							<div class="graphbody">
								<div class="graphlines">
									<div class="graphline"></div>
									<div class="graphline"></div>
									<div class="graphline"></div>
									<div class="graphline"></div>
									<div class="graphline"></div>
									<div class="graphline"></div>
									<div class="graphline"></div>
									<div class="graphline"></div>
									<div class="graphline"></div>
									<div class="graphline"></div>
									<div class="numbers">
										<div>10</div>
										<div>9</div>
										<div>8</div>
										<div>7</div>
										<div>6</div>
										<div>5</div>
										<div>4</div>
										<div>3</div>
										<div>2</div>
										<div>1</div>
									</div>
								</div>
								<div class="graphlabel">
									<span>Highest funds</span>
									<span>8.7bn</span>
								</div>
								<svg
									width="572"
									height="359"
									viewBox="0 0 572 359"
									fill="none"
									xmlns="http://www.w3.org/2000/svg"
								>
									<path
										d="M114.786 38.269L0.733398 52.144V358.48H571.51V52.144L548.956 133.217L499.746 99.4819H416.193L332.64 44.5264L260.876 65.7468L214.5 9L114.786 38.269Z"
										fill="url(#paint0_linear)"
										fill-opacity="0.16"
									/>
									<path
										d="M1 54.0485L112.5 39.0853L214.5 9.5L261.433 65.4749L332.05 46.7029L418.861 101.386H501.159L550.273 137.026L570.183 55.6808"
										stroke="#00945E"
										stroke-width="1.63234"
									/>
									<ellipse
										cx="214.765"
										cy="4.89703"
										rx="4.76529"
										ry="4.89703"
										fill="#338164"
									/>
									<line
										x1="214.5"
										y1="10"
										x2="214.5"
										y2="358"
										stroke="#004A2F"
										stroke-dasharray="2 2"
									/>
									<defs>
										<linearGradient
											id="paint0_linear"
											x1="286.122"
											y1="-1.72339"
											x2="286.122"
											y2="358.481"
											gradientUnits="userSpaceOnUse"
										>
											<stop stop-color="#00935D" />
											<stop
												offset="0.75"
												stop-color="#00945E"
												stop-opacity="0"
											/>
										</linearGradient>
									</defs>
								</svg>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<br />
		<br />

		<!---TABLE BEGINS--->
		<section class="container">
			<div class="table-section reponsive-div">
				<div class="main-table">
					<div class="table-top">
						<h3>Daily Expenditure</h3>
						<h5
							>20th May, 2020 &nbsp;
							<button>Filter <i class="fas fa-filter"></i></button
						></h5>
					</div>

					<div class="table-data">
						<div style="overflow-x: auto;">
							<table>
								<tr>
									<th>Projects</th>
									<th>Ministry</th>
									<th>Company</th>
									<th>Amount</th>
									<th>Date</th>
								</tr>
								<tr>
									<td class="profileSummary">Rehabilitation of Lagos</td>
									<td>Transport</td>
									<td>Julius Beger</td>
									<td>₦806,650,320</td>
									<td>20th May, 2020</td>
								</tr>
								<tr>
									<td class="profileSummary">Building of Class Blocks</td>
									<td>Education</td>
									<td>Samsung</td>
									<td>₦806,650,320</td>
									<td>20th May, 2020</td>
								</tr>
								<tr>
									<td class="profileSummary">Rehabilitation of Lagos</td>
									<td>Transport</td>
									<td>Julius Beger</td>
									<td>₦806,650,320</td>
									<td>20th May, 2020</td>
								</tr>
								<tr>
									<td class="profileSummary">Building of Class Blocks</td>
									<td>Education</td>
									<td>Samsung</td>
									<td>₦806,650,320</td>
									<td>20th May, 2020</td>
								</tr>
								<tr>
									<td class="profileSummary">Rehabilitation of Lagos</td>
									<td>Transport</td>
									<td>Julius Beger</td>
									<td>₦806,650,320</td>
									<td>20th May, 2020</td>
								</tr>
								<tr>
									<td class="profileSummary">Building of Class Blocks</td>
									<td>Education</td>
									<td>Samsung</td>
									<td>₦806,650,320</td>
									<td>20th May, 2020</td>
								</tr>
								<tr>
									<td class="profileSummary">Rehabilitation of Lagos</td>
									<td>Transport</td>
									<td>Julius Beger</td>
									<td>₦806,650,320</td>
									<td>20th May, 2020</td>
								</tr>
								<tr>
									<td class="profileSummary">Building of Class Blocks</td>
									<td>Education</td>
									<td>Samsung</td>
									<td>₦806,650,320</td>
									<td>20th May, 2020</td>
								</tr>
								<tr>
									<td class="profileSummary">Rehabilitation of Lagos</td>
									<td>Transport</td>
									<td>Julius Beger</td>
									<td>₦806,650,320</td>
									<td>20th May, 2020</td>
								</tr>
								<tr>
									<td class="profileSummary">Building of Class Blocks</td>
									<td>Education</td>
									<td>Samsung</td>
									<td>₦806,650,320</td>
									<td>20th May, 2020</td>
								</tr>
								<tr>
									<td class="profileSummary">Rehabilitation of Lagos</td>
									<td>Transport</td>
									<td>Julius Beger</td>
									<td>₦806,650,320</td>
									<td>20th May, 2020</td>
								</tr>
								<tr>
									<td class="profileSummary">Building of Class Blocks</td>
									<td>Education</td>
									<td>Samsung</td>
									<td>₦806,650,320</td>
									<td>20th May, 2020</td>
								</tr>
								<tr>
									<td class="profileSummary">Rehabilitation of Lagos</td>
									<td>Transport</td>
									<td>Julius Beger</td>
									<td>₦806,650,320</td>
									<td>20th May, 2020</td>
								</tr>
								<tr>
									<td class="profileSummary">Building of Class Blocks</td>
									<td>Education</td>
									<td>Samsung</td>
									<td>₦806,650,320</td>
									<td>20th May, 2020</td>
								</tr>
							</table>
						</div>
					</div>
					<!---PAGINATION--->
					<div class="table-footer">
						<span> 1-20 of 320 results </span>
						<div class="pagination">
							<a href="#">&#8249;</a>
							<a class="active" href="#">1</a>
							<a href="#">2</a>
							<a href="#">3</a>
							<a href="#">..</a>
							<a href="#">6</a>
							<a href="#">&#8250;</a>
						</div>
					</div>
				</div>
			</div>
			<!---TABLE ENDS--->
		</section>

		<!-- Pop up for project summary -->

		<section class="section-wrapper">
			<div class="section-container">
				<div class="section-img">
					<img src="img/Julius-Berger 1.svg" alt="user avatar">
				</div>
				<div class="section-write-up">
					<div class="project-date">
						<div class="projects">
							<p class="project small-font">Project</p>
							<p class="project-name big-font">Rehabilitation Of Lagos Ibadan Expressway</p>
						</div>
						<div class="dates">
							<p class="date big-font">20th, May 2020</p>
						</div>
					</div>
		
					<div class="company-info">
						<div class="company">
							<p class="small-font">Contracted Company</p>
							<p class="big-font">Julius Berger</p>
						</div>
						<div class="company">
							<p class="small-font">Company CEO</p>
							<p class="big-font">Julius Berger</p>
						</div>
						<div class="company last">
							<p class="small-font">Company Twitter Handle</p>
							<p class="big-font">@fedmintransport</p>
						</div>
					</div>
		
					<div class="ministry-info">
						<div class="ministry">
							<div class="ministry-name">
								<p class="small-font">Contracting Ministry</p>
								<p class="big-font">Ministry of Transportation</p>
							</div>
							<div class="ministry-name">
								<p class="small-font">Ministry Twitter Handle</p>
								<p class="big-font">@fedmintransport</p>
							</div>
						</div>
						<div class="minister">
							<div class="minister-name">
								<p class="small-font">Minister</p>
								<p class="big-font">Mohammed Musa Bello</p>
							</div>
							<div class="minister-name">
								<p class="small-font">Minister Twitter Handle</p>
								<p class="big-font">@mohammedbello</p>
							</div>
						</div>
					</div>
	
					<div class="btns">
						<div class="share-button">
							<div class="btn">
								<a href="#" class="share small-font">Share</a>
								<img src="img/Vector.svg" alt="user avatar">
							</div>
						</div>
						<div class="close-button">
							<div class="btn">
								<a href="#" class="share small-font">Close</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- footer -->
		<footer>
			<div class="main-footer-wrapper">
				<div class="main-box1">
					<div class="brand-logo"> <img src="img/logo.png" /><br /> </div>
					<div class="twitter">
						<img src="img/twitter-logo.png" />
						<a href="#">@expenseng</a>
					</div>
				</div>
				<div class="main-box2">
					<div class="box1">
						<h4>About Us</h4>
						<a href="#">About Expenseng.com</a>
						<a href="#">Contact Us</a>
					</div>
					<div class="box2">
						<h4>Pages</h4>
						<a href="#">Home</a>
						<a href="#">Daily Payment Report</a>
						<a href="#">Companies</a>
						<a href="#">Ministry</a>
					</div>
				</div>
			</div>
			<div class="last-footer">
				<ul>
					<li><a href="#">Accessibility |</a></li>
					<li><a href="#">&nbspPrivacy Policy |</a></li>
					<li><a href="#">&nbspFreedom of Information Act</a></li>
					<li class="push">
						<a href="#">&#169; 2020 EXPENSENG.com</a>
					</li>
				</ul>
			</div>
		</footer>
		<!-- jquery -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<!--Scripts for chart-->

		<!-- custom script -->

		<script src="js/main.js"></script>
		<script src="./js/ExpenditureScript.js"></script>
	</body>
</html>
