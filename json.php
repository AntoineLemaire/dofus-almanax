<?php

trigger_error('Deprecated function called. Use https://almanax.zone-bouffe.com/dev.php', E_USER_NOTICE);
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);

if (!isset($_GET['lang']) || empty($_GET['lang'])) {
    $lang = 'fr';
} else {
    $lang = $_GET['lang'];
}

if (file_exists('./files/'.$lang.'/dofus-all.json')) {
    $tab['dofus'] = json_decode(file_get_contents('./files/'.$lang.'/dofus-all.json'), true);
    echo json_encode($tab, JSON_UNESCAPED_UNICODE);
}
