<?php

/*
date_default_timezone_set('Asia/Karachi');

$localtime = localtime();
$localtime_assoc = localtime(time(), true);

$a = join($localtime_assoc, " ");

mail ( "aalogic@gmail.com" , "cron job test  " , $a );
*/

$link = mysql_connect('localhost', 'dvddirec_wuser', 'Ht{tc&T?7}k6');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("dvddirec_2");

$result = mysql_query("SELECT * from newsletter2 limit 0, 600");

$more = "From: DVD Direct <notifications@dvddirect.biz \r\n";
$more .= "Reply-To: noreply@dvddirect.biz \r\n";
$more .= "BCC: dvdnotifications@gmail.com \r\n";
$more .= "MIME-Version: 1.0 \r\n";
$more .= "Content-type: text/html; charset=iso-8859-1 \r\n";


while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $id =$row["id"];
	$firstname=$row["firstname"];
	$lastname=$row["lastname"];
	$email=$row["email"];
	$subject=$row["subject"];
	$content=stripslashes($row["content"]);
	
    // update email contents
	$patterns = array();
	$patterns[0] = '/{{username}}/';
	$patterns[1] = '/{{firstname}}/';
	$patterns[2] = '/{{email}}/';
	$replacements = array();
	$replacements[0] = $firstname . ' ' . $lastname;
	$replacements[1] = $firstname;
	$replacements[2] = $email;
	$updatedbody = preg_replace($patterns, $replacements, $content);
			
	//echo $updatedbody;
        
        mail ( $email , $subject, $updatedbody , $more );
        // delete this email
        mysql_query("DELETE from newsletter2 where id='$id' ");
			
}
mysql_close($link);

?>