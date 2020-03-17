<?php
error_reporting(0);
include "db.php";

if ((isset($_POST['last_name']) && ! empty($_POST['last_name'])) || (isset($_POST['name']) && ! empty($_POST['name']))
	|| (isset($_POST['email']) && ! empty($_POST['email']))){
		
		//Post data
		$last_name = mysqli_real_escape_string($db ,clearData($_POST["last_name"]));
		$name = mysqli_real_escape_string($db ,clearData($_POST["name"]));
		$email = mysqli_real_escape_string($db ,clearData($_POST["email"],'e'));
		$courses = $_POST["courses"];
			
	$uploaddir = './photo/';
	$uploadfile = $uploaddir . basename($_FILES['photo']['name']);

	$type = $_FILES['photo']['type'];
	if(($type == 'image/jpeg') || ($type == 'image/jpg') || ($type == 'image/png')){
		$photo = move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);     
		$photo = $_FILES['photo']['name'];
	}else{
		echo "<span style='color:red;'>Error type!!!!</span>";
	}
	//insert to database
	$sql = mysqli_query($db, "INSERT INTO students(course_id, last_name, name, email, photo)
										VALUES('$courses','$last_name', '$name', '$email', '$photo')");
	
	if($sql){
		echo "<span style='color:green;'>Added!!!!</span>"."</br>";
		echo  "<a href=index.php>Home</a>";
	}	

}else{
	echo "<span style='color:red;'>Error adding!!!!</span>";
}