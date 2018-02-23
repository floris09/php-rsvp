<?php
$errorMessage = '';
?>

<div class='form-container'>
  <p><?= $errorMessage; ?></p>
  <form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <input type='text' id='name' name='name' placeholder='Name as written on invitation...'>


    <input type='text' id='adults' name='adults' placeholder='Full names of all the adult guests that will be attending...'>

    
    <input type='text' id='children' name='children' placeholder='Full names of all the children that will be attending...'>

    <input type='submit' value='submit'>
  </form>
</div>
