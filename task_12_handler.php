<?php

session_start();
$pdo = new PDO('mysql:host=localhost;dbname=users', 'root', '');
$text = $_POST['text'];
$sql = "INSERT INTO `texts` (`id`, `text`) VALUES (NULL, :text)";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);
$_SESSION['text'] = $text;
header("Location: task_12.php");