<?php 
include 'header.php';

			if(!isset($_SESSION['login_id']))
			{
				header('location:index.php');
			}
			else
			{
				$id = $_SESSION['login_id'];
			}




			$select_login_user = "select * from registration where id = '$id'";
			$login_user_data = mysqli_query($con,$select_login_user);
			$login_data = mysqli_fetch_assoc($login_user_data);

 ?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>



</head>
<body>
		<h2 align="center">Welcome <?php echo $login_data['name']; ?></h2>

</body>
</html>