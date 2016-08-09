<?php
require('includes/config.php');
$code = $_GET['confirm_code'];
$id = $_GET['id'];
$body = "<p><b>Registration Confirmation</b></p><p>Thank you for registering at demo site.</p>
			<p>To activate your account, please click on this link: <a href='".DIR."/activate.php?x=$id&y=$code'>".DIR."/activate.php?x=$id&y=$code</a></p>
			<p>Regards Site Admin</p>";
echo $body;  
?>