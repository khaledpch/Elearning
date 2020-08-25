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
			<?php
include("../admin/conx.php");
$id=$_GET['id_cour'];
$result=mysql_query("SELECT * FROM `cours` WHERE `id_cour`= '$id'");
$nblignes = mysql_numrows($result);
for ($i=0;$i<$nblignes;$i=$i+1) {
$cour_id = mysql_result($result,$i,"id_cour");
	$cour_tit= mysql_result($result,$i," titel");
	  $cour_niv = mysql_result($result,$i,"nivo_etud");
	$cour_date=mysql_result($result,$i,"date");
	   $cour_fich= mysql_result($result,$i,"fichier");
	    $cour_photo = mysql_result($result,$i,"photo");
		 $cour_descrip= mysql_result($result,$i,"description");
		  $cour_tuteur=mysql_result($result,$i,"id_tuteur");
		 }
mysql_close();
?>
            <h1><a href="#"><?php echo $cour_tit ?></a></h1>
            <span>voir plus sur le cours</span>
        </div>
        <div class="container">
            <!-- Begin class tz-events-wrapper -->
            <div class="tz-courses-single">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-xs-12 col-sm-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
                                <div class="tz-single-ticket">
                                    <img src="img/<?php echo $cour_photo ?>" alt="Images" height="270" width="270">
                                    <h3>
                                        <img src="demos/check.png" alt="Images">
<?php echo $cour_tit ?>                                   </h3>
                                    <form class="tz-form-ticket tz-form-courses" name="frm_ticket" method="post" action="#">
                                        <label> ajouter Le :<?php echo $cour_date ?></label>
                                      
                                     
                                        <p>Niveau: <?php echo $cour_niv ?>  </p>
                                        <button type="submit">
                                           <a href="addQuestions.php?id_cour=<?php echo $cour_id ?>"> <i class="fa fa-arrows-alt"></i>
