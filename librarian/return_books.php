<?php
    session_start();
    ob_start();
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
                    </div>

                    <form name="form" action="" method="post">
                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" name="searchbook" class="form-control" placeholder="Search for book or author">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><input type="submit" value="Go" style="border: none; decoration: none; background-color: transparent; margin: 0; padding: 0;"></button>
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
                                <h2>Return Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                            <!-- <table class="table table-bordered"> -->

                                <?php

                                    if(isset($_POST["submit"]))
                                    {
                                        
                                        $search_book = $_POST['searchbook'];
                                        $count_num = 0;

                                        $sql = "SELECT * FROM issue_books WHERE (book_name LIKE '%$search_book%' OR student_id LIKE '%$search_book%') ";
                                        $result = mysqli_query($con, $sql);
                                        echo "<div class='table-responsive'>";
                                            echo "<table class='table table-bordered'";
                                                echo "<thead>";
                                                    echo "<tr>";
                                                        echo "<th scope='col'>"; echo "#"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "Books's name"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "User's name"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "Student's ID"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "Librarian"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "Issue date"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "Return date"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "Action"; echo "</th>";
                                                    echo "<tr>";
                                                echo "</thead>";
                                                echo "<tbody>";
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    $count_num++;
                                                    echo "<tr>";
                                                        echo "<th scope='row'>"; echo $count_num; echo "</th>";
                                                        echo "<td>"; echo $row["book_name"]; echo "</td>";
                                                        echo "<td>"; echo $row["user_name"]; echo "</td>";
                                                        echo "<td>"; echo $row["student_id"]; echo "</td>";
                                                        echo "<td>"; echo $row["librarian"]; echo "</td>";
                                                        echo "<td>"; echo $row["issue_date"]; echo "</td>";
                                                        echo "<td>"; echo $row["return_date"]; echo "</td>";
                                                        echo "<td>";
                                                        ?> 
                                                            <a href="return_books.php?id=<?php echo $row["id"]; ?>"  onclick="myFunction()">Return</a> 
                                                        <?php
                                                        echo "</td>";
                                                    echo "<tr>";                                                   
                                                }
                                                echo "</tbody";
                                            echo "</table>";
                                        echo "</div>";

                                    }
                                    else
                                    {
                                        $count_num = 0;

                                        $sql = "SELECT * FROM issue_books";
                                        $result = mysqli_query($con, $sql);
                                        echo "<div class='table-responsive'>";
                                            echo "<table class='table table-bordered'>";
                                                echo "<thead>";
                                                    echo "<tr>";
                                                        echo "<th scope='col'>"; echo "#"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "Books's name"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "User's name"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "Student's ID"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "Librarian"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "Issue date"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "Return date"; echo "</th>";
                                                        echo "<th scope='col'>"; echo "Action"; echo "</th>";
                                                    echo "<tr>";
                                                echo "</thead>";
                                                echo "<tbody>";
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    $count_num++;
                                                        echo "<tr>";
                                                            echo "<th scope='row'>"; echo $count_num; echo "</th>";
                                                            echo "<td>"; echo $row["book_name"]; echo "</td>";
                                                            echo "<td>"; echo $row["user_name"]; echo "</td>";
                                                            echo "<td>"; echo $row["student_id"]; echo "</td>";
                                                            echo "<td>"; echo $row["librarian"]; echo "</td>";
                                                            echo "<td>"; echo $row["issue_date"]; echo "</td>";
                                                            echo "<td>"; echo $row["return_date"]; echo "</td>";
                                                            echo "<td>";
                                                                ?> 
                                                                    <a href="return_books.php?id=<?php echo $row["id"]; ?>" onclick="myFunction()">Return</a> 
                                                                <?php 
                                                            echo "</td>";
                                                        echo "<tr>";
                                                }
                                                echo "</tbody";
                                            echo "</table>";
                                        echo "</div>";

                                    }

                                    if(isset($_GET['id']))
                                    {
                                        $delete_id = ($_GET["id"]);

                                        $sql = "DELETE FROM issue_books WHERE id = '$delete_id'";

                                        $result = mysqli_query($con, $sql);

                                        $sql_name = "SELECT * FROM issue_books";

                                        $result_name = mysqli_query($con, $sql_name);

                                        while($row = mysqli_fetch_assoc($result_name))
                                        {
                                            $book_name = $row["book_name"];
                                        }

                                        $sql_qty = "UPDATE books SET available_qty = available_qty + 1 WHERE book_name = '$book_name' ";

                                        $sql_result = mysqli_query($con, $sql_qty);

                                        header("location: display_books.php");

                                        ob_flush();
                                    }

                                ?>

                                <script>
                                function myFunction()
                                {
                                    confirm("Are you sure?");
                                    location.reload();
                                }
                                </script>
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

