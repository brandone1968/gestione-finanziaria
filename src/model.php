<?php

// Return all articles
function getArticles() {
    $bdd = new PDO('mysql:host=localhost;dbname=gestfin;charset=utf8', 'gestfin_user', 'secret');
    $articles = $bdd->query('select * from t_article order by art_id desc');
    return $articles;
}