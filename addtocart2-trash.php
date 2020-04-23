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

$mid = $_POST["mid"];
//$title = $_POST["mtitle"];
//$cost = $_POST["mcost"];
$qty = 0;

if (isset($mcart[$mid])) {
    $qty = $mcart[$mid]["qty"];
    $qty--;
    if ($qty<=0)
        unset($mcart[$mid]);
    else
        $mcart[$mid]["qty"] = $qty;
    
}

$newmcart = serialize($mcart);
$_SESSION["mcart"] = $newmcart;

require('./cart-inner.php');
?>