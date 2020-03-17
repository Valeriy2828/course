<?php
include "db.php";

$id = clearData($_GET["id"],"i");

	$sql = "DELETE FROM students WHERE id = $id";
				
$student = mysqli_query($db, $sql);

if($student){
		echo "<span style='color:green;'>Deleted!!!!</span>"."</br>";
		echo  "<a href=index.php>Home</a>";
}			