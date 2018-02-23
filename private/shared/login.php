<?php
  $errorMessage = '';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['username'] === 'lauravania' && $_POST['password'] === '123456') {
      header('Location: ./admin/index.php');
    } elseif ($_POST['username'] === 'jane-john' && $_POST['password'] === 'balieveplanner') {
      header('Location: ./guest/index.php');
    } else {
      $errorMessage = 'Incorrect username and/or password, please try again.';
    }
  }
 ?>

<div class='login-container'>
  <p><?= $errorMessage; ?></p>
  <form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for='username'>Username</label>
    <input type='text' id='username' name='username' placeholder='Username...'>

    <label for='password'>Password</label>
    <input type='text' id='password' name='password' placeholder='Password...'>

    <input type='submit' value='submit'>
  </form>
</div>
