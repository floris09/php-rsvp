<?php

  $weddings = find_all('weddings');

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = test_input($_POST['user_id']);

    delete_user($user_id);
    header("Location: ./index.php ");
  }

  while ($wedding = mysqli_fetch_assoc($weddings)):
    $adultsCount = 0; $childrenCount = 0;

?>

  <div class="wedding-header">
    <h2 class="width70"><?= "{$wedding['name']} | {$wedding['date']} | {$wedding['location']}"; ?></h2>
    <a class="width30 warning" href='delete_wedding.php?wedding_id=<?= $wedding['id'] ?>'><p>Delete Wedding</p></a>
  </div>

  <a href='create_user.php?wedding_id=<?= $wedding['id']?>'>
    <button class='create'>Create User</button>
  </a>

  <a href='create_food_choice.php?wedding_id=<?= $wedding['id']?>'>
    <button class='create'>Create Food Option</button>
  </a>

  <table class="blackTable inline-block">
    <thead>
      <tr>
        <th></th>
        <th>Food Option</th>
      </tr>
    </thead>
    <tbody>

  <?php
    $food_choices = find_children('food_choices','wedding_id',$wedding['id']);

    while($choice = mysqli_fetch_assoc($food_choices)): ?>
      <tr>
        <td><a class="warning" href="delete_food_choice.php?choice_id=<?= $choice['id']; ?>"><b>X</b></a></td>
        <td><?= $choice['name'] ?></td>
      </tr>
    <?php endwhile ?>

    </tbody>
  </table>

    <table class="blackTable inline-block">
      <thead>
        <tr>
          <th></th>
          <th>Username</th>
        </tr>
      </thead>
      <tbody>

        <?php
          $users = find_children('users','wedding_id',$wedding['id']);
          while ($user = mysqli_fetch_assoc($users)): ?>
            <tr>
              <td><a class="warning" href="delete_user.php?user_id=<?= $user['id']; ?>"><b>X</b></a></td>
              <td><?= $user['username']; ?></td>
            </tr>
        <?php endwhile ?>

      </tbody>
    </table>


    <table class="blueTable">
      <thead>
        <tr>
          <th></th>
          <th>Name</th>
          <th>Attending</th>
          <th>Adults</th>
          <th>Children</th>
          <th>Food</th>
          <th>Total Adults</th>
          <th>Total Children</th>
        </tr>
      </thead>
      <tbody>

    <?php $guests= find_children('guests','wedding_id',$wedding['id']);

    while ($guest = mysqli_fetch_assoc($guests)): ?>

      <tr>
        <td><a class='warning' href="delete_guest.php?guest_id=<?= $guest['id']?>"><strong>X</strong></a></td>
        <td><?= $guest['name'] ?></td>
        <td><?php if($guest['attending']==0){
                    echo 'No';
                  } else {
                    echo 'Yes';
                  } ?>
        </td>
        <td><?= $guest['adults'] ?></td>
        <td><?= $guest['children'] ?></td>
        <td><?= $guest['food_choices'] ?></td>
        <td><?= $guest['adults_count'] ?></td>
        <td><?= $guest['children_count'] ?></td>
      </tr>

    <?php $adultsCount += $guest['adults_count'];
          $childrenCount += $guest['children_count']; ?>

    <?php endwhile ?>

      </tbody>
    </table>

    <p><strong>Total Adults:</strong> <?= $adultsCount; ?>. <strong>Total Children:</strong> <?= $childrenCount; ?></p>

  <?php endwhile ?>
