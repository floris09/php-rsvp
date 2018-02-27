<?php
  $errorMessage = '';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $query = find_user($username);
    $user = mysqli_fetch_assoc($query);
    $hash = $user["password"];
    $valid = password_verify($_POST["password"],$hash);
    $admin = $user["admin"] == 1;

    if ($valid && $admin) {
      $_SESSION['user'] = $user;
      header('Location: ./admin/index.php');
    } elseif ($valid) {
      $_SESSION['user'] = $user;
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
