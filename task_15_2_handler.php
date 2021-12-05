<?php



$pdo = new PDO('mysql:host=localhost;dbname=users', 'root', '');

$to = 'uploads';

for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
  $extension = pathinfo($_FILES['images']['name'][$i]);
  $img_name = uniqid() . "." . $extension['extension'];
  $tmp_name = $_FILES['images']['tmp_name'][$i];
  move_uploaded_file($tmp_name, "$to/$img_name");
  $sql = "INSERT INTO `images` (`id`, `image`) VALUES (NULL, :image) ";
  $statement = $pdo->prepare($sql);
  $statement->execute(['image' => $img_name]);
} 

header("Location: task_15_2.php");

