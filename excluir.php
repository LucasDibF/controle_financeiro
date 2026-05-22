<?php
require "conexao.php";

$id = $_GET["id"];

$sql = "DELETE FROM lancamentos WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header("Location: listar.php");
exit;
?>
