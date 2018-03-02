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
    <a class="width30" href='delete_wedding.php?wedding_id=<?= $wedding['id'] ?>'><p>Delete Wedding</p></a>
  </div>

  <ul>
  <?php
    $food_choices = find_children('food_choices','wedding_id',$wedding['id']);

    while($choice = mysqli_fetch_assoc($food_choices)): ?>
      <li><?= $choice['name'] ?></li>
    <?php endwhile ?>
  </ul>

    <a href='create_user.php?wedding_id=<?= $wedding['id']?>'>
      <button>Create User</button>
    </a>

    <?php
      $users = find_children('users','wedding_id',$wedding['id']);
      while ($user = mysqli_fetch_assoc($users)): ?>
        <div class="user-container">
          <p class="width30">Username: <?= $user['username']; ?></p>
          <a class="width30" href="delete_user.php?user_id=<?= $user['id']; ?>"><p>Delete User</p></a>
        </div>
      <?php endwhile ?>
    <table>
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

    <?php $guests= find_children('guests','wedding_id',$wedding['id']);

    while ($guest = mysqli_fetch_assoc($guests)): ?>

      <tr>
        <td><a href="delete_guest.php?guest_id=<?= $guest['id']?>"><strong>X</strong></a></td>
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

    </table>

    <p><strong>Total Adults:</strong> <?= $adultsCount; ?>. <strong>Total Children:</strong> <?= $childrenCount; ?></p>

  <?php endwhile ?>
