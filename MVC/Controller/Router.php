<?php
    function getLien($content_article){
        switch($content_article){
            case "1":
                $page = 'View/Content_Home.php';
                return $page;
            case "2":
                $page = 'View/Content_Category.php';
                return $page;
            case "3":
                $page = 'View/Content_Article.php';
                return $page;
            default :
                $page = 'View/Content_Home.php';
                return $page;
        }
    } 
?>

