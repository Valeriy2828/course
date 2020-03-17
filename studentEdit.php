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
if(isset($_POST['last_name']) && isset($_POST['name']) && isset($_POST['id']) && isset($_POST['email'])){
 
    $id = clearData($_POST["id"],"i");
    $last_name = mysqli_real_escape_string($db ,clearData($_POST["last_name"]));
    $name = mysqli_real_escape_string($db ,clearData($_POST["name"]));    
	$email = mysqli_real_escape_string($db ,clearData($_POST["email"],'e'));
	  
    $query ="UPDATE students SET last_name='$last_name', name='$name', email='$email' WHERE id='$id'";
    $result = mysqli_query($db, $query) or die("Error " . mysqli_error($db)); 
 
    if($result)
        echo "<span style='color:green;'>Updated!!!!</span>"."</br>";
		echo  "<a href=index.php>Home</a>";
}
 
// GET
if(isset($_GET['id']))
{   
    $id = clearData($_GET["id"],"i");
        
    $query ="SELECT * FROM students WHERE id = '$id'";
    
    $result = mysqli_query($db, $query) or die("Error " . mysqli_error($db)); 
    
    if($result && mysqli_num_rows($result)>0) 
    {
        $row = mysqli_fetch_row($result); 
        $last_name = $row[2];
        $name = $row[3];                
        $email = $row[4];                                       
	?>
<!--section form edit-->	
<div class="container">		
	<div class="col-md-6">
			<h2 style="text-align:center; margin: 50px 0 50px 0;"><font color = "#4682B4">Edit student</font></h2>
			<form method="post" enctype="multipart/form-data">
			  <div class="form-group">				
				<input type="hidden" name="id" class="form-control" value="<?php echo $id ?>">		
			  </div>
			  <div class="form-group">
				<label for="exampleInput">last_name</label>
				<input type="text" name="last_name" class="form-control" value="<?php echo $last_name ?>" maxlength="128">		
			  </div>			  
		      <div class="form-group">
				<label for="exampleInput">name</label>
				<input type="text" name="name" class="form-control" value="<?php echo $name ?>" maxlength="128">		
			  </div>
			  <div class="form-group">
				<label for="exampleInputEmail1">email address</label>
				<input type="email" class="form-control" name="email" value="<?php echo $email ?>"  maxlength="128">				
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