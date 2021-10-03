<!DOCTYPE html>
<?php session_start();

if(!isset($_SESSION["id"]))
{
	header('Location:customerLogin.php');
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
		 $sql = "SELECT * FROM supplier WHERE supplierId = '".$_SESSION["id"]."'";
		 $result = mysqli_query($con,$sql);
		 if(mysqli_num_rows($result)>0)
		 {
			 $row = mysqli_fetch_assoc($result);
		 ?>
		 <tr>
		   <td>Company Name</td>
			 <td> <?php echo $row['supplierCompanyName'];?></td>
		 </tr>
		 <tr>
		   <td>Supplier Name</td>
			 <td> <?php echo $row['supplierName'];?></td>
		 </tr>
		 <tr>
		   <td>Email</td>
			 <td> <?php echo $row['email'];?></td>
		 </tr>
		 <tr>
		   <td>Tele No</td>
			 <td> <?php echo $row['teleNo'];?></td>
		 </tr>
		 <a href="SupplierOrderList.php?id=<?php echo $row['supplierId'] ?>">View Orders</a>&nbsp;
		 <a href="EditSupplierProfile.php?id=<?php echo $row['supplierId'] ?>">Edit Profile</a>
		 
		 <?php
		 }
		 ?>
		</table>
		 </center>
	</body>
</html>
	
	