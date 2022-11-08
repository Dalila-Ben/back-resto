<?php
//avec les define on cree des constantes qui vont me permettre de se connecter a ma base mysql
//pour la connexion je vais utiliser a PDO car il est universel 
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "resto");
//DSN DE CONNEXION (datasource name) 
$dsn='mysql:dbname='.DBNAME.';host='.DBHOST;

//je me connecte a la base avec le try catch pour que pdo releve une exeption 
try {

    //on commence par instancier le pdo donc un element de pdo
    $db= new PDO($dsn, DBUSER, DBPASS);
    
    //on s'assure d'envoyer les donnes en UTF8
    $db->exec("SET NAMES utf8");

    //on definit le mode "fetch" par default
    $db->setAttribute
    (PDO::ATTR_DEFAULT_FETCH_MODE,
    PDO::FETCH_ASSOC);
    
}catch(PDOException $e){
    die("Erreur:" .$e->getMessage()); 
    //le die va permettre de relever l'exception qui va nous dire s'il y a un probleme avec le try 
}
?>