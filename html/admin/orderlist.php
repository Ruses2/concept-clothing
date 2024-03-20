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
          <a href="dashboard.php">
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
          <a href="orderlist.php"  class="active">
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
        <div class="sales-boxes">
            <div class="recent-sales">
                <h2 class="title">All Orders</h2>
                <div class="sales-details">
                    <ul class="details">
                    <li class="topic">Order id</li>
                    <li><a href="#">001</a></li>
                    <li><a href="#">002</a></li>
                    <li><a href="#">003</a></li>
                    <li><a href="#">004</a></li>
                    </ul>
                    <ul class="details">
                    <li class="topic">Order Item</li>
                    <li><a href="#">Bomber Jacket</a></li>
                    <li><a href="#">Navy Blue Joggers</a></li>
                    <li><a href="#">Plain Hoodie</a></li>
                    <li><a href="#">Full Sleeve Sweater</a></li>
                </ul>
                <ul class="details">
                    <li class="topic">Status</li>
                    <li><a href="#">Successfull</a></li>
                    <li><a href="#">Confirmed</a></li>
                    <li><a href="#">Confirmed</a></li>
                    <li><a href="#">Successfull</a></li>
                </ul>
                <ul class="details">
                    <li class="topic">Total</li>
                    <li><a href="#">NRs. 2500</a></li>
                    <li><a href="#">NRs. 1600</a></li>
                    <li><a href="#">NRs. 2000</a></li>
                    <li><a href="#">NRs. 2000</a></li>
                </ul>
                </div>
                <div class="button">
                    <a href="#">See More</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>