<?php
session_start();
$resp = $_SESSION['response'];
$fromLocation = $_SESSION['from_location'];
$toLocation = $_SESSION['to_location'];

$journeyDepartTime = [];
$journeyArrivalTime = [];
$journeyMinuteDuration = [];
$journeyLegs = []; 

foreach ($resp['journeys'] as $journeyIndex => $journey) {
  $journeyDepartTime[] = formatDate($journey['departureTime'], 'Europe/Amsterdam');
  $journeyArrivalTime[] = formatDate($journey['arrivalTime'], 'Europe/Amsterdam');
  $journeyMinuteDuration[] = $journey['durationInMinutes'];
  

  $legsData = [];
  foreach ($journey['legs'] as $legIndex => $leg) {
    $legsData[] = [
      'departureTime' => isset($leg['departureTime']) ? formatDate($leg['departureTime'], 'Europe/Amsterdam') : null,
      'arrivalTime' => isset($leg['arrivalTime']) ? formatDate($leg['arrivalTime'], 'Europe/Amsterdam') : null,
      'duration' => isset($leg['durationInMinutes']) ? $leg['durationInMinutes'] : null,
      'from' => isset($leg['from']) ? $leg['from'] : null,
      'to' => isset($leg['to']) ? $leg['to'] : null,
      'modalityGroup' => isset($leg['modalityGroup']) ? $leg['modalityGroup'] : null,
      'modalityDescription' => isset($leg['modalityDescription']) ? $leg['modalityDescription'] : null,
      'service' => isset($leg['service']) ? $leg['service'] : null
    ];
    
    foreach ($leg['calls'] as $callIndex => $call) {
      $legsData[$legIndex]['platform'] = isset($call['platform']) ? $call['platform'] : null;
    }
  }
  $journeyLegs[$journeyIndex] = $legsData;
}

function formatDate($isoDate, $timezone) {
  $date = new DateTime($isoDate, new DateTimeZone($timezone));
  return $date->format('Y-d-m H:i');
}

include 'plan-info.php';
?>
