<?php

/**
 * The entrypoint of a Fragments application, the front controller.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Fragments\Component\Bootstrap;
use Fragments\Component\Http\Request;

$bootstrap = new Bootstrap();

$request = new Request();
$response = $bootstrap->processRequest($request);
$response->send();

