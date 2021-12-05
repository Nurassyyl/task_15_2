<?php

$pdo = new PDO('mysql:host=localhost; dbname=users', 'root', '');
$img_id = $_GET['img_id'];
$del = "DELETE FROM `images` WHERE `id` = :img_id";
$statement = $pdo->prepare($del);
$statement->execute(['img_id' => $img_id]);
header("Location: task_15_1.php");