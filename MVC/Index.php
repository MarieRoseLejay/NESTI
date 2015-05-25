<?php
    
    // Connection à la base
    require 'Model/Connection.php';
    
    // Contrôle des liens et de la redirection via le routeur
    require 'Controller/Router.php';
    if(isset($_GET['page'])){
        router($_GET['page']);
    }
    else{
        router('default');
    }
 
?>

