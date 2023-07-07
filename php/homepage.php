<?php 
session_start();
print_r($_SESSION);?>
<br>

hello <?=$_SESSION['name']?>
<br>

<a href="logout.php"> Logout</a>
<br>
<a href="shop.php">Go to shop</a>
