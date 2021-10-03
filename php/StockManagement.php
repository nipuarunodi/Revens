<?php 
include "config.php";

        if (isset($_POST['submit'])) {
		
		$drugCode = $_POST['drugCode'];
		$drugName = $_POST['drugName'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
		


		$sql = "INSERT INTO `stock`(`drugCode`, `drugName`, `price`, `quantity`) VALUES ('$drugCode','$drugName','$price','$quantity')";


		$result = $conn->query($sql);

		if ($result == TRUE) {
			
			echo '<script>alert("Successfully Added!")</script>';
			
		}else{
			
			echo "Error:". $sql . "<br>". $conn->error;
			
		}

		$conn->close();

	}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Stock Management</title>  
  </head>
  <body>
        <h2><center style="font-weight: inherit; font-size: 36px;">
        <p style="color: #000000">Manage Stocks</p></center></h2>
  <form action="StockManagement.php" method="POST">
        <p><br></p>
	  
        <table width="462" height="307" border="0" align="center">
        <tbody>
        <tr>
          <td width="303">Drug Code:</td>
          <td width="149"><input type="text" name="drugCode" id="drugCode" placeholder="DCNXX-XX-XX" required/></td>
        </tr>
        <tr>
          <td>Drug Name:</td>
          <td><input type="text" name="drugName" id="drugName" required/></td>
        </tr>
        <tr>
          <td>Price:</td>
          <td><input type="text" name="price" id="price" required/></td>
        </tr>
        <tr>
          <td>Quantity:</td>
          <td><input type="number" name="quantity" id="quantity" required></td>
        </tr>
        <tr>
          <td height="123" colspan="2"><p>
            <input type="submit" name="submit" value="Add" onClick="validateAll()"/>
            <input type="reset" name="reset" value="Reset">
            <a href="ViewStocks.php">
            <input type="button" name=ViewStocks value="View" >
            </a></p>
          </td>
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
	function validateAll()
	{
		if(validatedrugCode())
		{
			alert("Drug code is correct");
		}
		else{
			event.preventDefault();
		}
	}

</script>
</html>