<?php
    session_start();
    ob_start();
    include "header.php";
    include "db.php";
?>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- jQuery UI library -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


<script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "search.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});
//To select country name
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>

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
                                <h2>Issue books</h2>

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
                                            <div class="frmSearch">
                                                <td class="frmSearch">
                                                    <input type="text" id="search-box" placeholder="Book's Name" name="book_name"  class="form-control"/>
                                                    <div id="suggesstion-box"></div>
                                                </td>
                                            </div>   
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Student's ID" name="student_id" required=""></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="User name" name="user_name" required=""></td>
                                        </tr>

                                        <?php
                                            $issue_date =  $date = date('M d, Y');
                                            $date = strtotime($date);
                                            $date = strtotime("+14 day", $date);
                                            $return_date =  date('M d, Y', $date);
                                        ?>
                                        <tr>
                                            <td><input type="text" class="form-control" value="Issue date: <?php echo $issue_date ?>" disabled></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" value="Return date: <?php echo $return_date ?>" disabled></td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <input type="submit" name="submit" class="btn btn-default submit" value="Issue Book" style="background-color: blue; color: white;">
                                            </td>
                                        </tr>
                                    </table>
                                </form>

                                <?php

                                    if(isset($_POST['submit']))
                                    {
                                        $book_name = $_POST['book_name'];
                                        $student_id = $_POST['student_id'];
                                        $user_name = $_POST['user_name'];
                                        $librarian = $_SESSION['librarian'];

                                        $sql_check = "SELECT * FROM student_register WHERE username = '$user_name' AND student_id = '$student_id'";

                                        $result_check = mysqli_query($con, $sql_check);

                                        $check = mysqli_num_rows($result_check);

                                        if($check==1)
                                        {
                                            $sql = "INSERT INTO issue_books (book_name, user_name, student_id, librarian, issue_date, return_date) 
                                            VALUE('$book_name','$user_name','$student_id','$librarian','$issue_date', '$return_date')";

                                            $result = mysqli_query($con, $sql);

                                            if($result == 1)
                                            {

                                            ?>
                                            
                                            <script type="text/javascript">
                                                alert("Book insertion went successfully!");
                                            </script>

                                            <?php

                                            header("location: issue_books.php");
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

