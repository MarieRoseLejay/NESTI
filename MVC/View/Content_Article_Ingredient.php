<?php // déclenchement de la mise en tampon du flux HTML de sortie
    ob_start();  ?>

<div class="col-lg-12 article"> 
    <div class="col-lg-12 article_title">  
        <?php echo $nomsI; ?>
    </div>
    <div class="row">
        <div class="col-lg-5">
            <div class="col-lg-2 clearfix"></div>
            <div class="col-lg-12 article_img" style="background-image: url('Images/<?php echo $images; ?>')" ></div>
            <div class="col-lg-11 col-lg-offset-2 article_presentation_summary"> </div>
        </div>        
        <div class="col-lg-7">
            <div class="col-lg-12 article_info"> prix de l'ingrédient :
                <?php echo $prixUnitaireHT; ?> €
            </div>
            <div class="col-lg-12 article_info"> Marque :
                <?php echo $marques; ?>
            </div>
            <div class="col-lg-12 article_info_title"> liste des recettes qui utilisent l'ingredient : </div>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 article_info_title"> descriptif : </div>
        <div class="col-lg-10 col-lg-offset-1">    
            <?php echo $contenus; ?>
        </div>
    </div>    
</div>

<?php // récupération du flux de sortie mis en tampon depuis l'appel à ob_start dans une variable
    $content_article = ob_get_clean(); ?>
<?php  require 'Skeleton.php'; ?>