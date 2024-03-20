<?php
    require('dbcon.php');
    print_r($_POST);  
    print_r($_FILES);  

    // $id = ;

    $filename = $_FILES['product_image']['name'];
    $ext = pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION);

    $image_name = md5($filename. time()) . '.' .$ext;
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];

    $query = "INSERT INTO `product`(`name`, `description`, `price`, `avatar`) VALUES ('$product_name','$product_description','$product_price','$image_name')";


    $upload_dir = "../../images/product/$image_name";
    move_uploaded_file($_FILES['product_image']['tmp_name'], $upload_dir);

    $result = mysqli_query($con,$query);
    if($result==1)
    {
        $msg="Product added";
    }
    else{
        $msg="Something went wrong";
    }
    header("location: http://localhost/theconcept1/html/admin/product.php?msg=$msg");


?>