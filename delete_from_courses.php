<?php
include "db.php";

$id = clearData($_GET["id"],"i");

	$sql = "DELETE FROM courses WHERE id = $id";
				
$article = mysqli_query($db, $sql);

if($article){
		echo "<span style='color:green;'>Deleted!!!!</span>"."</br>";
		echo  "<a href=index.php>Home</a>";
}			