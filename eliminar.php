<?php include 'config.php';
if(!isset($_GET['id'])) header('Location:index.php');
$id = (int)$_GET['id'];
$conn->prepare("DELETE FROM publicaciones WHERE id=?")->execute([$id]);
header("Location:index.php"); exit;