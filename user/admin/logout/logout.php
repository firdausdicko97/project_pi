<?php 

session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('id','',time() - 1);
setcookie('key','',time() - 1);

header("location: ../login_admin/login.php");
exit;
 ?>