<?php
require_once "autoload.php";

use src\Controller\Dispatcher;

define('_PUBLIC_PATH_', __DIR__ .'\\public\\');
if (isset($_SERVER['PATH_INFO'])&&$_SERVER['PATH_INFO']!=null){
    $url = $_SERVER['PATH_INFO'];
}else{
    $url = null;
}
$method = $_SERVER['REQUEST_METHOD'];

const PATH = 'superhero';

$dispatch = new Dispatcher($url,$method);
echo $dispatch->dispatch();