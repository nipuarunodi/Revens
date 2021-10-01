<?php 
include "config.php";

// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['drugCode'])) {
	$drugCode = $_GET['drugCode'];

	// write delete query
	$sql = "DELETE FROM `stock` WHERE `drugCode`='$drugCode'";

	// Execute the query

	$result = $conn->query($sql);

	if ($result == TRUE) {
		echo '<script>alert("Successfully Deleted!")</script>';
	}else{
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}

?>