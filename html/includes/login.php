<?php
    require('dbcon.php');

    print_r($_POST);
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $query = "SELECT * FROM `users` WHERE email='$email'";
    $result = mysqli_query($con,$query);
    // echo mysqli_fetch_assoc($result)['password'];
    if(mysqli_num_rows($result)>0)
    {

        $user = mysqli_fetch_assoc($result);

        session_start();
        if($user['role']!=null && password_verify($password,$user['password']))
        { 
            $_SESSION['admin'] = $user;
            $msg="login succesful";
            header("location: http://localhost/theconcept1/html/admin/dashboard.php?msg=$msg");
        }
        else if(password_verify($password, $user["password"])){
            $_SESSION['user'] = $user;
            $msg="login succesful";
            header("location: http://localhost/theconcept1/user_index.php?msg=$msg");
        }else{
            $msg="login unsuccess";
            header("location: http://localhost/theconcept1/html/forms/login.php?msg=$msg");
        }
    }
    else{
        $msg="login unsuccess";
        header("location: http://localhost/theconcept1/html/forms/login.php?msg=$msg");
    }
?>