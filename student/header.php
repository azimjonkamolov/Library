<?php
    session_start();
    include "db.php";

    $checknum = $_SESSION["student_id"];

    $sql = "SELECT * FROM student_register WHERE student_id = '$checknum' ";
    $result = mysqli_query($con, $sql);
    while($row = mysqli_fetch_array($result))
    {
        $name = $row["username"];                                                 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Plain Page | LMS </title>


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><i class="fa fa-book"></i> <span>LMS</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="images/img.png" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>

                        <h2><?php echo $name; ?></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a href="university_books.php"><i class="fa fa-home"></i> University Books <span class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a href="my_issued_books.php" ><i class="fa fa-edit"></i> My Issued Books <span class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a><i class="fa fa-desktop"></i> UI Elements <span
                                    class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span
                                    class="fa fa-chevron-down"></span></a>

                            </li>

                        </ul>
                    </div>


                </div>

            </div>
        </div>