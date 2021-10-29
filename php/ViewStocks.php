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
	  
    <link href="../css/bootstrap-4.3.1.css" rel="stylesheet">
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/popper.min.js"></script> 
	<script src="../js/bootstrap-4.3.1.js"></script>
  </head>
  <body>
	<center>
	<h1>View Stocks Page</h1>
	</center>
	<p><div class="container">
	  <h4>Filter the stocks details:</h4><p>
   <input id="myInput" type="text"placeholder="Search.."></p>
   <p><br></p>
<table width="92%" border="0" align="center" >
	<thead>
		<tr>
		<th width="165" height="46"  >Did</th>
		<th width="166" >Drug Code</th>
		<th width="176" >Drug Name</th>
		<th width="176" >Price</th>
		<th width="160" >Quantity</th>
		<th width="141" >Action</th>
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
					<td width="141"><p><a  href="UpdateStocks.php?id=<?php echo $row['Did']; ?>">Update</a>&nbsp;<a href="DeleteStocks.php?id=<?php echo $row['Did']; ?>">Delete</a></p></td>
					</tr>	
					
		<?php		
				}
			}
		?>
	        	
        </tbody>
   </table>
	  
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