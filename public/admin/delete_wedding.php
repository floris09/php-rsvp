<?php require_once('../../private/initialize.php');

$user = $_SESSION['user'];

if ($user['admin'] != 1){
  header('Location: ../index.php');
} else {

$id = htmlspecialchars((int)$_GET['wedding_id']);

delete_item('weddings', $id);
delete_children('guests','wedding_id', $id);
delete_children('users','wedding_id', $id);
delete_children('food_choices','wedding_id', $id);
header("Location: ./index.php ");
}
ob_end_flush();
