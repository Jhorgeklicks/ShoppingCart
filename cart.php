<?php 
	include 'includes/Query.php';

	$obj = new Query;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>shopping Cart I</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
</head>
<style>
.table td, .table th {
    padding: .75rem;
    vertical-align: middle;
    border-top: 1px solid #dee2e6;
}
.removeProduct{
    cursor : pointer;
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
        <div class="msg"></div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="table-responsive mt-2">
                        <table class="table table-bordered table-striped text-center">
                          <thead>
                          <tr>
                                <td colspan="7">
                                    <h4 class="text-center text-info m-0">Products in Your cart</h4>
                                </td>
                            </tr>
                            <tr>
                                <th>Number</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th><button class="badge badge-warning p-2 clearCart"><span>❌</span>  Clear Cart</button></th>
                            </tr> 
                          </thead>
                          <tbody id="table-body">
                            
                          </tbody>
                        </table>
                    </div>
                </div>    
            </div>
		</div>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.bundle.js"></script>
	<script src="js/script.js"></script>
</body>
</html>