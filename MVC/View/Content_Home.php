<?php // déclenchement de la mise en tampon du flux HTML de sortie
    ob_start();  ?>
<div class="container">
    <p class="col-lg-12 ">
        Assez des plats industriels dont on se demande ce qu'ils contiennent ? </br>
        Envie d'une cuisine plus saine et plus légère ? </br>
        Ce site est fait pour vous ! </br>
        </br>
        Et puisque cela n'est pas synonyme de restriction vous pourrez également assouvir votre curiosité avec les </br>
        nombreuses recettes de ce site venues du monde entier !
    </p>

    <div class="picture row">
    <?php
        //récupération de idImage pour toutes les lignes de la table sélectionnées
        $query_IdimageRecette = 'SELECT idImage FROM image, recette WHERE image.idImage=recette.Image_idImage';
        $result_IdimageRecette = $pdo->query($query_IdimageRecette)->fetchAll(); //donne un tableau
       
        //création des images
        shuffle($result_IdimageRecette);  //mélange des index du tableau
        for($j = 0; $j <5; $j++){
            //sélection du nom correspondant à l'image en paramètre
            $query_NomFichierRecette = 'SELECT NomFichier FROM image, recette WHERE image.idImage=recette.Image_idImage AND image.idImage='.$result_IdimageRecette[$j]['idImage'].'';
            $result_NomFichierRecette = $pdo->query($query_NomFichierRecette)->fetchAll(); //donne un tableau
            echo '<!--article -->
                <img class="col-lg-4" id="home_img1"  src="Images/'.$result_NomFichierRecette[0]['NomFichier'].'" alt="img"> </img>'
            ;
        }
    ?>
    </div>
    <p class="col-lg-12 "> Vous pourrez également y commander des produits frais et de saisons ... </p>
    <div class="picture row">
        <?php 
            //récupération de NomFichier pour toutes les lignes de la table sélectionnées
            $query_IdimageIngredient = 'SELECT idImage FROM image, ingredient WHERE image.idImage=ingredient.Image_idImage';
            $result_IdimageIngredient = $pdo->query($query_IdimageIngredient)->fetchAll(); //donne un tableau
            
            //création des images
            shuffle($result_IdimageIngredient);  //mélange des index du tableau
            for($i = 0; $i <5; $i++){
                //sélection du nom correspondant à l'image en paramètre
                $query_NomFichierIngredient = 'SELECT NomFichier FROM image, ingredient WHERE image.idImage=ingredient.Image_idImage AND image.idImage='.$result_IdimageIngredient[$i]['idImage'].'';
                $result_NomFichierIngredient = $pdo->query($query_NomFichierIngredient)->fetchAll(); //donne un tableau
           
            echo '<!--article -->
            <img class="col-lg-4" id="home_img2"  src="Images/'.$result_NomFichierIngredient[0]['NomFichier'].'" alt="img"> </img>'
            ;}
        ?>
    </div>
    <p class="col-lg-12 "> ....et découvrir des ustensils pour réaliser vous mêmes nos recettes !</p>
    <!--div class="picture row">
        <?php
            //récupération de NomFichier pour toutes les lignes de la table sélectionnées
            $query_IdimageUstensile = 'SELECT idImage FROM image, ustensile WHERE image.idImage=ustensile.Image_idImage';
            $result_IdimageUstensile = $pdo->query($query_IdimageUstensile)->fetchAll(); //donne un tableau
            
            //création des images
            shuffle($result_IdimageUstensile);  //mélange des index du tableau
            for($i = 0; $i <5; $i++){
                //sélection du nom correspondant à l'image en paramètre
                $query_NomFichierUstensile = 'SELECT NomFichier FROM image, ustensile WHERE image.idImage=ustensile.Image_idImage AND image.idImage='.$result_IdimageUstensile[$i]['idImage'].'';
                $result_NomFichierUstensile = $pdo->query($query_NomFichierUstensile)->fetchAll(); //donne un tableau
           
            echo '<!--article -->
            <img class="col-lg-4" id="home_img3"  src="Images/'.$result_NomFichierUstensile[0]['NomFichier'].'" alt="img"> </img>'
            ;}
        ?>
    </div-->
</div>
<?php // récupération du flux de sortie mis en tampon depuis l'appel à ob_start dans une variable
    $content_article = ob_get_clean();  ?>
<?php  require 'Skeleton.php'; ?>

