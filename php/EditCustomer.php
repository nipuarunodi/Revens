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
    <title>Update customer stocks</title>
  </head>
  <body>
   <form action="EditCustomer.php?id=<?php echo $_GET['id']?>" method="post" align="center">
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
             <input type="submit" name="update" id="update" value="Update" onClick="validateAll()"/>
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
	