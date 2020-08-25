
<?php
include("../admin/conx.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier Un Cours</title>
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
        <form action="#" method="get">
            <i class="fa fa-times tz-form-close"></i>
            <input type="text" class="tz-search-input" id="tz-search-input" name="search" placeholder="Search...">
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
                                        <a href="logout.php">Se déconnecter</a>
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

    <section class="tz-wrapper-default">
        <div class="tz-courses-title">
            <img src="demos/check.png" alt="Image">
            <h1><a href="#">Modifier Le cours</a></h1>
            <span></span>
        </div>

        <!-- Start class tz-register -->
        <div class="tz-register">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-xs-12 col-sm-12">
                        <div class="tz-register-content">
                            <?php
	
	if(isset($_GET['id_cour'])or isset($_GET['modif'])) {
	include("../admin/conx.php");

$id=$_GET['id_cour'];

$result=mysql_query("SELECT * FROM `cours` WHERE `id_cour`= '$id'");

$nblignes = mysql_numrows($result);
for ($i=0;$i<$nblignes;$i=$i+1) {
    
	$cour_tit= mysql_result($result,$i," titel");
	  $cour_nivo = mysql_result($result,$i,"nivo_etud");
	
	
		 $cour_descrip= mysql_result($result,$i,"description");
	
		   if (isset($_GET['titre']) && isset($_GET['nivo'])  && isset($_GET['descrip']) ){
		$cour_tit=$_GET['titre'];
		$cour_nivo=$_GET['nivo'];
		
		
		 $cour_descrip= $_GET['descrip'];
		 
		
		$sql = ("UPDATE `cours` SET ` titel`='$cour_tit',`nivo_etud`='$cour_nivo',`description`='$cour_descrip'  WHERE `id_cour`='$id' ");
		
		

		// on exécute la requête (mysql_query) et on affiche un message au cas où la requête ne se passait pas bien (or die)
		$res=mysql_query($sql);


		// un petit message permettant de se rendre compte de la modification effectuée
		 if($res)
    		{
//javascript function to open in the same window
    echo "<script>alert('le cours est modifier  avec succèe')</script>";
	
}
 else
  {
   echo "<script>alert(' Modification echoué')</script>"; 
   }
   
// require("consulter_app.php");
 
 
 }
 }
 }
 
mysql_close();
?>
                            <form class="form-register" method="get" action="Modif_cour.php">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <h4 class="details-title">COURS DETAILS</h4>
										  
										   
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label>Titre :*</label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" value="<?php echo $cour_tit; ?>" name="titre">
                                            </div>
                                        </div>
                                       <input type="hidden" name="id_cour" value="<?php echo $id;?>">
										  
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label>Niveau d'etude: *</label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" value="<?php echo $cour_nivo; ?>" name="nivo">
                                            </div>
                                        </div>
                                       
									
                                         
										 <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label>Description: *</label>
                                            </div>
                                          
                                               <TEXTAREA name="descrip" rows="10" cols="100" ><?php echo $cour_descrip;?></TEXTAREA>
                                           
                                        </div>
                                        <div class="controls">
                                            <button type="submit" name="modif"><i class="fa fa-arrows-alt"></i>Modifier</button>
                                        </div>
                                    </div>
                                </div>
                                <!--end class row-->
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12">
                        <aside class="widget">
                            
                       
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- End class tz-register -->
    </section>

    <!-- Begin Footer -->
   
    <!-- End Footer -->

    <script>
        var Desktop       =   2,
                tabletportrait    =   1,
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
    <script src="js/custom.js"></script>
</body>
</html>
