<?php require_once('../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<body>

<?php include(SHARED_PATH . '/login.php'); ?>

</body>
</html>

<?php
  db_disconnect($db);
?>
