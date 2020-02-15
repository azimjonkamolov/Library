<?php
include "db.php";

if(!empty($_POST["keyword"])) {
$sql ="SELECT * FROM books WHERE book_name like '" . $_POST["keyword"] . "%' OR author_name like '" . $_POST["keyword"] . "%' ORDER BY book_name LIMIT 0,5";
$result = mysqli_query($con, $sql);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $book) {
?>
<li onClick="selectCountry('<?php echo $book["book_name"]; ?>');"><?php echo $book["book_name"];  echo " by "; echo $book["author_name"];  ?></li>
<?php } ?>
</ul>
<?php } } ?>