<?php 
include "config.php";

	$Did = $_GET['id'];

	
	$sql = "DELETE FROM `stock` WHERE `Did`='$Did'";


	$result = $conn->query($sql);

	if ($result == TRUE) {
		echo '<script>alert("Successfully Deleted!")</script>';
		echo("<script type='text/javascript'> document.location = 'ViewStocks.php'; </script>");
	}else{
		echo '<script>alert("Cannot delete Stock details!")</script>';
	}

?>




