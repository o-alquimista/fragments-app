<?php

/**
 * The entrypoint of a Fragments application, the front controller.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Fragments\Component\Http\Request;
use Fragments\Component\Http\Response;
use Fragments\Component\Routing\Router;
use Fragments\Bundle\Exception\NotFoundHttpException;

$request = new Request();

try {
    $router = new Router();
    $response = $router->run($request);
} catch (NotFoundHttpException $e) {
    $response = new Response('Page not found', 404);
} catch (Throwable $e) {
    error_log($e);

    $response = new Response('Something went wrong.', 500);
}

$response->send();