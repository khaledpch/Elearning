<?php
include("../admin/conx.php");
session_start();
$pseudo_app=$_SESSION['pseudo'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo strtoupper( $_SESSION['pseudo'] ) ?></title>
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

<!-- Begin class tz-wrapper-default -->
<section class="tz-wrapper-default">
  <div class="tz-joom-title">
        <img src="demos/Social/images-1-Social-1.jpg" alt="Images">
		</div>
		<?php
		include("../admin/conx.php"); 
		
		$result = mysql_query("SELECT `id_apprenant`,`pseudo`,CONCAT(`nom`,' ', `prenom`) as np, `ville`,`photo`, `email`,`tel` ,`niveau_app`,`date_naiss` FROM ` apprenants` WHERE `pseudo`='$pseudo_app'");
		$nblignes = mysql_numrows($result);
		for ($i=0;$i<$nblignes;$i=$i+1) {
		 $user_id = mysql_result($result,$i,"id_apprenant");
	 $user_pseudo = mysql_result($result,$i,"pseudo");
	  
	
	   $user_prenom = mysql_result($result,$i,"np");
	    $user_ville = mysql_result($result,$i,"ville");
		 $user_email= mysql_result($result,$i,"email");
		  $user_tel= mysql_result($result,$i,"tel");
		 $user_date= mysql_result($result,$i,"date_naiss");
		 $user_photo= mysql_result($result,$i,"photo");
		 $user_nivo= mysql_result($result,$i,"niveau_app");
		  
		 }
		
		
		?>
        <h1 align="center"><a href="#"><?php echo  $user_prenom  ?></a></h1>
        <h6 align ="center">bienvenu sur mon profile</h6>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="tz-link-widget">
                    <aside class="widget">
                        
                    </aside>
                    <aside class="widget widget-link">
                        <ul>
                           
                            <li>
                                <a href="#">
                                    <img alt="Images" src="demos/check.png">
                                    <i class="fa fa-arrows-alt"></i>
                                    <strong>Modifier Pass</strong>
                                </a>
                            </li>
                            <li>
                                
                            </li>
                        </ul>
                    </aside>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="tz-joom-profile">
                    <h4 class="joom-title"><img src="demos/check.png" alt="Images"> a propos</h4>
                   <p> nom et prenom : <?php echo  $user_prenom  ?></p>
				   <p> email :<?php echo $user_email ?> </p>
				     <p> telephone :<?php echo $user_tel ?> </p>
                    
					<p> Ville : <?php echo $user_ville ?> </p>
					<p> Date de naissance : <?php echo $user_date ?> </p>
					
                    <div class="tz-profile-courses">
                        <h5 class="tz-profile-title"><img src="demos/check.png" alt="Image"><a href="#">Mes Score on quiz :</a></h5>
      <?php
	  $result1 = mysql_query("SELECT * FROM `quiz_takers` WHERE `username`=(SELECT `pseudo` FROM ` apprenants` WHERE `pseudo`='$pseudo_app')");
	  $nblignes = mysql_numrows($result1);
		for ($i=0;$i<$nblignes;$i=$i+1) {
		 
	 $quiz_pseudo = mysql_result($result1,$i,"username");
	  
	
	   
	    $quiz_date = mysql_result($result1,$i,"date_time");
		 $quiz_score= mysql_result($result1,$i,"percentage");
		 
	  
	  
	  ?>
<p><h4>  <?php echo $quiz_score  ?>   % </p></h4>
                    </div>
       <?php
	   }
?>	   
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="tz-profile-user">
                    <div class="tz-user-thumbnail">
                        <img src="<?php echo $user_photo ?>" alt="Images">
                        <img src="<?php echo $user_photo ?>" alt="Images">
                    </div>
                    <h5><img src="demos/check.png" alt="Images"><a href="#"><?php echo $user_pseudo ?></a></h5>
                    <p><?php echo $user_nivo ?></p>
                    <span class="tz-share-public">
                        <a href="#">
                            <i class="fa fa-facebook"></i>
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-twitter"></i>
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-youtube-play"></i>
                            <i class="fa fa-youtube-play"></i>
                        </a>
                    </span>
                   
                </div>
                
<!-- End Footer -->

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/off-canvas.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.parallax-1.1.3.js"></script>
<script src="js/custom.js"></script>
</body>
</html>