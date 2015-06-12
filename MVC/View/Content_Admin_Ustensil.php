<form name="ustensil" action="" method="POST">
    <?php //Si un ustensile est sélectionné on ne masque pas le contenu du formulaire
        // au rechargement de la page
        if(isset($_GET['ustensile'])){
            echo'<button class="btn" type="button" data-toggle="collapse" 
                    data-target="#ustensile" aria-expanded="true" aria-controls="ustensile">
                    Action sur un article de catégorie ustensile </button>
                <div class="titre collapse in" id="ustensile">';
        } //Sinon le contenu du formulaire est masqué
        else{
        echo'<button class="btn" type="button" data-toggle="collapse" 
                data-target="#ustensile" aria-expanded="false" aria-controls="ustensile">
                Action sur un article de catégorie ustensile </button>
            <div class="titre collapse" id="ustensile">';
        }
    ?> 
        <p class="col-lg-12 "> Choix de l'ustensile :  
            <select name="choiceU" onchange="afficherUstensile(this.value)">
                <?php //Si l'id est le même que celui dans l'url on ajoute l'attribut selected à <option> 
                    for($i = -1; $i < $tailletableauU; $i++){
                        if($i == -1){
                            echo '<option value=""> </option>';
                        }
                        else{
                            if($ustensiles[$i]['idUstensile'] == $idUstensile){
                                echo '<option value="'.$ustensiles[$i]['idUstensile'].'" selected>'.$ustensiles[$i]['NomUstensile'].'</option>';
                            }
                            else{
                                echo '<option value="'.$ustensiles[$i]['idUstensile'].'">'.$ustensiles[$i]['NomUstensile'].'</option>';
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
        <p class="col-lg-12 "> Image correspondante :  
            <input type="text" name="image">
        </p>
        <p class="col-lg-12 "> Nom de l'ingrédient : 
            <input type="text" name="name">
        <p class="col-lg-12 "> Prix unitaire HT : 
            <input type="text" name="unitprice">
        </p>
        <p class="col-lg-12 "> Marque :  
            <input type="text" name="brand">
        </p>
        <input type="submit" name="sauvegarder" value="sauvegarder">
        <input type="submit" name="supprimer" value="supprimer l'ustensile">        
    </div>

</form>