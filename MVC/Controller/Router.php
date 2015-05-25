<?php
    function router($content_article){
        require 'Controller.php';
        switch($content_article){
            case "1":
                content_Home('recette','ingredient','ustensile');
            case "2":
                content_Category('Titre','recette','idRecette','Resume');
            case "3":
                content_Category('NomIngredient','ingredient','idIngredient','Marque');
            case "4":
                content_Category('NomUstensile','ustensile','idUstensile','Marque');
            case "5":
                $page = 'View/Content_Article.php';
                require $page;
            default :
                $page = 'View/Content_Home.php';
                require $page;
        }
    }
?>

