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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>View Stocks</title>
  </head>
	
<body>
	<h2><center style="font-weight: inherit; font-size: 36px;">
	<p>View Stocks Page</p>
	<p>&nbsp;</p>
	</center></h2>
	<p><div class="container">
  <p><center style="font-size: 18px; font-weight: 300;">Filter the stocks details:</center></p>  
  <p>
   <center><input class="form-control" id="myInput" type="text"placeholder="Search.."></center> 
  </p>
  <p><br>
  </p>
  <table width="92%" border="1" align="center" class="table">
	<thead>
		<tr>
		<th width="165">Did</th>
		<th width="166">Drug Code</th>
		<th width="176">Drug Name</th>
		<th width="176">Price</th>
		<th width="160">Quantity</th>
		<th width="141">Action</th>
	</tr>
	</thead>
	<tbody id="myTable">	
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
					<td width="141"><a class="btn btn-info" href="UpdateStocks.php?id=<?php echo $row['Did']; ?>">Update</a>&nbsp;<a class="btn btn-danger" href="DeleteStocks.php?id=<?php echo $row['Did']; ?>">Delete</a></td>
					</tr>	
					
		<?php		
				}
			}
		?>
	        	
     </tbody>
   </table>
      <p><center><a href="StockManagement.php">
      <input type="button" name="button" id="button" value="Back">
      </a></center></p>
  </div>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>
</html>