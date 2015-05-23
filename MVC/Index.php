<?php
    
    // Connection à la base
    require 'Model/Connection.php';
    
    // Contrôle des liens et de la redirection via le routeur
    require 'Controller/Router.php';
    if(isset($_GET['page'])){
        require getLien($_GET['page']);
    }
    else{
        require 'View/Content_Home.php';
    }
 
?>

