<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Post Data</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
</head>

<body>
	<div class="container mt-4" style="width:500px">
		<form id="myform" enctype="multipart/form-data">
			<div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="product name">
             </div>
			 <div class="form-group">
                <label for="name">Product Price</label>
                <input type="number" name="price" id="price" class="form-control" placeholder="product price">
             </div>
			 <div class="form-group">
                <input type="file" name="file" id="file">
             </div>
			 
			 <div class="form-group">
                <input type="button" name="btn" id="btn" class="btn btn-warning" value="Insert prdsuct">
             </div>
			 
		</form>
	</div>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.bundle.js"></script>
	<script src="js/script.js"></script>
</body>
</html>