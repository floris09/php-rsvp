<?php require_once('../../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<body>

<?php foreach ($weddings as $wedding): ?>
  <?php $adultsCount = 0; $childrenCount = 0; ?>

  <h2><?= "{$wedding['name']} | {$wedding['date']} | {$wedding['location']}"; ?></h2>

  <?php foreach ($guests as $guest): ?>
    <?php $adultsCount += $guest['total_adults'];
          $childrenCount += $guest['total_children']; ?>

    <?php if($guest['wedding'] === $wedding['name']): ?>
      <td><?= $guest['name'] ?>   ||</td>
      <td><?= $guest['adults'] ?>   ||</td>
      <td><?= $guest['children'] ?>   ||</td>
      <td><?= $guest['total_adults'] ?> adults  ||</td>
      <td><?= $guest['total_children'] ?> children  </td><br>
    <?php endif ?>
  <?php endforeach ?>

  <h4>Total adults: <?= $adultsCount; ?></h4>
  <h4>Total children: <?= $childrenCount; ?></h4>
  
<?php endforeach ?>

</body>
