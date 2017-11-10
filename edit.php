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
					<li class="current">
						<a href="view.php">View Recipe</a>
					</li>
					<li>
						<a href="logout.php">Log Out</a>
					</li>
				</ul>
</div>
<div class="body">
<?php 
include("includes/connect.php");
	
	$edit_id = $_GET['edit'];
	
	$query	= "select * from new_recipe where id='$edit_id'";
	
	$run = mysql_query($query);
	
while ($row=mysql_fetch_array($run)){
			
			
			$edit_id1 = $row['id'];
			$title = $row['post_title'];
			$date = $row['post_date'];
			$author = $row['post_author'];
			$image = $row['post_image'];
			$desc = $row['post_desc'];

?>
<form method="post" action="edit.php?edit_form=<?php echo 
$edit_id1; ?>" enctype="multipart/form-data" id="form4">

<table align="center">
	<tr>
		<td align="center" colspan="5">
		<h1>Editing Recipe Here!</h1></td>
	</tr>
	<tr>
		<td align="right">Update Title:</td>
		<td><input type="text" name="title" size="50" value="<?php echo $title; ?>"></td>
	</tr>
	<tr>
		<td align="right">Update Author:</td>
		<td><input type="text" name="author" size="50" value="<?php echo $author; ?>"></td>
	</tr>
	<tr>
		<td align="right">Change Image:</td>
		<td><input type="file" name="image">
		<img src="uploads/<?php echo $image; ?>" width="60" height="60"></td>
	</tr>
	<tr>
		<td align="right">Update Description:</td>
		<td align="justify"><textarea name="desc" cols="50" rows="10" 
		><?php echo $desc ?></textarea></td>
	</tr>
	<tr>
		
		<td align="center" colspan="5">
		<input type="submit" name="update" value="Update Now"></td>
	</tr>

<?php }?>
</table>
</form>
<?php 
if (isset($_POST['update'])){
	
	$update_id = $_GET['edit_form'];
	
	$post_title = $_POST['title'];
	$post_date = date('d-m-y');
	$post_author = $_POST['author'];
	$post_desc = $_POST['desc'];
	$post_image = $_FILES['image']['name'];
	$post_image_type = $_FILES['image']['type'];
	$post_image_size = $_FILES['image']['size'];
	$image_tmp = $_FILES['image']['tmp_name'];

	
	move_uploaded_file($image_tmp,"uploads/$post_image");
	
	$update_query = "update new_recipe set post_title='
	$post_title',post_date='$post_date',post_author='
	$post_author',post_image='$post_image',post_desc='
	$post_desc'where id='$update_id'";
	
	if(mysql_query($update_query)){
		
		echo "<script>alert('Post Has Been updated')</script>";
		echo "<script>window.open('recipes.php','_self')</script>";
	}
	
	
	
}


?>
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