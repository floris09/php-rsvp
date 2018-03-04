<?php
$errorMessage = ''; $successMessage = '';
$id = ((int)$_GET['wedding_id']) ?? '';
echo $id;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $food_choices = test_input($_POST['food_choices']);
  $wedding_id = test_input($_POST['wedding_id']);
  $food_array = explode(",", $food_choices);


  if(!ctype_space($food_choices) || $food_choices != ''){
    foreach ($food_array as $option) {
      create_food_choice($option, $wedding_id);
      header("Location: ./index.php ");
    }
  } else {
    $errorMessage = 'Please fill out field';
  }
}
?>

<div class='form-container'>
  <p><?= $errorMessage; ?></p>
  <p><?= $successMessage; ?></p>
  <form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <input type='text' id=food_choices name='food_choices' placeholder='Food choices... (Ikan bumbu Bali,Nasi Goreng)'>

    <input type='hidden' name='wedding_id' value=<?= $id; ?>>

    <input type='submit' value='submit'>

  </form>
</div>
