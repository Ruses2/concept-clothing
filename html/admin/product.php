<?php
  session_start();
  $admin = $_SESSION['admin'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../css/admin/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
      :root{
	        --main-color: #c8815f;
          --green:#27ae60;
          --black:#333;
          --white:#fff;
          --bg-color:#eee;
          --box-shadow:0.5rem 1rem rgba(0,0,0,.1);
          --border:.1rem solid var(--black);
      }
      *{
          font-family: 'Poppins', sans-serif;
          margin: 0; padding: 0;
          box-sizing: border-box;
          outline: none; border: none;
          text-decoration: none;
          text-transform: capitalize;
      }

      html{
          font-size:62.5%;
          overflow-x: hidden;
      }

      .btn{
          display: block;
          width: 100%;
          cursor: pointer;
          border-radius: .5rem;
          margin-top: 1rem;
          font-size: 1.7rem;
          padding: 1rem 3rem;
          background: var(--main-color);
          color: var(--white);
      }

      .btn:hover{
          background: var(--black);
      }

      .container{
          max-width: 1200px;
          padding: 2rem;
          margin: 0 auto;
      }

      .admin-product-form-container form{
          max-width: 50rem;
          margin: 0 auto;
          padding: 2rem;
          border-radius: .5rem;
          background: var(--bg-color);
      }

      .admin-product-form-container form h3{
          text-transform: uppercase;
          color: var(--black);
          margin-bottom: 1rem;
          text-align: center;
          font-size: 2.5rem;
      }

      .admin-product-form-container form .box{
          width: 100%;
          border-radius: .5rem;
          padding: 1.2rem 1.5rem;
          font-size: 1.7rem 0;
          margin: 1rem 0;
          background: var(--white);
          text-transform: none;
      }

 .product-display{
   margin:2rem 0;
}

.product-display .product-display-table{
   width: 100%;
   text-align: center;
}

.product-display .product-display-table thead{
   background: var(--bg-color);
}

.product-display .product-display-table th{
   padding:1rem;
   font-size: 2rem;
}

.product-display .product-display-table td{
   padding:1rem;
   font-size: 2rem;
   border-bottom: var(--border);
}

.product-display .product-display-table .btn:first-child{
   margin-top: 0;
}

.product-display .product-display-table .btn:last-child{
   background: crimson;
}

.product-display .product-display-table .btn:last-child:hover{
   background: var(--black);
}



@media (max-width:991px){

   html{
      font-size: 55%;
   }

}

@media (max-width:768px){

   .product-display{
      overflow-y:scroll;
   }

   .product-display .product-display-table{
      width: 80rem;
   }

}

@media (max-width:450px){

   html{
      font-size: 50%;
   }

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
          <a href="dashboard.php">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="product.php"  class="active">
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
    <div class="container">
        <div class="admin-product-form-container">
            <form action="../includes/addproduct.php" method="post" enctype="multipart/form-data">
                    <h3>Add new product</h3>
                    <input type="text" placeholder="enter product name" name="product_name" class="box">
                    <input type="text" placeholder="enter product description" name="product_description" class="box">
                    <input type="number" placeholder="enter product price" name="product_price" class="box">
                    <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
                    <input type="submit" class="btn" name="add_product" value="Add Product">    
            </form>
        </div>
    </div>
    </div>

    <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>product image</th>
            <th>product name</th>
            <th>product price</th>
            <th>action</th>
         </tr>
         </thead>
         <?php
            require('../includes/dbcon.php');
            $query = 'select * from product ORDER BY ID DESC';
            $result = mysqli_query($con,$query);

         ?>

         <?php
              if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){ ?>
         <tr>
            <td><img src="../../images/product/<?php echo $row['avatar']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td>Nrs.<?php echo $row['price']; ?>/-</td>
            <td>
               <a href="update_product.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="delete_product.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php 
          }
        } 
      ?>
      </table>
   </div>
</body>
</html>