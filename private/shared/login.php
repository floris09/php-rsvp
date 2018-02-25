<?php
  $errorMessage = '';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['username'] === 'lauravania' && $_POST['password'] === '123456') {
      $_SESSION['user'] = 'lauravania';
      header('Location: ./admin/index.php');
    } elseif ($_POST['username'] === 'jane-john' && $_POST['password'] === 'balieveplanner') {
      $_SESSION['user'] = 'jane-john';
      header('Location: ./guest/index.php');
    } else {
      $errorMessage = "Incorrect username and/or password. Please try again.";
    }
  }
 ?>

<img class='logo' src=<?= WWW_ROOT . '/images/logo.png' ?> />

<div class='form-container'>
  <p class='error'><?= $errorMessage; ?></p>
  <form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type='text' id='username' name='username' placeholder='Username...'>

    <input type='password' id='password' name='password' placeholder='Password...'>

    <input type='submit' value='submit'>
  </form>
</div>
