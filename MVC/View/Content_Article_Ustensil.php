<?php // déclenchement de la mise en tampon du flux HTML de sortie
    ob_start();  ?>

<div class="col-lg-12" id="article"> 
    <div class="col-lg-12" id="article_title">  
    <?php echo $nomsU; ?>
    </div>
    <div class="col-lg-12"> 
        <div class="col-lg-2"> prix de l'ustensile :
            <?php echo $prixUnitaireHT; ?>
        </div>
        <div class="col-lg-2"> Marque :
            <?php echo $marques; ?>
        </div>
    </div>
    <div class="col-lg-12" id="article_presentation"> 
        <img class="col-lg-3 col-lg-offset-1" id="article_presentation_img" src="Images/<?php echo $images; ?>" alt="ustensil"></img>
        <div class="col-lg-8" id="article_presentation_list"> liste des recettes qui utilisent l'ustensile </div>
    </div>
    <div class="col-lg-10 col-lg-offset-1" id="article_recipe"> descriptif ? <br/>
        <?php //echo $contenus; ?>
    </div>
</div>

<?php // récupération du flux de sortie mis en tampon depuis l'appel à ob_start dans une variable
    $content_article = ob_get_clean(); ?>
<?php  require 'Skeleton.php'; ?>