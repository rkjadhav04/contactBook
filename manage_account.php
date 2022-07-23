<?php  

include 'header.php';



if(isset($_GET['u_id']))
{
	$id = $_GET['u_id'];

		$sql_select = "select * from registration where id = '$id'";
		$select_data = mysqli_query($con,$sql_select);
		$row_data = mysqli_fetch_assoc($select_data);
		header('location:registration.php');	
}



	$id = $_SESSION['login_id'];
	$manage_view_data = "select * from registration where id = '$id'";
	$sql_manage_view_data = mysqli_query($con,$manage_view_data);


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		td img
		{
			width: 50px;
		}
	</style>
</head>
<body>
	<h1>Welcome <?php echo $login_data['name']; ?></h1>

	<table>
		<th>ID</th>
		<th>Name</th>
		<th>Email</th>
		<th>Password</th>
		<th>image</th>
		<th>Action</th>

		

		<?php while ($row = mysqli_fetch_assoc($sql_manage_view_data)) { ?>

			<tr>
				<td><?php echo @$row['id']; ?></td>
				<td><?php echo @$row['name']; ?></td>
				<td><?php echo @$row['email']; ?></td>
				<td><?php echo @$row['password']; ?></td>
				<td><img src="upload_image/<?php echo $login_data['image_name']; ?>"></td>
				<td><a href="registration.php?u_id=<?php echo $row['id']; ?>">Update</a></td>

			</tr>

		<?php }  ?>

	</table>
</body>
</html>