ajouter un quiz 
                                       </a> </button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                                <article class="tz-day-open">
                                    <h3>
                                        <img src="demos/check.png" alt="Images">
                                      Ajouter par :
                                    </h3>
                                    <span>
                                        <img src="demos/check.png" alt="Images">
       <?php include("../admin/conx.php"); 
	   $sql=("SELECT   CONCAT(`Nom`,' ', `prenom`) as np FROM `tuteurs` WHERE `id_tuteur`= '$cour_tuteur'");
	   $req=mysql_query($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	   $data = mysql_fetch_array($req);
	   mysql_free_result ($req);
mysql_close ();
	   ?> <a href="profile_tut.php"><?php echo $data['np']; ?></a>
                                    </span>
<p><?php echo  $cour_descrip ?> </p>
                                    
                                    <span class="tz-share">
                                        <small></small>
                                        
                                    </span>
                                </article>
								<?php
			include("../admin/conx.php");
	$result = mysql_query("SELECT `id_comm`, `contenu_comm`, `date_comm`,`temps`, `id_tuteur`, `id_apprenant` FROM `commentraires` WHERE `id_cour`='$id'  ");
$nblignes = mysql_numrows($result);
                          
for ($i=0;$i<$nblignes;$i=$i+1) {
$comm_id = mysql_result($result,$i,"id_comm");
	$comm_tit= mysql_result($result,$i,"contenu_comm");
	  
	
	   $comm_date= mysql_result($result,$i,"date_comm");
	    $comm_temps= mysql_result($result,$i,"temps");
	    
		 
		  $comm_tuteur= mysql_result($result,$i,"id_tuteur");
		    $comm_app= mysql_result($result,$i,"id_apprenant");
    
			?>
								<div class="comment-body">
                            <div class="comment-meta">
														<?php 
$sql=("SELECT   `photo` FROM `tuteurs` WHERE `id_tuteur`= ' $comm_tuteur'");
	   $req=mysql_query($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	   $dat = mysql_fetch_array($req);
	   mysql_free_result ($req);
	   
	     $sql=("SELECT   `photo` FROM ` apprenants` WHERE `id_apprenant`= '$comm_app'");
	   $req=mysql_query($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	   $dat2 = mysql_fetch_array($req);
	   mysql_free_result ($req);
	   
	   
?>
                                <a href="#"><img src="<?php echo$dat['photo'];?><?php echo$dat2['photo'];?>" alt="NATASHA" height="35x" width="35"></a>
                            </div>
                            <div class="comment-content">
                                <span class="entry-comments-meta">
                                        <?php
								  $sql=("SELECT   CONCAT(`Nom`,' ', `prenom`) as np FROM `tuteurs` WHERE `id_tuteur`= ' $comm_tuteur'");
	   $req=mysql_query($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	   $dat = mysql_fetch_array($req);
	   mysql_free_result ($req);



	   $sql2=("SELECT   CONCAT(`Nom`,' ', `prenom`) as np FROM ` apprenants` WHERE `id_apprenant`= ' $comm_app'");
	   $req2=mysql_query($sql2)or die('Erreur SQL !<br />'.$sql2.'<br />'.mysql_error());
	   $dat2 = mysql_fetch_array($req2);
	   mysql_free_result ($req2);
								?>
                                      <a href="#">  <strong><?php echo $dat['np']; ?><?php echo $dat2['np']; ?></strong></a>
                                        <small><?php echo $comm_date?></small> /
										 <small><?php echo $comm_temps?></small>
                                </span>
                                                         <div id="contenu">
 	<p id="<?php echo $id_cour?>"><?php echo $comm_tit?></p>
 </div>
                                
                            </div><!--comment-content -->
								<div class="tz-single-share">
							<ul class="pull-right">
                            <li>
                                
                                <small>
                                    <a class="delete" href=" delete_comm.php?id_comm=<?php echo $comm_id  ?>">Supprimer</a>
                                </small>
                            </li>
                        </ul>
                    </div>
                        </div><!--comment-body -->
                    </li>
                </ol>
				<?php
}				
		?>
								<div class="form-comment">
                    <h3 class="tz-title">poser votre question</h3>
					<?php						

include("../admin/conx.php");

$sql=("SELECT   `id_tuteur` FROM  `tuteurs` WHERE `pseudo`='$pseudo_tut'");
	   $req=mysql_query($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	   $data = mysql_fetch_array($req);
	   mysql_free_result ($req);


	 
	 if(isset($_POST['comm']))
{



    $comm_tit=$_POST['contenu'];//here getting result from the post array after submitting the form.
    $comm_tut=  $_POST['sujet_tut'];
	
	$comm_app=  $_POST['sujet_app'];
	$comm_sujet=  $_POST['id_cour'];
	
   $date = date("Y-m-d");
$heure = date("H:i");
	
 
 
	
	  if(empty($comm_tit))
    {
        //javascript use for input checking
        echo"<script>alert('veuillez remplir les champs')</script>";
exit();
    }
	 $sql="INSERT INTO `commentraires`(`id_comm`, `contenu_comm`, `date_comm`, `temps`, `id_cour`, `id_tuteur`, `id_apprenant`) VALUES ('','$comm_tit','$date','$heure','$comm_sujet','$comm_tut',' $comm_app')";
	//var_dump($sql);
	//exit();
	$res=mysql_query($sql);
   
echo'<meta http-equiv="refresh" content="0">';


}


?>

                    <form method="post" id="form" action="?id_cour=<?php echo $id?>">
                       <input type="hidden" name="id_cour" value="<?php echo $id;?>">
					    <input type="hidden" name="sujet_tut" value="<?php echo $data['id_tuteur'];?>">
						 
						  <input type="hidden" name="sujet_app" value="<?php echo $data2['id_apprenant'];?>">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-comment-item">
							
                                <label>ecrire votre question</label>
                                <textarea rows="5" id="contenu" name="contenu" class="form-control" maxlength="1000" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="comment-post" name="comm"  >
                                <i class="fa fa-comment"></i>
                               commenter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                            </div>
                           
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
	<script>

$('.delete').click(function(){
 
   var response = confirm("Voulez-vous vraiment supprimer ce commentaire ?");
   /* si la réponse est non */
   if(!response)
   {
      return false; /* ANNULE LE CLICK et donc le href */
   }
 
});
    </script>
</body>
</html>
