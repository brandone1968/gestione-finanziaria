<?php

$app->get('/', function () use ($app) {
    $scadenze = $app['dao.scadenza']->findAll();
    return $app['twig']->render('scadenze.html.twig', array('scadenze' => $scadenze, "active_page" => "scadenze"));
})->bind('scadenze');

// Home page
$app->get('/fatture', function () use ($app) {
    $fatture = $app['dao.fattura']->findAll();
    return $app['twig']->render('fatture.html.twig', array('fatture' => $fatture, 'active_page' => "fatture"));
})->bind('fatture');

// Fattura  with dettagli
$app->get('/fattura/{id}', function ($id) use ($app) {
    $fattura = $app['dao.fattura']->find($id);
    $dettagliFattura = $app['dao.dettaglioFattura']->findAllByFattura($id);
    return $app['twig']->render('fattura.html.twig', array('fattura' => $fattura, 'dettagliFattura' => $dettagliFattura, 'active_page' => "fatture"));
})->bind('fattura');

$app->get('mbsoft', function () use ($app) {
    return $app['twig']->render('mbsoft.html.twig', array("active_page" => "mbsoft"));
})->bind('mbsoft');

$app->get('imposte', function () use ($app) {
    return $app['twig']->render('imposte.html.twig', array("active_page" => "imposte"));
})->bind('imposte');

$app->get('statistiche', function () use ($app) {
    return $app['twig']->render('statistiche.html.twig', array("active_page" => "statistiche"));
})->bind('statistiche');


