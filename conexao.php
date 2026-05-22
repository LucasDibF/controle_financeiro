<?php
$host = "localhost";
$dbname = "controle_financeiro";
$user = "root";
$password = "Lu16ca0395";

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
