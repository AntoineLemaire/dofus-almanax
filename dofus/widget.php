<?php

error_reporting(0);
if (!isset($_GET['lang']) || empty($_GET['lang'])) {
    $lang = 'fr';
} elseif (isset($_GET['lang']) && !empty($_GET['lang']) && ($_GET['lang'] == 'fr' || $_GET['lang'] == 'en')) {
    $lang = $_GET['lang'];
} else {
    if (substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'en' || substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'fr') {
        $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    } else {
        $lang = $_GET['lang'];
    }
}

switch ($lang) {
    case 'en':
        include 'langs/en.php';
        break;
    case 'fr':
    default:
        include 'langs/fr.php';
        break;
}

$opts = ['http' => [
        'method' => 'GET',
        'header' => "Connection: close\r\n".
        "Content-Type: application/x-www-form-urlencoded\r\n".
        'Content-Length: '.strlen($getdata)."\r\n",
        'content' => $getdata,
    ],
];

$context = stream_context_create($opts);

$current_date = new DateTime(null, new DateTimeZone('Europe/Paris'));
$jsonDofus    = file_get_contents('../files/'.$lang.'/dofus-all.json', false, $context);

$offrandes = json_decode($jsonDofus, true);

if (isset($_GET['size']) && !empty($_GET['size']) && ($_GET['size'] == 'big' || $_GET['size'] == 'small')) {
    include 'size/'.$_GET['size'].'.php';
} else {
    include 'size/big.php';
}
