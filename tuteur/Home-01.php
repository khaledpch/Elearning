<?php
include("../admin/conx.php");


session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['pseudo'])) 
{
  header('Location: ../index.php');
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Isims E-learning </title>
    <!--[if IE 8]>
    <link href="style_ie8.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="fonts/awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href='css/owl.carousel.css' rel='stylesheet' type='text/css'>
    <link href='css/owl.theme.css' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>
    <link href="style.css" rel="stylesheet" />
</head>
<body>
<div class="loading-page">
    <img src="demos/image-preload/image.gif" alt="Images-loading">
</div>
<div class="tz-content-search">
        <form action="recherche.php" method="post" >
		<label for="search">Rechercher un article</label>
		
            <i class="fa fa-times tz-form-close"></i>
            <input type="text" class="tz-search-input" id="search" name="search" placeholder="entrer le nom du cours">
			
        </form><!-- End form search -->
</div><!-- End section search form -->

<!-- Begin class tz-header -->
<header class="tz-header tz-header-4">
    <div class="container">
        <div class="tz-header-content-4">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                    <div class="tz-menu tz-menu-left">
                        <button class="tz-button-toggle tz-canvas-customer pull-leff" type="button">
                            <i class="fa fa-bars"></i>
                        </button>
                        <button data-target=".nav-collapse" class="tz-button-toggle tz-canvas-main btn-navbar pull-left" type="button">
                            <i class="fa fa-bars"></i>
                        </button>
                        <ul class="menu-right nav-collapse">
                            <li>
                                <a href="Home-01.php">ACCUEIL</a>
                                
                            </li>

                            <li>
                                <a href="#">COURS</a>
                                <ul class="sub-menu sub-menu-style-1">
                                    <li>
                                        <a href="Courses-Grid.php">Consulter cours</a>
                                    </li>
                                  
                                    
                                    <li>
                                        <a href="Courses-Register.php">Ajouter cours</a>
                                    </li>
                                    
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <div class="tz-image-logo-style-4">
                        <a href="#"><img src="demos/logo-header4.png" alt="Images-Logo-4"></a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                    <div class="tz-menu tz-menu-right">
                        <ul class="menu-left nav-collapse">
						<li>
                                 <a href="#">FORUM</a>
                                <ul class="sub-menu sub-menu-style-1">
                                    <li>
                                        <a href="forum.php">Consulter forum</a>
                                    </li>
                                    <li>
                                        <a href="ajout_sujet.php ">Ajouter un sujet</a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li>
                                <a href="#"><?php echo strtoupper( $_SESSION['pseudo'] ) ?></a>
                                <ul class="sub-menu sub-menu-style-1">
                                   
                                    <li>
                                        <a href="profile_tut.php"> Profile </a>
                                    </li>
                                    <li>
                                        <a href="list_message.php">Message</a>
                                    </li>
                                    <li>
                                        <a href="logout.php">se déconnecter</a>
                                    </li>
                                    
                                </ul>
                            </li>
                         
                            
                        </ul>
                        <button class="tz-button-toggle tz-canvas-customer-right pull-right" type="button">
                            <i class="fa fa-bars"></i>
                        </button>
                        <button class="tz-search pull-right"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Content Main Header -->
</header>
<!-- End class tz-header -->

<section class="tz-banner">
    <!-- Begin class banner style-3 -->
    <div class="tz-banner-style4">
        <div class="tz-slider-banner">
            <div class="tz-items">
                <div class="tz-slider-images">
                    <img src="demos/Banner/banner-02.jpg" alt="Images">
                </div>
                <div class="tz-banner-content">
                    <div class="container">
                        <h4>  Isims E-learning</H4>
                        <small> </small>
                        <span class="tz-under-line"></span>
                        <h6>Bienvenu</h6>
                        <a class="tz-item-more-details" href="#">
                            <span><i class="fa fa-arrows-alt"></i>MORE DETAILS</span>
                        </a>
                    </div>
                </div>
                <button class="tz-button-left">
                    <i class="fa fa-angle-left"></i>
                </button>
                <button class="tz-button-right">
                    <i class="fa fa-angle-right"></i>
                </button>
            </div>
            <div class="tz-items">
                <div class="tz-slider-images">
                    <img src="demos/Banner/banner-01.jpg" alt="Images">
                </div>
                <div class="tz-banner-content">
                    <div class="container">
                        <h4>  Isims E-learning</H4>
                        <small> </small>
                        <span class="tz-under-line"></span>
                        <h6>Bienvenu</h6>
                        <a class="tz-item-more-details" href="#">
                            <span><i class="fa fa-arrows-alt"></i>MORE DETAILS</span>
                        </a>
                    </div>
                </div>
                <button class="tz-button-left">
                    <i class="fa fa-angle-left"></i>
                </button>
                <button class="tz-button-right">
                    <i class="fa fa-angle-right"></i>
                </button>
            </div>
            <div class="tz-items">
                <div class="tz-slider-images">
                    <img src="demos/Banner/banner-06.jpg" alt="Images">
                </div>
                <div class="tz-banner-content">
                    <div class="container">
                        <h4>  Isims E-learning</H4>
                        <small> </small>
                        <span class="tz-under-line"></span>
                        <h6>Bienvenu</h6>
                        
                    </div>
                </div>
                <button class="tz-button-left">
                    <i class="fa fa-angle-left"></i>
                </button>
                <button class="tz-button-right">
                    <i class="fa fa-angle-right"></i>
                </button>
            </div>
            <div class="tz-items">
                <div class="tz-slider-images">
                    <img src="demos/Banner/banner-03.jpg" alt="Images">
                </div>
                <div class="tz-banner-content">
                    <div class="container">
                         <h4>  Isims E-learning</H4>
                        <small> </small>
                        <span class="tz-under-line"></span>
                        <h6>Bienvenu</h6>
                        <a class="tz-item-more-details" href="#">
                            <span><i class="fa fa-arrows-alt"></i>MORE DETAILS</span>
                        </a>
                    </div>
                </div>
                <button class="tz-button-left">
                    <i class="fa fa-angle-left"></i>
                </button>
                <button class="tz-button-right">
                    <i class="fa fa-angle-right"></i>
                </button>
            </div>
            <div class="tz-items">
                <div class="tz-slider-images">
                    <img src="demos/Banner/banner-04.jpg" alt="Images">
                </div>
                <div class="tz-banner-content">
                    <div class="container">
                         <h4>  Isims E-learning</H4>
                        <small> </small>
                        <span class="tz-under-line"></span>
                        <h6>Bienvenu</h6>
                        <a class="tz-item-more-details" href="#">
                            <span><i class="fa fa-arrows-alt"></i>MORE DETAILS</span>
                        </a>
                    </div>
                </div>
                <button class="tz-button-left">
                    <i class="fa fa-angle-left"></i>
                </button>
                <button class="tz-button-right">
                    <i class="fa fa-angle-right"></i>
                </button>
            </div>
            <div class="tz-items">
                <div class="tz-slider-images">
                    <img src="demos/Banner/banner-05.jpg" alt="Images">
                </div>
                <div class="tz-banner-content">
                    <div class="container">
                        <small>NUMBER ONE</small>
                        <h4>ENGLAND UNIVERSITY</h4>
                        <span class="tz-under-line"></span>
                        <h6>We Are The Best Worldwide University</h6>
                        <a class="tz-item-more-details" href="#">
                            <span><i class="fa fa-arrows-alt"></i>MORE DETAILS</span>
                        </a>
                    </div>
                </div>
                <button class="tz-button-left">
                    <i class="fa fa-angle-left"></i>
                </button>
                <button class="tz-button-right">
                    <i class="fa fa-angle-right"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- End  class banner style-3 -->
</section>

<!-- Start class tz-offcavans-menu-left -->
<aside class="tz-offcavans-menu-customer">
    <button class="tz-offcanvas-close"><img src="demos/offcanvas/close-ofcanvas.png" alt="Images"></button>
    <div class="tzscrollable">
        <nav class="tz-menu-ofcanvas-right">
            <ul>
                <li>
                    <a href="profile_tut.php">
                        <img src="demos/check.png" alt="Images">
                        <i class="fa fa-arrows-alt"></i>
                        <strong><?php echo  $_SESSION['pseudo']  ?></strong>
                    </a>
                </li>
                <li>
                    <a href="list_message.php">
                        <img src="demos/check.png" alt="Images">
                        <i class="fa fa-arrows-alt"></i>
                        <strong>Message</strong>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="demos/check.png" alt="Images">
                        <i class="fa fa-arrows-alt"></i>
                        <strong> </strong>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="demos/check.png" alt="Images">
                        <i class="fa fa-arrows-alt"></i>
                        <strong> </strong>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="demos/check.png" alt="Images">
                        <i class="fa fa-arrows-alt"></i>
                        <strong></strong>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- End class tz-offcavans-menu -->


<section class="tz-introduce-style-4">
    <div class="container">
        <div class="tz-contact-content">
            <form action="#" method="post" class="tz-contact-form tz-contact-form4" name="frm_contact">
                <ul class="tz-contact-wapper tz-contact-wapper-style-4">
                    <li>
                        <span class="theme-color-white">Voulez plus d'informations ?<br>Envoyez nous un mail !</span>
                    </li>
                    <li>
                        <input class="tz-contact-input-name" type="text" name="txtname" placeholder="Votre nom">
                    </li>
                    <li>
                        <input class="tz-contact-input-email" type="text" name="txtemail" placeholder="Votre mail">
                    </li>
                    <li>
                        <textarea class="tz-contact-message" name="textarea-message" placeholder="Votre Message"></textarea>
                    </li>
                    <li>
                        <button type="submit"><i class="fa fa-arrows-alt"></i>Envoyer</button>
                    </li>
                </ul>
            </form>
        </div>
        <div class="tz-address-style-4">
            <span>
                <img src="demos/Home-04/images-introduce-Home-04.jpg" alt="Images">
            </span>
            <ul class="tz-phone-fax">
                <li><a href="#"><img src="demos/Home-04/logo-introduce-home-4.png" alt="Images"></a></li>
                <li>
                    <img src="demos/Home-04/check.png" alt="Images">
                    <span class="theme-color-white">Adresse :  Sakiet Ezzit 3021</span>
                </li>
                <li>
                    <img src="demos/Home-04/check.png" alt="Images">
                    <span class="theme-color-white">Téléphone :+216 74 862 233</span>
                </li>
                <li>
                    <img src="demos/Home-04/check.png" alt="Images">
                    <span class="theme-color-white">Fax:  0045356723</span>
                </li>
            </ul>
        </div>
        <div class="tz-introduce-content tz-introduce-content-style-4">
            <h4>institut supérieur d'informatique et multimédia de sfax</h4>
            <p> L’Institut Supérieur d’Informatique et de Multimédia de Sfax (ISIMS) est un établissement scientifique relevant de l’Université de Sfax. <br>Il a été créé suivant un décret présidentiel paru au Journal Officiel de la République Tunisienne daté du 14 Août 2001. L’ISIMS dispose de la personnalité civile et d’une autonomie financière.</p>
            <img src="demos/Home-02/check-01.png" alt="Images">
        </div>
    </div><!-- End container class tz-home-4-introduce -->
</section><!-- End class tz-home-4-introduce -->


<!-- End Footer -->
<script>
    var Desktop       =   5,
            tabletportrait    =   2,
            mobilelandscape   =   1,
            mobileportrait    =   1,
            resizeTimer       =   null;
</script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/off-canvas.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/resize.js"></script>
<script src="js/custom-portfolio.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.parallax-1.1.3.js"></script>
<script src="js/custom.js"></script>
</body>
</html>