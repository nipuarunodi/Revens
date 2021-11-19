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
    <title>JayaSiri Pharmacy Payments Customer Order Histoty</title>
	  
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
			<li class="nav-item"> <a class="nav-link" href="CustomerViewProfile.php">My Profile</a> </li>
	        <li class="nav-item"> <a class="nav-link" href="AddOrder.php?id=<?php echo $_SESSION["id"]; ?>">Add Order</a> </li>
			 <li class="nav-item active"> <a class="nav-link" href="customerOrderHistory.php?id=<?php echo $_SESSION["id"]; ?>">Order History</a> </li>
			<li class="nav-item"> <a class="nav-link" href="EditCustomer.php?id=<?php echo $_SESSION["id"]; ?>">Edit My Profile</a> </li>
          </ul>
	      
    </div>
  </nav>
	<br>
	<br>
	<br>
	<h1 align="center">Order History</h1>
	<table class="table table-striped" align="center" border="1px" style="width:600px; line-height: 40px;">
	 <tbody>
      <tr>
        <td width="200">OrderID </td>
        <td width="200">Date</td>
		<td width="200">Status</td>
        <td width="200">Total Amount</td>
      </tr>
		
		<?php
		$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
		if(!$con)
		{
			die("Sorry, we are facing a technical issue");
		}
		$sql = "SELECT * FROM `customerorder` WHERE customerId='".$_SESSION["id"]."'";
		$result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result)>0)
		{
			$row = mysqli_fetch_assoc($result);
		?>
		 <tr>
			 <td height="49"><?php echo $row['orderId'];?></td>
			 <td><?php echo $row['orderDate'];?></td>
			 <td><?php echo $row['orderStatus'];?></td>
			 <td><?php echo $row['totalAmount'];?></td>
		 </tr>
		
		<?php
		}
		mysqli_close($con);
		?>
		 
		</tbody>
	</table>
</body>
</html>
