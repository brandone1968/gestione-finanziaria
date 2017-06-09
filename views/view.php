<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <link href="gestfin.css" rel="stylesheet" />
        <title>Gestione Finanziaria - Home</title>
    </head>
    <body>
        <header>
            <h1>Gestione Finanziaria</h1>
        </header>
        <?php foreach ($fatture as $fattura): ?>
            <fattura>
                <h2><?php echo $fattura->getNumFattura() ?></h2>
                <p><?php echo $fattura->getDataFattura() ?></p>
                <p><?php echo $fattura->getDataPagamento() ?></p>
                <p><?php echo $fattura->getImponibile() ?></p>
            </fattura>
        <?php endforeach ?>
        <footer class="footer">
            <a href="https://github.com/brandone1968/gestione-finanziaria">Gestione Finanziaria</a> sviluppato in PHP con Silex.
        </footer>
    </body>
</html>