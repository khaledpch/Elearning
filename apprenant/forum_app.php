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
    <title>Forum</title>
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
                            <a href="Courses-Grid.php">COURS</a>
                            <ul class="sub-menu sub-menu-style-1">
                                
                                
                                
                            </ul>
                        </li>
                        
                        <li>
                              <a href="#">FORUM</a>
                                <ul class="sub-menu sub-menu-style-1">
                                    <li>
                                        <a href="forum_app.php">Consulter forum</a>
                                    </li>
                                    <li>
                                        <a href="ajout_sujet_app.php ">Ajouter un sujet</a>
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

<section class="tz-wrapper-default">
   <div class="tz-joom-title">
        <img src="demos/Blog/image-1-Blog-01-Column.jpg" alt="Images">
		</div>
        <h1 align="center"><a href="#">Forum</a></h1>
       <h6 align="center"> <span >discutons nous</span></h6>
    </div>
    <div class="container">
        <!-- Start class tz-blog-wrapper -->
        <div class="tz-blog-wrapper-style-1">
            <div class="row">
                <!-- Start class tz-blog-item -->
				<?php
	include("../admin/conx.php");
	$result = mysql_query("SELECT `id_sujet`, `titre`, `date_ajout`, `contenu`, `id_admin`, `id_tuteur`, `id_apprenant` FROM `sujets` ORDER BY `date_ajout` DESC  ");
$nblignes = mysql_numrows($result);
    



                          
for ($i=0;$i<$nblignes;$i=$i+1) {
$sujet_id = mysql_result($result,$i,"id_sujet");
	$sujet_tit= mysql_result($result,$i,"titre");
	  
	
	   $sujet_date= mysql_result($result,$i,"date_ajout");
	    $sujet_contenu = mysql_result($result,$i,"contenu");
		 $sujet_admin= mysql_result($result,$i,"id_admin");
		  $sujet_tuteur= mysql_result($result,$i,"id_tuteur");
		   $sujet_apprenant= mysql_result($result,$i,"id_apprenant");
		 ?>
                <article class="tz-blog-item tz-blog-item-style-1">
                    <div class="tz-blog-thubnail">
                        
                    </div>
                    <div class="tz-blog-description">
                        <h3>
                            <img src="demos/check.png" alt="Images">
                            <a href="#"><?php echo $sujet_tit ?> </a>
                        </h3>
                            <span class="tz-entry-meta">
							<?php
							
							 
	   $sql=("SELECT   CONCAT(`Nom`,' ', `prenom`) as np FROM `tuteurs` WHERE `id_tuteur`= '$sujet_tuteur'");
	   $req=mysql_query($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	   $data = mysql_fetch_array($req);
	   mysql_free_result ($req);


	   $sql1=("SELECT   CONCAT(`nom`,' ', `prenom`) as np FROM `admins` WHERE `id_admin`= '$sujet_admin'");
	   $req1=mysql_query($sql1)or die('Erreur SQL !<br />'.$sql1.'<br />'.mysql_error());
	   $data1 = mysql_fetch_array($req1);
	   mysql_free_result ($req1);

	   $sql2=("SELECT   CONCAT(`Nom`,' ', `prenom`) as np FROM ` apprenants` WHERE `id_apprenant`= '$sujet_apprenant'");
	   $req2=mysql_query($sql2)or die('Erreur SQL !<br />'.$sql2.'<br />'.mysql_error());
	   $data2 = mysql_fetch_array($req2);
	   mysql_free_result ($req2);

							?>
                                ajouter par:<a class="tz-author" href="#"><?php echo $data['np']; ?><?php echo $data1['np']; ?><?php echo $data2['np']; ?></a>/
                                <a href="#"><?php echo $sujet_date ?> </a>
                                
                            </span>
                        <p><?php echo$sujet_contenu?> </p>
                       
                        <ul class="tz-blog-more">
                            <li>
                                <span>
								
                                    <a class="tz-button-more" href="ajout_comm_app.php?id_sujet=<?php echo $sujet_id ?>"><i class="fa fa-arrows-alt"></i>Voir sujet</a>
									
                                </span>
                                
                                
                            </li>
                        </ul>
                    </div>
                </article>
				<?php
				}
				mysql_close();
				?>
                <!-- End class tz-blog-item -->

                <!-- Start class tz-blog-item -->
               
                <!-- End class tz-blog-item -->

                <!-- Start class tz-Pagination -->
                <div class="TzPagination TzPagination-style-1">
                    <div class="wp-pagenavi">
                        <a href="#" class="previouspostslink"><i class="fa fa-angle-double-left"></i></a>
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a class="current">3</a>
                        <a href="#" class="nextpostslink"><i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
                <!-- End class tz-Pagination -->
            </div>        
        </div>    
    </div>
</section>

<!-- Begin Footer -->

<!-- End Footer -->

<script src="js/jquery.min.js"></script>
<script>
    jQuery.noConflict();
</script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/off-canvas.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.parallax-1.1.3.js"></script>
<script src="js/custom.js"></script>
</body>
</html>