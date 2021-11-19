<!doctype html>
<html>
<head>
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JayaSiri Pharmacy Supplier Register</title>
	  
  <link href="../css/bootstrap-4.3.1.css" rel="stylesheet">
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/popper.min.js"></script> 
	<script src="../js/bootstrap-4.3.1.js"></script>
	
<link rel="stylesheet" href = "../css/Form.css">
</head>

<body>
	<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light ">
    <img src="../images/PharmacyLogo.PNG" width="3%" height="3%">
    <img src="../images/JAYASIRIWord.PNG" width="7%" height="7%">
	<img src="../images/PharmacyWord.PNG" width="7%" height="7%">
	<div class="collapse navbar-collapse" id="navbarSupportedContent1">
	      <ul class="navbar-nav ml-auto">
			<li class="nav-item"> <a class="nav-link" href="supplierLogin.php">Login</a> </li>
	        <li class="nav-item active"> <a class="nav-link" href="supplierRegister.php">Register</a> </li>
          </ul>
	      
    </div>    
  </nav>
	<br>
	<br>
	<br>
	<center>
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

                <input class="btn btn-info" name="btnRegister" type="submit" id="btnRegister"value="Sign Up" onClick=" validateAll()" />

            </div>
		<a class ="alredy" href=supplierLogin.php>You alredy have an account?Login here</a>
		</center>
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
			header('Location:supplierLogin.php');
		}
			
		?>

     <script type="text/javascript">

		function validateUserName()
		{
			var fname = document.getElementById("txtUsername").value;

			if(fname=="  "|| fname==null)
			   {
				 alert("Please enter the full name");
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

		function validatePassword()
		{
			 var pwd=document.getElementById("txtPassword").value;
			 var cpwd=document.getElementById("txtConfirm_Password").value;

			 if((pwd == " ")|| (pwd == null)|| (pwd!= cpwd))
			 {
				 alert("Please enter correct password and matching confirm password");
				 return false;
			 }
			else{
				return true;
			}
		 }

		function validateCompany()
		{
			var address = document.getElementById("txtCompany").value;

			if(address == " " || address == null)
				{
					alert("Please Enter the Company Name");
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
			  if(validateUserName() && validateEmail() && validatePassword() && validateCompany() && validateContactNum())
			 {
			   alert("Successfully Registerd");
			 }
			  else
			 {
			   event.preventDefault(); 
			 }
		}
	</script>
</html>

