
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
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter Un Cours</title>
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
            <h1><a href="#">Ajouter Un cours</a></h1>
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



    $cour_tit=$_POST['titre'];//here getting result from the post array after submitting the form.
    $cour_nivo=$_POST['nivo'];//same
   
	 $date = date("Y-m-d");
  $cour_tut=$data['id_tuteur'];
	$cour_descrip=$_POST['descrip'];
	
	  if(empty($cour_tit)||empty($cour_nivo)||empty($cour_descrip))
    {
        //javascript use for input checking
        echo"<script>alert('veuillez remplir les champs')</script>";
exit();//this use if first is not work then other will not show
    }


$fichier=$_FILES['icone']['name'];
$taille_maximalc=64000;
$taillec= filesize($_FILES['icone']['tmp_name']);
$extensionsc=array('.png','.jpg','.jpeg','gif','.PNG','.JPG','.JPEG','GIF');
$extensionc=strrchr($fichier,'.');
if(!in_array($extensionc,$extensionsc))
{

$error="<h3 style=\"text-align:center; margin:10px 0;\">Vous devez uploder une fichier de type png,jpg,gif ou jpeg</h3>";

 }
if($taillec>$taille_maximalc)
{

 $error="<h3 style=\"text-align:center; margin:10px 0;\">Vous devez uploder une fichier qui ne dépasse pas le 600ko</h3>";

 }
if(!isset($error))
{
$fichier=preg_replace('/([^.a-z0-9]+)/i','-',$fichier ) ;
move_uploaded_file($_FILES['icone']['tmp_name'],"img/".$fichier);
}
else{
echo $error;
}

$fich=$_FILES['cour']['name'];
$taille_maximal=8388608;
$taille= filesize($_FILES['cour']['tmp_name']);
$extensions=array('.pdf','.docx','.ppt','.txt','.PDF','.DOCX','.PPT','.TXT');
$extension=strrchr($fich,'.');
if(!in_array($extension,$extensions))
{


 $error="<h3 style=\"text-align:center; margin:10px 0;\">Vous devez uploder une fichier de type pdf,docx,ppt ou txt</h3>";

}
if($taille>$taille_maximal)
{

 $error="<h3 style=\"text-align:center; margin:10px 0;\">Vous devez uploder une fichier qui ne dépasse pas le 8MO</h3>";

 }
if(!isset($error))
{
$fich=preg_replace('/([^.a-z0-9]+)/i','-',$fich ) ;
move_uploaded_file($_FILES['cour']['tmp_name'],"crs/".$fich);
}
else{
echo $error;
}
   

    
//here query check weather if user already registered so can't register again.

	
	
//insert the user into the database.

    
    $sql="INSERT INTO `cours`(`id_cour`, ` titel`, `nivo_etud`, `date`, `fichier`, `photo`, `description`, `id_tuteur`) VALUES ('',' $cour_tit','$cour_nivo','$date','$fich','$fichier','$cour_descrip',' $cour_tut') ";
	//var_dump($sql);
	//exit();
	$res=mysql_query($sql);
   if ($res) {
    echo "<script>alert('cours est ajouté avec succèe')</script>";

}

mysql_close();

}
?>
                            <form class="form-register" method="post" action="Courses-Register.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <h4 class="details-title">COURS DETAILS</h4>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label for ="titre">Titre :*</label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" placeholder="Titre du cours (max. 20 caractères) " name="titre" id="titre" required>
                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label for ="nivo">Niveau d'etude: *</label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" value="" name="nivo" id="nivo" required>
                                            </div>
                                        </div>
                                        
										
										<div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label for ="cour">fichier : *</label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
											<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                                                <input type="file" value="" name="cour" id="cour" required>
                                            </div>
											</div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label for ="icone">icone: *</label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <input type="file" value="" name="icone" id="icone" required>
                                            </div>
                                        
                                        </div>
                                         
										 <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label for="descrip">Description: *</label>
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
