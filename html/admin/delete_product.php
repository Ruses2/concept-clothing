<?php
    require('../includes/dbcon.php');
    $id = $_GET['delete'];
    $query = "delete from product where id=$id";
    $result = mysqli_query($con,$query);
    if($result==1){
        $msg = "product deleted";
    }
    else{
        $msg = "something went wrong";
    }

    header("location:product.php?msg=$msg");

?>