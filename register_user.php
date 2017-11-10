<?php

session_start();


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
						<a href="index.php">Home</a>
					</li>
					<li  class="current">
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
				<form action="register_user.php" method="post" enctype="multipart/form-data" id="form1">
					<table>
						<tr>
							<td colspan="6" align="center">
							<h1>Register Here!</h1>
							</td>
						</tr>
						<tr>
							<td align="right">First Name:</td>
							<td><input type="text" name="f_name" placeholder="First Name!" required></td>
							<td align="right">Last Name:</td>
							<td><input type="text" name="l_name" placeholder="Last Name!" required></td>
						</tr>
						<tr>
							<td align="right">E-Mail:</td>
							<td><input type="email" name="email" placeholder="E-Mail!" required></td>
							<td align="right">Re-Type E-Mail:</td>
							<td><input type="email" name="c_email" placeholder="Re-Type E-Mail!" required></td>
						</tr>
						<tr>
							<td align="right">Password:</td>
							<td><input type="password" name="pass" placeholder="Password!" required></td>
							<td align="right">Re-Type Password:</td>
							<td><input type="password" name="c_pass" placeholder="Re-Type Password!" required></td>
						</tr>
						<tr>
							<td align="right">Username:</td>
							<td><input type="text" name="u_name" placeholder="Username!" required></td>
							<td align="right">Address:</td>
							<td><input type="text" name="address" placeholder="Address!" required></td>
						</tr>
						<tr>
							<td align="right">City</td>
							<td><input type="text" name="city" placeholder="City!" required></td>
							<td align="right">State</td>
							<td><input type="text" name="state" placeholder="State!" required></td>
						</tr>
						<tr>
							<td align="right">Country:</td>
							<td><input type="text" name="country" placeholder="Country!" required></td>
							<td align="right">Gender:</td>
							<td id="gen"><select name="gender" id="select">
								<option>I am...</option>
								<option name="male" required >Male</option>
								<option name="female" required >Female</option>
								</select></td>
						</tr>
						<tr>
							<td align="right">Post Office:</td>
							<td><input type="text" name="p_o" placeholder="Post Office!" required></td>
							<td align="right">Date of Birth:</td>
							<td>
								<input type="text" name="date_of_birth" placeholder="e.g.:DD/MM/YYYY" required></td>
						</tr>
						<tr>
							<td align="center" colspan="6">
								<button type="submit" name="register" id="btn1">Register!</button>
							</td>
						</tr>
					</table>
</form>
<?php
include ("includes/connect.php");

	
		if(isset($_POST['register'])){
			
			$f_name = $_POST['f_name'];
			$l_name = $_POST['l_name'];
			$email = $_POST['email'];
			$c_email = $_POST['c_email'];
			$pass = $_POST['pass'];
			$c_pass = $_POST['c_pass'];
			$u_name = $_POST['u_name'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$country = $_POST['country'];
			$gender = $_POST['gender'];
			$date_of_birth = $_POST['date_of_birth'];
			$p_o = $_POST['p_o'];
			
			if(strlen($pass)<10){
				
				echo"<script>alert('Password sould be Minimum 10 Characters!')</script>";
				exit();
			}
			$check_email = "select * from users where email='$email'";
			$run_email = mysql_query($check_email);
			$check = mysql_num_rows($run_email);
			
			if($check==1){
				echo"<script>alert('This E-Mail already has been register here, Please try another E-Mail!')</script>";
				exit();
			}
			 if($email!=$c_email){
				echo 'This E-Mail is Not Match';
				}else{
				if($pass!=$c_pass){
				echo"This Password is Not Match";
				}else{
			
			$insert = "insert into users
			(f_name,l_name,email,c_email,pass,c_pass,u_name,address,city,state,country,gender,date_of_birth,p_o
			)values('$f_name','$l_name','$email','$c_email','$pass','$c_pass','$u_name','$address','$city','$state','$country','$gender','$date_of_birth','$p_o')";
			
			$query = mysql_query($insert);
			if($query){
				echo "<h3 style='width:400px;text-align:justify;color:green;'>Hi, $f_name conratulations, registration complete.</h3>";
			}
			else{
				echo"Registration failed, try again!";
			}
	 }}
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