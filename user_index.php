<?php
	require('html/includes/dbcon.php');
	session_start();
	$user = $_SESSION['user'];

	$query = "SELECT * FROM product";

	$result = mysqli_query($con,$query);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TheConcept Online Clothing</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/product/product.css">

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
		img{
			
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
			<a href="#"><i class='bx bx-user'></i></a>
			<a class="navbar-action-btn"><b><?php echo $user['username'] ?></b></a>
			<div class="dropdown-content">
				<a href="html/users/dashboard.php" class="navbar-action-btn">Dashboard</a>
				<a href="html/includes/logout.php" class="navbar-action-btn">Logout</a>
			</div>
		</div>
	</header>

	<section class="featured" id="featured">
		<div class="center-text">
			<h2>Featured Categories</h2>
		</div>

		<div class="featured-content">

		<?php

			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_assoc($result)){			
		?>
			<div class="row">
				<img src="images/product/<?php echo $row['avatar'] ?>">
				<center><h3><?php echo $row['name'] ?></h3>
				<center><h4><?php echo $row['description'] ?></h4>
				<h4>Nrs. <?php echo $row['price'] ?></h4></center>
				<a href="html/users/product_detail.php?id=<?php echo $row['id']?>"><center><button class="buy1">Buy Now</button></center></a>
			</div>

		<?php
				}
			}
		?>

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
			<h3>Shopping</h3>
			<li><a href="#">Clothing Store</a></li>
		</div>

	</section>

	<div class="last-text">
		<p>Copyright © 2023</p>
	</div>

	<a href="#" class="top"><i class='bx bx-up-arrow-alt' ></i></a>


	<script src="https://unpkg.com/scrollreveal"></script>

	<script src="js/script.js"></script>
	
</body>
</html>
