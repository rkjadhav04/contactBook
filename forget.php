<?php  include 'db.php';

	
	if (isset($_POST['submit'])) {
	
		$email = $_POST['email'];


		$forget = "select * from registration where email = '$email' ";
		$selectquery = mysqli_query($con,$forget);
		$count = mysqli_num_rows($selectquery); 
		$row = mysqli_fetch_assoc($selectquery);

		if ($count==1) 
		{
			$id = $row['id'];
			$_SESSION['user_id'] = $id;
			$pass = $row['password'];

				$store_old_data = "insert into old_password (user_id,old_pass) values ('$id','$pass')";
				mysqli_query($con,$store_old_data);

			header('location:update_password.php');


		}
		else
		{
			echo "Invalid Data in Database....";
		}
	}



 ?>







<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		body{
			background-color: skyblue;
		}
		table
		{
			margin-top: 50px;
		}
	</style>
</head>
<body>
	<form method="POST">
		<table align="center">
			<tr>
				<th>Username:- </th>
				<td><input type="email" name="email" placeholder="username@gmail.com"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Reset Password"></td>
			</tr>
		</table>
	</form>
</body>
</html>