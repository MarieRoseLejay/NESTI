<?php
    //Paramétrage de la connexion à la base de données mysql
    try{
        //définition de la chaîne de connexion (DSN)
        $strConnection = 'mysql:host=127.0.0.1;dbname=alternativecuisine';
	//$strConnection = 'mysql:host=sgbd.nesti.loc;dbname=lejay';
        
        //conncxion en utf-8
        $arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
       //instanciation de la connexion
        $pdo = new PDO($strConnection,'root','',$arrExtraParam);
	//$pdo = new PDO($strConnection,'lejay','lejay',$arrExtraParam);
        
        //activation de l'exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        $msg = 'Erreur dans '.$e->getFile().' L.'.$e->getLine().' : '.$e->getMessage();
        die($msg);
    }
?>

