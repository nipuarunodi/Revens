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
	  
  </head>
  <body>
	  <center><h1>Edit Profile</h1></center><br>
	  <center>
	<form action="EditSupplierProfile.php?id=<?php echo $_GET['id'];?>" method="post">
	  <table border="0">
		<?php
		$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
		if(!$con)
		{	
			die("Cannot connect to DB server");		
		}
		$sql ="SELECT * FROM supplier WHERE supplierId ='".$_GET['id']."'";
		  
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
			<td><input type="submit" name="btnsubmit" id="btnsubmit" value="Update" onClick="validateAll()"></td>
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
					
					$sql = "UPDATE supplier SET supplierCompanyName = '$supplierCompanyName', supplierName = '$supplierName', email = '$email',teleNo = '$teleNo' WHERE supplierId  = '".$_GET['id']."'";
		
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
			var address = document.getElementById("txtsupplierCompanyName").value;

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