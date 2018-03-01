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

    <h2><?= "{$wedding['name']} | {$wedding['date']} | {$wedding['location']}"; ?></h2>
    <a href='delete_wedding.php?wedding_id=<?= $wedding['id'] ?>'><p>Delete Wedding</p></a>

    <a href='create_user.php?wedding_id=<?= $wedding['id']?>'>
      <button>Create User</button>
    </a>

    <?php
      $users = find_user_by_wedding_id($wedding['id']);
      while ($user = mysqli_fetch_assoc($users)): ?>
        <p>Username: <?= $user['username']; ?></p>
        <a href="delete_user.php?user_id=<?= $user['id']; ?>"><p>Delete User</p></a>
      <?php endwhile ?>
    <table>
      <tr>
        <th>Name</th>
        <th>Attending</th>
        <th>Adults</th>
        <th>Children</th>
        <th>Total Adults</th>
        <th>Total Children</th>
      </tr>

    <?php $guests= find_wedding_guests($wedding['id']);

    while ($guest = mysqli_fetch_assoc($guests)): ?>

      <tr>
        <td><?= $guest['name'] ?></td>
        <td><?php if($guest['attending']==0){
                    echo 'No';
                  } else {
                    echo 'Yes';
                  } ?>
        </td>
        <td><?= $guest['adults'] ?></td>
        <td><?= $guest['children'] ?></td>
        <td><?= $guest['adults_count'] ?></td>
        <td><?= $guest['children_count'] ?></td>
      </tr>

    <?php $adultsCount += $guest['adults_count'];
          $childrenCount += $guest['children_count']; ?>

    <?php endwhile ?>

    </table>

    <p><strong>Total Adults:</strong> <?= $adultsCount; ?>. <strong>Total Children:</strong> <?= $childrenCount; ?></p>

  <?php endwhile ?>
