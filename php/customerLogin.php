<?php session_start();?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JayaSiri Pharmacy Customer Login</title>
	  
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
			<li class="nav-item active"> <a class="nav-link" href="customerLogin.php">Login</a> </li>
	        <li class="nav-item"> <a class="nav-link" href="customerRegister.php">Register</a> </li>
          </ul>
	      
    </div>    
  </nav>
	<br>
	<br>
	<br>
	<form action="customerLogin.php" method="post" align="center">
	 <h1 class="form-heading"> Sign In </h1>
            
            <div class="input-group">
                <p>
                  <label class="input-label">Email</label>
                  <input class="input-text" type="text" id="txtSignInUsername" name="email" placeholder="Enter Email..." required>
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
					$sql = "SELECT * FROM `customer` WHERE `email`='".$email."' AND `PASSWORD`='".$password."';";
					$results = mysqli_query($con,$sql)	;

					if(mysqli_num_rows($results)>0)
					{
						$row = mysqli_fetch_assoc($results);
						$_SESSION["id"] = $row['customerId'];
						header('Location:CustomerViewProfile.php');
					}
					else
					{ 
						echo "Please enter a correct user name and a
						password";
					}
			    }
			?>
	       <br>
		   <br>
            <div class="input-group">
                <input class="btn btn-primary" type="submit" name="btnSignIn" value="Sign In">
            </div>
	</form>
</body>
</html>
