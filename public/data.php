<?php
session_start();
$resp = $_SESSION['response'];
$fromLocation = $_SESSION['from_location'];
$toLocation = $_SESSION['to_location'];

$journeyDepartTime = [];
$journeyArrivalTime = [];
$journeyMinuteDuration = [];
$journeyLegs = []; 

foreach ($resp['journeys'] as $journey) {
  $journeyDepartTime[] = formatDate($journey['departureTime']);
  $journeyArrivalTime[] = formatDate($journey['arrivalTime']);
  $journeyMinuteDuration[] = $journey['durationInMinutes'];
  

  $legsData = [];
  foreach ($journey['legs'] as $leg) {
    $legsData[] = [
      'departureTime' => isset($leg['departureTime']) ? formatDate($leg['departureTime']) : null,
      'arrivalTime' => isset($leg['arrivalTime']) ? formatDate($leg['arrivalTime']) : null,
      'duration' => isset($leg['durationInMinutes']) ? $leg['durationInMinutes'] : null,
      'from' => isset($leg['from']) ? $leg['from'] : null,
      'to' => isset($leg['to']) ? $leg['to'] : null,
      'modalityGroup' => isset($leg['modalityGroup']) ? $leg['modalityGroup'] : null,
      'modalityDescription' => isset($leg['modalityDescription']) ? $leg['modalityDescription'] : null,
      'service' => isset($leg['service']) ? $leg['service'] : null
    ]; 
  }
  $journeyLegs[] = $legsData;
}

function formatDate($isoDate) {
  $date = new DateTime($isoDate);
  return $date->format('Y-d-m H:i');
}

include 'plan-info.php';
?>
