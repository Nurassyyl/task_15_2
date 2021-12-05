<?php 

session_start();
$pdo = new PDO('mysql:host=localhost;dbname=users', 'root', '');
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM `users` WHERE `email` = :email";
$statement = $pdo->prepare($sql);
$statement->execute(['email' => $email]);
$user = $statement->fetch(PDO::FETCH_ASSOC);
$hash = password_verify($password, $user['password']);  
if ($user['email'] == $email && $hash == $password) { 
  $_SESSION['user'] = [
    'email' => $user['email']
  ];
  header("Location: task_14_1.php");
} else {
  $message = 'Неверный логин или пароль';
  $_SESSION['message'] = $message;
  header("Location: task_14.php");
}

?>
