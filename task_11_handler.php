<?php 

session_start();

$pdo = new PDO('mysql:host=localhost;dbname=users', 'root', '');

$email = $_POST['email'];
$password = $_POST['password'];
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "SELECT * FROM `users` WHERE `email` = :email";
$statement = $pdo->prepare($sql);
$statement->execute(['email' => $email]);
$user = $statement->fetch(PDO::FETCH_ASSOC);
if ($user['email'] == $email) {
  $message = "Этот эл адрес уже занят другим пользователем";
  $_SESSION['message'] = $message;
  header("Location: task_11.php");
} else { 
      $sql = "INSERT INTO `users` (`id`, `email`, `password`) VALUES (NULL, :email, :password)";
      $statement = $pdo->prepare($sql);
      $statement->execute(['email' => $email, 'password' => $password_hash ]);
      header("Location: task_11.php");
}