<?php

$pdo = new PDO('mysql:host=localhost; dbname=users', 'root', '');
$extension = pathinfo($_FILES['img_name']['name']);
$img_name = uniqid() . "." . $extension['extension']; 
$sql = "INSERT INTO `images` (`id`, `image`) VALUES (NULL, :img_name)";
$statement = $pdo->prepare($sql);
$statement->execute(['img_name' => $img_name]);

$to = 'uploads';
$from = $_FILES['img_name']['tmp_name'];
move_uploaded_file($from, "$to/$img_name");
header("Location: task_15.php");