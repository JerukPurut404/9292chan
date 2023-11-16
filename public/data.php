<?php
session_start();
$resp = $_SESSION['response'];

$journeyDepartTime = [];
$journeyArrivalTime = [];
$journeyMinuteDuration = [];
$legsDepartTime = [];
$legsArrivalTime = [];
$legsMinuteDuration = [];
$legsFrom = [];
$legsTo = [];
$legsModalInfo = [];
$legsModalDesc = [];

foreach ($resp['journeys'] as $journey) {
  $journeyDepartTime[] = formatDate($journey['departureTime']);
  $journeyArrivalTime[] = formatDate($journey['arrivalTime']);
  $journeyMinuteDuration[] = $journey['durationInMinutes'];
  
  foreach ($journey['legs'] as $leg) {
    $legsDepartTime[] = formatDate($leg['departureTime']);
    $legsArrivalTime[] = formatDate($leg['arrivalTime']);
    $legsMinuteDuration[] = $leg['durationInMinutes'];
    $legsFrom[] = $leg['from'];
    $legsTo[] = $leg['to'];
    $legsModalInfo[] = $leg['modalityGroup'];
    $legsModalDesc[] = $leg['modalityCode'];
  }
}

function formatDate($isoDate) {
  $date = new DateTime($isoDate);
  return $date->format('Y-d-m H:i');
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>9292Chan</title>
</head>
<body>
  <h1>Vertrek informatie</h1>
  <h2>Plannen:</h2>
  <ul>
    <?php foreach ($resp['journeys'] as $index => $journey): ?>
      <li>
        <h3>Journey <?php echo $index + 1; ?></h3>
        <p>Departure Time: <?php echo $journeyDepartTime[$index]; ?></p>
        <p>Arrival Time: <?php echo $journeyArrivalTime[$index]; ?></p>
        <p>Duration: <?php echo $journeyMinuteDuration[$index]; ?> minutes</p>
        <h4>Legs:</h4>
        <ul>
          <?php foreach ($journey['legs'] as $legIndex => $leg): ?>
            <li>
              <h5>Leg <?php echo $legIndex + 1; ?></h5>
              <p>Departure Time: <?php echo $legsDepartTime[$legIndex]; ?></p>
              <p>Arrival Time: <?php echo $legsArrivalTime[$legIndex]; ?></p>
              <p>Duration: <?php echo $legsMinuteDuration[$legIndex]; ?> minutes</p>
              <p>From: <?php echo $legsFrom[$legIndex]; ?></p>
              <p>To: <?php echo $legsTo[$legIndex]; ?></p>
              <p>Modality Group: <?php echo $legsModalInfo[$legIndex]; ?></p>
              <p>Modality Code: <?php echo $legsModalDesc[$legIndex]; ?></p>
            </li>
          <?php endforeach; ?>
        </ul>
      </li>
    <?php endforeach; ?>
  </ul>
</body>
</html>


