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
$fromTextData = getCurlData($fromTextUrl);

$toTextUrl = $autosuggestUrl . str_replace(' ', '%20', urlencode($toText));
$toTextData = getCurlData($toTextUrl);


$url = 'https://web-api-tst.9292.nl/v1/Plans?FromLocationId=' . $fromTextData['locations'][0]['id'] . '&ToLocationId=' . $toTextData['locations'][0]['id'] . '&DateTime=' . $iso8601 . '&SearchType=' . $searchType . '&UseRealTimeInfo=true';
$_SESSION['response'] = getCurlData($url);

header("Location: data.php");
exit;

function getCurlData($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    if ($result === false || empty($result)) {
        echo "Error";
        exit;
    }
    $data = json_decode($result, true);
    curl_close($ch);
    return $data;
}
?>