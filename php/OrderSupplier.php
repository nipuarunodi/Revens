<!doctype html>
<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Supplier Order</title>
	  
  <link href="../css/bootstrap-4.3.1.css" rel="stylesheet">
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/popper.min.js"></script> 
	<script src="../js/bootstrap-4.3.1.js"></script>
	
<script type="text/javascript">

function validateOrderDetails()
{
var details = document.getElementById("txtarea").value;

if(details==null)
   {
	   
alert("Please fill the field");
	   
	 return false;
}
     return true;

}


	
function validateOrderStatus()
{
var status = document.getElementById("txtOrderStatus").value;

if(status==null)
   {
	   
alert("Please fill the field");
	   
	 return false;
}
     return true;

}



function validate()
{
      if(validateOrderDetails()  && validateOrderStatus())
     {
         alert("Supplier Orders Successfully");
     }
     else
     {
        event.preventDefault();
     }
}
	
 	</script>
	
	</head>

<body>
	
<form action="OrderSupplier.php?id=<?php echo $_GET['id'];?>" method="post">
	
<table width="450" height="510" border="1" align="center">
	
  <tbody>
	  
    <tr>
      <td height="61" colspan="2"align="center"><h1>Supplier Orders</h1></td>
    </tr>
	  
    <tr>
      <td><h2>Supplier Id</h2></td>
      <td><input name="txtSupplierId" type="text" required="required" id="txtSupplierId" value="<?php echo $_GET['id'];?>"></td>
    </tr>
	  
	<tr>
      <td><h2>Order Details</h2></td>
      <td><textarea name="textarea" required="required" id="textarea"></textarea></td>
    </tr>
	  
	<tr>
      <td><h2>Order Status</h2></td>
      <td><input name="txtOrderStatus" type="text" required="required" id="txtOrderStatus" value="Pending"></td>
    </tr>
	  
     <tr>
      <td height="70">&nbsp;</td>
		 
      <td><input type="submit" name="btnsubmit" id="btnsubmit" value="Add"onClick="validate()"> 
	  <input type="reset" name="Reset" id="Reset" value="Reset">
	  </td>
    </tr>
	  
  </tbody>
</table>
</form>&nbsp;
	
	

	
<table align="center" border="1px" style="width:600px; line-height: 40px;">
		<tr>
			<th colspan="7"><h2>Supplier Orders View Here!!!</h2></th>
		</tr>
		
		<tr>
			<th>Order Id</th>
			<th>Supplier Id</th>
			<th>Order Details</th>
			<th>Order Status</th>
		</tr>
		
		
	<?php
    $con = mysqli_connect("localhost","root","","jayasiripharmacydb");
		
		if(!$con)
		{
			die("Cannot get that details,Please try again");
		}
	$sql = "SELECT * FROM supplierorder";
	
	$results = mysqli_query($con,$sql);
	
	if(mysqli_num_rows($results)>0)
	{
		while($row = mysqli_fetch_assoc($results))
		{
	?>
		    <tr>
				<td><?php echo $row['orderId']; ?></td>
				<td><?php echo $row['supplierId']; ?></td>
				<td><?php echo $row['orderDetails']; ?></td>
				<td><?php echo $row['orderStatus']; ?></td>
				
			</tr>
		<?php
		    }
	}
		?>
		
</table>
	
	 <?php
				if(isset($_POST["btnsubmit"])){				
				$supplierId = $_POST["txtSupplierId"];
				$orderDetails =  $_POST["textarea"];
				$orderStatus =  $_POST["txtOrderStatus"];
				$date = date("Y-m-d H:i:s");
				
				
	$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
				if(!$con)
				{	
						die("Sorry, We are facing a technical issue");		
				}	
	$sql = "INSERT INTO `supplierorder` (`supplierId`,`orderDetails`,`orderStatus`,`orderDate`) VALUES ('".$supplierId."','".$orderDetails."','".$orderStatus."','".$date."')";
										
					mysqli_query($con,$sql);
		            
					mysqli_close($con);
		
					echo "<script type='text/javascript'> document.location = 'Supplier.php' </script>";

			}
				?>
	
	
</body>
</html>
