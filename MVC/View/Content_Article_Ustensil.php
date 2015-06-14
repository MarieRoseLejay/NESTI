<?php // déclenchement de la mise en tampon du flux HTML de sortie
    ob_start();  ?>

<div class="col-lg-12 article"> 
    <div class="col-lg-12 article_title">  
        <?php echo $nomsU; ?>
    </div>
    <div class="row">
        <div class="col-lg-5">
            <div class="col-lg-2 clearfix"></div>
            <div class="col-lg-12 article_img" style="background-image: url('Images/<?php echo $images; ?>')" ></div>
        </div>        
        <div class="col-lg-7">
            <div class="col-lg-12 article_info"> Prix de l'ustensile : 
                <?php echo $prixUnitaireHT; ?>
            </div>
            <div class="col-lg-12 article_info"> Marque :
                <?php echo $marques; ?>
            </div>
            <div class="col-lg-12 article_info_title"> liste des recettes utilisant l'ustensile : </div>
            <div class="col-lg-12 article_info">
                <?php for ($j = 0; $j < $tailleTableauRecettes; $j++){
                    echo $recette[$j].'<br/>';
                }?>
            </div>
        </div>
    </div>
</div>  

<?php // récupération du flux de sortie mis en tampon depuis l'appel à ob_start dans une variable
    $content_article = ob_get_clean(); ?>
<?php  require 'Skeleton.php'; ?>