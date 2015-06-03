<?php // déclenchement de la mise en tampon du flux HTML de sortie
    ob_start();  ?>

<div class="col-lg-12" id="article"> 
    <div class="col-lg-12" id="article_title">  
        <?php echo $titres; ?>
    </div>
    <div class="col-lg-12"> 
        <div class="col-lg-2 col-lg-offset-1"> temps de préparation : 
            <?php echo $tempsPreparations; ?>
        </div>
        <div class="col-lg-2"> temps de cuisson :
            <?php echo $tempsCuissons; ?>
        </div>
        <div class="col-lg-2"> difficulté : 
            <?php echo $difficultes; ?>
        </div>
        <div class="col-lg-2"> budget :
            <?php echo $budgets; ?>
        </div>
        <div class="col-lg-2"> prix de la recette :
            <?php echo $prixHT; ?>
        </div>
    </div>
    <div class="col-lg-12" id="article_presentation"> 
        <img class="col-lg-3 col-lg-offset-1" id="article_presentation_img" src="Images/<?php echo $images; ?>" alt="recipe"></img>
        <div class="col-lg-8" id="article_presentation_list"> liste des ingrédients </div>
        <div class="col-lg-10 col-lg-offset-1" id="article_presentation_summary"> 
            <?php echo $resumeRecettes; ?>
        </div>
    </div>
    <div class="col-lg-10 col-lg-offset-1" id="article_recipe"> recette : <br/>
        <?php echo $contenus; ?>
    </div>
</div>

<?php // récupération du flux de sortie mis en tampon depuis l'appel à ob_start dans une variable
    $content_article = ob_get_clean(); ?>
<?php  require 'Skeleton.php'; ?>