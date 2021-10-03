<?php session_start();

if(!isset($_SESSION["id"]))
{
	header('Location:customerLogin.php');
}
?>


<?php 
include "config.php";
    


	if (isset($_POST['update'])) {
		$customerID = $_POST['customerID'];
		$customerName = $_POST['customerName'];
		$teleNo = $_POST['teleNo'];
		$email = $_POST['email'];
		$address  = $row['address'];
		

		
		$sql = "UPDATE `customer` SET `customerID`='$customerID',`customerName`='$customerName',`teleNo`='$teleNo,`email`='$email' WHERE `customerID`='$customerID'";

		
		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo '<script>alert("Successfully Updated!")</script>';
			
		}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
		}
	}

  
	$Did = $_GET['id'];

	$sql = "SELECT * FROM `customer` WHERE `customerID`='$customerID'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
		    $row = $result->fetch_assoc(); 
			$customerID = $row['customerID'];
			$customerName = $row['customerName'];
			$teleNo  = $row['teleNo'];
		    $email  = $row['email'];
		    $address  = $row['address'];
			
			
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
   <form action="EditCustomer.php" method="post" align="center">
	<div class="signup-box">
 
            <h1 class="form-heading" >Update customer profile</h1>
        
            <div class="input-group">
                <p>
                  <label class="input-label">User Name</label>
                  <input class="input-text" type="text" id="txtUsername" name="username" placeholder="Enter username..." value="<?php echo $customerName; ?>">
                </p>
            </div>
            <div class="input-group">
              <p>
                <label class="input-label">Email Address</label>
                <input class="input-text" type="text" id="txtEmail" name="email" placeholder="Enter email address..." value="<?php echo $email; ?>">
              </p>
            </div>
            <div class="input-group">
              <p>
                <label class="input-label">Contact Address</label>
                <input class="input-text" type="text" id="txtAddress" name="address" placeholder="Enter Address..." value="<?php echo $address; ?>">
              </p>
            </div>
	        <div class="input-group">
              <p>
                <label class="input-label">Contact Number</label>
                <input class="input-text" type="text" id="txtNumber" name="number" placeholder="Enter Contact Number..." value="<?php echo $teleNo; ?>">
              </p>
              <p>&nbsp;</p>
		    </div>
		
           <div class="input-group">
               <p>
                 <input class="input-checkbox" type="checkbox" name="clickterms" id="clickterms" required>
                 <label class="input-checkbox" for="checkbox"> I agree to the terms of services </label>
               </p>
           </div>
           <div class="input-group">
                <input class="input-btn" name="update" type="update" id="update" value="Update" >
            </div>
	   </form>
  </body>
</html>
<?php
	}else{
		
		
		echo("<script type='text/javascript'> document.location = 'CustomerViewProfile.php'; </script>");
		
		
	}

?>