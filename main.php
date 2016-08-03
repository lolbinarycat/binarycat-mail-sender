<?php 
use google\appengine\api\log\LogService;

$to = $_POST["to"];

$subject = $_POST["subject"];

$message = $_POST{"message"];

$additional_headers = $_POST{"additional_headers"];
 
$additional_parameters = $_POST{"additional_parameters"];

$mailsent = mail ( $to ,  $subject ,  $message , $additional_headers , $additional_parameters );

if (!$mailsent) {
	header("HTTP/1.0 500 Server Error");
	syslog(LOG_MAIL,"sendmail failed.\n mail (" . $to . "," . $subject . "," . $message . "," . $additional_headers . "," . $additional_parameters . ")" );
	die("sendmail failed");
};
syslog(LOG_MAIL,"mail sent!\n mail (" . $to . "," . $subject . "," . $message . "," . $additional_headers . "," . $additional_parameters . ")" );
echo "mail sent";

?>
