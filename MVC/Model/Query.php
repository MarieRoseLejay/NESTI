<?php 
    function getIdImageShuffle($table){
        require 'Connection.php';
        //récupération de idImage et NomFichier pour toutes les lignes de la table sélectionnée
        $query_Idimage = 'SELECT idImage, NomFichier FROM image, '.$table
                .' WHERE image.idImage='.$table.'.Image_idImage';
        $result_Idimage = $pdo->query($query_Idimage)->fetchAll(); //donne un tableau
       
        //création des images
        shuffle($result_Idimage);  //mélange des index du tableau
        $res = array();
        for($j = 0; $j <5; $j++){
            $res[$j] = $result_Idimage[$j]['NomFichier'];
        }
        return ($res);
    }

    function getNom($i,$nom,$table){
        require 'Connection.php';
        //récupération du titre ou nom de l'article de la recette 
        $query_Nom = 'SELECT '.$nom.' FROM '.$table.' WHERE id'.ucfirst($table).' = '.$i.'';
        $result_Nom = $pdo->query($query_Nom)->fetchAll();

        $res = $result_Nom[0][$nom];
        
        return($res);
    }
    
    function getImage($i,$table){
        require 'Connection.php';
        //récupération de l'image correspondant à la recette
        $query_NomFichierImage = 'SELECT NomFichier FROM image,'.$table
                .' WHERE image.idImage='.$table.'.Image_idImage AND '.$table.'.id'.ucfirst($table).' = '.$i.'';
        $result_NomFichierImage = $pdo->query($query_NomFichierImage)->fetchAll();
        
        $res = $result_NomFichierImage[0]['NomFichier'];
        return ($res);
    }
    
   function getColumn($i,$table,$column){
       require 'Connection.php';
        //récupération du contenu de la colonne pour la table donnée
        $query_Column = 'SELECT '.$column.' FROM '.$table.' WHERE id'.ucfirst($table).' = '.$i.'';
        $result_Column = $pdo->query($query_Column)->fetchAll();

        $res = $result_Column[0][$column];
        
        return $res;
    }
   
    function getRecette($i){
        require 'Connection.php';
         //récupération du contenu de la colonne pour la table donnée
        $query_recette = 'SELECT * FROM recette WHERE idRecette = '.$i.'';
        $result_recette = $pdo->query($query_recette)->fetchAll();
        
        return $result_recette;
    }
    
    function getIngredient($i){
        require 'Connection.php';
         //récupération du contenu de la colonne pour la table donnée
        $query_ingredient = 'SELECT * FROM ingredient WHERE idIngredient = '.$i.'';
        $result_ingredient = $pdo->query($query_ingredient)->fetchAll();
        
        return $result_ingredient;
    }
    
    function getUstensile($i){
        require 'Connection.php';
         //récupération du contenu de la colonne pour la table donnée
        $query_ustensile = 'SELECT * FROM ustensile WHERE idUstensile = '.$i.'';
        $result_ustensile = $pdo->query($query_ustensile)->fetchAll();
        
        return $result_ustensile;
    }

    function getDifficulte($i){
        require 'Connection.php';
        //récupération de la difficulté de la recette
        $query_DifficulteRecette = 'SELECT Difficulte FROM recette WHERE idRecette = '.$i.'';
        $result_DifficulteRecette = $pdo->query($query_DifficulteRecette)->fetchAll();

        $difficulty = $result_DifficulteRecette[0]['Difficulte'];

        $res = '';
        for ($j = 0; $j < $difficulty ; $j++){
            $res = $res.'*';
        }
        
        return $res;
    }
    
    function getBudget($i){
        require 'Connection.php';
        //récupération du budget de la recette
        $query_BudgetRecette = 'SELECT Budget FROM recette WHERE idRecette = '.$i.'';
        $result_BudgetRecette = $pdo->query($query_BudgetRecette)->fetchAll();

        $budget = $result_BudgetRecette[0]['Budget'];
        
        if($budget >= 0 && $budget < 20){
            $typeBudget = 1;
        }
        elseif($budget >= 20 && $budget < 40){
            $typeBudget = 2;
        }
        elseif($budget >= 40 && $budget < 60){
            $typeBudget = 3;
        }
        elseif($budget >= 60 && $budget < 80){
            $typeBudget = 4;
        }
        elseif($budget >= 80){
            $typeBudget = 5;
        }
        
        $res = '';
        for ($j = 0; $j < $typeBudget ; $j++){
            $res = $res.'€';
        }
        
        return $res;
    }
    
    function getTableRecette(){
        require 'Connection.php';
         //récupération du contenu pour la table donnée
        $query_TableRecette = 'SELECT * FROM recette';
        $result_TableRecette = $pdo->query($query_TableRecette)->fetchAll();
        
        return $result_TableRecette;
    }
    
    function saveRecipe($title, $prixHT, $resume, $contenu, $image, $tempsP, $tempsC, $note, $difficulte, $budget, $id){
        require 'Connection.php';
         //récupération du contenu pour la table donnée
        $query = 'UPDATE recette SET Titre ="'.$title.'", PrixHT = '.$prixHT.', '
                . 'Resume="'.$resume.'", Contenu="'.$contenu.'", Image_idImage='.$image.','
                . ' Temps_Preparation="'.$tempsP.'", Temps_Cuisson="'.$tempsC.'", Note='.$note.','
                . ' Difficulte='.$difficulte.', Budget='.$budget.' WHERE idRecette='.$id.' ';
        $query_Recette = $pdo->prepare($query);
        
        $query_Recette->execute();
    }
    
    function getImages(){
        require 'Connection.php';
        //récupération de l'image correspondant à la recette
        $query_Images = 'SELECT * FROM image';
        $result_Images = $pdo->query($query_Images)->fetchAll();
        
        return ($result_Images);
    }
?>

