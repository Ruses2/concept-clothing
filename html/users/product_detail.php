<?php
    require('../includes/dbcon.php');

    session_start();
    $user = $_SESSION['user'];

    $id = $_GET['id'];

    $query = "select * from product where id = $id";
    $result = mysqli_query($con, $query);

    $row = mysqli_fetch_assoc($result);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details Page</title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/user/product_detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
			/* max-height: 300px; */
		}
	</style>
</head>
<body>
    <!----header--->
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
				<a href="dashboard.php" class="navbar-action-btn">Dashboard</a>
				<a href="../includes/logout.php" class="navbar-action-btn">Logout</a>
			</div>
		</div>
	</header>


    <div class="flex-box">
        <div class="left">
            <div class="big-img">
                <img src="../../images/product/<?php echo $row['avatar'] ?>">
            </div>
        </div>
        <form action="../includes/addtocart.php" method="POST">
            <input type="hidden" name="product_id" value="<?= $_GET['id']?>">
            <input type="hidden" name="user_id" value="<?= $user['id']?>">
            <input type="hidden" name="amount" value="<?= $row['price']?>">
            <div class="right">
                <div class="pname"><?php echo $row['name'] ?></div>
                <div class="description"><?php echo $row['description'] ?></div>
                
                <div class="price">Nrs. <span id="price"><?php echo $row['price'] ?></span></div>
                <div class="size">
                    <p>Size :</p>
                    <div class="psize active">S</div>
                    <div class="psize">M</div>
                    <div class="psize">XL</div>
                </div>
                <div class="quantity">
                    <p>Quantity :</p>
                    <input type="number" name="quantity" min="1" max="5" value="1" onchange="priceUpdate(this)">
                </div>
                <div class="btn-box">
                    <button class="cart-btn">Add to Cart</button>
                    <button class="buy-btn">Buy Now</button>
                </div>
            </div>
        </form>
    </div>


    <script>
        let bigImg = document.querySelector('.big-img img');
        function showImg(pic){
            bigImg.src = pic;
        }
        function priceUpdate(elem){
            let price = <?php echo $row['price'] ?>;
            console.log(elem.value);
            console.log(price);
            amount = price * elem.value;
            document.querySelector("#price").textContent = amount; 
            document.querySelector("input[name=amount]").value = amount; 
        }
    </script>
</body>
</html>