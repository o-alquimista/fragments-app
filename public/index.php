<?php

/**
 * The entrypoint of a Fragments application, the front controller.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Fragments\Component\Http\Request;
use Fragments\Component\Bootstrap;

$request = new Request();
$bootstrap = new Bootstrap();

$response = $bootstrap->processRequest($request);
$response->send();
