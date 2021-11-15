<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JayaSiri Pharmacy Admin Login</title>
	  
  <link href="../css/bootstrap-4.3.1.css" rel="stylesheet">
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/popper.min.js"></script> 
	<script src="../js/bootstrap-4.3.1.js"></script>
	<link rel="stylesheet" href = "../css/Form.css">
</head>

<body>
<form id="form1" name="form1" method="post">
<div class="signup-box"> 
	   <center><h1 class="form-heading"> ADMIN LOGIN </h1></center>
            <div class="input-group">
                <p>
                  <label class="input-label">User Name</label>
                  <input class="input-text" type="text" name="txtEmail" id="textfield" placeholder="Enter username..." required>
                </p>
            </div>
            <div class="input-group">
              <label class="input-label">Password</label>
                <input class="input-text" type="password" id="password" name="password" placeholder="Enter password..." required>
           </div>
	
          <p>
	       <input class="input-btn" type="submit" name="submit" id="" value="Login">
          </p>
        <p>  
          <input class="input-btn-rest" type="reset" name="btnreset" id="btnreset" value="Reset" >
        </p>
   <?php
				if(isset($_POST["submit"]))
				{
			  		$username = "admin"; 
			  		$password = "admin";
					
					if(($username==$_POST["txtEmail"])&&($password==$_POST["password"]))
					{
						header('Location:OrderList.php');
					}
					else
					{
						echo"Please enter correct username and password";
					}
				}
	  ?>
  </div>
</body>
</html>
