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
?>
<div class="form-add">
    <div class="container">
		<!-- section course add-->
		<div class="col-md-6">
			<h2 style="text-align:center; margin: 50px 0 50px 0;"><font color = "#4682B4">Add course</font></h2>
			<form method="post" action="courseAdd.php">	 
			  <div class="form-group">
				<label for="exampleInput">course</label>
				<input type="text" name="course" class="form-control" placeholder="course name" maxlength="128">		
			  </div>
			  <div class="form-group">
				<label for="exampleInput">teacher</label>
				<input type="text" name="teacher" class="form-control" placeholder="teacher" maxlength="128">		
			  </div>	  
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		<!-- end section course add-->
		
		<!-- section student add-->
		<div class="col-md-6">
			<h2 style="text-align:center; margin: 50px 0 50px 0;"><font color = "#4682B4">Add student</font></h2>
			<form method="post" action="studentAdd.php" enctype="multipart/form-data">
			  <div class="form-group">
				<label for="exampleInput">last name</label>
				<input type="text" name="last_name" class="form-control" placeholder="last name" maxlength="128">		
			  </div>
			  <div class="form-group">
				<label for="exampleInput">name</label>
				<input type="text" name="name" class="form-control" placeholder="name" maxlength="128">		
			  </div>
			  <div class="form-group">
				<label for="exampleInputEmail1">Email address</label>
				<input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" maxlength="128">
				<small id="emailHelp" name="email" class="form-text text-muted">We'll never share your email with anyone else.</small>
			  </div>
		      <div class="form-group">
				<label for="exampleFormControlFile1">Upload photo</label>
				<input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1">
			  </div>
			  <select class="form-control" name="courses" style="margin-bottom: 15px;">
					<option disabled selected>select course</option>
					<?php											
						while($value = mysqli_fetch_assoc($select)){
					?>	
						<option value="<?php echo $value["id"] ?>"><?php echo $value["course"] ?></option>
					<?php	
						}
					?>		
			  </select>
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>		
		<!--end section student add-->
		
		<!-- section courses-->	
		<div class="col-md-12">
		<h2 style="text-align:center; margin: 50px 0 50px 0;"><font color = "#4682B4">Course</font></h2>
			<?php		
			$article = mysqli_query($db, "SELECT * FROM `courses`");
			?>
			<table class="table table-striped">
			  <thead>
				<tr>
				  <th scope="col">#</th>
				  <th scope="col">Course</th>
				  <th scope="col">Teacher</th>
				  <th scope="col">Edit</th>
				  <th scope="col">Delete</th>
				</tr>
			  </thead>
			  <tbody>
			  <?php
				$i = 0;
					while($query = mysqli_fetch_assoc($article)){
				$i++;
			  ?>	
				<tr>
				  <th scope="row"><?php echo $i?></th>
				  <td><?php echo $query["course"] ?></td>
				  <td><?php echo $query["teacher"] ?></td>	  
				  <td><a href="/courseEdit.php?id=<?php echo $query['id'] ?>">Edit</a></td>
				  <td><a href="/delete_from_courses.php?id=<?php echo $query['id'] ?>">Delete</a></td>
				</tr> 
			  <?php	
					}
			  ?>		
			  </tbody>  
			</table>
		</div>
		<!--end section courses-->
	
		<!-- section courses-->	
		<div class="col-md-12">
		<h2 style="text-align:center; margin: 50px 0 50px 0;"><font color = "#4682B4">Student</font></h2>
			<?php		
			$student = mysqli_query($db, "SELECT * FROM `students`");
			?>
			<table class="table table-striped">
			  <thead>
				<tr>
				  <th scope="col">#</th>
				  <th scope="col">Last name</th>
				  <th scope="col">Name</th>
				  <th scope="col">Email</th>
				  <th scope="col">Photo</th>
				  <th scope="col">Edit</th>
				  <th scope="col">Delete</th>
				</tr>
			  </thead>
			  <tbody>
			  <?php
				$i = 0;
					while($std = mysqli_fetch_assoc($student)){
				$i++;
			  ?>	
				<tr>
				  <th scope="row"><?php echo $i?></th>
				  <td><?php echo $std["last_name"] ?></td>
				  <td><?php echo $std["name"] ?></td>	  
				  <td><?php echo $std["email"] ?></td>	  
				  <?php if(empty($std["photo"]))
						{
					?>
						<td><img src="photo/unnamed11.jpg" width="50" height="50" alt="empty"></td>
					<?php }else{?>
				  <td><img src="photo/<?php echo $std["photo"] ?>" width="50" height="50" alt="photo"></td>
					<?php }?>
				  <td><a href="/studentEdit.php?id=<?php echo $std['id'] ?>">Edit</a></td>
				  <td><a href="/delete_from_students.php?id=<?php echo $std['id'] ?>">Delete</a></td>
				</tr> 
			  <?php	
					}
			  ?>		
			  </tbody>  
			</table>
		</div>
		<!--end section courses-->
	
		<!-- section table-->
		<div class="col-md-12">
			<h2 style="text-align:center; margin: 50px 0 50px 0;"><font color = "#4682B4">Table</font></h2>
			<table class="table table-striped" style="margin-bottom: 100px;">
			  <thead>
				<tr>
				  <th scope="col">#</th>
				  <th scope="col">Course</th>
				  <th scope="col">Teacher</th>
				  <th scope="col">Last name</th>
				  <th scope="col">Name</th>
				  <th scope="col">Email</th>
				  <th scope="col">Photo</th>
				</tr>
			  </thead>
			  <tbody>
			  <?php
				$i = 0;
				while($query = mysqli_fetch_assoc($result)){
					$i++;
			  ?>	
				<tr>
				  <th scope="row"><?php echo $i?></th>
				  <td><a href="courseEdit.php?id=<?php echo $query["id"] ?>"><?php echo $query["course"] ?></a></td>
				  <td><?php echo $query["teacher"] ?></td>
				  <td><?php echo $query["last_name"] ?></td>
				  <td><?php echo $query["name"] ?></td>
				  <td><?php echo $query["email"] ?></td>
				  
					<?php if(empty($query["photo"]))
						{
					?>
						<td><img src="photo/unnamed11.jpg" width="50" height="50" alt="empty"></td>
					<?php }else{?>
				  
						<td><img src="photo/<?php echo $query["photo"] ?>" width="50" height="50" alt="photo"></td> 
					<?php }?>
				</tr>
			  <?php	
				}
			  ?>		
			  </tbody>
			</table>
		</div>
		<!--end section table-->
	</div>
</div>
</body>
</html>

