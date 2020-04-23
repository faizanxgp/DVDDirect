<?php
include "includes/db/config.inc.php";

$query = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
mysql_select_db(DB_DATABASE, $query);

echo '<div style="width:150px;height:150px;">';
//$_POST['name'] = $_GET['name'];
if (isset($_POST['id'])) {
    $id = trim($_POST['id']);
    $query2 = mysql_query("SELECT name, year, quality FROM movies WHERE id = '$id' LIMIT 0,10");
    while ($query3 = mysql_fetch_array($query2)) {
        echo $query3['name'] . '<br />' . $query3['year'] . '<br />' . $query3['quality'];
    }
}
echo '</div>';
?>