<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
	  
  </head>
  <body>
	  <center><h1>Edit Profile</h1></center><br>
	  <center>
	<form action="EditSupplierProfile.php?id=<?php echo $_GET['id'];?>" method="post">
	  <table border="0">
		<?php
		$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
		if(!$con)
		{	
			die("Cannot connect to DB server");		
		}
		$sql ="SELECT * FROM supplier WHERE supplierId ='".$_GET['id']."'";	
		$result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result)> 0)
		{
			
			$row = mysqli_fetch_assoc($result);
		?>
		<tr>
		  <td>Supplier Name</td>
			<td><input type="text" id="txtsupplierName" name="txtsupplierName" value="<?php echo $row['supplierName'];?>"></td>
		</tr>
																														 
		<tr>
		  <td>Supplier Company Name</td>
			<td><input type="text" id="txtsupplierCompanyName" name="txtsupplierCompanyName" value="<?php echo $row['supplierCompanyName'];?>"></td>
		</tr>	
	
		<tr>
		  <td>Email</td>
			<td><input type="text" id="txtemail" name="txtemail" value="<?php echo $row['email'];?>">
		 </td>
		</tr>
		
	    <tr>
		  <td>Tele No</td>
			<td><input type="text" id="txtteleNo" name="txtteleNo" value="<?php echo $row['teleNo'];?>">
		 </td>
		</tr>
		  
		  <td>&nbsp;</td>
			<td><input type="submit" name="btnsubmit" id="btnsubmit" value="Update"></td>
		  </tr>
		  <?php
		}
		  ?>
		</table>
	  </form>
	  </center>
  </body>
	<?php
	if(isset($_POST["btnsubmit"]))
	{
		$supplierCompanyName = $_POST["supplierCompanyName"];
		$supplierName = $_POST["supplierName"];
		$email = $_POST["email"];
		$teleNo = $_POST["teleNo"];
		
		$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
					if(!$con)
					{
						die("Cannot conect to the database server");
					}
					
					$sql = "UPDATE supplier SET supplierCompanyName = '$supplierCompanyName', supplierName = '$supplierName', email = '$_email',teleNo = '$_teleNo' WHERE supplierId  = '".$_GET['id']."'";
		
					mysqli_query($con,$sql);
		            
					mysqli_close($con);
					
					echo '<script>alert("Successfully Updated!")</script>';
		
		            echo "<script type='text/javascript'> document.location = 'SupplierProfile.php'; </script>";
					
	}
?>
</html>