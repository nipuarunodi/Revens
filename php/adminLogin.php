<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
	  
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
  </nav>
	<br>
	<br>
	<br>
<form id="form1" name="form1" method="post">
 <table class="table table-striped" align="center" border="1px" style="width:600px; line-height: 40px;">
    <tbody>
      <tr>
        <td height="53" colspan="2" align="center"><h1>ADMIN LOGIN</h1></td>
      </tr>
      <tr>
        <td width="146" height="91"><h2>Email</h2></td>
        <td width="257"><input name="txtEmail" type="text" required="required" id="textfield"></td>
      </tr>
      <tr>
        <td height="93"><h2>Password</h2></td>
        <td><p>
          <input name="password" type="password" required="required" id="password">
        </p></td>
      </tr>
      <tr>
        <td height="41"><center><p>&nbsp;</p></center></td>
        <td><input name="submit" type="submit" class="btn btn-primary" id="" value="Login">  <input name="btnreset" type="reset" class="btn btn-secondary" id="btnreset" value="Reset"></td>
      </tr>
    </tbody>
  </table>

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
 
	</form>
</body>
</html>
