<?php require_once('../../private/initialize.php');

$user = $_SESSION['user'];

if ($user['admin'] != 1){
  header('Location: ../rsvp.php');
} else {

$id = htmlspecialchars((int)$_GET['choice_id']);

delete_item('food_choices', $id);
header("Location: ./index.php ");
}
ob_end_flush();
