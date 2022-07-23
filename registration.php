<?php include 'db.php';

	if(isset($_GET['u_id']))
	{
		$id = $_GET['u_id'];

		$sql_select = "select * from registration where id = '$id'";
		$select_data = mysqli_query($con,$sql_select);
		$row_data = mysqli_fetch_assoc($select_data);	
	}


	if (isset($_POST['save'])) {
			$name = $_POST['name'];
			$email= $_POST['email'];
			$pass = $_POST['pass'];
			$image = rand(0,999999).$_FILES['image']['name'];
			$path = 'upload_image/'.$image;
			move_uploaded_file($_FILES['image']['tmp_name'], $path);


			if(isset($_GET['u_id']))
            {

                $register_data = "update registration set name='$name',email='$email',password='$pass',image_name='$image' where id='$id'";

            }
            else
            {
				$register_data = "insert into registration (name,email,password,image_name) values ('$name','$email','$pass','$image')"; 
			}


			mysqli_query($con,$register_data);

			header('location:index.php');
			session_destroy();
	}



 ?>


<!-- <table align="center" style="margin-top: 50px;" border="1px" bgcolor="pink">
	<form method="POST" enctype="multipart/form-data">
		<tr>
			<td>Name:</td>
			<td><input type="text" name="name" value="<?php echo @$row_data['name']; ?>"></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="email" name="email" value="<?php echo @$row_data['email']; ?>"></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="pass" value="<?php echo @$row_data['password']; ?>"></td>
		</tr>
		<tr>
			<td>Select Image:</td>	
			<td><input type="file" name="image" value="<?php echo @$row_data['image_name']; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="save" value="Register">&nbsp;&nbsp;&nbsp;<a href="index.php">Sign In.?</a></td>
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
		body{
			background: url('background_image.jpg') no-repeat;
			/*background-size: cover;*/
			color: #fff;
		}
		.registration-form{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			width: 400px;
		}
		.registration-form h1{
			font-size: 30px;
			text-align: center;
			text-transform: uppercase;
			margin: 40px 0;

		}
		.registration-form p{
			font-size: 20px;
			margin: 15px 0;
		}
		.registration-form input{
			font-size: 16px;
			padding: 15px 10px;
			width: 100%;
			border: 0;
			border-radius: 5px;
			outline: none;
		}
		.registration-form input[type="file"]{
			font-size: 16px;
			/*padding: 15px 10px;*/
			/*width: 50%;*/
			color: #fff;
		}
		.registration-form button{
			font-size: 18px;
			font-weight: bold;
			margin: 20px 0;
			padding: 10px 15px;
			width: 50%;
			border: 0;
			border-radius: 5px;
			background-color: #fff;
		}
		.registration-form button:hover{
			color: red;
		}
		.registration-form a{
			color: #fff;
			font-size: 18px;
		}
		.registration-form a:hover{
			color: grey;
		}
	</style>
</head>
<body>
	<div class="registration-form">
		<h1>User Registration</h1>
		<form method="POST" enctype="multipart/form-data">
			<p>Name:</p>
			<input type="text" name="name" placeholder="Name" value="<?php echo @$row_data['name']; ?>">
			<p>User Name:</p>
			<input type="email" name="email" placeholder="username@gmail.com" value="<?php echo @$row_data['email']; ?>">
			<p>Password:</p>
			<input type="password" name="pass" placeholder="Password" value="<?php echo @$row_data['password']; ?>">
			<p>Select Image:</p>
			<input type="file" name="image" value="<?php echo @$row_data['image_name']; ?>">
			<button type="submit" name="save">Registration</button>&nbsp;&nbsp;&nbsp;<a href="index.php">Sign In.?</a>
		</form>
	</div>
</body>
</html>