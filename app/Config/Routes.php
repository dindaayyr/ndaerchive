<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Anniversary;

$routes->get('/', [Anniversary::class, 'index']);
$routes->get('timeline', [Anniversary::class, 'timeline']);
$routes->get('photobooth', [Anniversary::class, 'photobooth']);
$routes->get('wishes', [Anniversary::class, 'wishes']);

// AJAX Endpoint
$routes->post('photobooth/save', [Anniversary::class, 'savePhoto']);
$routes->post('wishes/save', [Anniversary::class, 'saveWish']);
$routes->get('cinema', [Anniversary::class, 'cinema']);