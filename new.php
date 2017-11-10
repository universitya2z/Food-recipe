<?php

session_start();
if(!isset($_SESSION['email'])){
	header("location: login_user.php");
	
}
	else{
?>
<!DOCTYPE>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Food &amp; Recipes</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="short icon" href="Images/favicon.png" type="image/x-icon">
</head>
<body>
<div class="container">
	<div class="header">
		<div>
			<a href="index.php"><img src="images/logo.png" alt="Logo"></a>
		</div>
</div>
<div id="nav">
				<ul>
					<li>
						<a href="recipes.php">Home</a>
					</li>
					<li>
						<a href="view.php?view=view">View Recipe</a>
					</li>
					<li class="current">
						<a href="new.php">New Recipe</a>
					</li>
					<li>
						<a href="logout.php">Log Out</a>
					</li>
				</ul>
</div>
<div class="body">
<form method="post" action="new.php" enctype="multipart/form-data" class="form3">

<table align="center">
	<tr>
		<td align="center" colspan="5">
		<h1>Insert New Recipe Here!</h1></td>
	</tr>
	<tr>
		<td align="right">Recipe Title:</td>
		<td><input type="text" name="title"></td>
	</tr>
	<tr>
		<td align="right">Recipe Author:</td>
		<td><input type="text" name="author"></td>
	</tr>
	<tr>
		<td align="right">Recipe Image:</td>
		<td><input type="file" name="image"></td>
	</tr>
	<tr>
		<td align="right">Recipe Description:</td>
		<td><textarea name="desc" cols="29" rows="10"></textarea></td>
	</tr>
	<tr>
		
		<td align="center" colspan="5">
		<button id="btn3" type="submit" name="submit" value="Publish Now">Publish Now</button></td>
	</tr>
</table>
</form>
</div>
<div class="footer">
		<div>
			<p>
				&copy; 2017 | Kritee Sagar
			</p>
		</div>
</div>
</div>
</body>
</html>
<?php
include ("includes/connect.php");

if (isset($_POST['submit'])){
	
	 $title = $_POST['title'];
	 $date = date('Y.m.d');
	 $author = $_POST['author'];
	 $desc = $_POST['desc'];
	 $image_name = $_FILES ['image'] ['name'];
	 $image_type = $_FILES ['image']['type'];
	 $image_size = $_FILES ['image']['size'];
	 $image_tmp = $_FILES  ['image']['tmp_name'];
	
	if($title =='' or $author =='' or $desc ==''){
		echo"<script>alert('Any Field is Empty')</script>";
		exit();
	}
	if($image_type=="image/jpeg" or $image_type=="image/png" or $image_type=="image/gif"){
		
		if($image_size<=50000){
			move_uploaded_file($image_tmp,"uploads/$image_name");
		}
		else{
			echo"<script>alert('Image is Larger, Only 50kb size is allowed')</script>";
		}
	}
	else{
		echo"<script>alert('Image Type is Invalid')</script>";
	}
	$query = "insert into new_recipe(post_title,post_date,post_author,post_image,post_desc
	) values('$title','$date','$author','$image_name','
	$desc')";
	
	if (mysql_query($query)){
		echo "<center><h1>Recipe Has Been Submitted!</h1></center>";
	}
}

?>
<?php } ?>