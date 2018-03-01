<?php require_once('../../private/initialize.php');

$user = $_SESSION['user'];

if ($user['admin'] != 1){
  header('Location: ../index.php');
}

$id = htmlspecialchars((int)$_GET['user_id']);

delete_item('users', $id);
header("Location: ./index.php ");
