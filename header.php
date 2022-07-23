<?php 

	include 'db.php';

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
	<style type="text/css">
		body
		{
			font-family: calibri;
			background-color: lavender;
			margin: 0;
		}
		h1
		{
			text-align: center;
			text-decoration: underline;
		}
		.bg_light
		{
			background-color: #011627;
			color: #fff;
		}
		.container
		{
			width: 1140px;
			margin: auto;
		}
		.flex
		{
			display: flex;
		}
		.space_between
		{
			justify-content: space-between;
		}
		.align_middle
		{
			align-items: center;
		}
		a
		{
			text-decoration: none;
		}
		ul
		{
			margin: 0;
			padding: 0;
			list-style: none;
		}
		.main_menu li
		{
			position: relative;
		}
		.main_menu li a
		{
			color: #fff;
			padding: 20px 30px;
			display: block;
		}
		.main_menu li:hover > a
		{
			color: grey;
		}
		.logo img
		{
			width: 80px;
		}
		.upload_img img
		{
			width: 80px;
			border-radius: 50%;

		}
	</style>
</head>

	<h1>Google Contact Book</h1>

	<header class="bg_light">
		<div class="container flex space_between align_middle">
			<div class="logo">
				<a href="#">
					<img src="logo2.png">
				</a>
			</div>
			<nav>
				<ul class="main_menu flex">
					<li>
						<a href="dashbord.php">Home</a>
					</li>
					<li>	
						<a href="Add_contact.php">Add Contact</a>
					</li>
					<li>
						<a href="view_contact.php">view Contact</a>
					</li>
					<li>
						<a href="manage_contact.php">Manage Contact</a>
						
					</li>
					<li>
						<a href="manage_account.php">Manage Account</a>
					</li>
					<li>	
						<a href="logout.php">Logout</a>
					</li>
				</ul>
			</nav>
			<div class="upload_img">
				<img src="upload_image/<?php echo $login_data['image_name']; ?>">
			</div>
		</div>
	</header>