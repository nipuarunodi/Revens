<?php session_start();

if(!isset($_SESSION["id"]))
{
	header('Location:customerLogin.php');
}
?>


<?php 
include "config.php";
    


	if (isset($_POST['update'])) {
		
		$customerName = $_POST['username'];
		$teleNo = $_POST['number'];
		$email = $_POST['email'];
		$address  = $_POST['address'];
		

		
		$sql = "UPDATE `customer` SET `customerName`='$customerName',`teleNo`='$teleNo',`email`='$email',`address`='$address' WHERE `customerId`='".$_GET['id']."'";

		
		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo '<script>alert("Successfully Updated!")</script>';
			echo("<script type='text/javascript'> document.location = 'CustomerViewProfile.php'; </script>");
		}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
		}
	}

  
	$customerId = $_GET['id'];

	$sql = "SELECT * FROM `customer` WHERE `customerId`='$customerId'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
		    $row = $result->fetch_assoc();
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
    <title>Update Customer</title>
	  
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
			<li class="nav-item"> <a class="nav-link" href="CustomerViewProfile.php">My Profile</a> </li>
	        <li class="nav-item"> <a class="nav-link" href="AddOrder.php?id=<?php echo $_SESSION["id"]; ?>">Add Order</a> </li>
			 <li class="nav-item"> <a class="nav-link" href="customerOrderHistory.php?id=<?php echo $_SESSION["id"]; ?>">Order History</a> </li>
			<li class="nav-item active"> <a class="nav-link" href="EditCustomer.php?id=<?php echo $_SESSION["id"]; ?>">Edit My Profile</a> </li>
          </ul>
	      
    </div>
  </nav>
	  <br>
	  <br>
	  <br>
   <form action="EditCustomer.php?id=<?php echo $_GET['id']?>" method="post" align="center">
	<div>
 
            <h1>Update customer profile</h1>
        
            <div>
                <p>
                  <label >User Name</label>
                  <input type="text" id="txtUsername" name="username" placeholder="Enter username..." value="<?php echo $customerName; ?>">
                </p>
            </div>
            <div>
              <p>
                <label>Email Address</label>
                <input type="text" id="txtEmail" name="email" placeholder="Enter email address..." value="<?php echo $email; ?>">
              </p>
            </div>
            <div class="input-group">
              <p>
                <p>
                  <label>Contact Address</label>
                  <input type="text" id="txtAddress" name="address" placeholder="Enter Address..." value="<?php echo $address; ?>">
                  </p>
                </p>
                <p>&nbsp;</p>
            </div>
	        <div>
              <p>
                <label>Contact Number</label>
                <input type="text" id="txtNumber" name="number" placeholder="Enter Contact Number..." value="<?php echo $teleNo; ?>">
              </p>
              <p>&nbsp;</p>
		    </div>
           <div>

             <input name="update" type="submit" class="btn btn-danger" id="update" onClick="validateAll()" value="Update"/>

          </div>
      </form>
    </body>
<script type="text/javascript">

		function validateUserName(str)
		{
			var str = document.getElementById("txtUsername").value;

			if((!str || 0 === str.length))
				{
					alert("Please Enter the user name");
				    return false;
					
				}
			else{
				return true;
				
			}

		}
	
		function validateEmail()
		{
			var email= document.getElementById("txtEmail").value;

			var at= email.indexOf("@");
			var dt= email.lastIndexOf(".");
			var len= email.length;

			if((at<2) || (dt-at <2) || (len-dt<2))
			{
				alert("Plese enter a valid email address")
				return false;
			}
			else{
				return true;
			}
		}


		function validateAddress(str)
		{
			var str = document.getElementById("txtAddress").value;

			if((!str || 0 === str.length))
				{
					alert("Please Enter the Address");
				    return false;
					
				}
			else{
				return true;
				
			}

		}


		function validateContactNum()
			{
				var number = document.getElementById("txtNumber").value

				if((isNaN(number)) || (number.length !=10))
					{
						alert("Please enter valid contact number");
						return false;
					}
				else{
					return true;
				}

			}

		function validateAll()
		{
			  if(validateUserName() && validateEmail() && validateAddress()  && validateContactNum())
			 {
			   alert("Validation is done ");
			 }
			  else
			 {
			   event.preventDefault(); 
			 }
		}
	</script>
</html>

	
<?php
	}else{

		echo("<script type='text/javascript'> document.location = 'CustomerViewProfile.php'; </script>");
	
	}

?>
	