<?php
	require('connection.php');
	session_start();
	if (isset($_POST['Login'])) 
	{

		$userName = $_POST['loginUser'];
		$userPass = $_POST['loginPass'];

		$query = "select * from `account` where `username`='$userName'";
		if(empty($userName) || empty($userPass))
		{
			echo "<p class='important'><b>Login failed</b></p>";
			echo "<p class='important'> Your login form is incomplete<br>
					Make sure you provide all the reqired details<p>";
			echo "<p class='important'>Go back to <a href='index.php'>login</a></p>";
		}
		else
		{
			$SQL = "select * from `account` where `username`='$userName'";
			$result = mysqli_query($conn, $SQL);
			$data = mysqli_fetch_array($result);
			if($data['username'] != $userName)
			{
				echo "<p class='important'><b>Login failed</b></p>";
				echo "<p class='important'> The username you entered was not recognized<p>";
				echo "<p class='important'>Go back to <a href='index.php'>login</a></p>";
			}
			else if($data['password'] != $userPass)
			{
				echo "<p class='important'><b>Login failed</b></p>";
				echo "<p class='important'> The password you entered is not valid<p>";
				echo "<p class='important'>Go back to <a href='index.php'>login</a></p>";
			}
			
			else
			{
				session_start();
				$_SESSION["cust_name"] = $userName;
				echo "<script>alert('Logged in successfully!)</script>";
				echo "<p class='important'><b>Login Success</b></p>";
				echo "<p class='important'> Hello, ".$data['username'];
				header('location:log.html');

			}
		}
	}

	if(isset($_POST['Register']))
	{

		$isEmpty = empty($_POST['regUser']) || empty($_POST['regEmail']) || empty($_POST['regPass']);

		
		if(!$isEmpty)
		{
			$regName = $_POST['regUser'];
			$regEmail = $_POST['regEmail'];
			$regPass = $_POST['regPass'];
		    
			if (filter_var($regEmail, FILTER_VALIDATE_EMAIL))
		    {

		        $query="insert into `account` (`username`,`email`, `password`) 
		        VALUES ('$regName','$regEmail','$regPass')";

		        if(mysqli_query($conn, $query))
		        {
		            echo "<p>Sign-up successful</p>";
		            echo "<a href='index.php'>Login</a>";
		        }
		        else
		        {
		            $errNo = mysqli_errno($conn);
		            if($errNo == 1062)
		            {
		                echo "<p><b>Sign-up failed</b></p>";
		                echo "<p>Email already in use.<br>
		                You may be already registered or try another email address.</p>
		                Go back to <a href='index.php'>Sign up</a> .";
		             }
		            else if($errNo==1064)
		            {
		                echo "<p><b>Sign-up failed</b></p>";
		                echo "<p>Invalid characters enterd in the form.<br>
		                Make sure you avoid the following characters: apostrophes like['] and backslashes[\].</p>
		                Go back to <a href='signup.php'>Sign up</a> .";
		            }
		        }
		            // $result = mysqli_query($conn, $query) or die (mysqli_error($conn));
		            // echo $result;
		    }
		    else{
		        echo "<p><b>Sign-up failed</b></p>";
		        echo "<p>Email not valid.<br>
		        Make sure you enter a correct email address.</p>
		        Go back to <a href='index.php'>Sign up</a> .";
		    }
		}
		else
		{
		    echo "<p><b>Sign-up failed</b></p>";
		    echo "<p>Your signup form is incomplete and all fields are mandatory<br>
		            Make sure you provide all the required details.</p>
		        Go back to <a href='signup.php'>Sign up</a> .";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width initial-scale=1.0">
	<title>Online Gifting - Registration Page</title>
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
				<li><a href="index.php">Account</a></li>
			</ul>
		</nav>
		<a href="cart.php"><img src="images/cart.png" width="30px" height="30px;"></a>
		<img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
	</div>
</div>

<!-----------account-page-------------->
<div class="account-page">
	<div class="container">
		<div class="row">
			<div class="col-2">
				<img src="images/image1.png" width="100%">
			</div>


			<div class="col-2">
				<div class="form-container">
					<div class="form-btn">
						<span onclick="login()">Login</span>
						<span onclick="register()">Register</span>
						<hr id="Indicator">
					</div>
				<form action="index.php" id="LoginForm" method="POST">
					<input type="text" placeholder="Username" name="loginUser">
					<input type="password" placeholder="Password" name="loginPass">
					<button type="submit" class="btn" name="Login">Login</button>
				</form>

				<form action="index.php" id="RegForm" method="POST">
					<input type="text" placeholder="Username" name="regUser">
					<input type="email" placeholder="Email-ID" name="regEmail">
					<input type="password" placeholder="Password" name="regPass">
					<button type="submit" class="btn" name="Register">Register</button>
				</form>
			</div>
		</div>
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
<!----------JS Toggle For Menu--------------->

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


<!----------JS Toggle For Form--------------->
<script type="text/javascript">
	var LoginForm = document.getElementById("LoginForm");
	var RegForm = document.getElementById("RegForm");
	var Indicator = document.getElementById("Indicator");

	function register(){
		RegForm.style.transform = "translateX(0px)";
		LoginForm.style.transform = "translateX(0px)";
		Indicator.style.transform = "translateX(100px)";
	}

	function login(){
		RegForm.style.transform = "translateX(300px)";
		LoginForm.style.transform = "translateX(300px)";
		Indicator.style.transform = "translateX(0px)";
	}
</script>

<script>
	
</script>

</body>
</html>