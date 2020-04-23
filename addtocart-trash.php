<?php

session_start();
if (isset($_SESSION["cart"])) {
    $cart = unserialize($_SESSION["cart"]);
} else {
    $cart = array();
}
if (isset($_SESSION["mcart"])) {
    $mcart = unserialize($_SESSION["mcart"]);
} else {
    $mcart = array();
}

$mid = intval($_POST["mid"]);
//$title = $_POST["mtitle"];
//$cost = $_POST["mcost"];
$qty = 0;

if (isset($cart[$mid])) {
    $qty = $cart[$mid]["qty"];
    $qty--;
    if ($qty<=0)
        unset($cart[$mid]);
    else
        $cart[$mid]["qty"] = $qty;
}

$newcart = serialize($cart);
$_SESSION["cart"] = $newcart;

require('./cart-inner.php');
?>