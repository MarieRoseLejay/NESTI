<form name="ustensil" action="Content_Admin_Ustensil.php" method="POST">
        <button class="btn" type="button" data-toggle="collapse" 
                data-target="#ustensil" aria-expanded="false" aria-controls="ustensil">
        Action sur un article de catégorie Ustensile </button>
        <div class="titre collapse" id="ustensil">
            <p class="col-lg-12 "> Choix de l'ustensile :  
                <input type="text" name="choice">
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