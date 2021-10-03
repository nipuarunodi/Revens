<?php session_start();

if(!isset($_SESSION["id"]))
{
	header('Location:customerLogin.php');
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./styles.css">
</head>
<body>
    <table width="100%">
        <tbody>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">
                    <form action="add.php" method="post" enctype="multipart/form-data">
                    <table class="loginTable" style="padding: 20px" width="508" align="left">
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
                            <input type="radio" name="delivery" value="Delivery"/>Delivery
                            <input type="radio" name="delivery" value="PickUp"/>PickUp
                        </td>
                        </tr>
                        <tr>
                            <td height="55" colspan="2" style="text-align:center"><blockquote> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input name="btnSubmit" type="submit" class="button" id="btnSubmit" value="Add Now"   />
                                <input name="btnReset" type="reset" class="button" id="btnReset" value="Cancel"   />
                                
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