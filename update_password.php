<?php include 'db.php';

$id = $_SESSION['user_id'];
	
	if(isset($_POST['update']))
	{
		$pass = $_POST['password'];


		$status=0;

			$check_old_pass = "select * from old_password where user_id = '$id'";
			$old_pass = mysqli_query($con,$check_old_pass);

			while ($old_pass_row = mysqli_fetch_assoc($old_pass)) {
				
					if($pass==$old_pass_row['old_pass'])
					{
						$status=1;
					}

			}

			if($status==0)
			{
				$sql_update_pass = "update registration set password='$pass' where id = '$id'";
				mysqli_query($con,$sql_update_pass);

				header('location:index.php');
				session_destroy();
			}
			else
			{
				echo "<h2>You can't use existed Password</h2>";
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
				<th>update Password:- </th>
				<td><input type="password" name="password" placeholder="*******"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="update" value="Update Password"></td>
			</tr>
		</table>
	</form>
</body>
</html>