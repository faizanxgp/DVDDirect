<?php
if (isset($_POST["usersubmit"])) {
    $fullname = safe($_POST["fullname"]);
    $email = safe($_POST["email"]);
    $type = $_POST["type"];
    $message = safe($_POST["message"]);
    
    $updatedbody = $message;
    
    $tempstr = "$fullname <$email>";
    
    if (SITE_ROOT == 'http://localhost/dvddirect2') {
        // nothing to do 
                    
    } else {
        // for online site only
        send_email("info@dvddirect.biz", "Contact Form - DVD Direct - $type", $updatedbody, "", $tempstr, 0);
    }

    $smarty->assign("message", "Thank you. Your message has been sent.");
    $smarty->display('contactus.tpl');
} else {

    $smarty->assign("message", "");
    $smarty->display('contactus.tpl');
}
?>