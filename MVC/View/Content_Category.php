<?php // déclenchement de la mise en tampon du flux HTML de sortie
    ob_start();  ?>

<div class="col-lg-12"> 
    <!-- title of the category -->
    <div class="col-lg-12 category-title"> Catégorie </div>
    
    <?php for($i = 0; $i < 6; $i++){ ?>
        <!--article -->
        <div class="col-lg-3 category_article"> 
            <div class="col-lg-12 category_article_title">  
                <?php echo $noms[$i]; ?>
            </div>
            <div class="clearfix"></div>
                <div class="category_article_img" style="background-image: url('Images/<?php echo $images[$i]; ?>')" >
                </div>
            <article class="row" >
                <p class="col-lg-12"> 
                    <?php echo $resumes[$i]; ?>
                </p>
            </article>
        </div>
    <?php } ?>
 </div>

<?php // récupération du flux de sortie mis en tampon depuis l'appel à ob_start dans une variable
    $content_article = ob_get_clean();  ?>
<?php  require 'Skeleton.php'; ?>