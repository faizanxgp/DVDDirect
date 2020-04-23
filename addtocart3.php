<?php

session_start();
include "includes/db/config.inc.php";

$query = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
mysql_select_db(DB_DATABASE, $query);

$uid = (isset($_SESSION["userid"]) ? $_SESSION["userid"] : 0);

$mid = $_POST["mid"];
$title = $_POST["mtitle"];
$cost = $_POST["mcost"];

if (isset($uid) and $uid <> 0) {
    
    $sql = "select * from `movie_inv_requests` where user_id = '$uid' and movie_id = '$mid' ";
    $result = mysql_query($sql);
    if (mysql_affected_rows() == 0) {
        $sql2 = "insert into movie_inv_requests (user_id, movie_id, status, type) 
            values ('$uid', '$mid', 'processing', 'inv')";
        $result2 = mysql_query($sql2);
        echo "Request Received, Thanks";
    } else {
        echo "You have already requested this title";
    }
} else {
    echo "Please login to use this feature";
}

?>