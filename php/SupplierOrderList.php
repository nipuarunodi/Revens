<?php session_start();

if(!isset($_SESSION["id"]))
{
	header('Location:supplierLogin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Untitled Document</title>
    
	<link href="../css/bootstrap-4.3.1.css" rel="stylesheet">
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/popper.min.js"></script> 
	<script src="../js/bootstrap-4.3.1.js"></script>
	  
  </head>
  <body>
	  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light ">
    <img src="../images/PharmacyLogo.PNG" width="3%" height="3%">
    <img src="../images/JAYASIRIWord.PNG" width="7%" height="7%">
	  <img src="../images/PharmacyWord.PNG" width="7%" height="7%">
	    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
	      <ul class="navbar-nav ml-auto">
			<li class="nav-item"> <a class="nav-link" href="SupplierProfileView.php">My Profile</a> </li>
	        <li class="nav-item active"> <a class="nav-link" href="SupplierOrderList.php?id=<?php echo $_SESSION["id"] ?>">My Order List</a> </li>
			<li class="nav-item"> <a class="nav-link" href="EditSupplierProfile.php?id=<?php echo $_SESSION["id"] ?>">Edit My Profile</a> </li>
          </ul>
	      
    </div>
  </nav>
	  <br>
	  <br>
	  <br>
	<center><h1>My Order List</h1></center><br>
	  <center>
	  <table border="1" width="100%">
		  <tr>
		  	<th>Order ID</th>
			<th>Order Date</th>
			<th>Order Details</th>
			<th>Order Status</th>
			<th>Total Amount</th>
			<th>&nbsp;</th>
		  </tr>
		  <?php
		$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
		if(!$con)
		{	
			die("Cannot connect to DB server");		
		}
		$sql ="SELECT * FROM supplierorder WHERE supplierId ='".$_SESSION['id']."'";	
		$result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result)> 0)
		{
			
			while($row = mysqli_fetch_assoc($result))
			{
		?>
		  <tr>
		  	<td><?php echo $row['orderId']?></td>
			<td><?php echo $row['orderDate']?></td>
			<td><?php echo $row['orderDetails']?></td>
			<td><?php echo $row['orderStatus']?></td>
			<td><?php echo $row['totalAmount']?></td>
			<td><a href="SupplierOrderDetails.php?id=<?php echo $row['orderId'] ?>">View Order</a></td>
		  </tr>
		  <?php
			}
		}
		  mysqli_close($con);
		  ?>
	  </table>
	  </center>
  </body>
</html>