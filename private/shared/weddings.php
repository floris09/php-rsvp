<?php foreach ($weddings as $wedding): ?>
  <?php $adultsCount = 0; $childrenCount = 0; ?>

  <h2><?= "{$wedding['name']} | {$wedding['date']} | {$wedding['location']}"; ?></h2>

  <?php foreach ($guests as $guest): ?>
    <?php $adultsCount += $guest['total_adults'];
          $childrenCount += $guest['total_children']; ?>
    <div class='guests-container'>
    <?php if($guest['wedding'] === $wedding['name']): ?>
      <div class='guest'><?= $guest['name'] ?>   ||</div>
      <div class='guest'><?= $guest['adults'] ?>   ||</div>
      <div class='guest'><?= $guest['children'] ?>   ||</div>
      <div class='guest'><?= $guest['total_adults'] ?> adults  ||</div>
      <div class='guest'><?= $guest['total_children'] ?> children  </div><br>
    <?php endif ?>
    </div>
  <?php endforeach ?>

  <h4>Total adults: <?= $adultsCount; ?></h4>
  <h4>Total children: <?= $childrenCount; ?></h4>

<?php endforeach ?>
