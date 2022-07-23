<?php  
include 'header.php';

// delete query..
if(isset($_GET['id']))
{
	$id = $_GET['id'];

		$sql_delete_data = "delete from contact where id = '$id'";
		mysqli_query($con,$sql_delete_data);
		header('location:manage_contact.php');
}

// update query..		
if(isset($_GET['u_id']))
{
	$id = $_GET['u_id'];

		$sql_select = "select * from contact where id = '$id'";
		$select_data = mysqli_query($con,$sql_select);
		$row_data = mysqli_fetch_assoc($select_data);
		header('location:Add_contact.php');	
}


// Pagination Next and previous button...
	if(isset($_GET['page_no']))
	{
		$previous = $_GET['page_no'];
	}
	else
	{
		$previous = 1;
	}
	if (isset($_GET['page_no'])) {
		$next = $_GET['page_no'];
	}
	else
	{
		$next = 1;
	}

// pagination...
		$limit = 2;

		$count_record_sql = "select * from contact where l_id = '$id'";
		$count_record_data = mysqli_query($con,$count_record_sql);
		$total_record = mysqli_num_rows($count_record_data);

		$total_page = ceil($total_record/$limit);

		if (isset($_GET['page_no'])) {
			
			$page = $_GET['page_no'];
		}
		else
		{
			$page=1;
		}

		$start = ($page-1)*$limit;




		$view_data = "select * from contact where l_id = '$id' limit $start,$limit";
		$sql_view_data = mysqli_query($con,$view_data);
?>


	<style type="text/css">
		.pagination a{
			color: black;
			float: left;
			margin-top: 3px;
			padding: 4px 8px;
			text-decoration: none;
			transition: background-color .3s;
			border: 1px solid black;
			background-color: #fff;
		}
		.pagination a:hover{
			color: white;
			background-color: green;
		}
		td img{
			width: 50px;
		}
	</style>


<table>
	<th>ID</th>&nbsp;
	<th>Fname</th>
	<th>Lname</th>
	<th>Address</th>
	<th>Gender</th>
	<th>Hobbies</th>
	<th>City</th>
	<th>Mobile</th>
	<th>Image</th>
	<th>Action</th>

	<?php while ($row = mysqli_fetch_assoc($sql_view_data)) { ?>

	<tr>
		<td><?php echo @$row['id']; ?></td>
		<td><?php echo @$row['fname']; ?></td>
		<td><?php echo @$row['lname']; ?></td>
		<td><?php echo @$row['address']; ?></td>
		<td><?php echo @$row['gender']; ?></td>
		<td><?php echo @$row['hobbies']; ?></td>
		<td><?php echo @$row['city']; ?></td>
		<td><?php echo @$row['mobile']; ?></td>
		<td><img src="contact_image/<?php echo @$row['img_name']; ?>"></td>
		<td><a href="manage_contact.php?id=<?php echo $row['id']; ?>">Delete</a>||<a href="Add_contact.php?u_id=<?php echo $row['id']; ?>">Update</a></td>

	</tr>

<?php }  ?>

		
</table>

<div class="pagination">
	<?php if ($previous > 1) { ?>

		<a href="manage_contact.php?page_no=<?php echo $previous - 1; ?>">Previous</a>
	
	<?php } ?>

	<?php for ($i=1; $i <=$total_page ; $i++) { ?>

		<a href="manage_contact.php?page_no=<?php echo $i; ?>"><?php echo $i; ?></a>

	<?php } ?>


	<?php if ($total_page > $next) { ?>
	
		<a href="manage_contact.php?page_no=<?php echo $next +1; ?>">Next</a>

	<?php } ?>

</div>