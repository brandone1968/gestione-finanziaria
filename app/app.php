<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();

// Register service providers.
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));
$app->register(new Silex\Provider\AssetServiceProvider(), array(
    'assets.version' => 'v1'
));

// Register services.
$app['dao.fattura'] = function ($app) {
    return new gestionefinanziaria\DAO\FatturaDAO($app['db']);
};
$app['dao.dettaglioFattura'] = function ($app) {
    $dettaglioFatturaDAO = new gestionefinanziaria\DAO\DettaglioFatturaDAO($app['db']);
    $dettaglioFatturaDAO->setFatturaDAO($app['dao.fattura']);
    return $dettaglioFatturaDAO;
};

