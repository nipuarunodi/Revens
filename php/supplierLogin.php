<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Supplier Login</title>
</head>

<body>
	<center>
	<form action="supplierLogin.php" method="post">
	 <h1 class="form-heading"> Sign In </h1>
            
            <div class="input-group">
                <p>
                  <label class="input-label">Email</label>
                  <input class="input-text" type="text" id="txtSignInUsername" name="email" placeholder="Enter username..." required>
                </p>
            </div>
            <div class="input-group">
              <label class="input-label">Password</label>
                <input class="input-text" type="password" id="txtSignInPassword" name="password" placeholder="Enter password..." required>
      </div>
	          
		     <?php
				if(isset($_POST["btnSignIn"]))
			    {				
					$email = $_POST["email"];
					$password =  $_POST["password"];

					$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
					if(!$con)
					{	
							die("Sorry, We are facing a technical issue");		
					}	
					$sql = "SELECT * FROM `supplier` WHERE `email`='".$email."' AND `PASSWORD`='".$password."';";
					$results = mysqli_query($con,$sql)	;

					if(mysqli_num_rows($results)>0)
					{
						$row = mysqli_fetch_assoc($results);
						$_SESSION["id"] = $row['supplierId'];
						header('Location:SupplierProfileView.php');
					}
					else
					{ 
						echo "Please enter a correct user name and a
						password";
					}
			    }
			?>
	       <br>
            <div class="input-group">
                <input class="input-btn" type="submit" name="btnSignIn" value="Sign In">
                <input class="input-btn" type="button" id="btnSignUp" value="Sign Up">
            </div>
		</center>
	</form>
</body>
</html>

