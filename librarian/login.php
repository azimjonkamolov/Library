<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Login Form | LMS </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Library Management System</h1>
</div>

<br>

<body class="login">


<div class="login_wrapper">

    <section class="login_content">
        <form name="form1" action="" method="post">
            <h1>User Login Form</h1>

            <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required=""/>
            </div>
            <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required=""/>
            </div>
            <div>

                <input class="btn btn-default submit" type="submit" name="submit" value="Login">
                <a class="reset_pass" href="#">Lost your password?</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
                <p class="change_link">New to site?
                    <a href="register.php"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br/>

            </div>


<?php    
    
if(isset($_POST['submit']))
{
    session_start();
    $con = new mysqli("localhost", "root", "", "library");
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM librarian_register WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($con, $sql);

    $check = mysqli_num_rows($result);

    if($check==1)
    {
        ?>
            <div class="alert alert-success col-lg-12 col-lg-push-0">
                <strong style="color:white">Valid</strong> Username Or Password.
            </div>
        <?php

        header("location: librarypage.php");
        exit;
    }
    else
    {
        ?>
        <div class="alert alert-danger col-lg-12 col-lg-push-">
            <strong style="color:white">Invalid</strong> Username Or Password.
        </div>
        <?php
    }

}

?>


        </form>
    </section>


</div>


</body>
</html>
