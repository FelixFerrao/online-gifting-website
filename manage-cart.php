<?php
session_start();
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
	if (isset($_POST['Add_to_Cart']))
	{
		if (isset($_SESSION['Cart'])) 
		{
			$myitems = array_column($_SESSION['Cart'], 'Item_name');
			if (in_array($_POST['Item_name'], $myitems))
			{
				echo"<script>alert('Item Already Added');
				window.location.href = 'product_details.php';
				</script>";
			}
			else
			{
			$count = count($_SESSION['Cart']);
			$_SESSION['Cart'][$count] = array('Item_name' =>$_POST['Item_name'] ,'Item_price' =>$_POST['Item_price']);
			echo"<script>alert('Item Added in the Cart');
				window.location.href = 'product_details.php';
				</script>";
			}
		}
		else
		{
			$_SESSION['cart'][0] = array('Item_name' =>$_POST['Item_name'] ,'Item_price' =>$_POST['Item_name']);
			echo "<script>alert('Item Added in the Cart');
				window.location.href = 'product_details.php';
				</script>";
		}
	}

	if(isset($_POST['Remove-item']))
	{
		foreach ($_SESSION['cart'] as $key => $value) 
		{
			if ($value['Item_name'] == $_POST['Item_remove']) {
				unset($_SESSION['cart'][$key]);
				$_SESSION['cart'] = array_values($_SESSION['cart']);
				echo "<script>
					alert('Item Removed');
					window.location.href = 'product_details.php';
				</script>";
			}
		}
	}
}
?>

<?php

	/*<script>
		if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready() {
    var removeCartItemButtons = document.getElementsByClassName('btn-danger')
    for (var i = 0; i < removeCartItemButtons.length; i++) {
        var button = removeCartItemButtons[i]
        button.addEventListener('click', removeCartItem)
    }

    var quantityInputs = document.getElementsByClassName('cart-quantity-input')
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i]
        input.addEventListener('change', quantityChanged)
    }

    var addToCartButtons = document.getElementsByClassName('shop-item-button')
    for (var i = 0; i < addToCartButtons.length; i++) {
        var button = addToCartButtons[i]
        button.addEventListener('click', addToCartClicked)
    }

    document.getElementsByClassName('btn-purchase')[0].addEventListener('click', purchaseClicked)
}

function purchaseClicked() {
    alert('Thank you for your purchase')
    var cartItems = document.getElementsByClassName('cart-items')[0]
    while (cartItems.hasChildNodes()) {
        cartItems.removeChild(cartItems.firstChild)
    }
    updateCartTotal()
}

function removeCartItem(event) {
    var buttonClicked = event.target
    buttonClicked.parentElement.parentElement.remove()
    updateCartTotal()
}

function quantityChanged(event) {
    var input = event.target
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
    }
    updateCartTotal()
}

function addToCartClicked(event) {
    var button = event.target
    var shopItem = button.parentElement.parentElement
    var title = shopItem.getElementsByClassName('shop-item-title')[0].innerText
    var price = shopItem.getElementsByClassName('shop-item-price')[0].innerText
    var imageSrc = shopItem.getElementsByClassName('shop-item-image')[0].src
    addItemToCart(title, price, imageSrc)
    updateCartTotal()
}

function addItemToCart(title, price, imageSrc) {
    var cartRow = document.createElement('div')
    cartRow.classList.add('cart-row')
    var cartItems = document.getElementsByClassName('cart-items')[0]
    var cartItemNames = cartItems.getElementsByClassName('cart-item-title')
    for (var i = 0; i < cartItemNames.length; i++) {
        if (cartItemNames[i].innerText == title) {
            alert('This item is already added to the cart')
            return
        }
    }
    var cartRowContents = `
        <div class="cart-item cart-column">
            <img class="cart-item-image" src="${imageSrc}" width="100" height="100">
            <span class="cart-item-title">${title}</span>
        </div>
        <span class="cart-price cart-column">${price}</span>
        <div class="cart-quantity cart-column">
            <input class="cart-quantity-input" type="number" value="1">
            <button class="btn btn-danger" type="button">REMOVE</button>
        </div>`
    cartRow.innerHTML = cartRowContents
    cartItems.append(cartRow)
    cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', removeCartItem)
    cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged)
}

function updateCartTotal() {
    var cartItemContainer = document.getElementsByClassName('cart-items')[0]
    var cartRows = cartItemContainer.getElementsByClassName('cart-row')
    var total = 0
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i]
        var priceElement = cartRow.getElementsByClassName('cart-price')[0]
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
        var price = parseFloat(priceElement.innerText.replace('$', ''))
        var quantity = quantityElement.value
        total = total + (price * quantity)
    }
    total = Math.round(total * 100) / 100
    document.getElementsByClassName('cart-total-price')[0].innerText = '$' + total
}
	</script>
}*/
/*require ('connection.php');
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    if (isset($_POST['Add_to_Cart']))
    {
        $_SESSION['pname'] = $_POST['Item_value'];
        $_SESSION['cost'] = $_POST['Item_price'];
        $query = "INSERT INTO cart(pname, price, quantity) VALUES ('$_SESSION[pname]', '$_SESSION[cost]', '1')";
        $query_run($conn,$query);
        if ($query_run) {
            echo "<script>alert('Item added to Cart Successfully');
            window.location.href = 'product_details.php';</script>;";
        }
        else{
            echo "<script>alert('Item not added to Cart');
            window.location.href = 'product_details.php';</script>;";
        }
    }
}*/
?>
