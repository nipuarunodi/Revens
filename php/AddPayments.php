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
	 <script type="text/javascript">
		 
	
	  
	  function validatePaymentDetails()
		{
			var paymentDetails = document.getElementById("txtPaymentDetails").value;

			if(paymentDetails=="  "|| paymentDetails==null)
			   {
				 alert("Please enter the Payment Details");
				 return false;
			   }
			
				return true;
			
		}
		
	function validateAmount()
		{
			var amount = document.getElementById("txtAmount").value;

			if(amount=="  "|| amount==null)
			   {
				 alert("Please enter the Amount");
				 return false;
			   }
			
				return true;
			
		}
		
	function validateAll()
		{
			if(validatePaymentDetails() && validateAmount())
				{
					alert("Successfully Added");
				}
			else{
				event.preventDefault();
			}
		}
		
	  </script>
	  
  </head>
  <body>
	  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light ">
    <img src="../images/PharmacyLogo.PNG" width="3%" height="3%">
    <img src="../images/JAYASIRIWord.PNG" width="7%" height="7%">
	  <img src="../images/PharmacyWord.PNG" width="7%" height="7%">
	    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
	      <ul class="navbar-nav ml-auto">
			<li class="nav-item"> <a class="nav-link" href="OrderList.php">Customer Orders</a> </li>
	        <li class="nav-item"> <a class="nav-link" href="Supplier.php">Supplier</a> </li>
			<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Stocks </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown1"> <a class="dropdown-item" href="ViewStocks.php">View Stocks</a> <a class="dropdown-item" href="StockManagement.php">Add Stocks</a>
			</li>
	        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Payments </a>
	          <div class="dropdown-menu" aria-labelledby="navbarDropdown1"> <a class="dropdown-item" href="Payments.php">Payments</a> <a class="dropdown-item" href="AddPayments.php">Add Payment</a>
			  </li>
          </ul>
	      
    </div>
  </nav>
	  <br>
	  <br>
	  <br>
	  <center><h1>Add Other Payments</h1></center><br>
	  <center><form action="AddPayments.php" method="post">
	  <table class="table table-striped"align="center" border="1px" style="width:600px; line-height: 40px;">
		  <tr>
		  <td>Payment Details</td>
		  <td><input type="text" id="txtPaymentDetails" name="txtPaymentDetails"></td>
		  </tr>
		  <tr>
		  <td>Amount</td>
		  <td><input type="text" id="txtAmount" name="txtAmount"></td>
		  </tr>
		  <tr>
		  <td>&nbsp;</td>
		  <td><input name="btnSubmit" type="submit" class="badge-success" id="btnSubmit" onClick="validateAll()" value="Add">&nbsp;<input name="btnReset" type="reset" class="badge-secondary" id="btnReset" value="Reset"></td>
		  </tr>
		  </table>
		  <?php
		  if(isset($_POST["btnSubmit"]))
	{
		$paymentDetails = $_POST["txtPaymentDetails"];
		$amount = $_POST["txtAmount"];
		
		$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
					if(!$con)
					{
						die("Cannot connect to the database server");
					}
					
					$sql = "INSERT INTO payment (paymentDetails,amount) VALUES ('$paymentDetails','$amount')";
		
					mysqli_query($con,$sql);
		            
					mysqli_close($con);
		
					echo "<script type='text/javascript'> document.location = 'AddPayments.php' </script>";
	}
		  ?>
	  </form></center>
	  <br>
	  <center>
	  <table align="center" border="1px" style="width:600px; line-height: 40px;">
	  	<tr>
			<th>Payment ID</th>
			<th>Payment Details</th>
			<th>Amount</th>
			<th>&nbsp;</th>
		</tr>
		  <?php
	$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
		if(!$con)
		{
			die("Cannot connect to the database server");
		}
	$sql = "SELECT * FROM payment";
	$results = mysqli_query($con,$sql);
	if(mysqli_num_rows($results)>0)
	{
		while($row = mysqli_fetch_assoc($results))
			{
				
		?>
    <tr>
      <td><?php echo $row['paymentId'];?></td>
      <td><?php echo $row['paymentDetails'];?></td>
      <td><?php echo $row['amount'];?></td>
	  <td><a href="EditPayments.php?id=<?php echo $row['paymentId'];?>"</a><input name=UpdateStocks type="button" class="badge-danger"  value="Update" >&nbsp;<a href="DeletePayments.php?id=<?php echo $row['paymentId'];?>"</a><input name=DeleteStocks type="button" class="badge-primary"  value="Delete" ></td>
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