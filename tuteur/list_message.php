<?php
include("../admin/conx.php");
session_start();
if(empty($_SESSION['pseudo'])) 
{
  header('Location: ../index.php');
  exit();
}
$pseudo_tut=$_SESSION['pseudo'];
$sql=("SELECT   `id_tuteur` FROM  `tuteurs` WHERE `pseudo`='$pseudo_tut'");
	   $req=mysql_query($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	   $data = mysql_fetch_array($req);
	   mysql_free_result ($req);
	   $id=$data['id_tuteur'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Boite du message</title>
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
        <form action="recherche.php" method="post" >
		<label for="search">Rechercher un article</label>
		
            <i class="fa fa-times tz-form-close"></i>
            <input type="text" class="tz-search-input" id="search" name="search" placeholder="entrer le nom du cours">
			
        </form><!-- End form search -->
		<div id="results"></div>
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

    <!-- Begin class tz-banner-social -->
    <section class="tz-banner-social">
        <div class="tz-banner-images">
            <img src="demos/Social/images-1-Social-1.jpg" alt="Images">
        </div>
        <div class="tz-social-comunity">
            <img src="demos/check-01.png" alt="Images">
            <h1><a href="#">SOCIAL COMMUNITY</a></h1>
            <span>Get connected</span>
        </div>
    </section>
    <!-- End class tz-banner-social -->

    <section class="tz-members">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-xs-12 col-sm-12">
                    <div class="tz-all-member">
                        <h4 class="tz-members-title"><a href="#">voir tous les messages</a></h4>
                        <div class="tz-filter-member clearfix">
                           
                        </div>
						<?php
	include("../admin/conx.php");
	$result = mysql_query("SELECT `id_msg`, `contenu`, `from`, `to`,`date`, `temp` FROM `messages`  WHERE `to`='$id' GROUP BY `from`  ORDER BY `id_msg` ASC  ");
$nblignes = mysql_numrows($result);
    



                          
for ($i=0;$i<$nblignes;$i=$i+1) {
$msg_id = mysql_result($result,$i,"id_msg");
	
	  
	
	   $msg_date= mysql_result($result,$i,"date");
	    $msg_contenu = mysql_result($result,$i,"contenu");
		    $msg_from = mysql_result($result,$i,"from");
			    $msg_to = mysql_result($result,$i,"to");
		
		$msg_time= mysql_result($result,$i,"temp");
		
		 ?>
                        <div class="row">
                                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                    <div class="tz-members-wrapper">
                                        <div class="tz-detail-member clearfix">
                                            <div class="tz-avatar pull-left">
										<?php	
										$sql=("SELECT   `photo` FROM `tuteurs` WHERE `id_tuteur`= '$msg_from'");
	   $req=mysql_query($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	   $dat = mysql_fetch_array($req);
	   mysql_free_result ($req);
	   $sql=("SELECT   `photo` FROM ` apprenants` WHERE `id_apprenant`= '$msg_from'");
	   $req=mysql_query($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	   $dat1 = mysql_fetch_array($req);
	   mysql_free_result ($req);
	    $sql=("SELECT   `photo` FROM `admins` WHERE `id_admin`= '$msg_from'");
	   $req=mysql_query($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	   $dat2 = mysql_fetch_array($req);
	   mysql_free_result ($req);
	   
	   ?>
                                                <a href="#"><img src="<?php echo$dat['photo'];?><?php echo$dat1['photo'];?><?php echo$dat2['photo'];?>" alt="NATASHA" height="50" width="50"></a>
                                            </div>
											
                                            <div class="tz-info pull-left">
											
											<?php
								  $sql=("SELECT   CONCAT(`Nom`,' ', `prenom`) as np FROM `tuteurs` WHERE `id_tuteur`= ' $msg_from'");
	   $req=mysql_query($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	   $dat = mysql_fetch_array($req);
	   mysql_free_result ($req);


	   $sql1=("SELECT   CONCAT(`nom`,' ', `prenom`) as np FROM `admins` WHERE `id_admin`= '$msg_from'");
	   $req1=mysql_query($sql1)or die('Erreur SQL !<br />'.$sql1.'<br />'.mysql_error());
	   $dat1 = mysql_fetch_array($req1);
	   mysql_free_result ($req1);

	   $sql2=("SELECT   CONCAT(`Nom`,' ', `prenom`) as np FROM ` apprenants` WHERE `id_apprenant`= ' $msg_from'");
	   $req2=mysql_query($sql2)or die('Erreur SQL !<br />'.$sql2.'<br />'.mysql_error());
	   $dat2 = mysql_fetch_array($req2);
	   mysql_free_result ($req2);
								?>
											
										
                                                <h5><?php echo $dat['np']; ?><?php echo $dat1['np']; ?><?php echo $dat2['np']; ?></h5>
                                                <a href="message.php?id_msg=<?php echo $msg_id?>"><p><?php echo $msg_contenu ?></p></a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                    </div>
                                </div>
                            </div>
                    </div>
					<?php
					}
					?>
                    <div class="load-more">
                        <a href="single_msg.php"><i class="fa fa-arrows-alt"></i>nouveau message</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12">
                    
                    
    <!-- Begin Footer -->

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
    <script src="js/jquery.flexslider.html" ></script>
    <script src="js/custom.js"></script>
</body>
</html>