<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('id_usr', '', time() - 3600);
setcookie('role_usr', '', time() - 3600);
setcookie('email_usr', '', time() - 3600);

header("Location: ../index.php");
exit;
?>