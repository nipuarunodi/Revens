<?php 
include "config.php";


	if (isset($_POST['update'])) {
		$Did = $_POST['Did'];
		$drugCode = $_POST['drugCode'];
		$drugName = $_POST['drugName'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
		

		
		$sql = "UPDATE `stock` SET `drugCode`='$drugCode',`drugName`='$drugName',`price`='$price',`quantity`='$quantity' WHERE `Did`='$Did'";

		
		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo '<script>alert("Successfully Updated!")</script>';
			echo("<script type='text/javascript'> document.location = 'ViewStocks.php'; </script>");
			
		}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
		}
	}


	$Did = $_GET['id'];

	$sql = "SELECT * FROM `stock` WHERE `Did`='$Did'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
		    $row = $result->fetch_assoc(); 
			$drugCode = $row['drugCode'];
			$drugName = $row['drugName'];
			$price = $row['price'];
			$quantity  = $row['quantity'];
			$Did = $row['Did'];
			
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JayaSiri Pharmacy Update Stocks</title>
	  
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
  <h2><center>Update Stocks</center></h2>
  <form action="UpdateStocks.php" method="post">
  <br>
  <table class="table table-striped" align="center" border="1px" style="width:600px; line-height: 40px;">
		      <tbody>
		        <tr>
		          <td width="189" height="54">Drug Code:</td>
		          <td width="175"><input type="text" name="drugCode" id="drugCode" placeholder="DCNXX-XX-XX" value="<?php echo $drugCode; ?>" required/>
				  <input type="hidden" name="Did" value="<?php echo $Did; ?>">
	            </tr>
		        <tr>
		          <td height="47">Drug Name:</td>
		          <td><input type="text" name="drugName" id="drugName" value="<?php echo $drugName; ?>" required/></td>
	            </tr>
		        <tr>
		          <td>Price:</td>
		          <td><input type="text" name="price"  id="price"value="<?php echo $price; ?>" required/></td>
	            </tr>
		        <tr>
		          <td>Quantity:</td>
		          <td><input type="number" name="quantity" id="quantity" value="<?php echo $quantity; ?>" required/></td>
	            </tr>
		        <tr>

		          <td colspan="2"><input name="update" type="submit" class="btn btn-danger"  onClick="validateAll()" value="Update"/></td>

	            </tr>
          </tbody>
      </table>
    </form>
 </body>
<script>
	function validatedrugCode()
	{
		var drugCode=document.getElementById("drugCode").value;
		var p1=drugCode.substring(0,3);
		
		var n1=drugCode.substring(3,5);
		var arr=drugCode.split("-");
		
		if((p1=="DCN")&& (!isNaN(n1))&& (!isNaN(arr[1]))&&(!isNaN(arr[2]))&&(arr[1].length==2)&&(arr[2].length==2))
			{
			  return true;
			} 
		    alert ("Please enter correct Drug Code format");
		    return false;
			
	}
	function validatedrugName(str)
		{
			var str = document.getElementById("drugName").value;

			if((!str || 0 === str.length))
				{
					alert("Please Enter the Drug name");
				    return false;
					
				}
			else{
				return true;
				
			}

		}
	function validateprice()
	{
		var pno=document.getElementById("price").value;
		
		
		if((pno>1)&& (!isNaN(pno)))
			{
			  return true;
			} 
		    alert ("Please enter a valid price");
		    return false;
			
	}
	function validateAll()
	{
		if(validatedrugCode() && validatedrugName() && validateprice() )
		{
			alert("Validation is done");
		}
		else{
			event.preventDefault();
		}
	}

</script>
</html>
		
<?php
	}


?>

