<?php
include "includes/db/config.inc.php";

$query = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
mysql_select_db(DB_DATABASE, $query);
//$_POST['name'] = $_GET['name'];
echo "<ul>";
if (isset($_POST['name'])) {
    $name = trim($_POST['name']);
    $query2 = mysql_query("SELECT * FROM movies WHERE name LIKE '%$name%' LIMIT 0,10	");

    while ($query3 = mysql_fetch_array($query2)) {
        ?>
        <li onclick='fill("<?php echo $query3['name']; ?>")'><?php echo $query3['name']; ?></li>
        <?php
    }
}
?>
</ul>