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
					<li class="current">
						<a href="recipes.php">Home</a>
					</li>
					<li>
						<a href="new.php">New Recipe</a>
					</li>
					<li>
						<a href="logout.php">Log Out</a>
					</li>
				</ul>
</div>
<div class="body">
<?php
include("includes/connect.php");

$page_id = $_GET['id'];

	$query = "select * from new_recipe where id='$page_id'";
	
	$run = mysql_query($query);
	
	while ($row= mysql_fetch_array($run)){
	
	$title = $row['post_title'];
	$date = $row['post_date'];
	$author = $row['post_author'];
	$image = $row['post_image'];
	$desc = $row['post_desc'];
	
	
?>
<h2><?php echo $title; ?></h2>
<center><img src="uploads/<?php echo $image; ?>" width="400"/></center>
<p>Published On:&nbsp; &nbsp;<b><?php echo $date; ?></b></p>
<p align="right">Posted By: &nbsp; &nbsp;<b><?php echo $author; ?></b></p>
<p align="justify"><?php echo $desc; ?></p>


<?php } ?>
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
<?php } ?>