<?php require 'Model/Connection.php'; 
    // déclenchement de la mise en tampon du flux HTML de sortie
    ob_start();  ?>

<div class="col-lg-12" id="article"> 
    <div class="col-lg-12" id="article_title">  
    <?php echo $titres; ?>
    </div>
    <div class="col-lg-12" id="article_information"> 
        <!--div class="col-lg-2" id="article_information_like"> ***** </div-->
        <div class="col-lg-2 col-lg-offset-1" id="article_information_timeMaking"> temps de préparation : 
        <?php echo $tempsPreparations; ?>
        </div>
        <div class="col-lg-2" id="article_information_timeCooking"> temps de cuisson :
        <?php echo $tempsCuissons; ?>
        </div>
        <div class="col-lg-2" id="article_information_difficulty"> difficulté : 
        <?php echo $difficultes; ?>
        </div>
        <div class="col-lg-2" id="article_information_budget"> budget :
        <?php echo $budgets; ?>
        </div>
        <div class="col-lg-2" id="article_information_price"> prix de la recette :
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
    <div class="col-lg-10 col-lg-offset-1" id="article_recipe"> recette : </br>
    <?php echo $contenus; ?>
    </div>
</div>

<?php // récupération du flux de sortie mis en tampon depuis l'appel à ob_start dans une variable
    $content_article = ob_get_clean(); ?>
<?php  require 'Skeleton.php'; ?>