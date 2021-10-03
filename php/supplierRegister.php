<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Supplier Registration</title>
</head>

<body>
	<form action="supplierRegister.php" method="post">
	<div class="signup-box">
 
            <h1 class="form-heading" >Sign Up</h1>
        
            <div class="input-group">
                <p>
                  <label class="input-label">User Name</label>
                  <input class="input-text" type="text" id="txtUsername" name="username" placeholder="Enter username...">
                </p>
            </div>
            <div class="input-group">
              <p>
                <label class="input-label">Email Address</label>
                <input class="input-text" type="text" id="txtEmail" name="email" placeholder="Enter email address...">
              </p>
            </div>
            <div class="input-group">
              <p>
                <label class="input-label">Password</label>
                <input class="input-text" type="password" id="txtPassword" name="password" placeholder="Enter password...">
              </p>
            </div>   
            <div class="input-group">
              <p>
                <label class="input-label">Confirm Password</label>
                <input class="input-text" type="password" id="txtConfirm_Password" name="confirmpassword" placeholder="Confirm password...">
              </p>
            </div>
            <div class="input-group">
              <p>
                <label class="input-label">Company Name</label>
                <input class="input-text" type="text" id="txtCompany" name="company" placeholder="Enter Company Name...">
              </p>
            </div>
	        <div class="input-group">
              <p>
                <label class="input-label">Contact Number</label>
                <input class="input-text" type="text" id="txtNumber" name="number" placeholder="Enter Contact Number...">
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
                <input class="input-btn" name="btnRegister" type="submit" id="btnRegister"value="Sign Up" >
            </div>
	   </form>
    </div>
</div>

</body>
 
		<?php
		
		
		
		if(isset($_POST["btnRegister"]))
		{
			$userName = $_POST["username"];
			$email = $_POST["email"];
			$password = $_POST["password"];
			$company = $_POST["company"];
			$contactNumber = $_POST["number"];

			$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
			if(!$con)
			{
				die("Something went wrong....Please try again....");
			}
		
			$sql = "INSERT INTO `supplier` (`email`, `PASSWORD`, `teleNo`, `supplierName`, `supplierCompanyName`) VALUES ('$email', '$password', '$contactNumber','$userName', '$company');";
			mysqli_query($con,$sql);

			mysqli_close($con);
			header('Location:login.php');
		}
			
		?>
</html>

