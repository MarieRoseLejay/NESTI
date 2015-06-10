<?php // déclenchement de la mise en tampon du flux HTML de sortie
    ob_start();  ?>

<p class="col-lg-12 "> 
    Partie administrateur : 
    <div class="row">
        <?php require 'View/Content_Admin_Recipe.php'; ?>
        <?php require 'View/Content_Admin_Ingredient.php'; ?>
        <?php require 'View/Content_Admin_Ustensil.php'; ?>
        <?php require 'View/Content_Admin_Tag.php'; ?>
        <?php require 'View/Content_Admin_Image.php'; ?>
        
    </div>
</p>

<?php
/*je veux : 
 - permettre l'ajout, la suppression, la modification* /
 */

/*$fichier = filter_input(INPUT_POST,"fichier",FILTER_SANITIZE_URL);
$legende = filter_input(INPUT_POST,"legende",FILTER_SANITIZE_URL);

$query = 'INSERT INTO image (NomFichier,Legende) VALUES ('.$fichier.','.$legende.')';*/

?>
<?php // récupération du flux de sortie mis en tampon depuis l'appel à ob_start dans une variable
    $content_article = ob_get_clean(); ?>
<?php  require 'Skeleton.php'; ?>
