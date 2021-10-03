<?php session_start();

if(!isset($_SESSION["id"]))
{
	header('Location:customerLogin.php');
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Customer Profile View</title>
</head>

<body>
	<h1 align="center">My Profile</h1>
	 <table border="0" align="center">

		<?php
		 $con = mysqli_connect("localhost","root","","jayasiripharmacydb");
		 if(!$con)
		 {
			 die("Sorry, We are facing a technical issue");
		 }
		 $sql = "SELECT * FROM customer WHERE customerId = '".$_SESSION["id"]."'";
		 $result = mysqli_query($con,$sql);
		 if(mysqli_num_rows($result)>0)
		 {
			 $row = mysqli_fetch_assoc($result);
		 ?>
			 <tr>
			   <td>Name: </td>
				 <td> <?php echo $row['customerName'];?></td>
			 </tr>
			 <tr>
			   <td>Email Address: </td>
				 <td> <?php echo $row['email'];?></td>
			 </tr>
			 <tr>
			   <td>Contact Number: </td>
				 <td> <?php echo $row['teleNo'];?></td>
			 </tr>
			 <tr>
			   <td>Address: </td>
				 <td> <?php echo $row['address'];?></td>
			 </tr>

		 
		 <?php
		 }
		 ?>
		</table>
	
</body>
</html>
