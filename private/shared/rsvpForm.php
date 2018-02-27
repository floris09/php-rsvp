<?php
$errorMessage = '';
$successMessage = '';
$user = $_SESSION['user'];

$wedding_id = $user['wedding_id'] ?? null;
$name = $_POST['name'] ?? null;
$attending = $_POST['attending'] ?? null;
$adults = $_POST['adults'] ?? null;
$children = $_POST['children'] ?? null;

$adults_array = explode(",", $adults);
$children_array = explode(",", $children);

$adults_count = count($adults_array);
$children_count = count($children_array);

$sql = "INSERT INTO guests ";
$sql .= " (name, attending, adults, children, adults_count,";
$sql .= "  children_count, wedding_id) VALUES (";
$sql .= " '$name', '$attending', '$adults', '$children', ";
$sql .= " '$adults_count', '$children_count', '$wedding_id'";
$sql .= " ) ";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!isset($name)){
    $errorMessage = 'Please fill out your name as written on the invitation.';
  } elseif ($attending == 1 && !isset($adults)) {
    $errorMessage = 'Please fill out at least one name in the adults field.';
  } else {
    $result = mysqli_query($db, $sql);
    if ($result) {
      $successMessage = "Thank you, your form has been submitted.";
    } else {
      echo mysqli_error($db) . ". Please try again.";
      db_disconnect($db);
      exit;
    }
  }
}

?>

<div class='form-container'>
  <p><?= $errorMessage; ?></p>
  <p><?= $successMessage; ?></p>
  <form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <input type='text' id='name' name='name' placeholder='Name as written on invitation...'>

    <label for="attending">I'm attending the wedding</label>
    <input type='hidden' name='attending' value=0>
    <input type='checkbox' id='attending' name='attending' placeholder="I'm attending the wedding." value=1>
    <label for="attending">I'm attending the wedding</label>

    <input type='text' id='adults' name='adults' placeholder='Full names of all the adult guests that will be attending...'>


    <input type='text' id='children' name='children' placeholder='Full names of all the children that will be attending...'>

    <input type='submit' value='submit'>

  </form>
</div>
