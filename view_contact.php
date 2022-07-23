<?php include 'header.php';


	// Next and previous button...
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
		$limit = 1;

		if(isset($_GET['search']))
		{
			$valueserch = $_GET['search'];
			$search_by = $_GET['search_by'];
			$count_record_sql = "select * from contact where l_id = '$id' and $search_by like '%$valueserch%'";
		}
		else
		{
			$count_record_sql = "select * from contact where l_id = '$id'";	
		}
		
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


		// pagination display record

		// $dis_record = "select * from contact limit $start,$limit";
		// $record_dis = mysqli_query($con,$dis_record);

		// show data in login user...
	$id = $_SESSION['login_id'];
		
		if (isset($_GET['search'])) 
		{
			$valueserch = $_GET['search'];
			$search_by = $_GET['search_by'];

				$view_data = "select * from contact where l_id = '$id' and $search_by like '%$valueserch%' limit $start,$limit";
		}	
		else
		{
				$view_data = "select * from contact where l_id = '$id' limit $start,$limit";
		}

				$sql_view_data = mysqli_query($con,$view_data);
			

?>

	<style type="text/css">
		input
		{
			margin-top: 20px;
			margin-left: 20px;
		}
		input[type="submit"]
		{
			margin-left: 0;
		}
		table
		{
			margin-top: 20px;
		}
		td img
		{
			width: 50px;
		}
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
		
	</style>

<form method="GET">
	&nbsp;Searching:-<b><select name="search_by">
		<option selected value="id">ID</option>
		<option value="fname">Name</option>
	</select>&nbsp;<b></b>
	<input type="text" name="search" placeholder="search here">&nbsp;
	<input type="submit" name="searching" value="Serching">
</form>
<table border="1">
	<th>ID</th>&nbsp;
	<th>Fname</th>
	<th>Lname</th>
	<th>Address</th>
	<th>Gender</th>
	<th>Hobbies</th>
	<th>City</th>
	<th>Mobile</th>
	<th>Image</th>

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
	</tr>

<?php }  ?>

</table>
	
	<div class="pagination">
	<!-- previous button... -->
	<?php if ($previous > 1) { ?>

		<a href="view_contact.php?page_no=<?php echo $previous - 1; ?>">Previous</a>
	
	<?php } ?>

	<!-- printf page number -->
	<?php for ($i=1; $i <=$total_page ; $i++) { ?>

		<a href="view_contact.php?page_no=<?php echo $i; if(isset($_GET['search'])) { ?>&search_by=<?php  echo @$search_by; ?>&search=<?php echo @$valueserch;  } ?>"><?php echo $i; ?></a>

	<?php } ?>

	<!-- next button... -->
	<?php if ($total_page > $next) { ?>
	
		<a href="view_contact.php?page_no=<?php echo $next +1; ?>">Next</a>

	<?php } ?>
</div>
