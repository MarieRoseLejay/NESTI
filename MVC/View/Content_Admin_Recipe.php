<form name="recipe" action="" method="POST">
    <?php //Si une recette est sélectionnée on ne masque pas le contenu du formulaire
        // au rechargemetn de la page
        if(isset($_GET['recette'])){
            echo'<button class="btn" type="button" data-toggle="collapse" 
                    data-target="#recipe" aria-expanded="true" aria-controls="recipe">
                    Action sur un article de catégorie Recette </button>
                <div class="titre collapse in" id="recipe">';
        } //Sinon le contenu du formulaire est masqué
        else{
        echo'<button class="btn" type="button" data-toggle="collapse" 
                data-target="#recipe" aria-expanded="false" aria-controls="recipe">
                Action sur un article de catégorie Recette </button>
            <div class="titre collapse" id="recipe">';
        }
    ?>    
        <p class="col-lg-12 "> Choix de la recette :  
            <select name="choice" onchange="afficher(this.value)">
                <?php //Si l'id est le même que celui dans l'url on ajoute l'attribut selected à <option> 
                    for($i = -1; $i < $tailletableau; $i++){
                        if($recettes[$i]['idRecette'] == $_GET['recette']){
                            echo '<option value="'.$recettes[$i]['idRecette'].'" selected>'.$recettes[$i]['Titre'].'</option>';
                        }
                        else{
                            if($i == -1){
                                echo '<option value=""> </option>';
                            }else{
                                echo '<option value="'.$recettes[$i]['idRecette'].'">'.$recettes[$i]['Titre'].'</option>';
                            }
                        }
                    } 
                ?>
            </select>
        </p>
        <p class="col-lg-12 "> Image correspondante : 
            <select name="image">
                <?php //Si l'id est le même que celui dans l'url on ajoute l'attribut selected à <option> 
                    for($i = -1; $i < $tailletableauI; $i++){
                        if($i == -1){
                            echo '<option value=""> </option>';
                        }
                        else{
                            if($images[$i]['idImage'] == $image){
                                echo '<option value="'.$images[$i]['idImage'].'" selected>'.$images[$i]['NomFichier'].'</option>';
                            }
                            else {
                                echo '<option value="'.$images[$i]['idImage'].'">'.$images[$i]['NomFichier'].'</option>';
                            }
                        }
                    } 
                ?>
            </select>
        </p>
        <p class="col-lg-12 "> Titre de la recette : 
            <input type="text" name="title" value="<?php echo $title ?>">
        <p class="col-lg-12 "> Prix HT : 
            <input type="text" name="price" value="<?php echo $prixHT ?>">
        </p>
        <p class="col-lg-12 "> Résumé :  
            <input type="text" name="summary" value="<?php echo $resume ?>">
        </p>
        <p class="col-lg-12 "> Contenu de la recette :  
            <input type="text" name="content" value="<?php echo $contenu ?>">
        </p>
        <p class="col-lg-12 "> Temps de préparation :  
            <input type="text" name="makingtime" value="<?php echo $tempsP ?>">
        </p>
        <p class="col-lg-12 "> Temps de cuisson :  
            <input type="text" name="cookingtime" value="<?php echo $tempsC ?>">
        </p>
        <p class="col-lg-12 "> Note :  
            <input type="text" name="rating" value="<?php echo $note ?>">
        </p>
        <p class="col-lg-12 "> Difficulté :  
            <input type="text" name="difficulty" value="<?php echo $difficulte ?>">
        </p>
        <p class="col-lg-12 "> Budget :  
            <input type="text" name="budget" value="<?php echo $budget ?>"><input type="hidden" name="id" value="<?php echo $id ?>">
        </p>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="submit" name="sauvegarder" value="sauvegarder">
        <input type="submit" name="supprimer" value="supprimer la recette">        
    </div>
</form>
<script type="text/javascript" language="javascript">
    function afficher(idRecette){
        //on recharge la page en rafraichissant l'url à laquelle on ajoute l'id de la recette sélectionnée 
        if(idRecette === ''){
            document.location = "?page=5";
        }
        else{
            document.location = "?page=5&recette=" + idRecette;
        }
    }
</script>
<?php
/*je veux : 
 - permettre l'ajout, la suppression, la modification* /
 */

/*$fichier = filter_input(INPUT_POST,"fichier",FILTER_SANITIZE_URL);
$legende = filter_input(INPUT_POST,"legende",FILTER_SANITIZE_URL);

$query = 'INSERT INTO image (NomFichier,Legende) VALUES ('.$fichier.','.$legende.')';*/

?>
