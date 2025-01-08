<?php

$setUri['base'] = 'http://localhost/gis';
$hostname = 'localhost';
$username = 'root';
$password = '';

function getPage($a = '')
{
    $url = '?page=' . $a;
    $getbase_url = $GLOBALS['setUri']['base'];
    return $getbase_url . $url;
}

?>