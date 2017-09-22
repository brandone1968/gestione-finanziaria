<?php

// Home page - prossime scadenze
$app->get('/', function () use ($app) {
    $tipoPagamento = 0;
    $anno = date("Y");
    $scadenze = $app['dao.scadenza']->findAll();
    return $app['twig']->render('scadenze.html.twig', array('scadenze' => $scadenze, 'tipoPagamento' => $tipoPagamento, 'anno' => $anno, "active_page" => "scadenze"));
})->bind('scadenze');

   
// Elenco fatture
$app->match('/fatture/', function () use ($app) {
    if (isset($_POST["anno"])) {
        $anno = $_POST["anno"];
    } else {
        // Imposto valore di default della ricerca per anno
        $anno = date("Y");
    }
    if (isset($_POST["tipoPagamento"])) {
        $tipoPagamento = $_POST["tipoPagamento"];
    } else {
        // Imposto valore di default della ricerca per anno
        $tipoPagamento = 0;
    }

    if ($tipoPagamento == 0) {
        $anniSelezionabili = $app['dao.fattura']->findAllYearIssue();
    } else {
        $anniSelezionabili = $app['dao.fattura']->findAllYearBalance();
    }

    $fatture = $app['dao.fattura']->findAll($tipoPagamento, $anno);
    return $app['twig']->render('fatture.html.twig', array('fatture' => $fatture, 'tipoPagamento' => $tipoPagamento, 'anno' => $anno, 'anniSelezionabili' => $anniSelezionabili, 'active_page' => "fatture"));
})->bind('fatture');

// Fattura  with dettagli
$app->get('/fattura/{id}', function ($id) use ($app) {
    $fattura = $app['dao.fattura']->find($id);
    $dettagliFattura = $app['dao.dettaglioFattura']->findAllByFattura($id);
    return $app['twig']->render('fattura.html.twig', array('fattura' => $fattura, 'dettagliFattura' => $dettagliFattura, 'active_page' => "fatture"));
})->bind('fattura');

$app->get('/mbsoft/', function () use ($app) {
    $tipoPagamento = 0;
    $anno = date("Y");
    return $app['twig']->render('mbsoft.html.twig', array('tipoPagamento' => $tipoPagamento, 'anno' => $anno, "active_page" => "mbsoft"));
})->bind('mbsoft');

//$app->get('imposte', function () use ($app) {
//    $tipoPagamento = 0;
//    $anno = date("Y");
//    return $app['twig']->render('imposte.html.twig', array('tipoPagamento' => $tipoPagamento, 'anno' => $anno, "active_page" => "imposte"));
//})->bind('imposte');

$app->get('/imposte/', function () use ($app) {
    $tipoPagamento = 0;
    $anno = date("Y");
    return $app['twig']->render('imposte.html.twig', array('tipoPagamento' => $tipoPagamento, 'anno' => $anno, "active_page" => "imposte"));
})->bind('imposte');

$app->get('/statistiche/', function () use ($app) {
    $tipoPagamento = 0;
    $anno = date("Y");
    return $app['twig']->render('statistiche.html.twig', array('tipoPagamento' => $tipoPagamento, 'anno' => $anno, "active_page" => "statistiche"));
})->bind('statistiche');


