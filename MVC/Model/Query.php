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

    function getNom($i,$nom,$table,$idTable){
        require 'Connection.php';
        //récupération du titre ou nom de l'article de la recette 
        $query_Nom = 'SELECT '.$nom.' FROM '.$table.' WHERE '.$idTable.' = '.$i.'';
        $result_Nom = $pdo->query($query_Nom)->fetchAll();

        $res = $result_Nom[0][$nom];
        
        return($res);
    }
    
    function getImage($i,$table,$idTable){
        require 'Connection.php';
        //récupération de l'image correspondant à la recette
        $query_NomFichierImage = 'SELECT NomFichier FROM image,'.$table
                .' WHERE image.idImage='.$table.'.Image_idImage AND '.$table.'.'.$idTable.' = '.$i.'';
        $result_NomFichierImage = $pdo->query($query_NomFichierImage)->fetchAll();
        
        $res = $result_NomFichierImage[0]['NomFichier'];
        return ($res);
    }
    
    function getResume($i,$table,$idTable,$resume){
        require 'Connection.php';
        //récupération du résumé de la recette
        $query_Resume = 'SELECT '.$resume.' FROM '.$table.' WHERE '.$idTable.' = '.$i.'';
        $result_Resume = $pdo->query($query_Resume)->fetchAll();

        $res = $result_Resume[0][$resume];
        
        return $res ;
    }
    
?>

