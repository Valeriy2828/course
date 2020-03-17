<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8" />
	<title>ArtJocker</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">	
</head>
<body>
	<?php
	include "db.php";				
	// POST 
if(isset($_POST['course']) && isset($_POST['teacher']) && isset($_POST['id'])){
 
    $id = clearData($_POST["id"],"i");
    $course = mysqli_real_escape_string($db ,clearData($_POST["course"]));
    $teacher = mysqli_real_escape_string($db ,clearData($_POST["teacher"]));
     
    $query ="UPDATE courses SET course='$course', teacher='$teacher' WHERE id='$id'";
    $result = mysqli_query($db, $query) or die("Error " . mysqli_error($db)); 
 
    if($result)
        echo "<span style='color:green;'>Updated!!!!</span>"."</br>";
		echo  "<a href=index.php>Home</a>";
}
 
// GET
if(isset($_GET['id']))
{   
    $id = clearData($_GET["id"],"i");
        
    $query ="SELECT * FROM courses WHERE id = '$id'";
    
    $result = mysqli_query($db, $query) or die("Error " . mysqli_error($db)); 
    
    if($result && mysqli_num_rows($result)>0) 
    {
        $row = mysqli_fetch_row($result); 
        $course = $row[1];
        $teacher = $row[2];                
	?>
<!--section form edit-->	
<div class="container">		
	<div class="col-md-6">
			<h2 style="text-align:center; margin: 50px 0 50px 0;"><font color = "#4682B4">Edit course</font></h2>
			<form method="post">
			  <div class="form-group">				
				<input type="hidden" name="id" class="form-control" value="<?php echo $id ?>">		
			  </div>
			  <div class="form-group">
				<label for="exampleInput">course</label>
				<input type="text" name="course" class="form-control" value="<?php echo $course ?>">		
			  </div>			  
		      <div class="form-group">
				<label for="exampleInput">teacher</label>
				<input type="text" name="teacher" class="form-control" value="<?php echo $teacher ?>">		
			  </div>			  
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
<!--end section form edit-->				
     <?php    
        mysqli_free_result($result);
    }
}
		?>			
	</div>	
</div>
</body>
</html>	