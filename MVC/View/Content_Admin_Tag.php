<form name="tag" action="" method="POST">
    <?php //Si un tag est sélectionné on ne masque pas le contenu du formulaire
        // au rechargement de la page
        if(isset($_GET['tag'])){
            echo'<button class="btn" type="button" data-toggle="collapse" 
                    data-target="#tag" aria-expanded="true" aria-controls="tag">
                    Action sur un article de catégorie tag </button>
                <div class="titre collapse in" id="tag">';
        } //Sinon le contenu du formulaire est masqué
        else{
        echo'<button class="btn" type="button" data-toggle="collapse" 
                data-target="#tag" aria-expanded="false" aria-controls="tag">
                Action sur un article de catégorie tag </button>
            <div class="titre collapse" id="tag">';
        }
    ?> 
            <p class="col-lg-12 "> Choix du tag :  
                <select name="choiceT" onchange="afficherTag(this.value)">
                    <?php //Si l'id est le même que celui dans l'url on ajoute l'attribut selected à <option> 
                        for($i = -1; $i < $tailletableauT; $i++){
                            if($i == -1){
                                echo '<option value=""> </option>';
                            }
                            else{
                                if($tags[$i]['idTag'] == $idTag){
                                    echo '<option value="'.$tags[$i]['idTag'].'" selected>'.$tags[$i]['Valeur'].'</option>';
                                }
                                else{
                                    echo '<option value="'.$tags[$i]['idTag'].'">'.$tags[$i]['Valeur'].'</option>';
                                }
                            }
                        } 
                    ?>
                </select>
            </p>
            <p class="col-lg-12 "> Valeur du Tag : 
                <input type="text" name="valeur" value="<?php echo $valeur ?>">
            </p>
            <input type="hidden" name="idTag" value="<?php echo $idTag ?>">
            <input type="submit" name="sauvegarder" value="sauvegarder">
            <input type="submit" name="supprimer" value="supprimer le tag">        
        </div>
</form>
<script type="text/javascript" language="javascript">
    function afficherTag(idTag){
        //on recharge la page en rafraichissant l'url à laquelle on ajoute l'id du Tag sélectionné 
        if(idTag === ''){
            document.location = "?page=5";
        }
        else{
            document.location = "?page=5&tag=" + idTag;
        }
    }
</script>