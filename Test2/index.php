<?php
include('dbconnection.php')
?>
<!DOCTYPE html>
<html>
<head>
	<title>Test 1</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h1 class="text-primary text-center">Passbook</h1>
		<hr>
		<form method="post">
			
			 <input type="text" class="form-control" placeholder="Add Todo" name="todo" required><br>
			 <input type="submit" name="Submit" value="Save" class="btn btn-outline-primary col-sm-12">
		</form>
	
<body>




<?php
if(isset($_POST['Submit']))
{
	extract($_POST);
	$query = mysqli_query($con,"INSERT INTO `test_table_2`(`Name`) VALUES ('$todo')");
		if($query == true)
		{
			echo "<script>alert('Inserted Successfully');</script>";
		}
		else
		{
			echo "<script>alert('Something Went Wrong');</script>";
		}
}
	
?>
<br>
<table>
	<tbody>
		<?php
			$query = mysqli_query($con,"SELECT * FROM `test_table_2` ");
			while($row = mysqli_fetch_array($query))
			{


		?>
		<form method="post">
		<tr>
		<td style="font-size: 20px;"><input type="checkbox" name="checkbox[]" value="<?Php echo $row['ID'];?>" > <b><?php echo $row['Name'];?></b></td></tr>

	
		<?php
			}
		?>
	</tbody>
		
		
</table>

		<input type="submit" name="delete" value="Delete Todo" class="btn btn-outline-primary"></form>
</div>
<?php
	
if (isset($_POST["delete"]))
 {
    if (count($_POST["checkbox"]) > 0 ) 
    {
        // Imploding checkbox ids
        $all = implode(",", $_POST["checkbox"]);

        $sql =mysqli_query($con,"DELETE FROM `test_table_2` WHERE `ID` IN ($all)");
	    if($sql == true)
		{
			echo "<script>alert('Todo Checkbox Deleted successfully');
				</script>";
				header('location:index.php');
			exit();
		}
		else
		{
			echo "<script>alert('Todo Checkbox is not Delete');</script>";
		}
    

	}
}



	  
    
    

	/*$query = mysqli_query($con,"DELETE FROM `test_table_2` WHERE `ID`='$id' ");
	if($query == true)
	{
		echo "<script>alert('Todo Checkbox Deleted successfully');
			</script>";
			header('location:index.php');
		exit();
	}
	else
	{
		echo "<script>alert('Todo Checkbox is not Delete');</script>";
	}*/


?><!-- 
<script >
	$('input[type="checkbox"]').on('change', function() {
    $('input[name="' + this.name + '"]').not(this).prop('checked', false);
});
</script> -->
</body>
</html>