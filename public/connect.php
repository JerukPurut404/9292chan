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
if ($fromTextData === false || !is_array($fromTextData)) {
    echo "Error: Failed to fetch autosuggest data for the 'from' location";
    exit;
}

$toTextUrl = $autosuggestUrl . str_replace(' ', '%20', $toText);
$toTextData = getData($toTextUrl);
if ($toTextData === false || !is_array($toTextData)) {
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
    $ch = curl_init();
    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, "Content-type: application/json; charset=utf-8\r\n");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-type: application/json; charset=utf-8',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
        'Accept-Language: en-US,en;q=0.5',
        'Accept-Encoding: gzip, deflate, br',
        'DNT: 1',
        'Connection: keep-alive',
        'Upgrade-Insecure-Requests: 1',
        'Sec-Fetch-Dest: document',
        'Sec-Fetch-Mode: navigate',
        'Sec-Fetch-Site: cross-site'
    ));
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; rv:120.0) Gecko/20100101 Firefox/120.0');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Increase the timeout value to 30 seconds
    curl_setopt($ch, CURLOPT_ENCODING, '');

    $result = curl_exec($ch);
    if ($result === false) {
        echo 'Error: ' . curl_error($ch);
        curl_close($ch);
        return false;
    }

    $information = curl_getinfo($ch);
    curl_close($ch);

    $data = json_decode($result, true);
    return $data;
}
