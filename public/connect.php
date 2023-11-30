<?php
session_start();
$fromText = $_GET["fromText"];
$toText = $_GET["toText"];
$date = $_GET["date"];
$time = $_GET["time"];
$searchType = $_GET["searchType"];

$datetime = $date . ' ' . $time;
$iso8601 = date('Y-m-d\TH:i:s.u\Z', strtotime($datetime));

$autosuggestUrl = 'https://web-api-tst.9292.nl/v1/Autosuggest/';


$fromTextUrl = $autosuggestUrl . str_replace(' ', '%20', $fromText);
$fromTextData = getData($fromTextUrl);
if ($fromTextData === false) {
    echo "Error: Failed to fetch autosuggest data for the 'from' location";
    exit;
}

$toTextUrl = $autosuggestUrl . str_replace(' ', '%20', $toText);
$toTextData = getData($toTextUrl);
if ($toTextData === false) {
    echo "Error: Failed to fetch autosuggest data for the 'to' location";
    exit;
}

$url = 'https://web-api-tst.9292.nl/v1/Plans?FromLocationId=' . $fromTextData['locations'][0]['id'] . '&ToLocationId=' . $toTextData['locations'][0]['id'] . '&DateTime=' . $iso8601 . '&SearchType=' . $searchType . '&UseRealTimeInfo=true';

$_SESSION['response'] = getData($url);
$_SESSION['from_location'] = $fromTextData['locations'][0]['id'];
$_SESSION['to_location'] = $toTextData['locations'][0]['id'];

header("Location: data.php");
exit;

function getData($url)
{
    $proxyListUrl = 'https://raw.githubusercontent.com/proxifly/free-proxy-list/main/proxies/protocols/http/data.txt';
    $proxyList = file($proxyListUrl, FILE_IGNORE_NEW_LINES);

    $randomProxy = $proxyList[array_rand($proxyList)];

    $proxyContext = stream_context_create([
        'http' => [
            'proxy' => 'tcp://' . $randomProxy,
            'request_fulluri' => true,
        ],
    ]);

    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'GET',
            'context' => $proxyContext,
        ],
    ];

    $context = stream_context_create($options);
    
    try {
        $result = file_get_contents($url, false, $context);
        if ($result === false || empty($result)) {
            return false;
        }
    } catch (Exception $e) {
        return false;
    }

    $data = json_decode($result, true);
    return $data;
}
?>