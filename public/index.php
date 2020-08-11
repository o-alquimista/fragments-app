<?php

/**
 * The entry point of the application.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Fragments\Component\Bootstrap;

$bootstrap = new Bootstrap;
$bootstrap->run();