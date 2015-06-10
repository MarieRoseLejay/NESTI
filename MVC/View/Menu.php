<div class="row menu_line">
<!-- menu1 -->
<a class="col-lg-2 col-lg-offset-2 highlight" id="menu_home" href="?page=1"> Accueil  </a>
<a class="col-lg-2 highlight" href="?page=2"> Recettes </a>
<a class="col-lg-2 highlight" href="?page=3"> Ingrédients </a>
<a class="col-lg-2 highlight" href="?page=4"> Ustensiles </a>    
<a class="col-lg-2 highlight" id="menu_detail" href="?page=5"> Admin </a>
<!-- tag -->
<!--div class="col-lg-2" id="menu_tag"> Tags associés </div-->
</div>
<div class="row menu_line">
    <?php 
        if(isset($noms)){
          for ($i = 1; $i <=6; $i++){
            echo '<div class="col-lg-2 menu_sous-menu " >
                    <a class="highlight" href="?page='.$page.'&id='.$i.'&nom='.$noms[$i].'">'.$noms[$i].' </a>'
                . '</div>';
          }
        }
    ?>
</div>

