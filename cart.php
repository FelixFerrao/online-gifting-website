<?php
session_start();
require('connection.php');
if (isset($_SESSION['cust_name'])) {
	echo "<h2>Logged in!</h2>";
	print_r($_SESSION['cust_name']);
}
else{
	$sql2 = 'delete from cart';
	$sql2_run = mysqli_query($conn,$sql2);
	if($sql2_run){
		header('location:register.php');
	}
}
$Pname = $_SESSION['cust_name'];
$sql1 = "select * from `account` where `username`='$Pname'";
$sql_run1 = mysqli_query($conn,$sql1);
$rows1 = mysqli_fetch_array($sql_run1);
$cus_id = $rows1['acc_id'];
$query4 = "SELECT * FROM `cart`";
$query_run4 = mysqli_query($conn,$query4);
?>
<?php
if (isset($_POST['Buy_Now'])) 
{
		$isempty = empty($_POST['firstname']) || empty($_POST['address']) || empty($_POST['city']);
		if(!$isempty)
		{
			$Name = $_POST['firstname'];
			$Address = $_POST['address'];
			$City = $_POST['city'];

			$query5 = "INSERT INTO `orders`(`order_id`, `fname`, `address`, `city`) VALUES ('$cus_id', '$Name','$Address','$City')";
			$query_run5 = mysqli_query($conn,$query5);
			if($query_run5)
			{
				echo '<script>alert("Order Placed Successfully, Thank you for Shopping With Us");</script>';
				$cusName = $_SESSION['cust_name'];
				$cart_query = "SELECT * FROM `cart`";
				$cart_run = mysqli_query($conn,$cart_query);
				while ($cart_rows = mysqli_fetch_array($cart_run)) {
					$pr_name = $cart_rows['pname'];
					$sql_query = "insert into customer_order values ('$cusName','$pr_name')";
					$sql_query_run = mysqli_query($conn,$sql_query);
				}
				$query6 = "DELETE FROM `cart`";
				$query_run6 = mysqli_query($conn,$query6);
				if($query_run6){
					header('location:log.html');
				}
			}
			else{
				echo "Could not connect!";
			}

		}
		else{
			echo "Dont Leave Empty";
		}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width initial-scale=1.0">
	<title>Shopping Cart</title>
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
		<?php
			if(!mysqli_fetch_array($query_run4) > 0){
				echo "Empty basket";
			}
		?>
		<nav>
			<ul id="MenuItems">
				<li><a href="log.html">Home</a></li>
				<li><a href="products.php">Product</a></li>
				<li><a href="">About</a></li>
				<li><a href="">Contact</a></li>
				<li><a href="index.php" class="button primary">Logout</a></li>
			</ul>
		</nav>
		<a href="cart.php"><img src="images/cart.png" width="30px" height="30px;"></a>
		<img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
	</div>
</div>
<!---------cart details-------->
<div class="small-container cart-page">
	<table>
		<tr>
			<th>Product</th>
			<th>Quantity</th>
			<th>Subtotal</th>
		</tr>
		<form method="POST" action="cart.php">
		<?php
		$query = "SELECT * FROM `cart`";
		$query_run = mysqli_query($conn,$query) or die('Could not connect');
		$total = 0;
		if($query_run)
		{
			while($data = mysqli_fetch_array($query_run))
			{
				$query2 = "SELECT * FROM `product` WHERE pname = '$data[pname]'";
				$query_run2 = mysqli_query($conn,$query2) or die('Could not connect');
				$row = mysqli_fetch_array($query_run2);
			?>
				<tr>
					<td>
						<div class='cart-info'>
							<img src='<?php echo $row['directory']?>'>
							<div>
								<p><?php echo $data['pname'] ?></p>
								<small>Price: ₹ <?php echo $data['price'] ?></small><br>
								<form action='manage-cart' method='POST'>
									<button name='Remove-item' class='remove'>Remove</button>

									<input type='hidden' name='remove-name' value="<?php echo $data["pname"] ?>">
									<input type='hidden' name='remove-price' value="<?php echo $data['price'] ?>">
								</div>
							</div>
						</td>
						<td><?php echo $data['quantity'] ?></td>
						<td>₹ <?php echo $data['price']*$data['quantity'] ?></td>
					</tr>
					<?php
					$total = $total + $data['price'];
				}
		}
		else
		{
			echo "Empty basket";
		}
?>
	</table>
</form>
	<div class="total-price">
		<table>
			<tr>
				<td>Subtotal</td>
				<td></td>
			</tr>
			<tr>
				<td>Total</td>
				<td>₹ <?php echo $total ?></td>
			</tr>
		</table>
	</div>
</div>

<?php
if (isset($_POST['Remove-item'])) {
	$remove_name = $_POST['remove-name'];
	$query3 = "DELETE FROM `cart` WHERE pname = '$remove_name'";
	$query_run3 = mysqli_query($conn,$query3);
	if($query_run3){
		echo "<script>alert('Item removed Successfully')
		window.location.href = 'cart.php'</script>";
	}
}
?>

<div class="billing">
	<div class="row">
		<div class="col-1">
			<form action="cart.php" method="POST">
				<h3>Billing Address</h3>
	            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
	            <input type="text" name="firstname" placeholder="John G. Kelvin">
	            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
	            <input type="text" name="address" placeholder="542 W. 15th Street">
	            <label for="city"><i class="fa fa-institution"></i> City</label>
	            <input type="text" name="city" placeholder="New York">
	            <button class="btn-buy" name="Buy_Now">Purchase</button>
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