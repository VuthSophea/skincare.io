<?php
$host = 'localhost';
$dbname = 'skincaredb';
$username = 'root';
$password = '';

    $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
