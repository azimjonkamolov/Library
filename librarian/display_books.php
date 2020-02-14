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
                                    <input type="text" name="searchbook" class="form-control" placeholder="Search for books"  style="border: 1px solid grey ;">
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
                                <h2>Book Information Page</h2>

                                <div class="clearfix"></div>
                            </div>
                            <table class="x_content">

                            <table class="table table-bordered">

                                <?php

                                    if(isset($_POST["submit"]))
                                    {
                                        
                                        $search_book = $_POST['searchbook'];
                                        $count_num = 0;

                                        $sql = "SELECT * FROM books WHERE book_name LIKE '%$search_book%' ";
                                        $result = mysqli_query($con, $sql);
                                        echo "<div class='table table-bordered'>";
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
                                                echo "<td>"; ?> <img src="<?php echo $row["book_img"]; ?>" height="100" width="100" <?php echo "</td>";
                                            echo "<tr>";
                                        }

                                    }
                                    else
                                    {
                                        $count_num = 0;

                                        $sql = "SELECT * FROM books";
                                        $result = mysqli_query($con, $sql);
                                        echo "<div class='table table-bordered'>";
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
                                                    echo "<td>"; ?> <img src="<?php echo $row["book_img"]; ?>" height="100" width="100"> <?php echo "</td>";
                                                echo "<tr>";
                                        }
                                        echo "</table>";
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

