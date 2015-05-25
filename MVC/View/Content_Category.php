<?php // déclenchement de la mise en tampon du flux HTML de sortie
    ob_start();  ?>

<div class="col-lg-12" id="category"> 
    <!-- title of the category -->
    <div class="col-lg-12" id="category-title"> Catégorie </div>
    
    <?php for($i = 1; $i <= 6; $i++){ ?>
        <!--article -->
        <div class="col-lg-3" id="category_article"> 
            <div class="col-lg-12" id="category_article_title">  
                <?php echo $noms[$i]; ?>
            </div>
            
            <div class="row">
             <img class="col-lg-10" id="category_article_img" src="Images/<?php echo $images[$i]; ?>" 
                  alt="img"> </img>
             <article class="row" id="category_article_text">
                <!--p class="col-lg-12" id="category_article_text_stars"> ***** </p-->
                <p class="col-lg-12" id="category_article_text_p"> 
                    <?php echo $resumes[$i]; ?>
                </p>
             </article>
            </div> 
        </div>
    <?php } ?>
 </div>

<?php // récupération du flux de sortie mis en tampon depuis l'appel à ob_start dans une variable
    $content_article = ob_get_clean();  ?>
<?php  require 'Skeleton.php'; ?>