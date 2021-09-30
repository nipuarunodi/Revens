<!DOCTYPE html>
<?php session_start();

if(!isset($_SESSION["supplierId"]))
{
	header('Location:login.php');
}

 ?>
<html>
<head>
<meta charset="utf-8">
<title>Supplier Profile View</title>
</head>	
<body>
	<center><h1>My Profile</h1></center><br>

	 <center><table border="0">
		<?php
		 $con = mysqli_connect("localhost","root","","jayasiripharmacydb");
		 if(!$con)
		 {
			 die("Cannot connect to DB server");
		 }
		 $sql = "SELECT * FROM supplier WHERE supplierId = '".$_SESSION["supplierId"]."'";
		 $result = mysqli_query($con,$sql);
		 if(mysqli_num_rows($result)>0)
		 {
			 $row = mysqli_fetch_assoc($result);
		 ?>
		 <tr>
		   <td>Company Name</td>
			 <td <?php echo $row['supplierCompanyName'];?>></td>
		 </tr>
		 <tr>
		   <td>Supplier Name</td>
			 <td <?php echo $row['supplier Name'];?>></td>
		 </tr>
		 <tr>
		   <td>Email</td>
			 <td <?php echo $row['email'];?>></td>
		 </tr>
		 <tr>
		   <td>Tele No</td>
			 <td <?php echo $row['teleNo'];?>></td>
		 </tr>
		 
		 
		 <?php
		 }
		 ?>
		</table>
		 </center>
	