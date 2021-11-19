<?php session_start();

if(!isset($_SESSION["id"]))
{
	header('Location:supplierLogin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
	<link rel="stylesheet" type="text/css" href="./styles.css">
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
			<li class="nav-item"> <a class="nav-link" href="SupplierProfileView.php">My Profile</a> </li>
	        <li class="nav-item"> <a class="nav-link" href="SupplierOrderList.php?id=<?php echo $_SESSION["id"] ?>">My Order List</a> </li>
			<li class="nav-item active"> <a class="nav-link" href="EditSupplierProfile.php?id=<?php echo $_SESSION["id"] ?>">Edit My Profile</a> </li>
          </ul>
	      
    </div>
  </nav>
	  <br>
	  <br>
	  <br>
	  <center><h1>Edit Profile</h1></center><br>
	  <center>
	<form action="EditSupplierProfile.php?id=<?php echo $_SESSION["id"];?>" method="post">
	  <table class="table table-striped" align="center" border="1px" style="width:600px; line-height: 40px;">
		<?php
		$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
		if(!$con)
		{	
			die("Cannot connect to DB server");		
		}
		$sql ="SELECT * FROM supplier WHERE supplierId ='".$_SESSION["id"]."'";
		  
		$result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result)> 0)
		{
			
			$row = mysqli_fetch_assoc($result);
		?>
		
																														 
		<tr>
		  <td>Supplier Company Name</td>
			<td><input type="text" id="txtsupplierCompanyName" name="txtsupplierCompanyName" value="<?php echo $row['supplierCompanyName'];?>"></td>
		</tr>
		  
		  <tr>
		  <td>Supplier Name</td>
			<td><input type="text" id="txtsupplierName" name="txtsupplierName" value="<?php echo $row['supplierName'];?>"></td>
		</tr>
	
		<tr>
		  <td>Email</td>
			<td><input type="text" id="txtemail" name="txtemail" value="<?php echo $row['email'];?>">
		 </td>
		</tr>
		
	    <tr>
		  <td>Tele No</td>
			<td><input type="text" id="txtteleNo" name="txtteleNo" value="<?php echo $row['teleNo'];?>">
		 </td>
		</tr>
		  
		  <td>&nbsp;</td>

			<td><input name="btnsubmit" type="submit" class="btn btn-danger" id="btnsubmit" onClick="validateAll()" value="Update"></td>
		  </tr>
		  <?php
		}
		  ?>
		</table>
	  </form>
	  </center>
  </body>
	<?php
	if(isset($_POST["btnsubmit"])>0)
	{
		$supplierCompanyName = $_POST["txtsupplierCompanyName"];
		$supplierName = $_POST["txtsupplierName"];
		$email = $_POST["txtemail"];
		$teleNo = $_POST["txtteleNo"];
		
		$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
					if(!$con)
					{
						die("Cannot conect to the database server");
					}
					
					$sql = "UPDATE supplier SET supplierCompanyName = '$supplierCompanyName', supplierName = '$supplierName', email = '$email',teleNo = '$teleNo' WHERE supplierId  = '".$_SESSION["id"]."'";
		
					mysqli_query($con,$sql);
		            
					mysqli_close($con);
					
					echo '<script>alert("Successfully Updated!")</script>';
		
		            echo "<script type='text/javascript'> document.location = 'SupplierProfileView.php'; </script>";
					
	}
?>



  <script type="text/javascript">

		function validateSupplierName()
		{
			var fname = document.getElementById("txtsupplierName").value;

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
			var email= document.getElementById("txtemail").value;

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


		function validateCompany()
		{
			var company = document.getElementById("txtsupplierCompanyName").value;

			if(company == " " || company == null)
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
				var number = document.getElementById("txtteleNo").value

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
			  if(validateUserName() && validateEmail() && validateCompany() && validateContactNum())
			 {
			   alert("Successfully Updated");
			 }
			  else
			 {
			   event.preventDefault(); 
			 }
		}
	</script>
</html>