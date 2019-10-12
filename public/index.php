<?php
use ofaa\Router;


require_once '../app/init.php';

$url = isset($_GET['url']) ? $_GET['url'] : '/';
Router::go($url, $_SERVER['REQUEST_METHOD']);