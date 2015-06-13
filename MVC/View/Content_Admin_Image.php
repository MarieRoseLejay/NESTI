<form name="image" action="" method="POST">
    <?php //Si une image est sélectionnée on ne masque pas le contenu du formulaire
        // au rechargement de la page
        if(isset($_GET['image'])){
            echo'<button class="btn" type="button" data-toggle="collapse" 
                    data-target="#image" aria-expanded="true" aria-controls="image">
                    Action sur un article de catégorie image </button>
                <div class="titre collapse in" id="image">';
        } //Sinon le contenu du formulaire est masqué
        else{
        echo'<button class="btn" type="button" data-toggle="collapse" 
                data-target="#image" aria-expanded="false" aria-controls="image">
                Action sur un article de catégorie image </button>
            <div class="titre collapse" id="image">';
        }
    ?> 
        <p class="col-lg-12 "> Choix de l'image
            <select name="choiceT" onchange="afficherImage(this.value)">
                <?php //Si l'id est le même que celui dans l'url on ajoute l'attribut selected à <option> 
                    for($i = -1; $i < $tailletableauImg; $i++){
                        if($i == -1){
                            echo '<option value=""> </option>';
                        }
                        else{
                            if($images[$i]['idImage'] == $idImage){
                                echo '<option value="'.$images[$i]['idImage'].'" selected>'.$images[$i]['NomFichier'].'</option>';
                            }
                            else{
                                echo '<option value="'.$images[$i]['idImage'].'">'.$images[$i]['NomFichier'].'</option>';
                            }
                        }
                    } 
                ?>
            </select>
        </p> 
        <p class="col-lg-12 "> Nom du fichier : 
            <input type="text" name="nameImg" value="<?php echo $nameImg ?>">
        </p>
        <p class="col-lg-12 "> Légende : 
            <input type="text" name="legend" value="<?php echo $legend ?>">
        </p>
        <input type="hidden" name="idImage" value="<?php echo $idImage ?>">
        <input type="submit" name="sauvegarder" value="sauvegarder">
        <input type="submit" name="supprimer" value="supprimer l'image">        
    </<div>
</form>
<script type="text/javascript" language="javascript">
    function afficherImage(idImage){
        //on recharge la page en rafraichissant l'url à laquelle on ajoute l'id de l'ustensile sélectionnée 
        if(idImage === ''){
            document.location = "?page=5";
        }
        else{
            document.location = "?page=5&image=" + idImage;
        }
    }
</script>

<!--?php
    /*if (filter_has_var(INPUT_POST, "action")){
        $fichier = filter_input(INPUT_POST,"fichier",FILTER_SANITIZE_URL);
        $legende = filter_input(INPUT_POST,"legende",FILTER_SANITIZE_URL);
        $action = $_POST["action"];
        if($action == "ajouter"){
            $query = 'INSERT INTO image (NomFichier,Legende) VALUES ("'.$fichier.'","'.$legende.'")';
            $pdo->exec($query);
        }
        elseif($action == "modifier"){
            $query = 'UPDATE image (NomFichier,Legende) VALUES ('.$fichier.','.$legende.')';
        }
        elseif($action == "supprimer"){
            $query = 'DELETE FROM image WHERE idImage = $id';
        }
    }*/
?-->