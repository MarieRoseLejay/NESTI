<?php // déclenchement de la mise en tampon du flux HTML de sortie
    ob_start();  ?>


<div class="container" id="category"> 
    <!-- title of the category -->
    <div class="col-lg-12" id="category-title"> Catégorie </div>
    
    <?php for($i = 1; $i <= 6; $i++){ ?>
        <!--article -->
        <div class="col-lg-3" id="category_article"> 
            <div class="col-lg-12" id="category_article_title">  
                <?php //récupération du titre de la recette 
                    $query_TitreRecette = 'SELECT Titre FROM recette WHERE idRecette = '.$i.'';
                    $result_TitreRecette = $pdo->query($query_TitreRecette)->fetchAll();
                    //print_r($result_TitleRecette);
                    echo $result_TitreRecette[0]['Titre'];
                ?>
            </div>
            <?php //récupération de l'image correspondant à la recette
                $query_NomFichierImageRecette = 'SELECT NomFichier FROM image, recette WHERE image.idImage=recette.Image_idImage AND recette.idRecette = '.$i.'';
                $result_NomFichierImageRecette = $pdo->query($query_NomFichierImageRecette)->fetchAll();
            ?>
            <div class="row">
             <img class="col-lg-10" id="category_article_img" src="Images/<?php echo $result_NomFichierImageRecette[0]['NomFichier']; ?>" alt="img"> </img>
             <article class="row" id="category_article_text">
                <!--p class="col-lg-12" id="category_article_text_stars"> ***** </p-->
                <p class="col-lg-12" id="category_article_text_p"> 
                    <?php //récupération du résumé de la recette
                        $query_ResumeRecette = 'SELECT Resume FROM recette WHERE idRecette = '.$i.'';
                        $result_ResumeRecette = $pdo->query($query_ResumeRecette)->fetchAll();
                        //print_r($result_TitleRecette);
                        echo $result_ResumeRecette[0]['Resume'];
                    ?>
                </p>
             </article>
            </div> 
        </div>
    <?php } ?>
 </div>

<?php // récupération du flux de sortie mis en tampon depuis l'appel à ob_start dans une variable
    $content_article = ob_get_clean();  ?>
<?php  require 'Skeleton.php'; ?>