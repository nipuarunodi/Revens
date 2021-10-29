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
					alert("Successfully Updated");
				}
			else{
				event.preventDefault();
			}
		}
		
	  </script>
	  
  </head>
  <body>
	  <center><h1>Edit Payments</h1></center><br>
	  <center>
	<form action="EditPayments.php?id=<?php echo $_GET['id'];?>" method="post">
	  <table border="0">
		<?php
		$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
		if(!$con)
		{	
			die("Cannot connect to DB server");		
		}
		$sql ="SELECT * FROM payment WHERE paymentId ='".$_GET['id']."'";	
		$result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result)> 0)
		{
			
			$row = mysqli_fetch_assoc($result);
		?>
		<tr>
		  <td>Payment ID</td>
			<td><input type="number" id="txtPaymentId" name="txtPaymentId" value="<?php echo $row['paymentId'];?>"></td>
		  </tr>
		  <tr>
		  <td>Payment Details</td>
			<td><input type="text" id="txtPaymentDetails" name="txtPaymentDetails" value="<?php echo $row['paymentDetails'];?>"></td>
		  </tr>
		  <tr>
		  <td>Amount</td>
			<td><input type="text" id="txtAmount" name="txtAmount" value="<?php echo $row['amount'];?>"></td>
		  </tr>
		  <tr>
		  <td>&nbsp;</td>
			<td><input type="submit" name="btnsubmit" id="btnsubmit" value="Edit" onClick="validateAll()">  <input type="reset" name="btnreset" id="btnreset" value="Reset"></td>
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
		$paymentDetails = $_POST["txtPaymentDetails"];
		$amount = $_POST["txtAmount"];
		
		$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
					if(!$con)
					{
						die("Cannot conect to the database server");
					}
					
					$sql = "UPDATE payment SET paymentDetails = '$paymentDetails', amount = '$amount' WHERE paymentId  = '".$_GET['id']."'";
		
					mysqli_query($con,$sql);
		            
					mysqli_close($con);
					
					echo '<script>alert("Successfully Updated!")</script>';
		
		            echo "<script type='text/javascript'> document.location = 'AddPayments.php'; </script>";
					
	}
?>
</html>