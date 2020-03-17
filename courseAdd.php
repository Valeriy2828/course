<?php
include "db.php";


if ((isset($_POST['course']) && ! empty($_POST['course'])) || (isset($_POST['teacher']) && ! empty($_POST['teacher']))){
	//Post data
	$course = mysqli_real_escape_string($db ,clearData($_POST["course"]));
	$teacher = mysqli_real_escape_string($db ,clearData($_POST["teacher"]));
	
	//insert to database
	$sql = mysqli_query($db, "INSERT INTO courses(course, teacher) VALUES('$course','$teacher')");
	
	if($sql){
		echo "<span style='color:green;'>Added!!!!</span>"."</br>";
		echo  "<a href=index.php>Home</a>";
	}	
}else{
	echo "<span style='color:red;'>Error adding!!!!</span>";
}