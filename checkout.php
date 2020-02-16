<?php
include 'includes/Query.php';

$obj = new Query;

$grand_total = 0;
$Items = array();
$all_items ='';

//SELECT CONCAT ( P_Name ,'(',P_Qty,')') AS Items_Quantity, P_Price FROM cart
$sql = "SELECT CONCAT ( P_Name ,'(',P_Qty,')') AS Items_Quantity, T_Price FROM cart";
$result = $obj->execute_query($sql);
$queryRows = mysqli_num_rows($result);
        while($row = mysqli_fetch_assoc($result)){
         $grand_total += $row['T_Price'];
            $Items[] = ($row['Items_Quantity']);
        } 
    // implode() used to convert an array into a string.
       $all_items = implode(', ', $Items);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Check Out</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
</head>
<style>
label {
    margin-bottom: .1rem;
    font-size: 1.1rem;
    letter-spacing: 1px;
    font-family:  Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
.form-group {
    margin-bottom: .4rem;
}
</style>
<body>

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="index.php"><span class="text-light" style="font-size:18px;">📗🧾</span>Books Shop</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav ml-auto">
				<a class="nav-item nav-link" href="#">Products</a>
				<a class="nav-item nav-link" href="#">Categories</a>
				<a class="nav-item nav-link" href="#">Checkout</a>
				<a class="nav-item nav-link" href="cart.php"><span class="text-light" style="font-size:18px;">🛒</span><span id="card-badge-item" class="badge badge-danger">0</span></a>
			</div>
		</div>
		</nav>
		<div class="container mt-2">
            <div class="row justify-content-center">
                <div class="col-lg-6 px-4 pb-4" id="order">
                    <h4 class="text-info text-center p-2 font-weight-bold">Complete Your Order</h4>
                    <div class="jumbotron text-center p-2 mb-2">
                        <h6 class="lead"><b>Product(s) &nbsp;</b><?php echo  $all_items; ?></h6>
                        <h6 class="lead"><b>Delivery Charge &nbsp;</b><span class="text-success font-weight-bold">Free</span></h6>
                        <h5 class="lead"><b>Amount Payable &nbsp; </b><span class="text-danger font-weight-bold">GH&#xa2;<?php echo  number_format($grand_total, 2); ?></span></h5>
                    </div>
                    <form action="" method="POST" id="orderForm">
                        <input type="hidden" name="products" value="<?php echo  $all_items; ?>">
                        <input type="hidden" name="grand_total" value="<?php echo  $grand_total; ?>">
                        <div class="form-group">
                            <!-- <label for="name" class="ml-1">Customer Name:  </label> -->
                            <input  class="form-control" type="text" id="name" name="name" placeholder="Customer name in Full" required>
                        </div>
                        <div class="form-group">
                            <!-- <label for="email" class="ml-1">Customer Email:  </label> -->
                            <input  class="form-control" type="email" id="email" name="email" placeholder="example@gmail.com" required>
                        </div>
                        <div class="form-group">
                            <!-- <label for="tel" class="ml-1">Customer Phone Number:  </label> -->
                            <input  class="form-control" type="tel" id="tel" name="tel" placeholder="Customer Telephone Number" required>
                        </div>
                        <div class="form-group">
                            <!-- <label for="address" class="ml-1">Customer Delivery Adddress:  </label> -->
                            <textarea  class="form-control" id="address" name="address" placeholder="Customer Delivery Address" cols="10" rows="3" placeholder="Enter the Delivery Address here" required></textarea>
                        </div>
                        <h6 class="lead">Select Payment Method</h6>
                        <div class="form-group">
                            <select name="payment_mode" class="form-control">
                                <option value="" selected disabled> - Select Payment Mode - </option>
                                <option value="mm">Mobile Money</option>
                                <option value="cod">cash on Delivery</option>
                                <option value="netBanking">Online Net banking</option>
                                <option value="card">Debit / Credit Card</option>
                            </select>
                        </div>
                        <center>
                        <div class="form-group justify-content-center">
                            <button type="submit" id="place_order_btn" class="btn btn-success py-2 px-4 mt-2">Place Order</button>
                        </div>
                        </center>
                    </form>
                </div>
            </div>
		</div>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.bundle.js"></script>
	<script src="js/script.js"></script>
</body>
</html>