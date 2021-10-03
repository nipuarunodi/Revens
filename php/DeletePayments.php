<?php

$paymentId = $_GET['id'];

$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
			if(!$con)
			{	
				die("Cant connect to the database");		
			}
			$sql = "DELETE FROM payment WHERE paymentId = '$paymentId'";
	   
	  	mysqli_query($con,$sql);
			
		echo '<script>alert("Successfully Deleted!")</script>';

		header('Location:AddPayments.php');
	

	?>