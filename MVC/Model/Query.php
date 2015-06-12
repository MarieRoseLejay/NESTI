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
        for($j = 0; $j <7; $j++){
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
         //récupération du contenu pour la table recette
        $query = 'UPDATE recette SET Titre ="'.$title.'", PrixHT = '.$prixHT.', '
                . 'Resume="'.$resume.'", Contenu="'.$contenu.'", Image_idImage='.$image.','
                . ' Temps_Preparation="'.$tempsP.'", Temps_Cuisson="'.$tempsC.'", Note='.$note.','
                . ' Difficulte='.$difficulte.', Budget='.$budget.' WHERE idRecette='.$id.' ';
        $query_updateRecette = $pdo->prepare($query);
 
        $query_updateRecette->execute();
    }
    
    function createRecipe($title, $prixHT, $resume, $contenu, $image, $tempsP, $tempsC, $note, $difficulte, $budget){
        require 'Connection.php';
         //insertion d'une nouvelle ligne dans la table recette
        $query = 'INSERT INTO recette (Titre, PrixHT,Resume, Contenu, Image_idImage,'
                . ' Temps_Preparation, Temps_Cuisson, Note, Difficulte, Budget)'
                . ' VALUES ("'.$title.'",'.$prixHT.',"'.$resume.'","'.$contenu.'",'.$image.','
                . '"'.$tempsP.'","'.$tempsC.'",'.$note.','.$difficulte.','.$budget.')';
        $query_createRecette = $pdo->prepare($query);

        $query_createRecette->execute();
    }
    
    function deleteRecipe($id){
        require 'Connection.php';
        
        $query = 'DELETE FROM recette WHERE idRecette='.$id.' ';
        $query_deleteRecette = $pdo->prepare($query);

        $query_deleteRecette->execute();
    }
    
    function getTableIngredient(){
        require 'Connection.php';
         //récupération du contenu pour la table donnée
        $query_TableIngredient = 'SELECT * FROM ingredient';
        $result_TableIngredient = $pdo->query($query_TableIngredient)->fetchAll();
        
        return $result_TableIngredient;
    }
    function saveIngredient($idIngredient,$NomIngredient,$PrixUnitaireHT,$Marque,$image){
        require 'Connection.php';
         //récupération du contenu pour la table recette
        $query = 'UPDATE ingredient SET idIngredient ='.$idIngredient.', NomIngredient = "'.$NomIngredient.'"'
                . ', PrixUnitaireHT='.$PrixUnitaireHT.', Marque="'.$Marque.'", Image_idImage='.$image
                .' WHERE idIngredient='.$idIngredient.' ';
        $query_updateIngredient = $pdo->prepare($query);
 
        $query_updateIngredient->execute();
    }
    function createIngredient($NomIngredient,$PrixUnitaireHT,$Marque,$image){
        require 'Connection.php';
         //insertion d'une nouvelle ligne dans la table ingredient
        $query = 'INSERT INTO ingredient (NomIngredient,PrixUnitaireHT,Marque,Image_idImage)'
                . ' VALUES ("'.$NomIngredient.'",'.$PrixUnitaireHT.',"'.$Marque.'",'.$image.')';
        echo $query;
        $query_createIngredient = $pdo->prepare($query);

        $query_createIngredient->execute();
    }
    function deleteIngredient($idIngredient){
        require 'Connection.php';
        
        $query = 'DELETE FROM ingredient WHERE idIngredient='.$idIngredient.' ';
        $query_deleteIngredient = $pdo->prepare($query);

        $query_deleteIngredient->execute();
    }
    
    function getTableUstensile(){
        require 'Connection.php';
         //récupération du contenu pour la table donnée
        $query_TableUstensile = 'SELECT * FROM ustensile';
        $result_TableUstensile = $pdo->query($query_TableUstensile)->fetchAll();
        
        return $result_TableUstensile;
    }
    function saveUstensile($idUstensile,$NomUstensile,$PrixUnitaireHT,$Marque,$image){
        require 'Connection.php';
         //récupération du contenu pour la table recette
        $query = 'UPDATE ustensile SET idUstensile ='.$idUstensile.', NomUstensile = "'.$NomUstensile.'"'
                . ', PrixUnitaireHT='.$PrixUnitaireHT.', Marque="'.$Marque.'", Image_idImage='.$image
                .' WHERE idUstensile='.$idUstensile.' ';
        $query_updateUstensile = $pdo->prepare($query);
 
        $query_updateUstensile->execute();
    }
    function createUstensile($NomUstensile,$PrixUnitaireHT,$Marque,$image){
        require 'Connection.php';
         //insertion d'une nouvelle ligne dans la table ustensile
        $query = 'INSERT INTO ustensile (NomUstensile,PrixUnitaireHT,Marque,Image_idImage)'
                . ' VALUES ("'.$NomUstensile.'",'.$PrixUnitaireHT.',"'.$Marque.'",'.$image.')';
        echo $query;
        $query_createUstensile = $pdo->prepare($query);

        $query_createUstensile->execute();
    }
    function deleteUstensile($idUstensile){
        require 'Connection.php';
        
        $query = 'DELETE FROM ustensile WHERE idUstensile='.$idUstensile.' ';
        $query_deleteUstensile = $pdo->prepare($query);

        $query_deleteUstensile->execute();
    }
    
    function getTag($idTag){
        require 'Connection.php';
         //récupération du contenu de la colonne pour la table donnée
        $query_tag = 'SELECT * FROM tag WHERE idTag = '.$idTag.'';
        $result_tag = $pdo->query($query_tag)->fetchAll();
        
        return $result_tag;
    }
    function getTableTag(){
        require 'Connection.php';
         //récupération du contenu pour la table donnée
        $query_TableTag = 'SELECT * FROM tag';
        $result_TableTag = $pdo->query($query_TableTag)->fetchAll();
        
        return $result_TableTag;
    }
    function saveTag($idTag,$valeur){
        require 'Connection.php';
         //récupération du contenu pour la table tag
        $query = 'UPDATE tag SET Valeur = "'.$valeur.'"'
                .' WHERE idTag='.$idTag;
        $query_updateTag = $pdo->prepare($query);
 
        $query_updateTag->execute();
    }
    function createTag($valeur){
        require 'Connection.php';
         //insertion d'une nouvelle ligne dans la table tag
        $query = 'INSERT INTO tag (Valeur)'
                . ' VALUES ("'.$valeur.'")';
        echo $query;
        $query_createTag = $pdo->prepare($query);

        $query_createTag->execute();
    }
    function deleteTag($idTag){
        require 'Connection.php';
        
        $query = 'DELETE FROM tag WHERE idTag='.$idTag.' ';
        $query_deleteTag = $pdo->prepare($query);

        $query_deleteTag->execute();
    }
    
  
    function getImages(){
        require 'Connection.php';
        //récupération de l'image correspondant à la recette
        $query_Images = 'SELECT * FROM image';
        $result_Images = $pdo->query($query_Images)->fetchAll();
        
        return ($result_Images);
    }
    function getImageId($idImage){
        require 'Connection.php';
         //récupération du contenu de la colonne pour la table donnée
        $query_image = 'SELECT * FROM image WHERE idImage = '.$idImage.'';
        $result_image = $pdo->query($query_image)->fetchAll();
        
        return $result_image;
    }
    function saveImage($idImage,$NomFichier,$Legende){
        require 'Connection.php';
         //récupération du contenu pour la table image
        $query = 'UPDATE image SET NomFichier="'.$NomFichier.'",Legende="'.$Legende.'"'
                .' WHERE idImage='.$idImage;
        $query_updateImage = $pdo->prepare($query);
 
        $query_updateImage->execute();
    }
    function createImage($NomFichier,$Legende){
        require 'Connection.php';
         //insertion d'une nouvelle ligne dans la table image
        $query = 'INSERT INTO image (NomFichier,Legende)'
                . ' VALUES ("'.$NomFichier.'","'.$Legende.'")';
        echo $query;
        $query_createImage = $pdo->prepare($query);

        $query_createImage->execute();
    }
    function deleteImage($idImage){
        require 'Connection.php';
        
        $query = 'DELETE FROM image WHERE idImage='.$idImage.' ';
        $query_deleteImage = $pdo->prepare($query);

        $query_deleteImage->execute();
    }
    
?>

