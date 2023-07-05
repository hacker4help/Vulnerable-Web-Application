<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=h4hproject1','admin','passkey');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);