<?php

// Home page
$app->get('/', function () use ($app) {
    $fatture = $app['dao.fattura']->findAll();
    return $app['twig']->render('index.html.twig', array('fatture' => $fatture));
});;
