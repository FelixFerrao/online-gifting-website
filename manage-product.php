<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['View-Product'])) {
		$_SESSION['product'] = $_POST['Prod_name'];
		echo "<script>window.location.href = 'product_details.php'</script>";
	}
}
?>