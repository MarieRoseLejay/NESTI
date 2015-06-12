<form name="ingredient" action="" method="POST">
    <?php //Si un Ingredient est sélectionné on ne masque pas le contenu du formulaire
        // au rechargement de la page
        if(isset($_GET['ingredient'])){
            echo'<button class="btn" type="button" data-toggle="collapse" 
                    data-target="#ingredient" aria-expanded="true" aria-controls="ingredient">
                    Action sur un article de catégorie Ingrédient </button>
                <div class="titre collapse in" id="ingredient">';
        } //Sinon le contenu du formulaire est masqué
        else{
        echo'<button class="btn" type="button" data-toggle="collapse" 
                data-target="#ingredient" aria-expanded="false" aria-controls="ingredient">
                Action sur un article de catégorie Ingrédient </button>
            <div class="titre collapse" id="ingredient">';
        }
    ?> 
    <p class="col-lg-12 "> Choix de l'ingrédient :  
            <select name="choiceI" onchange="afficherIngredient(this.value)">
                <?php //Si l'id est le même que celui dans l'url on ajoute l'attribut selected à <option> 
                    for($i = -1; $i < $tailletableauI; $i++){
                        if($i == -1){
                            echo '<option value=""> </option>';
                        }
                        else{
                            if($ingredients[$i]['idIngredient'] == $idIngredient){
                                echo '<option value="'.$ingredients[$i]['idIngredient'].'" selected>'.$ingredients[$i]['NomIngredient'].'</option>';
                            }
                            else{
                                echo '<option value="'.$ingredients[$i]['idIngredient'].'">'.$ingredients[$i]['NomIngredient'].'</option>';
                            }
                        }
                    } 
                ?>
            </select>
        </p>
        <p class="col-lg-12 "> Image correspondante : 
            <select name="imageI">
                <?php //Si l'id est le même que celui dans l'url on ajoute l'attribut selected à <option> 
                    for($i = -1; $i < $tailletableauImg; $i++){
                        if($i == -1){
                            echo '<option value=""> </option>';
                        }
                        else{
                            if($images[$i]['idImage'] == $imageI){
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
        <p class="col-lg-12 "> Nom de l'ingrédient : 
            <input type="text" name="name"  value="<?php echo $nameI ?>">
        </p>
        <p class="col-lg-12 "> Prix unitaire HT : 
            <input type="text" name="unitprice" value="<?php echo $unitpriceI ?>">
        </p>
        <p class="col-lg-12 "> Marque :  
            <input type="text" name="brand" value="<?php echo $brandI ?>">
        </p>
        <input type="hidden" name="idIngredient" value="<?php echo $idIngredient ?>">
        <input type="submit" name="sauvegarder" value="sauvegarder">
        <input type="submit" name="supprimer" value="supprimer l'ingrédient">        
    </div><!-- ouvert avec button ne pas supprimer !-->
</form>
<script type="text/javascript" language="javascript">
    function afficherIngredient(idIngredient){
        //on recharge la page en rafraichissant l'url à laquelle on ajoute l'id de l'ingrédient sélectionné 
        if(idIngredient === ''){
            document.location = "?page=5";
        }
        else{
            document.location = "?page=5&ingredient=" + idIngredient;
        }
    }
</script>
