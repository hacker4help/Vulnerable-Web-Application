<?php 

session_start();

session_unset();
session_regenerate_id(TRUE);
session_destroy();

header("Location: login.php");
exit();
?>