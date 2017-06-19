<?php

// Home page
$app->get('/', function () use ($app) {
    $fatture = $app['dao.fattura']->findAll();
    return $app['twig']->render('index.html.twig', array('fatture' => $fatture));
})->bind('home');

// Fattura  with dettagli
$app->get('/fattura/{id}', function ($id) use ($app) {
    $fattura = $app['dao.fattura']->find($id);
    $dettagliFattura = $app['dao.dettaglioFattura']->findAllByFattura($id);
    return $app['twig']->render('fattura.html.twig', array('fattura' => $fattura, 'dettagliFattura' => $dettagliFattura));
})->bind('fattura');
