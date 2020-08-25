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
    <title>Envoyer un message</title>
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

<section class="tz-wrapper-default">
    <div class="tz-blog-title">
        
        <h1><a href="#">Message</a></h1>
        <span>voir les messages</span>
    </div>
    <div class="container">
        <!-- Start class tzsing_post -->
        <div class="tzsingle_post">
            <article class="tz-single-content">
                <div class="tz-blog-thubnail">
                    
                </div>
                <!--comment-content -->
                        </div><!--comment-body -->
                        
                                 
						<?php
						 if(isset($_POST['text']))
						 {
						if (empty($msg_nom)){
				$msg_nom=  $_POST['text'];
				
						$result = mysql_query("SELECT   * FROM  `tuteurs` WHERE CONCAT(`Nom`,' ', `prenom`) ='$msg_nom'");
	   $nblignes= mysql_numrows($result);
	   
	   $result1 = mysql_query("SELECT   * FROM  `admins` WHERE CONCAT(`nom`,' ', `prenom`) ='$msg_nom'");
	   $nblignes1 = mysql_numrows($result1);
	   
	   $result2 = mysql_query("SELECT   * FROM ` apprenants` WHERE CONCAT(`Nom`,' ', `prenom`) ='$msg_nom'");
	   $nblignes3 = mysql_numrows($result2);

	   }
	   if( ( $nblignes ) == 0 &&( $nblignes1 ) == 0 &&( $nblignes3 ) == 0 ) {

?>
    <h3 style="text-align:center; margin:10px 0;">cette utilisateur n existe pas </h3>
<?php
}
					else{
					for ($i=0;$i<$nblignes;$i=$i+1) {
$utilisateur_id = mysql_result($result,$i,"id_tuteur");

}
for ($i=0;$i<$nblignes1;$i=$i+1) {
$utilisateur_id = mysql_result($result1,$i,"id_admin");

}
for ($i=0;$i<$nblignes3;$i=$i+1) {
$utilisateur_id = mysql_result($result2,$i,"id_apprenant");

}
					 echo"<a href=\"msg.php?id_utilisateur=$utilisateur_id\">$msg_nom</a>";
					}
			}			
						?>
						<form method="post"  id="form" action="single_msg.php">  
                   
                <div class="form-comment">
                    <h3 class="tz-title">Envoyer un nouveau message</h3>
						 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          
                                <label> À :</label>
                       
	<input type="text" name="text" id="text" required />
 	</div>
                        </div>
						
						</form>
					
                </div>
            </div>
        </div>
        <!-- End class tzsing_post -->
    </div>
</section>

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
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.parallax-1.1.3.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
	
<?php

mysql_close();

?>