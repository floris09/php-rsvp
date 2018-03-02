<?php
$errorMessage = ''; $successMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST['name']);
  $date = test_input($_POST['date']);
  $location = test_input($_POST['location']);
  $food_choices = test_input($_POST['food_choices']);

  $food_array = explode(",", $food_choices);

  if (!isset($name)) {
    $errorMessage = 'Please fill out name.';
  } elseif(!isset($date)) {
    $errorMessage = 'Please fill out date.';
  } elseif(!isset($location)) {
    $errorMessage = 'Please fill out location.';
  } else {
    create_wedding($name, $date, $location);
    $wedding_id = mysqli_insert_id($db);
  }

  if(!ctype_space($food_choices) || $food_choices != ''){
    foreach ($food_array as $option) {
      create_food_choice($option, $wedding_id);
      header("Location: ./index.php ");
    }
  }
}
?>

<div class='form-container'>
  <p><?= $errorMessage; ?></p>
  <p><?= $successMessage; ?></p>
  <form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <input type='text' id='name' name='name' placeholder='Name...'><br>

    <input type='text' id='date' name='date' placeholder='Date...'>

    <input type='text' id='location' name='location' placeholder='Location...'>

    <input type='text' id=food_choices name='food_choices' placeholder='Food choices... (Ikan bumbu Bali,Nasi Goreng)'>

    <input type='submit' value='submit'>

  </form>
</div>
