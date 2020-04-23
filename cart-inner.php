<?php

//define('SITE_ROOT' , 'http://localhost/dvddirect2');
include "includes/sitepath.php";

if ( (isset($cart) and count($cart) > 0) or (isset($mcart) and count($mcart) > 0)) { 
$str = '<div id="cart-body"><h3>My Cart</h3>';
$running_total=0;
$running_total1=0;
$running_total2=0;
if (isset($cart) and count($cart) > 0) {
    $str .= "<h4>Titles</h4><table width=100%><tr><th>Name</th><th>Quality</th><th align=\"right\">Qty</th><th align=\"right\">Price</th><th></th></tr>";
    foreach ($cart as $k => $v) {
        $str .= "<tr>";
        $str .= "<td>" . $v["title"] . "</td><td>" . $v['quality'] . "</td><td class=\"cart-col\">" . $v['qty'] . "</td><td class=\"cart-col\">" . $v['cost'] . "</td>".'<td  class="cart-col" align="right"><a href="#" class="addcart-trash" alt="'.$k.'"><img src="'.constant("SITE_ROOT").'/web/img/trash.png" /></a></td>'."</tr>";
        $running_total1 += ($v['qty'] * $v['cost']);
    }
    $str .= "<tr><td colspan=\"3\"><strong>Sub Total:</strong></td><td class=\"cart-col\"><strong>$running_total1</strong></td><td></td></tr></table><hr />";
}

if (isset($mcart) and count($mcart) > 0) {
    $str .= "<h4>Mini Mart</h4><table width=100%><tr><th>Item</th><th>Qty</th><th>Price</th><th></th></tr>";
    foreach ($mcart as $k => $v) {
        $str .= "<tr>";
        $str .= "<td>" . $v['title'] . "</td><td class=\"cart-col\">" . $v['qty'] . "</td><td class=\"cart-col\">" . $v['cost'] . "</td>".'<td  class="cart-col" align="right"><a href="#" class="addcart2-trash" alt="'.$k.'"><img src="'.constant("SITE_ROOT").'/web/img/trash.png" /></a></td>'."</tr>";
        $running_total2 += ($v['qty'] * $v['cost']);
    }
    $str .= "<tr><td colspan=\"2\"><strong>Sub Total:</strong></td><td class=\"cart-col\"><strong>$running_total2</strong></td><td></td></tr></table></table>";

}
$running_total=$running_total1+$running_total2;
$str .= "<table width=\"100%\" class=\"totals\">";
//$str .= "<tr><td><strong>Delivery Charges: </strong></td><td class=\"cart-col\"><strong>0</strong></td><td class=\"cart-col\"></td></tr>";
//$str .= "<tr><td><strong>Discount: </strong></td><td class=\"cart-col\"><strong>0</strong></td><td class=\"cart-col\"></td></tr>";
$str .= "<tr><td><strong>Order Total: </strong></td><td class=\"cart-col\"><strong>{$running_total}</strong></td><td class=\"cart-col\"></td></tr>";
$str .= "</table>";

//$str .= "<strong>Order Total: $running_total </strong><br />";
$str .= '<div class="checkout-wrapper"><a class="btn checkoutbutton" href="index.php?main&action=checkout"></a></div>';
$str .= '</div>';
echo $str;
} else {
    echo 'Cart is empty!';
}
?>