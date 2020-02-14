<?php
    include "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Registration Form | LMS </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Library Management System</h1>
</div>


<body class="login" style="margin-top: -20px;">



    <div class="login_wrapper">

            <section class="login_content" style="margin-top: -40px;">
                <form name="form1" action="" method="post">
                    <h2>Student Registration Form</h2><br>

                    <div>
                        <input type="text" class="form-control" placeholder="FirstName" name="firstname" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="LastName" name="lastname" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Username" name="username" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Student ID" name="student_id" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Email" name="email" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Phone" name="phone" required=""/>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="password" required=""/>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Confirm Password" name="conpass" required=""/>
                    </div>
                    <div class="col-lg-12  col-lg-push-3">
                        <input class="btn btn-default submit " type="submit" name="submit" value="Register">
                    </div>

                    <?php

                        session_start();                   

                        if(isset($_POST["submit"]))
                        {
                            // session_start();

                            $firstname = $_POST["firstname"];
                            $lastname = $_POST["lastname"];
                            $username = $_POST["username"];
                            $email = $_POST["email"];
                            $phone = $_POST["phone"];
                            $student_id = $_POST["student_id"];
                            $password = $_POST["password"];
                            $conpass = $_POST["conpass"];

                            if ($password == $conpass)
                            {

                                $sql = "INSERT INTO student_register (firstname, lastname, username, email, phone, student_id, password)
                                VALUES('$firstname', '$lastname', '$username', '$email', '$phone', '$student_id', '$password')";

                                mysqli_query($con, $sql);

                                header("location: login.php");
                                exit;

                                ?>
                                
                                <div class="alert alert-success col-lg-12 col-lg-push-0">
                                    Registration went successfully!
                                </div>

                                <?php

                            }
                            else
                            {
                                ?>
                                    
                                    <script type="text/javascript">
                                        alert("Check the password please!");
                                    </script>

                                <?php
                            }
                            

                        }
                    
                    ?>

                </form>
            </section>

    


    </div>




</body>
</html>
