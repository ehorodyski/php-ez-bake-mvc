<?php

include_once('router.class.php');
include_once('loader.php');

if (!array_key_exists('HTTP_ORIGIN', $_SERVER))
    $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];

try {
    $API = new Router($_REQUEST['controller'], $_SERVER['HTTP_ORIGIN']);
    echo $API->processRoute();
} catch (Exception $e) {
    echo json_encode(Array('error' => $e->getMessage()));
}

?>

