<?php require_once('../../private/initialize.php');

$user = $_SESSION['user'];

if ($user['admin'] != 1){
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
<a href='create_wedding.php'>Create Wedding</a>
<?php include(SHARED_PATH . '/weddings.php'); ?>

</body>
</html>

<?php
  db_disconnect($db);
?>
