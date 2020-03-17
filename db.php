<?php


define("DB_HOST", "localhost");
define("DB_LOGIN", "root");
define("DB_PASSWORD","");
define("DB_NAME", "artjocker");

//Database
$db = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
mysqli_query($db, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
mysqli_query($db, "SET CHARACTER SET 'utf8'");
									
if($db == false){
	echo "<font color = red> Failed to connect to database!!! </font>"."<br>";
	echo '<font color = red>'.mysqli_connect_error().'</font>';
	exit();
}

//filter
function clearData($data ,$type="s"){
		switch($type){
			case "s":
				return trim(strip_tags($data));
			case "e":
				return filter_var($data, FILTER_VALIDATE_EMAIL);
			case "i":
				return (int)$data;
		}																																	
}

//select
$select = mysqli_query($db, "SELECT id, course FROM `courses`" );

//inner
$result = mysqli_query($db, "SELECT c.id, c.course, c.teacher, s.id, s.last_name, s.name,  s.email, s.photo 
							FROM  courses c
							INNER JOIN students s ON c.id = s.course_id" );
