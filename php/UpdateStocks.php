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
    <title>Update Stocks</title>
  </head>
	
   <body>
    <h2><center style="font-size: 36px; font-weight: inherit;">Stock Update Page</center></h2>
   <form action="UpdateStocks.php" method="post">
    <br>
    <table width="462" height="274" border="0" align="center">
		      <tbody>
		        <tr>
		          <td width="189" height="54">Drug Code:</td>
		          <td width="175"><input type="text" name="drugCode" value="<?php echo $drugCode; ?>">
				  <input type="hidden" name="Did" value="<?php echo $Did; ?>">
	            </tr>
		        <tr>
		          <td height="47">Drug Name:</td>
		          <td><input type="text" name="drugName" value="<?php echo $drugName; ?>"></td>
	            </tr>
		        <tr>
		          <td>Price:</td>
		          <td><input type="text" name="price" value="<?php echo $price; ?>"></td>
	            </tr>
		        <tr>
		          <td>Quantity:</td>
		          <td><input type="number" name="quantity" value="<?php echo $quantity; ?>"></td>
	            </tr>
		        <tr>
		          <td colspan="2"><input type="submit" value="Update" name="update"></td>
	            </tr>
     </tbody>
     </table>
     </form>
     </body>
</html>
<?php
	}else{

		echo("<script type='text/javascript'> document.location = 'ViewStocks.php'; </script>");
	
	}

?>