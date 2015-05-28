<?php
    require 'Model/Query.php';
    
    function content_Home($page){
        $recette = getIdImageShuffle('recette');
        $ingredient = getIdImageShuffle('ingredient');
        $ustensile = getIdImageShuffle('ustensile');
        
        //inclusions liés à des problèmes d'architecture non résolus --> résolu
        
        require 'View/Content_Home.php';
    }
    
    function content_Category($nom,$table,$column,$page){
        $noms = array();
        $images = array();
        $resumes = array();
                
        for($i = 1; $i <= 6; $i++){
            $noms[$i] = getNom($i,$nom,$table);
            $images[$i] = getImage($i,$table);
            if($column != ''){
                $resumes[$i] = getColumn($i,$table,$column);
            }
        }
        require 'View/Content_Category.php';
    }
    
    function content_Category_Recette(){
        content_Category('Titre','recette','Resume','2');
    }
    function content_Category_Ingredient(){
        content_Category('NomIngredient','ingredient','Marque','3');
    }
    function content_Category_Ustensile(){
        content_Category('NomUstensile','ustensile','Marque','4');
    }
    
    //Problème d'architecture : fonction content_Article conçue uniquement pour gérer les articles
    //fonctions de query appelées pas assez spécifiques -> trop d'arguments à passer à content_Article
    function content_Article($i,$nom,$table,$preparation,$cuisson,$prix,$resumeRecette,$contenu,$page){
        $difficultes = getDifficulte($i);
        $budgets = getBudget($i);
        
        $titres = getNom($i,$nom,$table);
        $tempsPreparations = getColumn($i,$table,$preparation); 
        $tempsCuissons = getColumn($i,$table,$cuisson);
        $prixHT = getColumn($i,$table,$prix);
        $images = getImage($i,$table);
        $resumeRecettes = getColumn($i,$table,$resumeRecette);  
        $contenus = getColumn($i,$table,$contenu);
        //$recette = getRecette($i);
        
        //inclusions liés à des problèmes d'architecture non résolus
        $noms = array();
        for($i = 1; $i <= 6; $i++){
            $noms[$i] = getNom($i,$nom,$table);
        }
            
        require 'View/Content_Article.php';
    }
?>

