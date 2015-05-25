<?php
    require 'Model/Query.php';
    
    function content_Category($nom,$table,$idTable,$resume){
        $noms = array();
        $images = array();
        $resumes = array();
                
        for($i = 1; $i <= 6; $i++){
            $noms[$i] = getNom($i,$nom,$table,$idTable);
            $images[$i] = getImage($i,$table,$idTable);
            if($resume != ''){
                $resumes[$i] = getResume($i,$table,$idTable,$resume);
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
    
?>

