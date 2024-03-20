
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TheConcept Online Clothing</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
		.header-icons{
			position: relative;
		}
		.header-icons:hover .dropdown-content{
			display: block;
		}
		.dropdown-content{
			padding: 5px 0;
			position: absolute;
			display: none;
			text-align: left;
			background: white ;
			width: 100%;
		}
		.dropdown-content > a{
			color: black;
			font-weight: 500;
			padding: 10px;
			display: block;
		}	
		.dropdown-content > a:hover{
			color: var(--main-color);
		}
	</style>
</head>
<body>
	
	<header>
		<a href="#" class="logo">TheConcept</a>

		<ul class="navlist">
			<li><a href="#home">Home</a></li>
			<li><a href="#featured">Featured</a></li>
			<li><a href="#new">New</a></li>
			<li><a href="#contact">Contact</a></li>
		</ul>

		<div class="header-icons">
			<a href="#"><i class='bx bx-shopping-bag'></i></a>
			<a class="navbar-action-btn">Log In</a>
			<div class="dropdown-content">
				<a href="html/forms/login.php" class="navbar-action-btn">User</a>
				<a href="html/forms/admin.php" class="navbar-action-btn">Admin</a>
			</div>
		</div>
	</header>
	<section class="home" >
		<div class="home-text">
			<h1>Built For Summer <br></h1>
			<a href="html/forms/login.php" class="btn">Shop Now</a>
		</div>
	</section> 

	<section class="featured" id="featured">
		<div class="center-text">
			<h2>Featured Categories</h2>
		</div>

		<div class="featured-content">
			<div class="row">
				<img src="images/fea1.jpg">
				<center><h3>Full Sized Coat</h3>
				<h4>Nrs.3000</h4></center>
				<div class="arrow">
					<a href="#"><i class='bx bx-right-arrow-alt' ></i></a>
				</div>
			</div>

			<div class="row">
				<img src="images/fea2.jpg">
				<center><h3>Bomber Jacket</h3>
				<h4>Nrs.2500</h4></center>
				<div class="arrow">
					<a href="#"><i class='bx bx-right-arrow-alt' ></i></a>
				</div>
			</div>

			<div class="row">
				<img src="images/fea7.jpg">
			<center><h3>Full Shirt</h3>
				<h4>Nrs.1600</h4></center>
				<div class="arrow">
					<a href="#"><i class='bx bx-right-arrow-alt' ></i></a>
				</div>
			</div>

			<div class="row">
				<img src="images/fea4.jpg">
				<center><h3>Full Sleeve Sweater</h3>
				<h4>Nrs.2000</h4></center>
				<div class="arrow">
					<a href="#"><i class='bx bx-right-arrow-alt' ></i></a>
				</div>
			</div>

			<div class="row">
				<img src="images/fea5.jpg">
				<center><h3>Blue Hoodie</h3>
				<h4>Nrs.2000</h4></center>
				<div class="arrow">
					<a href="#"><i class='bx bx-right-arrow-alt' ></i></a>
				</div>
			</div>

			<div class="row">
				<img src="images/fea6.jpg">
			<center><h3>Full Sleeve Sweater</h3>
				<h4>Nrs.2000</h4></center>
				<div class="arrow">
					<a href="#"><i class='bx bx-right-arrow-alt' ></i></a>
				</div>
			</div>

		</div>
	</section>
	<section class="home3">
		<div class="cta-text">
			<h4>Built For <br> Winter</h4>
			<a href="#" class="btn">Shop Now</a>
		</div>
	</section>
	<section class="new" id="new">
		<div class="center-text">
			<h2>New Featured Products</h2>
			<p>Here you can check out new featured products</p>
		</div>

		<div class="new-content">
			<div class="box">
				<img src="img/tren1.jpg">
				<h5>Full Sleeve Jacket</h5>
					<h6>Nrs.2500</h6>
			</div>
			<div class="box">
				<img src="img/tren2.jpg">
				<h5>Black Joggers</h5>
				<h6>Nrs.1600</h6>
			</div>
			<div class="box">
				<img src="img/tren3.jpg">
				<h5>Plain Hoodie</h5>
				<h6>Nrs.2000</h6>
			</div>
			<div class="box">
				<img src="img/tren4.jpg">
				<h5>Navy Blue Joggers</h5>
				<h6>Nrs.1600</h6>
			</div>
		</div>
	</section>
	<section class="contact" id="contact">
		<div class="main-contact">
			<h3>TheConcept</h3>
			<h5>Let's Connect</h5>
			<div class="icons">
				<a href="https://www.instagram.com/theconcept____/" target="_blank"><i class='bx bxl-instagram-alt' ></i></a>
				
			</div>
		</div>
		<div class="main-contact">
			<h3>Explore</h3>
			<li><a href="#home">Home</a></li>
			<li><a href="#featured">Featured</a></li>
			<li><a href="#new">New</a></li>
			<li><a href="#contact">Contact</a></li>
		</div>
		<div class="main-contact">
			<h3>Our Services</h3>
			<li><a href="#">Pricing</a></li>
		</div>
		<div class="main-contact">
			<h3>Contact Us</h3>
			<li><a href="#">+01 4336414</a></li>
			<li><a href="#">+01 4336413</a></li>
		</div>

	</section>
	<a href="#" class="top"><i class='bx bx-up-arrow-alt' ></i></a>


	<script src="https://unpkg.com/scrollreveal"></script>

	<script src="js/script.js"></script>
	
</body>
</html>
