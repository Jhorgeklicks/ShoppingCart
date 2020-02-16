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
			<div class="row">
				<?php 
					$query = $obj->execute_query("SELECT * FROM FirstShop;");

					if($query){
						// echo  mysqli_num_rows($query);
						while($row = mysqli_fetch_assoc($query)){
							?>

					<div class="col-sm-6 col-md-4 col-lg-3 mb-2">
							<div class="card-deck">
								<div class="card p-2 border-secondary mb-2">
									<img src="img/<?php echo $row['Image']?>" alt="image" class="card-img-top" height="250">
									<div class="card-body">
										<h4 class=" card-title text-center text-info font-weight-bold"><?php echo $row['Name']?></h4>
										<h4 class=" card-text text-center text-danger"><span>Gh&#xa2;</span><?php echo number_format( $row['Price'], 2)?></h4>
									</div>
									<div class="card-footer p-1">
									<form class="form-submit" method="POST">

										<input type="hidden" class="price_id"    value="<?php echo $row['Id']?>">
										<input type="hidden" class="price_name"  value="<?php echo $row['Name']?>">
										<input type="hidden" class="price_image" value="<?php echo $row['Image']?>">
										<input type="hidden" class="price_price" value="<?php echo $row['Price']?>">
										<input type="hidden" class="pcode" 		 value="<?php echo $row['Pcode']?>">

										<button class="btn btn-success btn-block addItemBtn">Add To Cartcart</button>
									</form>
									</div>
								</div>

							</div>
					</div>			
				<?php
						}
					}
				?>
			</div>
		</div>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.bundle.js"></script>
	<script src="js/script.js"></script>
</body>
</html>