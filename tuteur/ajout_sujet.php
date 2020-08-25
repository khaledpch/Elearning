<?php
include("../admin/conx.php");
session_start();
if(empty($_SESSION['pseudo'])) 
{
  header('Location: ../index.php');
  exit();
}
$pseudo_tut=$_SESSION['pseudo'];
$sql = ("SELECT `id_tuteur` FROM `tuteurs` WHERE `pseudo`='$pseudo_tut'");
 $req=mysql_query($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	   $data = mysql_fetch_array($req);
	   mysql_free_result ($req);
?>
<?php
require("../admin/conx.php");
$sql1 = ("SELECT `id_admin` FROM `admins` WHERE `pseudo`='$pseudo_tut'");
 $req1=mysql_query($sql1)or die('Erreur SQL !<br />'.$sql1.'<br />'.mysql_error());
	  $data1 = mysql_fetch_array($req1);
	  mysql_free_result ($req1);
	  ?>
	  <?php
	  require("../admin/conx.php");
	   $sql2 = ("SELECT `id_apprenant` FROM ` apprenants` WHERE `pseudo`='$pseudo_tut'");
 $req2=mysql_query($sql2)or die('Erreur SQL !<br />'.$sql2.'<br />'.mysql_error());
	   $data2 = mysql_fetch_array($req2);
	   mysql_free_result ($req2);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter Un sujet</title>
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
            <h1><a href="#">Ajouter Un Sujet</a></h1>
            <span></span>
        </div>

        <!-- Start class tz-register -->
        <div class="tz-register">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-xs-12 col-sm-12">
                        <div class="tz-register-content">
<?php						
include("../admin/conx.php");
if(isset($_POST['ajout']))
{



    $sujet_tit=$_POST['titre'];//here getting result from the post array after submitting the form.
  
 
 $sujet_tut=$data['id_tuteur'];
  $sujet_admin=$data1['id_admin'];
   $sujet_app=$data2['id_apprenant'];
	$sujet_descrip=$_POST['descrip'];
	$date = date("Y-m-d");
	  if(empty($sujet_tit)||empty($sujet_descrip))
    {
        //javascript use for input checking
        echo"<script>alert('veuillez remplir les champs')</script>";
exit();
    }
	 $sql="INSERT INTO `sujets`(`id_sujet`, `titre`, `date_ajout`, `contenu`, `id_admin`, `id_tuteur`, `id_apprenant`) VALUES ('','$sujet_tit','$date','$sujet_descrip','$sujet_admin','$sujet_tut','$sujet_app')";
	//var_dump($sql);
	//exit();
	$res=mysql_query($sql);
   if ($res) {
    echo"<script>alert('sujet est ajouté avec succèe')</script>";

}

mysql_close();

}
?>
	


	<form class="form-register" method="post" action="ajout_sujet.php">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <h4 class="details-title">sujet DETAILS</h4>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label for ="titre">Titre :*</label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" placeholder="Titre du cours (max. 20 caractères) " name="titre" id="titre">
                                            </div>
                                        </div>
                                       
                                       
                                        
										
                                         
										 <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label for="descrip">contenu: *</label>
                                            </div>
                                          
                                               <TEXTAREA name="descrip" id "descrip" rows=10 cols=100></TEXTAREA>
                                           
                                        </div>
                                        <div class="controls">
                                            <button type="submit" name="ajout"><i class="fa fa-arrows-alt"></i>Ajouter</button>
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
