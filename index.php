<?php
require 'Connection.php';
$Connex=Connexion::getInstance();
var_dump($Connex);

$Connex2=Connexion::getInstance();
var_dump($Connex);

$pdo=$Connex->getPdo();
$stat=$pdo->prepare('select * from news');
$stat->execute();
foreach($stat->fetchAll(PDO::FETCH_CLASS) as $news){
    var_dump($news);
}

