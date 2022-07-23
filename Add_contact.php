<?php 

include 'header.php';

$id = $_SESSION['login_id'];


if(isset($_GET['u_id']))
{
    $id = $_GET['u_id'];

        $sql_select = "select * from contact where id = '$id'";
        $select_data = mysqli_query($con,$sql_select);
        $row_data = mysqli_fetch_assoc($select_data);
         
}

    if (isset($_POST['submit'])) 
    {   
        
        $Fname = $_POST['fname'];
        $Lname = $_POST['lname'];
        $Address = $_POST['address'];
        $Gender = $_POST['gender'];
        $Hobbies = $_POST['hobbies'];
        $City = $_POST['city'];
        $Number = $_POST['number'];
        $image = rand(0,999999).$_FILES['image']['name'];
        $c_image = $_FILES['image']['name'];

        if($c_image!="")
        {
            $path = 'contact_image/'.$image;
            move_uploaded_file($_FILES['image']['tmp_name'], $path);
        }
        else
        {
            $image="default.png";
        }



        if(isset($_GET['u_id']))
            {

                $sql = "update contact set fname='$Fname',lname='$Lname',address='$Address',gender='$Gender',hobbies='$Hobbies',city='$City',mobile='$Number',img_name='$image' where id='$id'";

            }
            else
            {

                $sql = "insert into contact(l_id,fname,lname,address,gender,hobbies,city,mobile,img_name) values('$id','$Fname','$Lname','$Address','$Gender','$Hobbies','$City','$Number','$image')";
            }


        mysqli_query($con,$sql);

        header('location:manage_contact.php');

    } 

    
    $user_select = "select * from registration where id = '$id'";
    $user_data = mysqli_query($con,$user_select);
    $user_row = mysqli_fetch_assoc($user_data);



?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style type="text/css">
        caption{
            color: black;
            font-weight: bold;
        }
        form{
            margin-top: 25px;
        }
    </style>
</head>
<body bgcolor="gray">
    <form method="POST" enctype="multipart/form-data">
    <table border="5" bgcolor="pink" width="50%" height="300px" align="center">
        <caption>Add Student Data</caption>
        
        <tr>
            <th>First Name :-</th>
            <td>
                <input type="textbox" name="fname" placeholder="Enter Your First Name" value="<?php echo @$row_data['fname']; ?>">
            </td>
        </tr>
        <tr>
            <th>Last Name :-</th>
            <td>
                <input type="textbox" name="lname" placeholder="Enter Your Last Name" value="<?php echo @$row_data['lname']; ?>">
            </td>
        </tr>
        <tr>
            <th>Address :-</th>
            <td>
                <input type="text" name="address" placeholder="Enter Your Address" value="<?php echo @$row_data['address']; ?>">
            </td>
        </tr>
        <tr>
            <th>Gender :-</th>
            <td>
                <input type="radio" name="gender" value="Male" <?php if(@$row_data['gender']=="Male") { ?> checked="" <?php } ?>>Male
                <input type="radio" name="gender" value="Female" <?php if(@$row_data['gender']=="Female") { ?> checked="" <?php } ?>>Female
            </td>
        </tr>
        <tr>
            <th>Hobbies :-</th>
            <td>
                <input type="checkbox" name="hobbies" value="Cricket" <?php if(@$row_data['hobbies']=="Cricket") { ?> checked="" <?php } ?>>Cricket
                <input type="checkbox" name="hobbies" value="Bike Riding" <?php if(@$row_data['hobbies']=="Bike Riding") { ?> checked="" <?php } ?>>Bike Riding
                <input type="checkbox" name="hobbies" value="Traveling" <?php if(@$row_data['hobbies']=="Traveling") { ?> checked="" <?php } ?>>Traveling
                <input type="checkbox" name="hobbies" value="Watching Movies" <?php if(@$row_data['hobbies']=="Watching Movies") { ?> checked="" <?php } ?>>Watching Moveis
                <input type="checkbox" name="hobbies" value="Reading" <?php if(@$row_data['hobbies']=="Reading") { ?> checked="" <?php } ?>>Reading
            </td>
        </tr>
        <tr>
            <th>City :-</th>
            <td>
                <select name="city">
                    <option value="" disabled selected>-- Select City --</option>
                    <option value="surat" <?php if(@$row_data['city']=="surat") { ?> selected="" <?php } ?>>surat</option>
                    <option value="vapi" <?php if(@$row_data['city']=="vapi") { ?> selected="" <?php } ?>>vapi</option>
                    <option value="valsad" <?php if(@$row_data['city']=="valsad") { ?> selected="" <?php } ?>>valsad</option>
                    <option value="navsari" <?php if(@$row_data['city']=="navsari") { ?> selected="" <?php } ?>>navsari</option>
                    <option value="ahmedabad" <?php if(@$row_data['city']=="ahmedabad") { ?> selected="" <?php } ?>>ahmedabad</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>Mobile :-</th>
            <td><input type="tel" name="number" placeholder="Enter Mobile Number" pattern="[0-9]{10}" value="<?php echo @$row_data['mobile']; ?>"></td>
        </tr>
        <tr>
           <th>Select Image :-</th>
           <td><input type="file" name="image"></td> 
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="submit">
                <input type="reset" name="reset" value="reset">

            </td>
        </tr>
    </table>
</form>
</body>
</html>