<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width initial-scale=1.0">
	<title>All Products - | Online Website</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<!--Fonts-->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
		<div class="navbar">
		<div class="logo">
			
		</div>
		<nav>
			<ul id="MenuItems">
				<li><a href="log.html">Home</a></li>
				<li><a href="products.php">Product</a></li>
				<li><a href="">About</a></li>
				<li><a href="">Contact</a></li>
				<li><a href="logout.php" class="button primary">Logout</a></li>
			</ul>
		</nav>
		<a href="cart.php"><img src="images/cart.png" width="30px" height="30px;"></a>
		<img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
	</div>
</div>


<!---------features products-------------->	
<div class="small-container">
	<div class="row row-2">
		<h2>All Products</h2>
	</div>
	<div class="row">
		<div class="col-4">
			<form method="POST" action="manage-product.php">
			<button class="prod-img" name="View-Product"><img src="images/chocolate-gallery-1.jpg"></button>
			<input type="hidden" name="Prod_name" value="Assorted Cadbury Chocolates in Gift Box">
			<h4 id="">Chocolate Set</h4>
			<div class="rating">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-o"></i>
			</div>
			<p>₹ 950.00</p>
		</form>
		</div>
		<div class="col-4">
			<form method="POST" action="manage-product.php">
			<button class="prod-img" name="View-Product"><img src="images/plant-gallery-1.jpg"></button>
			<input type="hidden" name="Prod_name" value="Colourful Metal Planter without Plant">
			<h4>Plant Holder</h4>
			<div class="rating">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-half-o"></i>
				<i class="fa fa-star-o"></i>
			</div>
			<p>₹ 720.00</p>
		</form>
		</div>
		<div class="col-4">
			<form method="POST" action="manage-product.php">
			<button class="prod-img" name="View-Product"><img src="images/bag-gallery-1.jpg"></button>
			<input type="hidden" name="Prod_name" value="Cherry Wine Enco Unisex Laptop Bag">
			<h4>Laptop Bag</h4>
			<div class="rating">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-half-o"></i>
			</div>
			<p>₹ 215.00</p>
		</form>
		</div>
		<div class="col-4">
			<form method="POST" action="manage-product.php">
			<button class="prod-img" name="View-Product"><img src="images/pen-gallery-1.jpg"></button>
			<input type="hidden" name="Prod_name" value="Personalized Pierre Cardin Kriss Fountain Pen">
			<h4>Pen</h4>
			<div class="rating">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-o"></i>
			</div>
			<p>₹ 390.00</p>
		</form>
		</div>
	</div>
	<div class="row">
		<div class="col-4">
			<form method="POST" action="manage-product.php">
			<button class="prod-img" name="View-Product"><img src="images/bottle-gallery-1.jpg"></button>
			<input type="hidden" name="Prod_name" value="Birthday Theme Personalized LED Bottle">
			<h4>LED bottle</h4>
			<div class="rating">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-o"></i>
			</div>
			<p>₹ 720.00</p>
		</form>
		</div>
		<div class="col-4">
			<form method="POST" action="manage-product.php">
			<button class="prod-img" name="View-Product"><img src="images/holder-gallery-1.jpg"></button>
			<input type="hidden" name="Prod_name" value="Classic Wooden Pen Holder with Clock - Customized with Logo">
			<h4>Things Holder</h4>
			<div class="rating">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-half-o"></i>
				<i class="fa fa-star-o"></i>
			</div>
			<p>₹ 590.00</p>
		</form>
		</div>
		<div class="col-4">
			<form method="POST" action="manage-product.php">
			<button class="prod-img" name="View-Product"><img src="images/tie-gallery-1.jpg"></button>
			<input type="hidden" name="Prod_name" value="Tie Set">
			<h4>Tie Set</h4>
			<div class="rating">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-half-o"></i>
			</div>
			<p>₹ 890.00</p>
		</form>
		</div>
		<div class="col-4">
			<form method="POST" action="manage-product.php">
			<button class="prod-img" name="View-Product"><img src="images/holder-gallery-1.jpg"></button>
			<input type="hidden" name="Prod_name" value="Classic Wooden Pen Holder with Clock - Customized with Logo">
			<h4>Things Holder</h4>
			<div class="rating">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-o"></i>
			</div>
			<p>₹ 590.00</p>
		</form>
		</div>
</div>

	<div class="page-btn">
		<span>1</span>
		<span>2</span>
		<span>3</span>
		<span>&#8594;</span>
	</div>
</div>


<!-------------Footer------------------->
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="footer-col-2">
				<h3>Mini Project for CCL</h3>
			</div>
		</div>
		<hr>
		<p class="copyright">CCL Project</p>
	</div>
</div>

<script>
	var MenuItems = document.getElementById("MenuItems");
	MenuItems.style.maxHeight = "0px";
	function menutoggle()
	{
		if(MenuItems.style.maxHeight == "0px")
		{
			MenuItems.style.maxHeight = "200px";
		}
		else
		{
			MenuItems.style.maxHeight = "0px";
		}
	}
</script>
</body>
</html>