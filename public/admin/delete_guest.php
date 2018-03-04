<?php require_once('../../private/initialize.php');

$user = $_SESSION['user'];

if ($user['admin'] != 1){
  header('Location: ../index.php');
} else {

$id = htmlspecialchars((int)$_GET['guest_id']);

delete_item('guests', $id);
header("Location: ./index.php ");
}
ob_end_flush();
