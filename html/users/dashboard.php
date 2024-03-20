<?php
require('../includes/dbcon.php');
    session_start();
    $user = $_SESSION['user'];
    // print_r($user);

  if(isset($_POST["action"])){

    if($_POST['action'] == "delete"){
      $id = $_POST['id'];
      $sql = "DELETE FROM cart where id = $id";
  
      $result = mysqli_query($con, $sql);
      if($result == 1){
        $msg = "Cart Deleted";
      }else{
        $msg = "Something went wrong";
      } 
    }

    else if($_POST['action'] == "delete_all"){
      $sql = "DELETE FROM cart";
  
      $result = mysqli_query($con, $sql);
      if($result == 1){
        $msg = "All Cart Deleted";
      }else{
        $msg = "Something went wrong";
      } 
    }
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="../../css/user/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
      .qr{
        display: none;
      }
      .qr-active{
        display: block;
      }
      .checkout{
        height: 100vh;
        position: absolute;
        width: 100%;
        background: white;
        display: none;
      }
      .checkout-active{
        display: block;
      }
     </style>
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
        <i class='bx bx-closet'></i>
      <span class="logo_name">TheConcept</span>
    </div>
      <ul class="nav-links">
        
      <li>
          <a href="../../user_index.php" class="">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Home</span>
          </a>
        </li>
        <li>
          <a href="dashboard.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li class="log_out">
            <?php
            
                if(isset($user)){
            
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
        <span class="user_name"><?php echo $user['username'] ?></span>
        <i class='bx bxs-user-circle' ></i>
      </div>
    </nav>
    <div class="home-content">
      <div class="checkout text-center" id="checkout" style="margin-bottom: 50px;">
        <h1>Checkout</h1>
        <form action="../includes/checkout.php" method="POST">
          
          <label for="">Checkout Mode:</label>
            <select name="checkout" id="" onchange="checkoutMode(this)">
              <option value="cod">Cash on Delivery</option>
              <!-- <option value="khalti" id="khalti">Khalti</option> -->
              <option value="qr" id="qr">Scan QR</option>
            </select>
            <br><br>
          
            <button class="btn bg-primary" type="submit">Checkout</button>
            <div class="btn bg-danger" onclick="toggleCheckOut()">Close</div>
          </form>

        <div style="margin: 20px 0;" class="qr" id="qr-img">
          <img src="../../images/qr/qr.jpg" alt="" width="300px">
        </div>

      </div>
    <table class="table ">
      
      <thead>
        <tr>
          <th colspan="4" class="" style="cursor: pointer;">
              <button onclick="toggleCheckOut()" class="btn bg-primary" style="padding: 20px 0;width: 100%; color: white;">Proceed to Checkout</button>
          </th>
          <th colspan="2" class="" style="cursor: pointer;">
            <form action="" method="POST">
              <input type="hidden" name="action" value="delete_all">
              <button type="submit" class="btn bg-danger" style="padding: 20px 0;width: 100%; color: white;">Delete All</button>
                
            </form>  
          </th>
        </tr>
        <tr>
          <th class="text-center">S.N.</th>
          <th class="text-center">Avatar</th>
          <th class="text-center">Product Name</th>
          <th class="text-center">Quantity</th>
          <th class="text-center">Amount</th>
          <th class="text-center" colspan="2">Action</th>
        </tr>
      </thead>
      <?php
        $user_id = $user['id'];
        
        // Total Sum amount cart
        
        $sql = "SELECT SUM(amount) as total FROM `cart` ";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $total = $row['total'];
        
        //end 


        $sql = "SELECT * FROM `cart` WHERE user_id = $user_id";
        
        $result = mysqli_query($con, $sql);
        $count = 1;
        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)){
            $product_id = $row['product_id'];
            $product_sql = "SELECT * FROM product WHERE id = $product_id";
            $product_result = mysqli_query($con, $product_sql);
            $product = mysqli_fetch_assoc($product_result);
      ?>
      <tbody>

        <tr>
          <td class="text-center"><?=$count?></td>
          <td class="text-center"><img src="../../images/product/<?=$product['avatar']?>" width="200px" alt=""></td>
          <td class="text-center"><?=$product['name']?></td>
          <td class="text-center"><?=$row['quantity']?></td>     
          <td class="text-center"><?=$row['amount']?></td> 
          <td class="text-center">
            <form action="" method="POST">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value = "<?= $row['id'] ?>">
                <button class=" bg-danger btn text-light"  onclick="variationDelete('')">Delete</button>  
            </form>
          </td>
        </tr>
        <?php
        $count++;
          }
        }else{
         echo "Nothing in Cart!!!";
        }
        ?>
        <tr>
          <th colspan="4" class="text-center">Total</th>
          <th class="text-center"><?= $total ?></th>
        </tr>
      </tbody>

    </table>
    </div>
      
</section>
  
<script>
  function checkoutMode(elem){
    let value = elem.value;
    let qr_img = document.querySelector("#qr-img");

    if(value == "qr"){

      console.dir(qr_img);
      qr_img.classList.add("qr-active");
    }else{
      qr_img.classList.remove("qr-active");

    }
    console.log(value);
  }

  function toggleCheckOut(){
    let checkoutform = document.querySelector("#checkout");

    checkoutform.classList.toggle("checkout-active");
  }
</script>
</body>
</html>