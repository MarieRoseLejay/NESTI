<?php
    function router($content_article){
        require 'Controller.php';
        switch($content_article){
            case "1":
                content_Home('recette','ingredient','ustensile');
                break;
            case "2":
                content_Category('Titre','recette','idRecette','Resume');
                break;
            case "3":
                content_Category('NomIngredient','ingredient','idIngredient','Marque');
                break;
            case "4":
                content_Category('NomUstensile','ustensile','idUstensile','Marque');
                break;
            case "5":
                content_Article('Titre','recette','idRecette','Temps_Preparation','Temps_Cuisson','PrixHT','Resume','Contenu');
                break;
            default :
                content_Home('recette','ingredient','ustensile');
                break;
        }
    }
?>

