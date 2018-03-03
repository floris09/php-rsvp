<?php
$errorMessage = '';
$successMessage = '';
$user = $_SESSION['user'];

$wedding_id = $user['wedding_id'] ?? null;
$food_choices = find_children('food_choices', 'wedding_id', $wedding_id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST['name']) ?? null;
  $attending = test_input($_POST['attending']) ?? null;
  $adults = test_input($_POST['adults']) ?? null;
  $children = test_input($_POST['children']) ?? null;

  $adults_array = explode(",", $adults);
  $children_array = explode(",", $children);

  for ($i=0; $i < count($adults_array); $i++) {
    if(ctype_space($adults_array[$i]) || $adults_array[$i] == ''){
      array_splice($adults_array,$i,1);
    }
  }

  for ($i=0; $i < count($children_array); $i++) {
    if(ctype_space($children_array[$i]) || $children_array[$i] == ''){
      array_splice($children_array,$i,1);
    }
  }

  $adults_count = count($adults_array);
  $children_count = count($children_array);
  $guest_choices = '';

  if(isset($food_choices)){
    while ($choice = mysqli_fetch_assoc($food_choices)){
      $guest_choices .= test_input($_POST[$choice['id']]) ." ". $choice['name'] .". ";
    }
  }

  $sql = "INSERT INTO guests ";
  $sql .= " (name, attending, adults, children, adults_count,";
  $sql .= "  children_count, wedding_id, food_choices) VALUES (";
  $sql .= " '$name', '$attending', '$adults', '$children', ";
  $sql .= " '$adults_count', '$children_count', '$wedding_id', '$guest_choices'";
  $sql .= " ) ";

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

    <input type='text' id='name' name='name' placeholder='Name as written on invitation...    e.g. John Doe'><br>

    <div class="attending-container">
      <div class="radio-container">
        <div class="radiobutton">
          <input type='radio' id='attending' name='attending' value=1 checked>
        </div>
        <p id='att'>Attending</p>
      </div>
      <div class="radio-container">
        <div class="radiobutton">
          <input type='radio' id='attending' name='attending' value=0>
        </div>
        <p>Not attending</p>
      </div>
    </div>

    <input type='text' id='adults' name='adults' placeholder='Full names of adult guests that will be attending...    e.g. John Doe, Emma Doe'>

    <input type='text' id='children' name='children' placeholder='Full names of all the children that will be attending...    e.g. Karl Doe'>

    <?php
      while ($choice = mysqli_fetch_assoc($food_choices)){
          $food[] = $choice;
      }
      if(count($food) > 0):
        echo "<p id='food'>Please choose your desired dish(es) and enter an amount:</p>";
        foreach ($food as $choice): ?>
          <div class="food-choice-container">
            <div class="number">
              <input type='number' placeholder='0' name="<?= $choice['id']; ?>">
            </div>
            <p><?= $choice['name']; ?></p>
          </div>
        <?php endforeach ?>
      <?php endif ?>

    <input type='submit' value='submit'>

  </form>
</div>
