<?php
    function router($page){
        require 'Controller.php';
        switch($page){
            case "1":
                content_Home('1');
                break;
            case "2":
                if (isset($_GET['id'])){
                    $i = $_GET['id'];
                    content_Article($i,'Titre','recette','Temps_Preparation','Temps_Cuisson','PrixHT','Resume','Contenu','2');
                }
                else{
                    content_Category_Recette();
                }
                break;
            case "3":
                content_Category_Ingredient();
                break;
            case "4":
                content_Category_Ustensile();
                break;
            case "5":
                content_Article('1','Titre','recette','Temps_Preparation','Temps_Cuisson','PrixHT','Resume','Contenu','2');
                break;
            default :
                content_Home('recette','ingredient','ustensile','1');
                break;
        }
    }
?>

