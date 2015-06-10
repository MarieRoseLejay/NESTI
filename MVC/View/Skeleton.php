<!DOCTYPE html>
<html>
    <head>
        <title>Alternative Cuisine</title>
        <meta charset="utf-8">
            <link href="../bootstrap-3.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="View/css/Css.css" rel="stylesheet">
    </head>

    <body>
        <div class="container-fluid" >
            <!-- Banner -->
            <header class="navbar navbar-fixed-top">
                <div class="row" id="header">
                    <!-- title and logo -->
                    <div class="col-lg-5  col-md-5 " id="header_title">
                        <div class="col-lg-11 col-lg-offset-1 col-md-11 col-mg-offset-1" id="header_title_brand"> Alternative Cuisine </div>
                        <img class="col-lg-11 col-lg-offset-1 col-md-11 col-mg-offset-1" id="header_title_logo" src="Images/LogoNesti.png" alt="Nesti">  </img>
                    </div>
                    
                    <!-- research -->
                    <!--div class="col-lg-5 col-md-5" id="research"> Recherche </div-->
                    <!-- cart -->
                    <!--div class="col-lg-1 col-md-1" id="cart"> Panier </div-->
                    <!-- login -->
                    <!--div class="col-lg-1 col-md-1" id="login"> Login </div-->
                </div>
                <nav class="row menu">
                    <?php require ('Menu.php'); ?>
                </nav>
            </header>

            <!-- Body -->
            <div class="row" id="content">
                <!-- Content -->
                <article class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1" id="content_article">
                    <?php echo $content_article; ?> <!-- Contenu spécifique -->
                </article>
            </div>

            <!-- Footer -->
            <footer>
                <div class="row" id="footer">
                    <div class="col-lg-12" id="footer_list"> 
                        <a href="" >  Mentions légales | </a>
                        <a href="" >  FAQ | </a>
                        <a href="" >  Contact | </a>
                        <a href="" >  Protection des données et cookies | </a>
                        <a href="" >  Conditions générales de vente </a>
                    </div>
                </div>
            </footer>
        </div>

        <!-- Script -->
        <script src="../bootstrap-3.3.0/dist/js/jquery-1.11.1.js"></script>
        <script src="../bootstrap-3.3.0/dist/js/bootstrap.min.js"></script>
        <!-- Identification d'un élément get dans l'url -->
        <script type="text/javascript">
            var currentUrl = window.location.search; //recherche la partie get dans l'url
            $('.highlight').each(function(){ //pour chaque élément de classe highlight
                var hrefPage = encodeURI($(this).attr('href'));
               if(currentUrl.indexOf(hrefPage)!== -1){ //est-ce que la partie get de l'url est contenu dans hrefPage
                    $(this).addClass('highlighted'); // on ajoute la classe highlighted
               }
               
            });
        </script> 
    </body>
</html>
