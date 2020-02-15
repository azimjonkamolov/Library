<?php
    session_start();
    include "header.php";
    include "db.php";
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
                                <span class="badge bg-green">6</span>
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
                    </div>

                    <form name="form" action="" method="post">
                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" name="searchstudent" class="form-control" placeholder="Search for student name or ID" style="border: 1px solid grey ;">
                                    <span class="input-group-btn">
                                        <input  type="submit" value="Go!" class="btn btn-default" name="submit" style="border: 1px solid rgba(0,0,0, 0.5); border-left:none; border-top-right-radius: 100px; border-bottom-right-radius: 100px;">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Student Information Page</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content"></div>

                                <?php

                                    if(isset($_POST['submit']))
                                    {
                                        echo "<p style='color:transparent;'>Hello</p>";

                                        $search_student = $_POST['searchstudent'];
                                        $count_num = 0;

                                        $sql = "SELECT * FROM student_register WHERE (username LIKE '$search_student%' or student_id LIKE '$search_student%') ";
                                        $result = mysqli_query($con, $sql);
                                        echo "<div class='table-responsive'>";
                                            echo "<table class='table table-bordered'>";
                                                echo "<thead>";
                                                    echo "<tr>";
                                                        echo "<th scope='col'>"; echo "#"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "Firstname"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "Lastname"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "Username"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "Student ID"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "E-mail"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "Phone"; echo "</th>";
                                                    echo "</tr>";
                                                echo "</thead>";
                                                echo "<tbody>";
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    $count_num++;

                                                        echo "<tr>";
                                                            echo "<th scope='row'>"; echo $count_num; echo "</th>";
                                                            echo "<td>"; echo $row["firstname"]; echo "</td>";
                                                            echo "<td>"; echo $row["lastname"]; echo "</td>";
                                                            echo "<td>"; echo $row["username"]; echo "</td>";
                                                            echo "<td>"; echo $row["student_id"]; echo "</td>";
                                                            echo "<td>"; echo $row["email"]; echo "</td>";
                                                            echo "<td>"; echo $row["phone"]; echo "</td>";
                                                        echo "</tr>";
                                                }
                                                echo "</tbody>";
                                            echo "</table>";
                                        echo "</div>";
                                    }
                                    else
                                    {
                                        echo "<p style='color:transparent;'>Hello</p>";

                                        $count_num = 0;

                                        $sql = "SELECT * FROM student_register";
                                        $result = mysqli_query($con, $sql);
                                        echo "<div class='table-responsive'>";
                                            echo "<table class='table table-bordered'>";
                                                echo "<thead>";
                                                    echo "<tr>";
                                                        echo "<th scope='col'>"; echo "#"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "Firstname"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "Lastname"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "Username"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "Student ID"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "E-mail"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "Phone"; echo "</th>";
                                                    echo "</tr>";
                                                echo "</thead>";
                                                echo "<tbody>";
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    $count_num++;

                                                        echo "<tr>";
                                                            echo "<th scope='row'>"; echo $count_num; echo "</th>";
                                                            echo "<td>"; echo $row["firstname"]; echo "</td>";
                                                            echo "<td>"; echo $row["lastname"]; echo "</td>";
                                                            echo "<td>"; echo $row["username"]; echo "</td>";
                                                            echo "<td>"; echo $row["student_id"]; echo "</td>";
                                                            echo "<td>"; echo $row["email"]; echo "</td>";
                                                            echo "<td>"; echo $row["phone"]; echo "</td>";
                                                        echo "<tr>";
                                                }
                                                echo "</tbody>";
                                            echo "</table>";
                                        echo "</div>";
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

