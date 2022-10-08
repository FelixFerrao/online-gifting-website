<?php
require('connection.php');
session_start();
$prod_name = $_SESSION['product'];
$query = "SELECT * FROM product WHERE pname = '$prod_name'";
$query_run = mysqli_query($conn, $query);
$row = mysqli_fetch_array($query_run);

$pr_id = $row['pid'];

$query2 = "select * from gallery WHERE product_number = '$pr_id'";
$query_run2 = mysqli_query($conn,$query2);
?>

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

<!------------------Single Product-------------->
<div class="small-container single-product">
	<div class="row">
		<div class="col-2">
			<form method="post">
			<img src="<?php echo $row['directory']?>" width="100%" id="ProductImg">

			<div class="small-img-row">
			<?php
				while($rows = mysqli_fetch_array($query_run2)){

			?>
				<div class="small-img-col">
					<img src="<?php echo $rows['directory']?>"  width="100%" class="small-img">
				</div>
			<?php 
		}
			?>
			</div>

		</div>
		<div class="col-2">
			<form action="cart.php" method="POST">
				<p>Home / <?php echo $row['pname'] ?></p>
				<h1 id="pname"><?php echo $row['pname'] ?></h1>
				<h4 id="price">₹ <?php echo $row['price'] ?></h4>
				<input type="number" value="1">
				<button type="submit" class="btn" name="Add_to_Cart">Add to Cart</button>
				<input type="hidden" name="prod-name" value="<?php echo $row['pname'] ?>">
				<input type="hidden" name="prod-price" value="<?php echo $row['price'] ?>">
				<h3>Product Details <i class="fa fa-indent"></i></h3>
				<p>Details Here</p>
			</form>
		</div>
	</div>
</div>

<!------title---------->
<div class="small-container">
	<div class="row row-2">
		<h2>Related Products</h2>
		<p>View More</p>
	</div>
</div>

<!-------product--------->

<div class="small-container">

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
<?php
	if (isset($_POST['Add_to_Cart'])) 
	{

		if (isset($_SESSION['cust_name'])) 
		{

			$prod_name = $_POST['prod-name'];
			$prod_cost = $_POST['prod-price'];
			$prod_quan = $_POST['prod-price'];

			$query = "INSERT INTO `cart`(`prod_id`, `pname`, `price`,`quantity`) VALUES ('$pr_id','$prod_name','$prod_cost','1')";
			$query_run = mysqli_query($conn,$query);
			if($query_run)
			{
				echo "<script>alert('Product Added To Cart');
				header('location:product_details.php');
					</script>";
			}
			else {
				echo "<script>alert('Product Can't Be Added To Cart');</script>";
			}
		}
		else
		{
			echo "<script>alert('Login First')
			window.location.href = 'product_details.php'</script>";
		}
}
?>

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

<!-----------js for product gallery------------>
	<script>
		var ProductImg = document.getElementById("ProductImg");
		var SmallImg = document.getElementsByClassName("small-img");
		SmallImg[0].onclick = function()
			{
				ProductImg.src = SmallImg[0].src;
			}
		SmallImg[1].onclick = function()
			{
				ProductImg.src = SmallImg[1].src;
			}
		SmallImg[2].onclick = function()
			{
				ProductImg.src = SmallImg[2].src;
			}
		SmallImg[3].onclick = function()
			{
				ProductImg.src = SmallImg[3].src;
			}
	</script>
</body>
</html>