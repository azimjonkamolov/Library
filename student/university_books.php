<?php
    include "header.php";

    $checknum = $_SESSION["student_id"];

    $sql = "SELECT * FROM student_register WHERE student_id = '$checknum' ";
    $result = mysqli_query($con, $sql);
    while($row = mysqli_fetch_array($result))
    {
        $name = $row["username"];                                                 
    }

    $tot = 0;
    $sql_num = "SELECT * FROM messages WHERE student_id = '$checknum' AND seen = 1 ";
    
    $res = mysqli_query($con, $sql_num);

    $tot = mysqli_num_rows($res);
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
                                <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="notifications.php" class="dropdown-toggle info-number" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green"><?php echo $tot; ?></span>
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

                    <form name="form" action="" method="post">
                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" name="searchbook" class="form-control" placeholder="Search for book or author"  style="border: 1px solid grey ;">
                                    <span class="input-group-btn">
                                    <input  type="submit" value="Go!" class="btn btn-default fixproblem" name="submit" style="margin-top: 0.5px; border: 1px solid rgba(0,0,0, 0.5); border-left:none; border-top-right-radius: 100px; border-bottom-right-radius: 100px;">
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
                                <h2>University's Books</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                
                            <?php

                                if(isset($_POST["submit"]))
                                {
                                    
                                    $search_book = $_POST['searchbook'];
                                    $count_num = 0;

                                    $sql = "SELECT * FROM books WHERE (book_name LIKE '%$search_book%' OR author_name LIKE '%$search_book%') ";
                                    $result = mysqli_query($con, $sql);
                                    echo "<div class='table-responsive'>";
                                        echo "<table class='table table-bordered'";
                                            echo "<thead>";
                                                echo "<tr>";
                                                    echo "<th scope='col'>"; echo "#"; echo "</th>";
                                                    echo "<th scope='col'>"; echo "Books's name"; echo "</th>";
                                                    echo "<th scope='col'>"; echo "Author's name"; echo "</th>";
                                                    echo "<th scope='col'>"; echo "Publisher"; echo "</th>";
                                                    echo "<th scope='col'>"; echo "Purchase date"; echo "</th>";
                                                    echo "<th scope='col'>"; echo "Book's price"; echo "</th>";
                                                    echo "<th scope='col'>"; echo "Book's quontitiy"; echo "</th>";
                                                    echo "<th scope='col'>"; echo "Available quontitiy"; echo "</th>";
                                                    echo "<th scope='col'>"; echo "Librarian inserted"; echo "</th>";
                                                    echo "<th scope='col'>"; echo "Book's image"; echo "</th>";
                                                echo "<tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            while($row = mysqli_fetch_array($result))
                                            {
                                                $count_num++;
                                                echo "<tr>";
                                                    echo "<th scope='row'>"; echo $count_num; echo "</th>";
                                                    echo "<td>"; echo $row["book_name"]; echo "</td>";
                                                    echo "<td>"; echo $row["author_name"]; echo "</td>";
                                                    echo "<td>"; echo $row["book_publisher"]; echo "</td>";
                                                    echo "<td>"; echo $row["purchase_date"]; echo "</td>";
                                                    echo "<td>"; echo $row["book_price"]; echo "</td>";
                                                    echo "<td>"; echo $row["book_qty"]; echo "</td>";
                                                    echo "<td>"; echo $row["available_qty"]; echo "</td>";
                                                    echo "<td>"; echo $row["librarian"]; echo "</td>";
                                                    echo "<td>"; ?> <img src="../librarian/<?php echo $row["book_img"]; ?>" height="100" width="100" <?php echo "</td>";
                                                echo "<tr>";                                                   
                                            }
                                            echo "</tbody";
                                        echo "</table>";
                                    echo "</div>";

                                }
                                else
                                {
                                    $count_num = 0;

                                    $sql = "SELECT * FROM books";
                                    $result = mysqli_query($con, $sql);
                                    echo "<div class='table-responsive'>";
                                        echo "<table class='table table-bordered'>";
                                            echo "<thead>";
                                                echo "<tr>";
                                                    echo "<th scope='col'>"; echo "#"; echo "</th>";
                                                    echo "<th scope='col'>"; echo "Books's name"; echo "</th>";
                                                    echo "<th scope='col'>"; echo "Author's name"; echo "</th>";
                                                    echo "<th scope='col'>"; echo "Publisher"; echo "</th>";
                                                    echo "<th scope='col'>"; echo "Purchase date"; echo "</th>";
                                                    echo "<th scope='col'>"; echo "Book's price"; echo "</th>";
                                                    echo "<th scope='col'>"; echo "Book's quontitiy"; echo "</th>";
                                                    echo "<th scope='col'>"; echo "Available quontitiy"; echo "</th>";
                                                    echo "<th scope='col'>"; echo "Librarian inserted"; echo "</th>";
                                                    echo "<th scope='col'>"; echo "Book's image"; echo "</th>";
                                                echo "<tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            while($row = mysqli_fetch_array($result))
                                            {
                                                $count_num++;
                                                    echo "<tr>";
                                                        echo "<th scope='row'>"; echo $count_num; echo "</th>";
                                                        echo "<td>"; echo $row["book_name"]; echo "</td>";
                                                        echo "<td>"; echo $row["author_name"]; echo "</td>";
                                                        echo "<td>"; echo $row["book_publisher"]; echo "</td>";
                                                        echo "<td>"; echo $row["purchase_date"]; echo "</td>";
                                                        echo "<td>"; echo $row["book_price"]; echo "</td>";
                                                        echo "<td>"; echo $row["book_qty"]; echo "</td>";
                                                        echo "<td>"; echo $row["available_qty"]; echo "</td>";
                                                        echo "<td>"; echo $row["librarian"]; echo "</td>";
                                                        echo "<td>"; ?> <img src="../librarian/<?php echo $row["book_img"]; ?>" height="100" width="100"> <?php echo "</td>";
                                                    echo "<tr>";
                                            }
                                            echo "</tbody";
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

