<?php
    session_start();
    ob_start();
    include "header.php";
?>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="images/img.png" alt=""> <?php echo $_SESSION["librarian"]; ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green"></span>
                            </a>

                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Librarian Section</h3>
                        </br>
                        </br>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <!-- <input type="text" class="form-control" placeholder="Search for..."> -->
                                <span class="input-group-btn">
                                    <!-- <button class="btn btn-default" type="button">Go!</button> -->
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Send Message To Students</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                
                            <form name="form" action="" method="post" class="col-lg-12">
                                    <table class="table table-bordered">
                                        <!-- <div class="frmSearch">
                                            <input type="text" id="search-box" placeholder="Country Name" />
                                            <div id="suggesstion-box"></div>
                                        </div> -->
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Student's ID" name="student_id" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="User Name" name="user_name" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Message's Title" name="title" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><textarea  type="text" class="form-control" placeholder="Write Here" name="message" required="" ></textarea></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="submit" name="submit" class="btn btn-default submit" value="Send Message" onclick="return alert('Message is sent!'); style="background-color: blue; color: white;">
                                            </td>
                                        </tr>
                                    </table>
                                </form>

                                <?php

                                    if(isset($_POST['submit']))
                                    {
                                        $student_id = $_POST['student_id'];
                                        $user_name = $_POST['user_name'];
                                        $title = $_POST['title'];
                                        $message = $_POST['message'];
                                        $librarian = $_SESSION['librarian'];

                                        $sent_date =  $date = date('M d, Y');
                                        

                                        $sql_check = "SELECT * FROM student_register WHERE username = '$user_name' AND student_id = '$student_id'";

                                        $result_check = mysqli_query($con, $sql_check);

                                        $check = mysqli_num_rows($result_check);

                                        if($check==1)
                                        {
                                            $sql = "INSERT INTO messages (student_id, user_name, title, msg, librarian, sent_date, seen) 
                                            VALUE('$student_id','$user_name','$title','$message', '$librarian', '$sent_date', '1')";

                                            $result = mysqli_query($con, $sql);

                                            if($result == 1)
                                            {

                                            ?>
                                            
                                            <script type="text/javascript">
                                                alert("Message is sent!");
                                            </script>

                                            <?php

                                            header("location: messages.php");
                                            exit;
                                            ob_flush();

                                        }
                                    }
                                        else
                                        {
                                            ?>
                                                <script type="text/javascript">
                                                    alert("Username or ID does not match!");
                                                </script>
                                            <?php
                                        }

                                    }

                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
    include "footer.php";
?>

