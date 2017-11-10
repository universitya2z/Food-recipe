<?php

session_start();
if(!isset($_SESSION['email'])){
	header("location: login_user.php");
	
}
	else{
	include "includes/header.php"; 	
?>

<div id="nav">
				<ul>
					<li>
						<a href="recipes.php">Home</a>
					</li>
					<li class="current">
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
<?php if(isset($_GET['view'])){?>
<table align="center" style="margin:0 auto; width:100%; padding-left:15px;">
	<tr>
		<td align="center" colspan="9" bgcolor="orange"><h1>View All Posts</h1></td>
	</tr>
	<tr align="center">
		<th>Post No:</th>
		<th>Title</th>
		<th>Date</th>
		<th>Author</th> 
		<th>Image</th>
		<th>Content</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
<?php
include("includes/connect.php");
	$i=1;
	if(isset($_GET['view'])){
		
		$query = "select * from new_recipe order by 1 DESC";
		$run = mysql_query($query);
		while ($row=mysql_fetch_array($run)){
			
			
			$id = $row['id'];
			$title = $row['post_title'];
			$date = $row['post_date'];
			$author = $row['post_author'];
			$image = $row['post_image'];
			$desc = substr($row['post_desc'],0,50);
		
?>
	<tr align="center">
		<td><?php echo $i++; ?></td>
		<td><?php echo $title; ?></td>
		<td><?php echo $date; ?></td>
		<td><?php echo $author; ?></td>
		<td><img src="uploads/<?php echo $image; ?>" width="50" height="50"></td>
		<td><?php echo $desc; ?></td>
		<td><a href="edit.php?edit=<?php echo $id; ?>" style="text-decoration:none; color:#6c5b37;">Edit</a></td>
		<td><a href="delete.php?del=<?php echo $id; ?>" style="text-decoration:none; color:#6c5b37;">Delete</a></td>
	</tr>
<?php }}}?>
</table>
</div>

<?php 
include "includes/footer.php";

} ?>