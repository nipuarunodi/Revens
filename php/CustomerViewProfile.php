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
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JayaSiri Pharmacy Customer Profile View</title>
	  
  <link href="../css/bootstrap-4.3.1.css" rel="stylesheet">
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/popper.min.js"></script> 
	<script src="../js/bootstrap-4.3.1.js"></script>
</head>

<body>
	<h1 align="center">My Profile</h1>
	<br>
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
	<br>
	<center>
	<a href="AddOrder.php?id=<?php echo $row['customerId']; ?>">Add order</a>
	<a  href="customerOrderHistory.php?id=<?php echo $row['customerId']; ?>">View Order History</a>
	<a  href="EditCustomer.php?id=<?php echo $row['customerId']; ?>">Edit User Details</a>
	</center>
</body>
</html>
