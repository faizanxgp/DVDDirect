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
$cost = $_POST["mcost"];
$qty = 1;

if (isset($mcart[$mid])) {
    $qty = $mcart[$mid]["qty"];
    $qty++;
}

$mcart[$mid] = array(
    "title" => $title,
    "qty" => $qty,
    "cost" => $cost
);

$newmcart = serialize($mcart);
$_SESSION["mcart"] = $newmcart;

require('./cart-inner.php');

?>