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
<form id="form1" name="form1" method="post">
  <p>&nbsp;</p>
  <table width="544" height="300" border="0">
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
            <input type="text" name="orderAmount" id="orderAmount"></td>
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
  <table width="955" border="0">
    <tbody>
      <tr>
        <td width="247"><input type="submit" name="confirm"
                class="button" value="Confirm" /></td>
        <td width="247"><input type="submit" name="reject"
                class="button" value="Reject" /></td>
        <td width="244"><input type="button" name="button3" id="button3" value="Back"></td>
      </tr>
    </tbody>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>