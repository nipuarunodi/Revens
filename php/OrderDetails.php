<!doctype html>
<html>
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
			<li class="nav-item"> <a class="nav-link" href="OrderList.php">Customer Orders</a> </li>
	        <li class="nav-item"> <a class="nav-link" href="Supplier.php">Supplier</a> </li>
			<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Stocks </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown1"> <a class="dropdown-item" href="ViewStocks.php">View Stocks</a> <a class="dropdown-item" href="StockManagement.php">Add Stocks</a>
			</li>
	        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Payments </a>
	          <div class="dropdown-menu" aria-labelledby="navbarDropdown1"> <a class="dropdown-item" href="Payments.php">Payments</a> <a class="dropdown-item" href="AddPayments.php">Add Payment</a>
			  </li>
          </ul>
	      
    </div>
  </nav>
	  <br>
	  <br>
	  <br>
<form id="form1" name="form1" method="post">
  <p>&nbsp;</p>
 <table class="table table-striped" align="center" border="1px" style="width:600px; line-height: 40px;">
    <tbody>
		<?php
        
        $con = mysqli_connect("localhost","root","","jayasiripharmacydb");
        
        $sql ="SELECT customer.customerId, customer.customerName, customer.address, customer.teleNo,customerorder.orderDate,customerorder.orderDetails,customerorder.deliveryType,customerorder.prescriptionImagePath FROM customer INNER JOIN customerorder ON customerorder.customerId = customer.customerId AND customerorder.orderId =".$_GET['orderId']."";
		
        $result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result)> 0)
        {
            $row = mysqli_fetch_assoc($result);
            $customerId  = $row['customerId'];
			$customerName  = $row['customerName'];
			$address  = $row['address'];
			$teleNo  = $row['teleNo'];
            $orderDate  = $row['orderDate'];
			$orderDetails  = $row['orderDetails'];
			$deliveryType  = $row['deliveryType'];
			$imagePath = $row['prescriptionImagePath'];
        }
		
        ?>
        <tr>
            <td><label for="textfield">OrderID : </label>
            <label><?php echo $_GET['orderId'] ?></label></td>
        </tr>
        <tr>
            <td><label for="textfield">Customer Name : </label>
            <label><?php echo $customerName ?></label></td>
        </tr>
        <tr>
            <td><label for="textfield">Address : </label>
            <label><?php echo $address ?></label></td>
        </tr>
        <tr>
            <td><label for="textfield">Contact Number : </label>
            <label><?php echo $teleNo ?></label></td>
        </tr>
        <tr>
            <td><label for="textfield">Order Date : </label>
            <label><?php echo $orderDate ?></label></td>
        </tr>
        <tr>
            <td><label for="textfield">Order Details  : </label>
            <label><?php echo $orderDetails ?></label></td>
        </tr>
        <tr>
            <td><label for="textfield">Delivery Type : </label>
            <label><?php echo $deliveryType ?></label></td>
        </tr>
        
        <?php
        
        if($imagePath != 'uploads/'){
            
        ?>
        
        <tr>
            <td><label>Prescription </label></td>
        </tr>
        <tr>
            <td>
                <img src ="<?php echo $imagePath ?> " width="400" height="400"
            </td>
        </tr>
        
        <?php
		  }
		?>
        
        <tr>
            <td><label for="textfield">Total Amount : </label>
            <input type="text" name="orderAmount" id="orderAmount" required></td>
        </tr>
        <?php
        
        if(array_key_exists('confirm', $_POST)) {
            confirm();
        }
        else if(array_key_exists('reject', $_POST)) {
            reject();
        }
        
        function confirm() {
			$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
				
            $orderAmount = $_POST["orderAmount"];

            $sql = "UPDATE customerorder SET orderStatus='Confirmed', totalAmount =".$orderAmount."  WHERE orderId=".$_GET['orderId']."";
            
            mysqli_query($con,$sql);
            echo "<script type='text/javascript'>alert('Order Confirm');</script>";
        }
        
        function reject() {
            $con = mysqli_connect("localhost","root","","jayasiripharmacydb");

            $sql = "UPDATE customerorder SET orderStatus='Rejected' WHERE orderId=".$_GET['orderId']."";
			
			mysqli_query($con,$sql);
			echo "<script type='text/javascript'>alert('Order Rejected');</script>";
        }
		?>
		<tr><td> <form method="post">
		</form></td></tr>
    </tbody>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table align="center" border="1px" style="width:600px; line-height: 40px;">
    <tbody>
      <tr>
        <td width="247"><input type="submit" name="confirm"

                class="btn btn-success" value="Confirm" /></td>
        <td width="247"><input type="submit" name="reject"
                class="btn btn-danger" value="Reject" /></td>
        <td width="244"><input name="button3" type="button" class="btn btn-secondary" id="button3" value="Back"></td>

      </tr>
    </tbody>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>