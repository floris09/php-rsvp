<?php require_once('../../private/initialize.php');

if ($_SESSION['user'] !== 'lauravania'){
  header('Location: ../index.php');
}

if (isset($_GET['logout'])) {
  logout();
  header('Location: ../index.php');
}
?>

<?php include(SHARED_PATH . '/header.php'); ?>

<body>

<a href='index.php?logout=true'><p>LOGOUT</p></a>

<?php include(SHARED_PATH . '/weddings.php'); ?>

</body>
