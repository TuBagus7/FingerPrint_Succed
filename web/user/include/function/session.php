<?php 
error_reporting(0);
$ip = $_SERVER['REMOTE_ADDR']; 
$useragent = $_SERVER['HTTP_USER_AGENT'];
$token = sha1($ip.$useragent.$key);
$token = crypt($token,$key);
if ($_COOKIE['token'] == $token)
{
	
}
else
{
	?>
	<script>location.href = "../../../login/<?php index();?>";</script> 
	<?php
	die();
}


if (empty($_COOKIE['jenenge']))
{
	?>
	<script>location.href = "../../../login/<?php index();?>";</script> 
	<?php
	die();
}
?>