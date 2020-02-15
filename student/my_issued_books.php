<?php
    include "header.php";

    $checknum = $_SESSION["student_id"];

    $sql = "SELECT * FROM student_register WHERE student_id = '$checknum' ";
    $result = mysqli_query($con, $sql);
    while($row = mysqli_fetch_array($result))
    {
        $name = $row["username"];                                                 
    }

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
                                <img src="images/img.png" alt=""> <?php echo $name; ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="login.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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
                        <h3>Student's Page</h3>
                        
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
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>My Issued Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                
                            <?php

                                $count_num = 0;

                                $sql = "SELECT * FROM issue_books WHERE student_id = '$checknum' ";
                                $result = mysqli_query($con, $sql);
                                echo "<div class='table-responsive'>";
                                    echo "<table class='table table-bordered'>";
                                        echo "<thead>";
                                            echo "<tr>";
                                                echo "<th scope='col'>"; echo "#"; echo "</th>";
                                                echo "<th scope='col'>"; echo "Books's name"; echo "</th>";
                                                echo "<th scope='col'>"; echo "Issued librarian"; echo "</th>";
                                                echo "<th scope='col'>"; echo "Issue date"; echo "</th>";
                                                echo "<th scope='col'>"; echo "Return date"; echo "</th>";
                                            echo "<tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            $count_num++;
                                                echo "<tr>";
                                                    echo "<th scope='row'>"; echo $count_num; echo "</th>";
                                                    echo "<td>"; echo $row["book_name"]; echo "</td>";
                                                    echo "<td>"; echo $row["librarian"]; echo "</td>";
                                                    echo "<td>"; echo $row["issue_date"]; echo "</td>";
                                                    echo "<td>"; echo $row["return_date"]; echo "</td>";
                                                echo "<tr>";
                                        }
                                        echo "</tbody";
                                    echo "</table>";
                                echo "</div>";

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

