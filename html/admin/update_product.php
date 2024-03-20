<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
    </style>
</head>

<body>
      <?php
        require('../includes/dbcon.php');
        $id = $_GET['edit'];

        $query = "SELECT * FROM `product` WHERE id = $id";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        if(isset($_POST['add_product'])){
            print_r($_POST);
            $product_name = $_POST['product_name'];
            $product_description = $_POST['product_description'];
            $product_price = $_POST['product_price'];

            $query = "UPDATE `product` SET `name`='$product_name',`description`='$product_description',`price`='$product_price' WHERE id = $id";
            $result = mysqli_query($con, $query);

            if($result == 1){
                $msg = "Product Updated";
                header("Location: product.php?msg=$msg");
            }else{
                $msg = "Something went wrong.";
            }
        }
      
      ?>
    <div class="container">
        <div class="admin-product-form-container">
            <form action="" method="post" enctype="multipart/form-data">
                    <h3>Update product</h3>
                    <input type="text" placeholder="enter product name" value="<?php echo $row['name'] ?>" name="product_name" class="box">
                    <input type="text" placeholder="enter product description" value="<?php echo $row['description'] ?>" name="product_description" class="box">
                    <input type="number" placeholder="enter product price" value="<?php echo $row['price'] ?>" name="product_price" class="box">
                    <input type="submit" class="btn" name="add_product" value="Update Product">    
                    <br><p><a href="product.php" style="font-weight: bold;font-size:15px;color:rgb(0, 0, 0)">Go Back</a></p>
            </form>
        </div>
    </div>

</body>
</html>