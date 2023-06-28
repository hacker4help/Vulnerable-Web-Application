<?php
$url = $_GET['url'];

if (!empty($url)) {
    
    header('Location: ' . $url);
    exit;
}
?>
