<?php

include("includes/connect.php");

	$delete_id = $_GET['del'];
	
	$delete_query = "DELETE FROM new_recipe WHERE id=
	$delete_id";
	
	if(mysql_query($delete_query)){
		
		echo "<script>window.open('view.php?view=view','_self')</script>";
	}

?>
