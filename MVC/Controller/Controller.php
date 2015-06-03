<?php
    require 'Model/Query.php';
    
    function content_Home($page){
        $recette = getIdImageShuffle('recette');
        $ingredient = getIdImageShuffle('ingredient');
        $ustensile = getIdImageShuffle('ustensile');
        
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
    
    function content_Article_Recette($i,$page){
        $recette = getRecette($i);
        
        $titres = $recette[0]['Titre'];
        $tempsPreparations = $recette[0]['Temps_Preparation']; 
        $tempsCuissons = $recette[0]['Temps_Cuisson'];
        $difficultes = getDifficulte($i);
        $budgets = getBudget($i);
        $prixHT = $recette[0]['PrixHT'];
        $images = getImage($i,'recette');
        $resumeRecettes = $recette[0]['Resume'];  
        $contenus = $recette[0]['Contenu'];
        
        $noms = array();
        for($i = 1; $i <= 6; $i++){
            $noms[$i] = getNom($i,'Titre','recette');
        }
            
        require 'View/Content_Article_Recipe.php';
    }
    
    function content_Article_Ingredient($i,$page){
        $ingredient = getIngredient($i);
        
        $nomsI = $ingredient[0]['NomIngredient'];
        $prixUnitaireHT = $ingredient[0]['PrixUnitaireHT'];
        $marques = $ingredient[0]['Marque'];
        $images = getImage($i,'ingredient');
        
        $noms = array();
        for($i = 1; $i <= 6; $i++){
            $noms[$i] = getNom($i,'NomIngredient','ingredient');
        }
            
        require 'View/Content_Article_Ingredient.php';
    }
    
    function content_Article_Ustensile($i,$page){
        $ustensile = getUstensile($i);
        
        $nomsU = $ustensile[0]['NomUstensile'];
        $prixUnitaireHT = $ustensile[0]['PrixUnitaireHT'];
        $marques = $ustensile[0]['Marque'];
        $images = getImage($i,'ustensile');
            
        $noms = array();
        for($i = 1; $i <= 6; $i++){
            $noms[$i] = getNom($i,'NomUstensile','ustensile');
        }
        
        require 'View/Content_Article_Ustensil.php';
    }
?>

