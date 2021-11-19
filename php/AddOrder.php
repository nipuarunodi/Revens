<?php session_start();

if(!isset($_SESSION["id"]))
{
	header('Location:customerLogin.php');
}
?>
<!doctype html>
<html lang="en">
<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
    <link rel="stylesheet" type="text/css" href="./styles.css">
	<link href="../css/bootstrap-4.3.1.css" rel="stylesheet">
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/popper.min.js"></script> 
	<script src="../js/bootstrap-4.3.1.js"></script>
</head>
<body>
    <table class="table table-striped" align="center" border="1px" style="width:600px; line-height: 40px;">

	<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light ">
    <img src="../images/PharmacyLogo.PNG" width="3%" height="3%">
    <img src="../images/JAYASIRIWord.PNG" width="7%" height="7%">
	  <img src="../images/PharmacyWord.PNG" width="7%" height="7%">
	    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
	      <ul class="navbar-nav ml-auto">
			<li class="nav-item"> <a class="nav-link" href="CustomerViewProfile.php">My Profile</a> </li>
	        <li class="nav-item active"> <a class="nav-link" href="AddOrder.php?id=<?php echo $_SESSION["id"]; ?>">Add Order</a> </li>
			 <li class="nav-item"> <a class="nav-link" href="customerOrderHistory.php?id=<?php echo $_SESSION["id"]; ?>">Order History</a> </li>
			<li class="nav-item"> <a class="nav-link" href="EditCustomer.php?id=<?php echo $_SESSION["id"]; ?>">Edit My Profile</a> </li>
          </ul>
	      
    </div>
  </nav>
	<br>
	<br>
	<br>
    <table width="100%">

        <tbody>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">
                    <form action="AddOrder.php" method="post" enctype="multipart/form-data">
                    <table align="center" border="1px" style="width:600px; line-height: 40px;">
                    <tr>
                        <td height="59" colspan="2" bgcolor="#FFFFFF">
                            <h1 class="loginHeader">Add Order</h1>
                        </td>
                    </tr>
						
					<tr>
						<td height="49" class="inputFields">Upload Your Prescription  : </td>
                        <td><input type="file" name="fileImage" id="fileImage" /></td>
                    </tr>
                    <tr>
                        <td width="170" height="37" class="inputFields">Order Details :</td>
                        <td width="218"><input type="text" name="txtDetails" id="txtDetails" /></td>
                    </tr>
                    <tr>
                        <td height="39" class="inputFields"><label>Delivery Type</label></td>
                        <td>
                            <input type="radio" name="delivery" value="Delivery" required="required"/>Delivery
                            <input type="radio" name="delivery" value="PickUp" required="required"/>PickUp
                        </td>
                        </tr>
                        <tr>
                            <td height="55" colspan="2" style="text-align:center"><blockquote> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input name="btnSubmit" type="submit" class="btn btn-danger" id="btnSubmit" value="Add Now"   />
                                 <input name="btnReset" type="reset" class="btn btn-secondary" id="btnReset" value="Cancel"   />

                                <?php
                                
                                if(isset($_POST["btnSubmit"])){
                                    $drugDetails = $_POST["txtDetails"];
                                    $type = $_POST["delivery"];
                                    $imagePath = "uploads/".basename($_FILES["fileImage"]["name"]);
                                    
                                    move_uploaded_file($_FILES["fileImage"]["tmp_name"],$imagePath);
                                    
                                    $con = mysqli_connect("localhost","root","","jayasiripharmacydb");
                                    
                                    if(!$con)
                                    {	
                                        echo "<script type='text/javascript'>alert('Cannot connect to the database');</script>";
                                    }
                                    
                                    $date = date("Y-m-d H:i:s");
                                    
                                    $sql ="INSERT INTO `customerorder` (`customerId`, `prescriptionImagePath`, `orderDetails`, `deliveryType`, `orderStatus`,`orderDate`,`totalAmount`) VALUES ('".$_SESSION["id"]."', '".$imagePath."', '".$drugDetails."', '".$type."', 'Pending','".$date."',0)";
                                    
                                    if(mysqli_query($con,$sql))
                                    {
                                        echo "<script type='text/javascript'>alert('Order Added Successfully');</script>";
										
										echo "<script type='text/javascript'> document.location = 'CustomerViewProfile.php'; </script>";
                                    }
                                    else
                                    {
                                        echo "<script type='text/javascript'>alert('Opps something is wrong');</script>";
                                    }
                                }
                                
                                ?>
                                
                                </td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>	