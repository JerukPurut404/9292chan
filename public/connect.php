<?php
session_start();
$fromText = $_GET["fromText"];
$toText = $_GET["toText"];
$date = $_GET["date"];
$time = $_GET["time"];
$searchType = $_GET["searchType"];

$datetime = $date . ' ' . $time;
$iso8601 = date('c', strtotime($datetime));
$iso8601 = urlencode($iso8601);

$autosuggestUrl = 'https://web-api-tst.9292.nl/v1/Autosuggest/';


$fromTextUrl = $autosuggestUrl . str_replace(' ', '%20', urlencode($fromText));
$fromTextData = getData($fromTextUrl);

$toTextUrl = $autosuggestUrl . str_replace(' ', '%20', urlencode($toText));
$toTextData = getData($toTextUrl);


$url = 'https://web-api-tst.9292.nl/v1/Plans?FromLocationId=' . $fromTextData['locations'][0]['id'] . '&ToLocationId=' . $toTextData['locations'][0]['id'] . '&DateTime=' . $iso8601 . '&SearchType=' . $searchType . '&UseRealTimeInfo=true';
$_SESSION['response'] = getData($url);

header("Location: data.php");
exit;

function getData($url){
    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'GET',
        ],
    ];
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === false || empty($result)) {
        echo "Error";
        exit;
    }
    $data = json_decode($result, true);
    return $data;
}
?>