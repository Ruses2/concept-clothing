<?php

    session_start();
    $admin = $_SESSION['admin'];
    // print_r($user);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../css/admin/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
        <i class='bx bx-closet'></i>
      <span class="logo_name">TheConcept</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="dashboard.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="product.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Product</span>
          </a>
        </li>
        <li>
          <a href="orderlist.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Order list</span>
          </a>
        </li>
        <li>
          <a href="stock.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Stock</span>
          </a>
        </li>
        <li class="log_out">
            <?php
            
                if(isset($admin)){
            
            ?>
          <a href="../includes/logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
          <?php
          
            }              

          ?>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="profile-details">
        <span class="admin_name">Admin</span>
        <i class='bx bxs-user-circle' ></i>
      </div>
    </nav>
    <div class="home-content">
        <div class="overview-boxes">
            <div class="box">
            <div class="right-side">
                <div class="box-topic">Total Order</div>
                <div class="number">4</div>
            </div>
            <i class='bx bx-cart-alt cart'></i>
            </div>
            <div class="box">
            <div class="right-side">
                <div class="box-topic">Total Sales</div>
                <div class="number">7000</div>
            </div>
            <i class='bx bxs-cart-add cart two' ></i>
            </div> 
            <div class="box">
            <div class="right-side">
                <div class="box-topic">Stock</div>
                <div class="number">120</div>
            </div>
            <i class='bx bx-cart cart three' ></i>
            </div>
        </div>
        <div class="sales-boxes">
            <div class="recent-sales">
                <h2 class="title">Recent Sales</h2>
                <div class="sales-details">
                    <ul class="details">
                    <li class="topic">Date</li>
                    <li><a href="#">06 June 2023</a></li>
                    <li><a href="#">17 June 2023</a></li>
                    <li><a href="#">09 August 2023</a></li>
                    </ul>
                    <ul class="details">
                    <li class="topic">Customer</li>
                    <li><a href="#">Ruses Maharjan</a></li>
                    <li><a href="#">Maynard James keenan</a></li>
                    <li><a href="#">Luca Changretta</a></li>
                </ul>
                <ul class="details">
                    <li class="topic">Status</li>
                    <li><a href="#">Delivered</a></li>
                    <li><a href="#">Delivered</a></li>
                    <li><a href="#">Delivered</a></li>
                </ul>
                <ul class="details">
                    <li class="topic">Total</li>
                    <li><a href="#">NRs.7000</a></li>
                    <!-- <li><a href="#">$24.55</a></li>
                    <li><a href="#">$25.88</a></li>
                    <li><a href="#">$170.66</a></li>
                    <li><a href="#">$56.56</a></li>
                    <li><a href="#">$44.95</a></li>
                    <li><a href="#">$67.33</a></li>
                    <li><a href="#">$23.53</a></li>
                    <li><a href="#">$46.52</a></li> -->
                </ul>
                </div>
                <div class="button">
                    <a href="#">See All</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>