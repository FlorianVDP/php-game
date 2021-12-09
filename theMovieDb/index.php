<?php
require_once "vendor/autoload.php";
use App\Controller\Controller;

$controller = new Controller();
$command = $controller->listCommand();