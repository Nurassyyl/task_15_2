<?php 
session_start();
// $_SESSION['counter'] = 1;
if (isset($_SESSION['counter'])) { 
  $_SESSION['counter']++;
} else {
  $_SESSION['counter'] = +1;
}
header("Location: task_13.php");