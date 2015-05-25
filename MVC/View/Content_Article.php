<?php require 'Model/Connection.php'; 
    // déclenchement de la mise en tampon du flux HTML de sortie
    ob_start();  ?>

<div class="col-lg-12" id="article"> 
    <div class="col-lg-12" id="article_title">  
    <?php $i = 1; 
        //récupération du titre de la recette
        $query_TitreRecette = 'SELECT Titre FROM recette WHERE idRecette = '.$i.'';
        $result_TitreRecette = $pdo->query($query_TitreRecette)->fetchAll();
        
        echo $result_TitreRecette[0]['Titre'];
    ?>
    </div>
    <div class="col-lg-12" id="article_information"> 
        <!--div class="col-lg-2" id="article_information_like"> ***** </div-->
        <div class="col-lg-2 " id="article_information_timeMaking"> temps de préparation : 
        <?php //récupération du temps de préparation de la recette
            $query_TempsPreparationRecette = 'SELECT Temps_Preparation FROM recette WHERE idRecette = '.$i.'';
            $result_TempsPreparationRecette = $pdo->query($query_TempsPreparationRecette)->fetchAll();
            
            echo $result_TempsPreparationRecette[0]['Temps_Preparation'];
        ?>
        </div>
        <div class="col-lg-2" id="article_information_timeCooking"> temps de cuisson :
        <?php //récupération du temps de cuisson de la recette
            $query_TempsCuissonRecette = 'SELECT Temps_Cuisson FROM recette WHERE idRecette = '.$i.'';
            $result_TempsCuissonRecette = $pdo->query($query_TempsCuissonRecette)->fetchAll();
            
            echo $result_TempsCuissonRecette[0]['Temps_Cuisson'];
        ?>
        </div>
        <div class="col-lg-2" id="article_information_difficulty"> difficulté : 
        <?php //récupération de la difficulté de la recette
            $query_DifficulteRecette = 'SELECT Difficulte FROM recette WHERE idRecette = '.$i.'';
            $result_DifficulteRecette = $pdo->query($query_DifficulteRecette)->fetchAll();
            
            $difficulty = $result_DifficulteRecette[0]['Difficulte'];
            for ($j = 0; $j < $difficulty ; $j++){
                echo '*';
            }
        ?>
        </div>
        <div class="col-lg-2" id="article_information_budget"> budget :
        <?php //récupération du budget de la recette
            $query_BudgetRecette = 'SELECT Budget FROM recette WHERE idRecette = '.$i.'';
            $result_BudgetRecette = $pdo->query($query_BudgetRecette)->fetchAll();
            
            $budget = $result_BudgetRecette[0]['Budget'];
            if($budget >= 0 && $budget < 20){
                $typeBudget = 1;
            }
            elseif($budget >= 20 && $budget < 40){
                $typeBudget = 2;
            }
            elseif($budget >= 40 && $budget < 60){
                $typeBudget = 3;
            }
            elseif($budget >= 60 && $budget < 80){
                $typeBudget = 4;
            }
            elseif($budget >= 80){
                $typeBudget = 5;
            }
            
            for ($j = 0; $j < $typeBudget ; $j++){
                echo '€';
            }
        ?>
        </div>
        <div class="col-lg-2" id="article_information_price"> prix de la recette :
        <?php //récupération du prix de la recette
            $query_PrixHTRecette = 'SELECT PrixHT FROM recette WHERE idRecette = '.$i.'';
            $result_PrixHTRecette = $pdo->query($query_PrixHTRecette)->fetchAll();
            
            echo $result_PrixHTRecette[0]['PrixHT'].' €';
        ?>
        </div>
    </div>
    <div class="col-lg-12" id="article_presentation"> 
        <?php //récupération de l'image correspondant à la recette
                $query_NomFichierImageRecette = 'SELECT NomFichier FROM image, recette WHERE image.idImage=recette.Image_idImage AND recette.idRecette = '.$i.'';
                $result_NomFichierImageRecette = $pdo->query($query_NomFichierImageRecette)->fetchAll();
            ?>
        <img class="col-lg-3 col-lg-offset-1" id="article_presentation_img" src="Images/<?php echo $result_NomFichierImageRecette[0]['NomFichier']; ?>" alt="recipe"></img>
        <div class="col-lg-8" id="article_presentation_list"> liste des ingrédients </div>
        <div class="col-lg-12" id="article_presentation_summary"> 
        <?php //récupération du résumé de la recette
            $query_ResumeRecette = 'SELECT Resume FROM recette WHERE idRecette = '.$i.'';
            $result_ResumeRecette = $pdo->query($query_ResumeRecette)->fetchAll();

            echo $result_ResumeRecette[0]['Resume'];
        ?>
        </div>
    </div>
    <div class="col-lg-12" id="article_recipe"> recette : </br>
    <?php //récupération la recette
            $query_ContenuRecette = 'SELECT Contenu FROM recette WHERE idRecette = '.$i.'';
            $result_ContenuRecette = $pdo->query($query_ContenuRecette)->fetchAll();

            echo $result_ContenuRecette[0]['Contenu'];
        ?>
    </div>
</div>

<?php // récupération du flux de sortie mis en tampon depuis l'appel à ob_start dans une variable
    $content_article = ob_get_clean(); ?>
<?php  require 'Skeleton.php'; ?>