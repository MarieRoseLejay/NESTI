<?php
    require 'Model/Query.php';
    
    function content_Category($nom,$table,$idTable,$column){
        $noms = array();
        $images = array();
        $resumes = array();
                
        for($i = 1; $i <= 6; $i++){
            $noms[$i] = getNom($i,$nom,$table,$idTable);
            $images[$i] = getImage($i,$table,$idTable);
            if($column != ''){
                $resumes[$i] = getColumn($i,$table,$idTable,$column);
            }
        }
        require 'View/Content_Category.php';
    }
    
    function content_Home($table1,$table2,$table3){
        $recette = getIdImageShuffle($table1);
        $ingredient = getIdImageShuffle($table2);
        $ustensile = getIdImageShuffle($table3);
        
        require 'View/Content_Home.php';
    }
    
    function content_Article($nom,$table,$idTable,$preparation,$cuisson,$prix,$resumeRecette,$contenu){
        $i = 1;
        /*$titres = array();
        $tempsPreparations = array();
        $tempsCuissons = array();
        $difficultes = array();
        $budgets = array();
        $prixHT = array();
        $images = array();
        $resumeRecettes = array();
        $contenus = array();
        
        for($i = 1; $i <= 6; $i++){*/
            $titres = getNom($i,$nom,$table,$idTable);
            $tempsPreparations = getColumn($i,$table,$idTable,$preparation); 
            $tempsCuissons = getColumn($i,$table,$idTable,$cuisson);
            $difficultes = getDifficulte($i);
            $budgets = getBudget($i);
            $prixHT = getColumn($i,$table,$idTable,$prix);
            $images = getImage($i,$table,$idTable);
            $resumeRecettes = getColumn($i,$table,$idTable,$resumeRecette);  
            $contenus = getColumn($i,$table,$idTable,$contenu);
            
        require 'View/Content_Article.php';
    }
    
?>

