<!DOCTYPE html>
<?php session_start();

if(!isset($_SESSION["id"]))
{
	header('Location:supplierLogin.php');
}

 ?>
<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Supplier Profile View</title>
	  
  <link href="../css/bootstrap-4.3.1.css" rel="stylesheet">
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/popper.min.js"></script> 
	<script src="../js/bootstrap-4.3.1.js"></script>
	  
  </head>

 <body>
	 

<body>
	<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light ">
    <img src="../images/PharmacyLogo.PNG" width="3%" height="3%">
    <img src="../images/JAYASIRIWord.PNG" width="7%" height="7%">
	  <img src="../images/PharmacyWord.PNG" width="7%" height="7%">
	    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
	      <ul class="navbar-nav ml-auto">
			<li class="nav-item active"> <a class="nav-link" href="SupplierProfileView.php">My Profile</a> </li>
	        <li class="nav-item"> <a class="nav-link" href="SupplierOrderList.php?id=<?php echo $_SESSION["id"] ?>">My Order List</a> </li>
			<li class="nav-item"> <a class="nav-link" href="EditSupplierProfile.php?id=<?php echo $_SESSION["id"] ?>">Edit My Profile</a> </li>
          </ul>
	      
    </div>
  </nav>
	<br>
	  <br>
	  <br>

	<center><h1>My Profile</h1></center><br>

	<table class="table table-striped"align="center" border="1px" style="width:600px; line-height: 40px;">
		 
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
		 
		<center>
		 <a href="SupplierOrderList.php?id=<?php echo $row['supplierId'] ?>"</a>
		<input name=AddOrder type="button" class="btn btn-danger"  value="View Orders" >
		 <a href="EditSupplierProfile.php?id=<?php echo $row['supplierId'] ?>"</a>
		<input name=ViewOrderHistory type="button" class="btn btn-primary"  value="Edit Profile" >
		 </center>
		 <?php
		 }
		 ?>
		 
		</table>
		 </center>
	</body>
</html>
	
	