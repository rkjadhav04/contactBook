<?php include 'db.php';

	
	if (isset($_SESSION['login_id'])) {
		header('location:dashbord.php');	
	}

	if (isset($_POST['login'])) {
		
		$email = $_POST['email'];
		$pass = $_POST['pass'];

		$select_data = "select * from registration where email='$email' and password='$pass'";
		$check_data = mysqli_query($con,$select_data);
		$check = mysqli_num_rows($check_data);

		if ($check==1) {
		 	$row = mysqli_fetch_assoc($check_data);
		 	$_SESSION['login_id'] = $row['id'];
		 	header('location:dashbord.php');
		 } 
	}


 ?>



<!-- <table align="center" style="margin-top: 50px;" border="1px" bgcolor="pink">
	<form method="POST">
		<tr>
			<th>Username:</th>
			<td><input type="email" name="email" placeholder="Enter Your Email"></td>
		</tr>
		<tr>
			<th>Password:</th>
			<td><input type="password" name="pass" placeholder="Enter Current Password" required></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="login" value="Login">&nbsp;&nbsp;&nbsp;<a href="registration.php">Sign Up.?</a> &nbsp;&nbsp;&nbsp; <a href="forget.php">Forget Password.?</a></td>
		</tr>
	</form>
</table> -->















<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;
			font-family: sans-serif;
		}
		body
		{
			background: url(background_image.jpg) no-repeat;
			/*background-size: cover;*/

		}
		.login-form{
			width: 350px;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			position: absolute;
			color: #ffff;
		}
		.login-form h1{
			font-size: 40px;
			text-align: center;
			text-transform: uppercase;
			margin: 40px 0;
		}
		.login-form p{
			font-size: 20px;
			margin: 15px 0;
		}
		.login-form input{
			font-size: 16px;
			width: 100%;
			padding: 15px 10px;
			border: 0;
			outline: none;
			border-radius: 5px;

		}
		.login-form button{
			font-size: 18px;
			font-weight: bold;
			margin: 20px 0;
			padding: 10px 15px;
			width: 50%;
			border-radius: 5px;
			border: 0;
		}
		.login-form button:hover{
			color: green;
		}
		.login-form a{
			color: #fff;
			font-size: 18px;
		}
		.login-form a:hover{
			color: grey;
		}
	</style>
</head>
<body>
	<div class="login-form">
	<h1>User Login</h1>
	<form method="POST">
		<p>User Name</p>
		<input type="email" name="email" placeholder="User Name">
		<p>Password</p>
		<input type="password" name="pass" placeholder="password">
		<button type="submit" name="login">Login</button>&nbsp;&nbsp;&nbsp;<a href="registration.php">Sign Up.?</a>
		<br> <a href="forget.php">Forgot Password.?</a>
	</form>
</div>
</body>
</html>