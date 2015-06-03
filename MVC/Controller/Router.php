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
                    content_Article_Recette($i,'2');
                }
                else{
                    content_Category_Recette();
                }
                break;
            case "3":
                if (isset($_GET['id'])){
                    $i = $_GET['id'];
                    content_Article_Ingredient($i,'3');
                }
                else{
                    content_Category_Ingredient();
                }
                break;
            case "4":
                if (isset($_GET['id'])){
                    $i = $_GET['id'];
                    content_Article_Ustensile($i,'4');
                }
                else{
                    content_Category_Ustensile();
                }
                break;
            case "5":
                content_Admin('5');
                break;
            default :
                content_Home('recette','ingredient','ustensile','1');
                break;
        }
    }
?>

