<?php
    session_start();
    ob_start();
    include "db.php";
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
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                
                                <form name="form" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Book's name" name="book_name" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Author's name" name="author_name" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Book's publisher" name="book_publisher" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Purchase date" name="purchase_date" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Book's price" name="book_price" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Book's quontity" name="book_qty" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Available quontity" name="available_qty" required=""></td>
                                        </tr>
                                        <!-- <tr>
                                            <td><input type="text" class="form-control" placeholder="User's name" name="user_name" required=""></td>
                                        </tr> -->
                                        <tr>
                                            <td>Book's image<input type="file" name="f1" required=""></td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <input type="submit" name="submit" class="btn btn-default submit" value="insert books details" style="background-color: blue; color: white;">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php



if(isset($_POST["submit"]))
{
    $tm = md5(time());
    $fnm = $_FILES["f1"]["name"];
    $dst = "./books/".$tm.$fnm;
    $dst1 = "books/".$tm.$fnm;
    move_uploaded_file($_FILES["f1"]["tmp_name"], $dst);

    $book_name = $_POST["book_name"];
    $author_name = $_POST["author_name"];
    $book_publisher = $_POST["book_publisher"];
    $purchase_date = $_POST["purchase_date"];
    $book_price = $_POST["book_price"];
    $book_qty = $_POST["book_qty"];
    $available_qty = $_POST["available_qty"];

    
    $sql = "INSERT INTO books (book_name, author_name, book_publisher, 
    purchase_date, book_price, book_qty, available_qty, librarian,  book_img) VALUES 
    ('$book_name', '$author_name', '$book_publisher', '$purchase_date', '$book_price', '$book_qty', 
    '$available_qty', '$_SESSION[librarian]', '$dst1')";

    $result = mysqli_query($con, $sql);
    // $count = mysqli_num_rows($result);

    if($result == 1)
    {

    ?>
    
    <script type="text/javascript">
        alert("Book insertion went successfully!");
    </script>

    <?php

    header("location: display_books.php");
    ob_flush();


    }
}
    

?>

<?php
    include "footer.php";
?>

