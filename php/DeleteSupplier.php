<?php 

$supplierId = $_GET['id'];

$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
	   if(!$con)
	   {
		   die("Can't delete an item");
	   }
	   $sql = "DELETE FROM supplier WHERE supplierId = '$supplierId'";

mysqli_query($con,$sql);

$alert = "<script>alert('Delete Successfully!!');</script>";
echo $alert;


  header('Location:Supplier.php');


?>
