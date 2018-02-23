<?php

$users = [
  ['id' => 'jane-john', 'username' => 'jane-john', 'password' => 'balieveplanner', 'admin' => false],
  ['id' => 'admin', 'username' => 'lauravania', 'password' => '123456', 'admin' => true],
];

$weddings = [
  ['name' => 'jane-john', 'date' => '01-04-2018', 'location' => 'Alila Bali']
];

$guests = [
  ['name' => 'Lisa Ledo', 'adults' => 'Lisa Ledo, John Doe', 'children' => 'Kadek Doe, Putu Doe', 'attending' => true, 'wedding' => 'jane-john'],
  ['name' => 'Anna Verina', 'adults' => 'Anna Verina, Anthony Wades', 'children' => 'Robert Wades', 'attending' => true, 'wedding' => 'jane-john'],
];

for ($i=0; $i < count($guests); $i++) {
  $adults_array = explode(',',$guests[$i]['adults']);
  $guests[$i]['total_adults'] = count($adults_array);

  $children_array = explode(',',$guests[$i]['children']);
  $guests[$i]['total_children'] = count($children_array);
};

?>

<!DOCTYPE html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bali Eve RSVP</title>

</head>
