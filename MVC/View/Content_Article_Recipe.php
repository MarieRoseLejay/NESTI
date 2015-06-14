<?php // déclenchement de la mise en tampon du flux HTML de sortie
    ob_start();  ?>

<div class="col-lg-12 article"> 
    <div class="col-lg-12 article_title">  
        <?php echo $titres; ?>
    </div>
    <div class="row">
        <div class="col-lg-5">
            <div class="col-lg-2 clearfix"></div>
            <div class="col-lg-12 article_img" style="background-image: url('Images/<?php echo $images; ?>')" ></div>
            <div class="col-lg-11 col-lg-offset-2 article_presentation_summary"> 
                <?php echo $resumeRecettes; ?>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="col-lg-12 article_info"> temps de préparation : 
                <?php echo $tempsPreparations; ?>
            </div>
            <div class="col-lg-12 article_info"> temps de cuisson :
                <?php echo $tempsCuissons; ?>
            </div>
            <div class="col-lg-12 article_info"> difficulté : 
                <?php echo $difficultes; ?>
            </div>
            <div class="col-lg-12 article_info"> budget :
                <?php echo $budgets; ?>
            </div>
            <div class="col-lg-12 article_info"> prix de la recette :
                <?php echo $prixHT; ?> €
            </div>
            <div class="col-lg-12 article_info_title"> liste des ingrédients : </div>
                <div class="col-lg-12 article_info">
                    <?php for ($j = 0; $j < $tailleTableauIngredient; $j++){
                    echo $ingredient[$j].'<br/>';
                }?>
            </div>
            <div class="col-lg-12 article_info_title"> liste des ustensiles : </div>
                <div class="col-lg-12 article_info">
                    <?php for ($j = 0; $j < $tailleTableauUstensile; $j++){
                    echo $ustensile[$j].'<br/>';
                }?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 article_info_title"> recette : </div>
        <div class="col-lg-10 col-lg-offset-1">    
            <?php echo $contenus; ?>
        </div>
    </div>
</div>

<?php // récupération du flux de sortie mis en tampon depuis l'appel à ob_start dans une variable
    $content_article = ob_get_clean(); ?>
<?php  require 'Skeleton.php'; ?>