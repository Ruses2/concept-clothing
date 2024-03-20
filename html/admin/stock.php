<?php
    require('../includes/dbcon.php');
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
          <a href="orderlist.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Order list</span>
          </a>
        </li>
        <li>
          <a href="stock.php"  class="active">
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
      
    <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Product Name</th>
        <th class="text-center">Stock Quantity</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      $sql = "SELECT * FROM `product`";
      
      $result = mysqli_query($con, $sql);
      $count = 1;
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
    ?>
    <tr>
      <td class="text-center"><?=$count?></td>
      <td class="text-center"><?=$row['name']?></td>
      <td class="text-center"><?=$row['stock']?></td>     
      <td class="text-center"><button class=" bg-primary btn text-light" onclick="variationEditForm('')">Edit</button></td>
      <td class="text-center"><button class=" bg-danger btn text-light"  onclick="variationDelete('')">Delete</button></td>
      </tr>
      <?php
      $count++;
        }
      }else{
        echo "No Product Found!!!";
      }
      ?>
  </table>

    </div>
</body>
</html>