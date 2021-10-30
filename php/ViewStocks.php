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
    <title>JayaSiri Pharmacy View Stocks</title>
	  
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
	<center>
	<h1>View Stocks</h1>
	</center>
	<p><div class="container">
	  <h4>Filter the stocks details:</h4><p>
   <input id="myInput" type="text"placeholder="Search.."></p>
  <p>&nbsp;</p>
   <p>
  <button class="badge-success" onclick="sortTable()">Sort Table</button></p><br></p>
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
					<td width="141"><p><a  href="UpdateStocks.php?id=<?php echo $row['Did']; ?>"</a><input name=UpdateStocks type="button" class="badge-danger"  value="Update" >&nbsp;<a href="DeleteStocks.php?id=<?php echo $row['Did']; ?>"</a><input name=DeleteStocks type="button" class="badge-primary"  value="Delete" ></p></td>
					</tr>	
					
		<?php		
				}
			}
		?>
	        	
        </tbody>
   </table>
	  
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp; </p>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
function sortTable() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  while (switching) {
    switching = false;
    rows = table.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[0];
      y = rows[i + 1].getElementsByTagName("TD")[0];
      
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
       
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
  </script>
</body>
</html>