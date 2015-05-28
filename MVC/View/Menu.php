<div class="row menu_line">
<!-- menu1 -->
<a class="col-lg-1 col-lg-offset-1" id="menu_home" href="?page=1"> Accueil  </a>
<a class="col-lg-2 highlight" href="?page=2"> Recettes </a>
<a class="col-lg-2 highlight" href="?page=3"> Ingrédients </a>
<a class="col-lg-2 highlight" href="?page=4"> Ustensiles </a>    
<a class="col-lg-2" id="menu_detail" href="?page=5"> Détail de la recette </a>
<!-- tag -->
<div class="col-lg-2" id="menu_tag"> Tags associés </div>
</div>
<div class="row menu_line">
    <?php 
        if(isset($noms)){
          for ($i = 1; $i <=6; $i++){
            echo '<div class="col-lg-2 menu_sous-menu" >
                    <a href="?page='.$page.'&table='.$table.'&id='.$i.'&nom='.$noms[$i].'">'.$noms[$i].' </a>'
                . '</div>';
          }
        }
    ?>
    
    <!--div class="col-lg-2 menu_sous-menu" >
        <a href="?page=2&table=recette&id=<?php //$i; ?>&nom=Titre"><?php //$nom; ?> </a>
    </div>
    <div class="col-lg-2 menu_sous-menu" >
        <a href="?page=3&table=ingredient&id=<?php //$i; ?>&nom=NomIngredient"><?php //$nom; ?> </a>
    </div>
    <div class="col-lg-2 menu_sous-menu" >
        <a href="?page=4&table=ustensile&id=<?php //echo $i; ?>&nom=NomUstensile"><?php //echo $nom; ?> </a>
    </div-->
    
    
<!--?php if (isset($_GET['page'])){
    switch($_GET['page']){
        case "2":
            for ($i = 1; $i <=6; $i++){
            $nom = getNom($i,'Titre','recette');
            echo '<div class="col-lg-2 menu_sous-menu" >
                    <a href="?page=2&table=recette&id='.$i.'&nom=Titre">'.$nom.' </a>'
                . '</div>';
            }
            break;
        case "3":
            for ($i = 1; $i <=6; $i++){
            $nom = getNom($i,'NomIngredient','ingredient');
            echo '<div class="col-lg-2 menu_sous-menu" >
                    <a href="?page=3&table=ingredient&id='.$i.'&nom=NomIngredient">'.$nom.' </a>'
                . '</div>';
            }
            break;
        case "4":
            for ($i = 1; $i <=6; $i++){
            $nom = getNom($i,'NomUstensile','ustensile');
            echo '<div class="col-lg-2 menu_sous-menu" >
                    <a href="?page=4&table=ustensile&id='.$i.'&nom=NomUstensile">'.$nom.' </a>'
                . '</div>';
            }
            break;
        default :
            break;
    }
} ?-->
</div>

