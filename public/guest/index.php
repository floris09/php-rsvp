<?php require_once('../../private/initialize.php');

include(SHARED_PATH . '/header.php');

if (!isset($_SESSION['user'])){
  header('Location: ../index.php');
}
?>
<body>

<img class='logo' src=<?= WWW_ROOT . '/images/logo.png' ?> />

<?php include(SHARED_PATH . '/rsvpForm.php'); ?>

</body>
