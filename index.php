<?php include "includes/header.php"; ?>
<div id="nav">
				<ul>
					<li class="current">
						<a href="index.php">Home</a>
					</li>
					<li>
						<a href="register_user.php">Register</a>
					</li>
					<li>
						<a href="login_user.php">Login</a>
					</li>
					<li>
						<a href="about.php">About</a>
					</li>
					<li>
						<a href="contact.php">Contact</a>
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
<p align="right"><a href="recipes.php?id=<?php echo $id; ?>">Read More</a></p>
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
<?php include "includes/footer.php"; ?>