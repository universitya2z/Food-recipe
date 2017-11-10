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
						<a href="view.php?view=view">View Recipe</a>
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
<div id="left">
<br />
<?php
	include ("includes/connect.php");
	$query = "select * from new_recipe order by 1 DESC LIMIT 0,4";
	$run = mysql_query($query);
	while($row=mysql_fetch_array($run)){
	
	$id = $row['id'];
	$title = $row['post_title'];
	$image = $row['post_image'];
	$date = date('Y.m.d');
	$author = $row['post_author'];
	$desc = substr($row['post_desc'],0,300);
?>
<h2><a href="recipes.php?id=<?php echo $id;?>"><?php echo $title; ?></a></h2>
<br />
<center>
<img src="uploads/<?php echo $image;?>"/>
</center>
<br />
<p align="justify"><?php echo $desc; ?></p>
<p>Published On:&nbsp; &nbsp;<b><?php echo $date; ?></b></p>
<p align="right">Posted By:&nbsp;<b><?php echo $author; ?></b></p>
<p align="right"><a href="page.php?id=<?php echo $id; ?>">Read More</a></p>
<?php } ?>
</div>
<div id="right">
<center>
					<h2>Recent Post</h2>
</center>
					<br />
<?php
	include ("includes/connect.php");
	$query = "select * from new_recipe order by 1 DESC LIMIT 0,5";
	$run = mysql_query($query);
	while($row=mysql_fetch_array($run)){
	
	$id = $row['id'];
	$title = $row['post_title'];
	$image = $row['post_image'];
?>
<center>
						<a href="index.php?id=<?php echo $id; ?>"><div class="left"><img src="uploads/<?php echo $image; ?>"></div></a>
						<a href="index.php?id=<?php echo $id; ?>"><h3><?php echo $title;?></h3></a>
</center>
<br />
<?php } ?>
</div>
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