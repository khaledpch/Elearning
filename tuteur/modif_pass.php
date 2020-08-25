<?php
include("../admin/conx.php");
session_start();
if(empty($_SESSION['pseudo'])) 
{
  header('Location: ../index.php');
  exit();
}
$pseudo_tut=$_SESSION['pseudo'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier mot de pass</title>
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
<!-- End Header -->

<!-- Begin class tz-wrapper-default -->
<section class="tz-wrapper-default">
    <div class="tz-joom-title">
        <img src="demos/check.png" alt="Image">
        <h1><a href="#">Profile</a></h1>
        <span>Modifier Votre mot de passe</span>
    </div>
    <div class="container">
       
            <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                <div class="joom-reset">
                    <h4 class="joom-title"><img src="demos/check.png" alt="Images">Modifier mor de passe</h4>
					<?php
	
	if(isset($_GET['id_tut'])or isset($_GET['modif'])) {
	include("../admin/conx.php");

$id=$_GET['id_tut'];

$result=mysql_query("SELECT * FROM `tuteurs` WHERE `id_tuteur`= '$id'");

$nblignes = mysql_numrows($result);
for ($i=0;$i<$nblignes;$i=$i+1) {
    
	
	
		 $user_pass= mysql_result($result,$i,"pass");
	
		   if (isset($_GET['pass'])  ){
		$user_pass=$_GET['first'];
		
		
		
		
		 
		
		$sql = ("UPDATE `tuteurs` SET `pass`='$user_pass'  WHERE `id_tuteur`='$id' ");
		
		

		// on exécute la requête (mysql_query) et on affiche un message au cas où la requête ne se passait pas bien (or die)
		$res=mysql_query($sql);


		// un petit message permettant de se rendre compte de la modification effectuée
		 if($res)
    		{
//javascript function to open in the same window
    echo "<script>alert('le mot de pass est modifier  avec succèe')</script>";
	
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
                    
                    <form class="joom-form-login" method="get" action="modif_pass.php">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<input type="hidden" name="id_cour" value="<?php echo $id;?>">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <label>New password:</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                        <input type="text" name="first" value="<?php echo $user_pass ?>">
                                    </div>
                                </div>
							
                               

                                <div class="controls">
                                    <button type="submit" name="modif"><i class="fa fa-arrows-alt"></i>RESET</button>
                                </div>
                            </div>
                        </div>
                        <!--end class row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End class tz-wrapper-default -->

<!-- Begin Footer -->
<footer class="tz-footer">
    <div class="tz-footer-content">
        <div class="container">
            <img src="demos/icon-footer.png" alt="Icon-footer">
            <ul class="tz-footer-part">
                <li>
                    <div class="tz-footer-content-main">
                        <img src="demos/remove-header1.png" alt="Images remove footer">
                        <h4>ABOUT UNIVERSITY</h4>
                        <ul>
                            <li><a href="#">History & Mission</a></li>
                            <li><a href="#">Administration</a></li>
                            <li><a href="#">Community</a></li>
                            <li><a href="#">Around the World</a></li>
                            <li><a href="#">News Network</a></li>
                            <li><a href="#">Visitor Information</a></li>
                            <li><a href="#">Notable Facts & Statistics</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="tz-footer-content-main">
                        <img src="demos/remove-header1.png" alt="Images remove footer">
                        <h4>ADMISSIONS</h4>
                        <ul>
                            <li><a href="#">Undergraduate</a></li>
                            <li><a href="#">By School</a></li>
                            <li><a href="#">Process</a></li>
                            <li><a href="#">Visitor Information</a></li>
                            <li><a href="#">For Prospective Parents</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="tz-footer-content-main">
                        <img src="demos/remove-header1.png" alt="Images remove footer">
                        <h4>ACADAMIES</h4>
                        <ul>
                            <li><a href="#">Schools</a></li>
                            <li><a href="#">Depts. and Disciplines</a></li>
                            <li><a href="#">Undergraduate Studies</a></li>
                            <li><a href="#">Graduate Studies</a></li>
                            <li><a href="#">Part-Time and Non-Degree</a></li>
                            <li><a href="#">Summer</a></li>
                            <li><a href="#">Distance Education</a></li>
                            <li><a href="#">Catalogs</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="tz-footer-content-main">
                        <img src="demos/remove-header1.png" alt="Images remove footer">
                        <h4>RESEARCH</h4>
                        <ul>
                            <li><a href="#">Applied Physics Laboratory</a></li>
                            <li><a href="#">Research Projects</a></li>
                            <li><a href="#">Administration</a></li>
                            <li><a href="#">Funding Opportunities</a></li>
                            <li><a href="#">Undergraduate Research</a></li>
                            <li><a href="#">Resources</a></li>
                            <li><a>Health & Medicine</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="tz-footer-content-main">
                        <img src="demos/remove-header1.png" alt="Images remove footer">
                        <h4>EVENTS</h4>
                        <ul>
                            <li><a href="#">Calendar of Events</a></li>
                            <li><a href="#">Student Life</a></li>
                            <li><a href="#">Campus Services</a></li>
                            <li><a href="#">Athletic Facilities</a></li>
                            <li><a href="#">Arts and Culture</a></li>
                            <li><a href="#">For Students</a></li>
                            <li><a href="#">For Parents</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="tz-footer-address-site">
        <address>University Address, GK-120 678 Warsaw, Poland | Phone: +48 0045356723</address>
    </div>
</footer>
<!-- End Footer -->

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/off-canvas.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.parallax-1.1.3.js"></script>
<script src="js/custom.js"></script>
</body>
</html>