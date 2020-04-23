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
$title = $_POST["mtitle"];
$quality = $_POST["quality"];
$cost = $_POST["mcost"];
$qty = 1;

if (isset($cart[$mid])) {
    $qty = $cart[$mid]["qty"];
    $qty++;
}

$cart[$mid] = array(
    "title" => $title,
    "quality" => $quality,
    "qty" => $qty,
    "cost" => $cost
);

$newcart = serialize($cart);
$_SESSION["cart"] = $newcart;

require('./cart-inner.php');

?>