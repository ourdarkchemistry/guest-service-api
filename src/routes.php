<?php

use App\Controller\GuestController;

$app->get('/guests', GuestController::class . ':getAll');
$app->post('/guests', GuestController::class . ':create');
$app->get('/guests/{id}', GuestController::class . ':get');
$app->put('/guests/{id}', GuestController::class . ':update');
$app->delete('/guests/{id}', GuestController::class . ':delete');
