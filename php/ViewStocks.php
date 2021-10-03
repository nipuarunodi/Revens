<?php 
include "config.php";



$sql = "SELECT * FROM stock";



$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Stocks</title>
  </head>
	
<body>
	<div class="container">
		<h2><center style="font-weight: inherit; font-size: 36px;">
		  <p>View Stocks Page</p></center></h2>
		  <p>&nbsp; </p>
	    <table width="666" border="1" align="center" class="table">
	<thead>
		<tr>
		<th width="119">Did</th>
		<th width="119">Drug Code</th>
		<th width="127">Drug Name</th>
		<th width="128">Price</th>
		<th width="134">Quantity</th>
		<th width="134">Action</th>
	</tr>
	</thead>
	<tbody>	
		<?php
			if ($result->num_rows > 0) {
				
				while ($row = $result->fetch_assoc()) {
		?>

					<tr>
					<td><?php echo $row['Did']; ?></td>
					<td><?php echo $row['drugCode']; ?></td>
					<td><?php echo $row['drugName']; ?></td>
					<td><?php echo $row['price']; ?></td>
					<td><?php echo $row['quantity']; ?></td>
					<td width="124"><a class="btn btn-info" href="UpdateStocks.php?id=<?php echo $row['Did']; ?>">Update</a>&nbsp;<a class="btn btn-danger" href="DeleteStocks.php?id=<?php echo $row['Did']; ?>">Delete</a></td>
					</tr>	
					
		<?php		
				}
			}
		?>
	        	
     </tbody>
   </table>
  </div>
</body>
</html>