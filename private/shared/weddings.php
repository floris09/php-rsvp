<?php

  $weddings = find_all('weddings');

  while ($wedding = mysqli_fetch_assoc($weddings)):
    $adultsCount = 0; $childrenCount = 0; ?>

    <div class="whitespace"></div>

    <h2><?= "{$wedding['name']} | {$wedding['date']} | {$wedding['location']}"; ?></h2>

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
        <td><?= $guest['attending'] ?></td>
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
