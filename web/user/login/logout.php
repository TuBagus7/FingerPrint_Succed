<?php  
error_reporting(0); 
session_start();
session_destroy();
setcookie('token', '', 0, '/');
setcookie('jenenge', '', 0, '/');
setcookie('kodene', '', 0, '/');
unlink($_SERVER['DOCUMENT_ROOT']."/../tmp/sess_login");
?>
<script>location.href = "index.php";</script>