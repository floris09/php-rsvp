<?php foreach ($weddings as $wedding): ?>
  <?php $adultsCount = 0; $childrenCount = 0; ?>

  <h2><?= "{$wedding['name']} | {$wedding['date']} | {$wedding['location']}"; ?></h2>

  <table style='width:100%'>
      <tr>
        <th style='border: 1px solid black'>Name</th>
        <th style='border: 1px solid black'>Adults</th>
        <th style='border: 1px solid black'>Children</th>
        <th style='border: 1px solid black'>Total adults</th>
        <th style='border: 1px solid black'>Total children</th>
      </tr>
  <?php foreach ($guests as $guest): ?>
    <?php $adultsCount += $guest['total_adults'];
          $childrenCount += $guest['total_children']; ?>


    <?php if($guest['wedding'] === $wedding['name']): ?>
      <tr>
        <td style='border: 1px solid black'><?= $guest['name'] ?></td>
        <td style='border: 1px solid black'><?= $guest['adults'] ?></td>
        <td style='border: 1px solid black'><?= $guest['children'] ?></td>
        <td style='border: 1px solid black'><?= $guest['total_adults'] ?> adults</td>
        <td style='border: 1px solid black'><?= $guest['total_children'] ?> children </td>
      </tr>
    <?php endif ?>

  <?php endforeach ?>

  </table>


  <h4>Total adults: <?= $adultsCount; ?></h4>
  <h4>Total children: <?= $childrenCount; ?></h4>

<?php endforeach ?>
