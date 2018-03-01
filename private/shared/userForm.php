<?php
$errorMessage = ''; $successMessage = '';
$id = ((int)$_GET['wedding_id']) ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = test_input($_POST['username']);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $wedding_id = test_input($_POST['wedding_id']);

  if (!isset($username)||!isset($password)) {
    $errorMessage = 'Please fill out username and password';
  } else {
    create_user($username, $password, $wedding_id);
    header("Location: ./index.php ");
  }
}
?>

<div class='form-container'>
  <p><?= $errorMessage; ?></p>
  <p><?= $successMessage; ?></p>
  <form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <input type='text' id='username' name='username' placeholder='Username...'><br>

    <input type='text' id='password' name='password' placeholder='password'>

    <input type='hidden' name='wedding_id' value=<?= $id; ?>>

    <input type='submit' value='submit'>

  </form>
</div>
