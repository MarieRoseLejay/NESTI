<?php // déclenchement de la mise en tampon du flux HTML de sortie
    ob_start();  ?>
<div class="container">
    <p class="col-lg-12 ">
        Assez des plats industriels dont on se demande ce qu'ils contiennent ? </br>
        Envie d'une cuisine plus saine et plus légère ? </br>
        Ce site est fait pour vous ! </br>
        </br>
        Et puisque cela n'est pas synonyme de restriction vous pourrez également 
        assouvir votre curiosité avec les </br>
        nombreuses recettes de ce site venues du monde entier !
    </p>

    <div class="picture row">
    <?php
        for($j = 0; $j <5; $j++){
            echo '<!--article -->
                <img class="col-lg-4" id="home_img1" src="Images/'.$recette[$j].'" alt="img"> </img>';
        }
    ?>
    </div>
    <p class="col-lg-12 "> Vous pourrez également y commander des produits frais et de saisons ... </p>
    <div class="picture row">
        <?php 
        for($j = 0; $j <5; $j++){
            echo '<!--article -->
                <img class="col-lg-4" id="home_img1" src="Images/'.$ingredient[$j].'" alt="img"> </img>';
        }
        ?>
    </div>
    <p class="col-lg-12 "> ....et découvrir des ustensils pour réaliser vous mêmes nos recettes !</p>
    <!--div class="picture row">
        <?php
        for($j = 0; $j <5; $j++){
            echo '<!--article -->
                <img class="col-lg-4" id="home_img1" src="Images/'.$ustensile[$j].'" alt="img"> </img>';
        }
        ?>
    </div-->
</div>
<?php // récupération du flux de sortie mis en tampon depuis l'appel à ob_start dans une variable
    $content_article = ob_get_clean();  ?>
<?php  require 'Skeleton.php'; 
