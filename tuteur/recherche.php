<?php
include("../admin/conx.php");
session_start();
if(isset($_POST['btn_log'])){
	include("recherche.php");
	}						
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mes Cours</title>
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

    <link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet" />
</head>
<body>
    <div class="loading-page">
        <img src="demos/image-preload/image.gif" alt="Images-loading">
    </div>
    <!-- Begin section search form -->
    <div class="tz-content-search">
        <form action="recherche.php" method="post">
            <i class="fa fa-times tz-form-close"></i>
			<label for="q">Rechercher un article</label>
            <input type="text" class="tz-search-input" id="tz-search-input" name="search" placeholder="entrer le nom du cours">
        </form><!-- End form search -->
    </div>
    <!-- End section search form -->

    <!-- Begin Header -->
     <header class="tz-header tz-header-1">
        <div class="container">
            <div class="tz-header-content">
                <h3 class="tz-logo pull-left">
                    <a href="#"><img src="demos/logo-header-1.png" alt="Images Logo"></a>
                </h3>
                <button data-target=".nav-collapse" class="tz-button-toggle btn-navbar pull-right" type="button">
                    <i class="fa fa-bars"></i>
                </button>
                <button class="tz-search pull-right"><i class="fa fa-search"></i></button>
                <nav class="nav-collapse pull-right">
                    <ul class="tz-menu">
                        <li>
                            <a href="Home-01.php">ACCUEIL</a>
                            
                        </li>
                        
                        <li>
                            <a href="Courses-Grid.php">COURS</a>
                            <ul class="sub-menu sub-menu-style-1">
                                
                                
                                
                            </ul>
                        </li>
                        
                        <li>
                              <a href="#">FORUM</a>
                                <ul class="sub-menu sub-menu-style-1">
                                    <li>
                                        <a href="ajout_sujet_app.php">ajouter sujet</a>
                                    </li>
                                    <li>
                                        <a href="forum_app.php">forum</a>
                                    </li>
                                    
                                </ul>
                            </li>
						<li>
                                <a href="#"><?php echo strtoupper( $_SESSION['pseudo'] ) ?></a>
                                <ul class="sub-menu sub-menu-style-1">
                                   
                                    <li>
                                        <a href="profile_app.php"> Profile </a>
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
                        </li>
                    </ul>
                </nav>
            </div>
        </div><!-- End Content Main Header -->
    </header>
    <!-- End Header -->

    <!-- Begin section tz-portfolio-wrapper -->
    <section class="tz-portfolio-wrapper">
        <div class="tz-courses-title">
            <img src="demos/Social/images-2-Social-1.jpg" alt="Image">
            <h1><a href="#"> cours</a></h1>
            <span>Liste de tous Les cours</span>
        </div>
		<div class="container">
            <div class="tz-courses-grid">
                <!--Begin class tz-portfolio-->
                <div class="row">
                    <div class="tz-portfolio">
        
	<?php
	include("../admin/conx.php");

		$uname=$_POST['search'];
		$result = mysql_query("SELECT * FROM `cours`
								WHERE ` titel`=' $uname' ") ;
	
$nblignes = mysql_num_rows($result);
    
if( ( $nblignes ) == 0 ){

?>
    <h3 style="text-align:center; margin:10px 0;">Pas de r&eacute;sultats pour cette recherche</h3>
<?php
}
else
{
                          
for ($i=0;$i<$nblignes;$i=$i+1) {
$cour_id = mysql_result($result,$i,"id_cour");
	$cour_tit= mysql_result($result,$i," titel");
	  $cour_niv = mysql_result($result,$i,"nivo_etud");
	
	   $cour_fich= mysql_result($result,$i,"fichier");
	    $cour_photo = mysql_result($result,$i,"photo");
		 $cour_descrip= mysql_result($result,$i,"description");
		 
	

		echo" 
                        <div class=\"element\">
                            <div class=\"tz-portfolio-wapper-style-3\">
                                <div class=\"tz-image-item tz-portfolio-images\">
                                    <img src=\"img/$cour_photo\" />
                                </div>
                                <div class=\"tz-portfolio-content-style-3\">
								
	
                                    <h4> $cour_tit </h4>
                                    <p> </p>";?>
                                    <small>
                                        <a class="delete" href="delete_cour.php?id_cour=<?php echo $cour_id ?>" > Supprimer </a>
                                        <a href="modif_cour.php?id_cour=<?php echo $cour_id ?>">Modifier</a>
                                    </small>
                            <span>
                               <a href="Courses-Single.php?id_cour=<?php echo $cour_id ?>"><i class="fa fa-chain"></i>voir cours</a>
                           <?php echo "</span>
                                </div>
                            </div>
                        </div>";
                    
                       
	 }
	 }
 
mysql_close();
?>
                    </div><!--End class tz-portfolio-->
                </div>
                <!--End class tz-portfolio-->
				 
            </div>
        </div>
    </section>
    <!-- End section tz-portfolio-wrapper -->

    <!-- Begin Footer -->
  
    <!-- End Footer -->

    <script>
        var Desktop       =   2,
                tabletportrait    =   1,
                mobilelandscape   =   1,
                mobileportrait    =   1,
                resizeTimer       =   null;
                AnimateTimer       =   null;
    </script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/resize.js"></script>
    <script src="js/custom-portfolio.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
	


</body>
</html>
