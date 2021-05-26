<?php

//connexion a la base de donnée

try
{

	$db = new PDO('mysql:host=localhost;dbname=bd_senegal', 'root', '');
$db->exec('SET NAMES utf8');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.


}

catch(Exception $e)

{
    die('Erreur : '.$e->getMessage());

}