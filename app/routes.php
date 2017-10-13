<?php
use Symfony\Component\HttpFoundation\Request;
use gestionefinanziaria\Domain\Fattura;
use gestionefinanziaria\Form\Type\FatturaType;
use gestionefinanziaria\Domain\Ditta;

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

// Add a new fattura
$app->match('/fattura/', function(Request $request) use ($app) {
    $elencoDitteSelect = $app['dao.ditta']->findAll();
    $fattura = new Fattura();
    
    // imposto come data di default la data del giorno
    $oggi = new \DateTime();
    $fattura->setDataFattura($oggi);
    
    // ricavo e imposto chi emette la fattura (ditta1)
    $ditta1 = $app['dao.ditta']->findDefaultEmette();
    $fattura->setDitta1($ditta1);

    // ricavo e imposto il cliente (ditta2)
    $ditta2 = $app['dao.ditta']->findDefaultCliente();
    $fattura->setDitta2($ditta2);
    

    // ricavo e imposto il numero della prima fattura disponibile per l'anno in corso
    // se non c'è ne sono viene impostato a 1 il numero della fattura.
    $numFattura = $app['dao.fattura']->findPrimoNumeroLibero($oggi->format('Y'));
    $fattura->setNumFattura($numFattura);
    
    $fatturaForm = $app['form.factory']->create(FatturaType::class, $fattura, array('elenco' => $elencoDitteSelect));

    $fatturaForm->handleRequest($request);

    if ($fatturaForm->isSubmitted() && $fatturaForm->isValid()) {
        //$app['dao.fattura']->save($options['Fattura']);
        $app['dao.fattura']->save($fattura);
        $app['session']->getFlashBag()->add('success', 'The fattura was successfully created.');
    }
    return $app['twig']->render('fattura_form.html.twig', array(
        'title' => 'New fattura',
        'fatturaForm' => $fatturaForm->createView(), 
        "active_page" => "fattura_add"));
})->bind('fattura_add');

// Edit an existing fattura
$app->match('/fattura/{id}/edit', function($id, Request $request) use ($app) {
    $fattura = $app['dao.fattura']->find($id);
    $fatturaForm = $app['form.factory']->create(FatturaType::class, $fattura);
    $fatturaForm->handleRequest($request);
    if ($fatturaForm->isSubmitted() && $fatturaForm->isValid()) {
        $app['dao.fattura']->save($fattura);
        $app['session']->getFlashBag()->add('success', 'The fattura was successfully updated.');
    }
    return $app['twig']->render('fattura_form.html.twig', array(
        'title' => 'Edit fattura',
        'fatturaForm' => $fatturaForm->createView()));
})->bind('fattura_edit');

$app->get('/mbsoft/', function () use ($app) {
    $tipoPagamento = 0;
    $anno = date("Y");
    return $app['twig']->render('mbsoft.html.twig', array('tipoPagamento' => $tipoPagamento, 'anno' => $anno, "active_page" => "mbsoft"));
})->bind('mbsoft');

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


