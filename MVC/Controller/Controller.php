<?php
    require 'Model/Query.php';
    
    function content_Home($page){
        $recette = getIdImageShuffle('recette');
        $ingredient = getIdImageShuffle('ingredient');
        $ustensile = getIdImageShuffle('ustensile');
        
        require 'View/Content_Home.php';
    }
    
    function content_Category($nom,$table,$column,$page){
        $noms = array();
        $images = array();
        $resumes = array();
                
        $ids = getTableShuffle($table); 
        $_SESSION['ids'] = $ids; 
        for($j = 0; $j < 6; $j++){
            $id = $ids[$j]; 
            $noms[$j] = getNom($id,$nom,$table);
            $images[$j] = getImage($id,$table);
            if($column != ''){
                $resumes[$j] = getColumn($id,$table,$column);
            }
        }
        $_SESSION['noms'] = $noms;
        $_SESSION['images'] = $images;
        $_SESSION['resumes'] = $resumes;
        
        require 'View/Content_Category.php';
    }
    
    function content_Category_Recette(){
        session_name('recette');
        session_start();
        content_Category('Titre','recette','Resume','2');
        session_write_close(); 
    }
    function content_Category_Ingredient(){
        session_name('ingredient');
        session_start();
        content_Category('NomIngredient','ingredient','Marque','3');
        session_write_close();
    }
    function content_Category_Ustensile(){
        session_name('ustensile');
        session_start();
        content_Category('NomUstensile','ustensile','Marque','4');
        session_write_close();
    }
    
    function content_Article_Recette($i,$page){
        $recette = getRecette($i);
        
        $titres = $recette[0]['Titre'];
        $tempsPreparations = $recette[0]['Temps_Preparation']; 
        $tempsCuissons = $recette[0]['Temps_Cuisson'];
        $difficultes = getDifficulte($i);
        $budgets = getBudget($i);
        $prixHT = $recette[0]['PrixHT'];
        $images = getImage($i,'recette');
        $resumeRecettes = $recette[0]['Resume'];  
        $contenus = $recette[0]['Contenu'];
            
        //Récupération des ingrédients correspondants
        $ingredients = getIngredientsRecette($i);
        $tailleTableauIngredient = count($ingredients);
        for ($j = 0; $j < $tailleTableauIngredient; $j++){
            $ingredient[$j] = $ingredients[$j]['NomIngredient'];
        }
        
        //Récupération des ustensiles correspondants
        $ustensiles = getUstensilesRecette($i);
        $tailleTableauUstensile = count($ustensiles);
        for ($j = 0; $j < $tailleTableauUstensile; $j++){
            $ustensile[$j] = $ustensiles[$j]['NomUstensile'];
        }

        //informations à passer dans l'url
        session_name('recette');
        session_start();
        
        $noms = $_SESSION['noms'];
        $ids = $_SESSION['ids'];

        session_write_close();
        
        require 'View/Content_Article_Recipe.php';
    }
    
    function content_Article_Ingredient($i,$page){
        $ingredient = getIngredient($i);
        
        $nomsI = $ingredient[0]['NomIngredient'];
        $prixUnitaireHT = $ingredient[0]['PrixUnitaireHT'];
        $marques = $ingredient[0]['Marque'];
        $images = getImage($i,'ingredient');
        
        //Récupération des recettes correspondants
        $recettes = getRecettesIngredient($i);
        $tailleTableauRecettes = count($recettes);
        for ($j = 0; $j < $tailleTableauRecettes; $j++){
            $recette[$j] = $recettes[$j]['Titre'];
        }
        
        //informations à passer dans l'url
        session_name('ingredient');
        session_start();
        
        $noms = $_SESSION['noms'];
        $ids = $_SESSION['ids'];

        session_write_close();
            
        require 'View/Content_Article_Ingredient.php';
    }
    
    function content_Article_Ustensile($i,$page){
        $ustensile = getUstensile($i);
        
        $nomsU = $ustensile[0]['NomUstensile'];
        $prixUnitaireHT = $ustensile[0]['PrixUnitaireHT'];
        $marques = $ustensile[0]['Marque'];
        $images = getImage($i,'ustensile');
        
        //Récupération des recettes correspondants
        $recettes = getRecettesUstensile($i);
        $tailleTableauRecettes = count($recettes);
        for ($j = 0; $j < $tailleTableauRecettes; $j++){
            $recette[$j] = $recettes[$j]['Titre'];
        }
        
        //informations à passer dans l'url
        session_name('ustensile');
        session_start();
        
        $noms = $_SESSION['noms'];
        $ids = $_SESSION['ids'];

        session_write_close();
        
        require 'View/Content_Article_Ustensil.php';
    }
    
    function content_Admin($page){
        $images = getImages();
        $tailletableauImg = count($images);
        
        $recettes = getTableRecette();
        $tailletableauR = count($recettes);
        
        $ingredients = getTableIngredient();
        $tailletableauI = count($ingredients);
        
        $ustensiles = getTableUstensile();
        $tailletableauU = count($ustensiles);

        $tags = getTableTag();
        $tailletableauT = count($tags);

        //initialisation des variables de recettes
        $image = "";
        $title = "";
        $prixHT = "";
        $resume = "";
        $contenu = "";
        $tempsP = "";
        $tempsC = "";
        $note = "";
        $difficulte = "";
        $budget = "";
        $idRecette = 0;
        
        //initialisation des variables d'ingrédient
        $imageI = "";
        $nameI = "";
        $unitpriceI = "";
        $brandI = "";
        $idIngredient = 0;
        
        //initialisation des variables d'ustensile
        $imageU = "";
        $nameU = "";
        $unitpriceU = "";
        $brandU = "";
        $idUstensile = 0;
        
        //initialisation des variables tag
        $valeur = "";
        $idTag = 0;
        
        //initialisation des variables tag
        $nameImg = "";
        $legend = "";
        $idImage = 0;
        
        //echo "content_Admin\n";
        echo $_SERVER["REQUEST_METHOD"];
        //echo "\n";
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            echo "POST";
            //Gestion des recettes
            if(isset($_POST['idRecette'])){
                //initialisation des variables
                $image = $_POST["image"];
                $title = $_POST["title"];
                $prixHT = $_POST["price"];
                $resume = $_POST["summary"];
                $contenu = $_POST["content"];
                $tempsP = $_POST["makingtime"];
                $tempsC = $_POST["cookingtime"];
                $note = $_POST["rating"];
                $difficulte = $_POST["difficulty"];
                $budget = $_POST["budget"];
                $idRecette = $_POST["idRecette"];

                if ($_POST['sauvegarder']){
                    if($idRecette == 0){
                        //ajout de données
                        createRecipe($title, $prixHT, $resume, $contenu, $image, $tempsP, $tempsC, $note, $difficulte, $budget);
                    }
                    else{
                        //sauvegarde des données modifiées
                        saveRecipe($title, $prixHT, $resume, $contenu, $image, $tempsP, $tempsC, $note, $difficulte, $budget, $idRecette);
                    }
                }
                elseif ($_POST['supprimer']) {
                    //suppression de la recette
                    deleteRecipe($idRecette);
                }
            }
            
            //Gestion des ingrédients
            if(isset($_POST['idIngredient'])){
                //echo "Ingredient";
                 
                //initialisation des variables
                $imageI = $_POST["imageI"];
                $nameI = $_POST["name"];
                $unitpriceI = $_POST["unitprice"];
                $brandI = $_POST["brand"];
                $idIngredient = $_POST["idIngredient"];
                
                if ($_POST['sauvegarder']){
                    //echo "sauvegarder " . $idIngredient;
                    if($idIngredient == 0){
                        //ajout de données}
                        //echo "createIngredient";
                        createIngredient($nameI,$unitpriceI,$brandI,$imageI);
                    }else{
                        //sauvegarde des données modifiées
                        saveIngredient($idIngredient,$nameI,$unitpriceI,$brandI,$imageI);
                    }
                }
                elseif ($_POST['supprimer']) {
                    //suppression de l'ingredient
                    deleteIngredient($idIngredient);
                }
            }
            //Gestion des ustensiles
            if(isset($_POST['idUstensile'])){
                //initialisation des variables
                $imageU = $_POST["imageU"];
                $nameU = $_POST["nameU"];
                $unitpriceU = $_POST["unitpriceU"];
                $brandU = $_POST["brandU"];
                $idUstensile = $_POST["idUstensile"];
                
                if ($_POST['sauvegarder']){
                    if($idUstensile == 0){
                        //ajout de données}
                        createUstensile($nameU,$unitpriceU,$brandU,$imageU);
                    }else{
                        //sauvegarde des données modifiées
                        saveUstensile($idUstensile,$nameU,$unitpriceU,$brandU,$imageU);
                    }
                }
                elseif ($_POST['supprimer']) {
                    //suppression de l'ustensile
                    deleteUstensile($idUstensile);
                }
            }
            //Gestion des tags
            if(isset($_POST['idTag'])){
                //initialisation des variables
                $valeur = $_POST["valeur"];
                $idTag = $_POST["idTag"];
                
                if ($_POST['sauvegarder']){
                    if($idTag == 0){
                        //ajout de données}
                        createTag($valeur);
                    }else{
                        //sauvegarde des données modifiées
                        saveTag($idTag,$valeur);
                    }
                }
                elseif ($_POST['supprimer']) {
                    //suppression des tags
                    deleteTag($idTag);
                }
            }
            //Gestion des images
            if(isset($_POST['idImage'])){
                echo 'POST image';
                //initialisation des variables
                $nameImg = $_POST["nameImg"];
                $legend = $_POST["legend"];
                $idImage = $_POST["idImage"];
            }
                
            if ($_POST['sauvegarder']){
                if($idImage == 0){
                    //ajout de données}
                    createImage($nameImg,$legend);
                }else{
                    echo 'save image';
                    //sauvegarde des données modifiées
                    saveImage($idImage,$nameImg,$legend);
                }
            }
            elseif ($_POST['supprimer']) {
                //suppression des images
                deleteImage($idImage);
            }
        }
        else{
        //Gestion des recettes
            echo "GET";
            //Si une recette est sélectionnée
            if(isset($_GET['recette'])){
                //Pour la ligne de la table recette on appelle les colonnes désirées
                $recette = getRecette($_GET['recette'])[0];
                $image = $recette['Image_idImage'];
                $title = $recette['Titre'];
                $prixHT = $recette['PrixHT'];
                $resume = $recette['Resume'];
                $contenu = $recette['Contenu'];
                $tempsP = $recette['Temps_Preparation'];
                $tempsC = $recette['Temps_Cuisson'];
                $note = $recette['Note'];
                $difficulte = $recette['Difficulte'];
                $budget = $recette['Budget'];
                $idRecette = $_GET['recette'];
            }
        //Gestion des ingrédients
            //Si une recette est sélectionnée
            if(isset($_GET['ingredient'])){
                //Pour la ligne de la table ingredient on appelle les colonnes désirées
                $ingredient = getIngredient($_GET['ingredient'])[0];
                $imageI = $ingredient['Image_idImage'];
                $nameI = $ingredient['NomIngredient'];
                $unitpriceI = $ingredient['PrixUnitaireHT'];
                $brandI = $ingredient['Marque'];
                $idIngredient = $_GET['ingredient'];
            }
        //Gestion des ustensiles
            //Si un ustensile est sélectionné
            if(isset($_GET['ustensile'])){
                //Pour la ligne de la table ustensile on appelle les colonnes désirées
                $ustensile = getUstensile($_GET['ustensile'])[0];
                $imageU = $ustensile['Image_idImage'];
                $nameU = $ustensile['NomUstensile'];
                $unitpriceU = $ustensile['PrixUnitaireHT'];
                $brandU = $ustensile['Marque'];
                $idUstensile = $_GET['ustensile'];
            }
        //Gestion des tags
            //Si un tag est sélectionné
            if(isset($_GET['tag'])){
                //Pour la ligne de la table tag on appelle les colonnes désirées
                $tag = getTag($_GET['tag'])[0];
                $valeur = $tag['Valeur'];
                $idTag = $_GET['tag'];
            }
        //Gestion des images
            //Si une image est sélectionnée
            if(isset($_GET['image'])){
                //Pour la ligne de la table image on appelle les colonnes désirées
                $image = getImageId($_GET['image'])[0];
                $nameImg = $image['NomFichier'];
                $legend = $image['Legende'];
                $idImage = $_GET['image'];
            }
            
            
        //Tests unitaires
            $message = "";
            if(isset($_GET['UT'])){
                $valeur = "légumes";
                createTag($valeur);
                $result = getTableTag();
                $nbTag = count($result);
                $found = false;
                for($i = 0; $i < $nbTag; $i++){
                    if($result[$i]["Valeur"] == $valeur)
                    {
                        $found = true;
                        break;
                    }
                }
                if($found)
                    $message = "TU OK";
                else
                    $message = "TU NOK";
            }
        }
        
        require 'View/Content_Admin.php';
        
    }
?>

