<?php // déclenchement de la mise en tampon du flux HTML de sortie
    ob_start();  ?>
<div class="container" id="home_container">
    <p class="col-lg-12 home_text">
        Assez des plats industriels dont on se demande ce qu'ils contiennent ? </br>
        Envie d'une cuisine plus saine et plus légère ? </br>
        Ce site est fait pour vous ! </br>
        </br>
        Et puisque cela n'est pas synonyme de restriction vous pourrez également 
        assouvir votre curiosité avec les nombreuses recettes de ce site venues du monde entier !
    </p>

    <div class="picture row">
    <?php
        for($j = 0; $j <4; $j++){
            echo '<!--article -->
                <img class="col-lg-4 home_img_recipe" src="Images/'.$recette[$j].'" alt="img"> </img>';
        }
    ?>
    </div>
    <p class="col-lg-12 home_text"> Vous pourrez également y commander des produits frais et de saisons ... </p>
    <div class="picture row">
        <?php 
        for($j = 0; $j <7; $j++){
            echo '<!--article -->
                <img class="col-lg-4 home_img" src="Images/'.$ingredient[$j].'" alt="img"> </img>';
        }
        ?>
    </div>
    <p class="col-lg-12 home_text"> ....et découvrir des ustensils pour réaliser vous mêmes nos recettes !</p>
    <!--div class="picture row">
        <?php
        for($j = 0; $j <7; $j++){
            echo '<!--article -->
                <img class="col-lg-4 home_img" src="Images/'.$ustensile[$j].'" alt="img"> </img>';
        }
        ?>
    </div-->
</div>
<?php // récupération du flux de sortie mis en tampon depuis l'appel à ob_start dans une variable
    $content_article = ob_get_clean();  ?>
<?php  require 'Skeleton.php'; 
