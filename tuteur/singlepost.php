<?php
include("../admin/conx.php");
session_start();
$pseudo_tut=$_SESSION['pseudo'];
 
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
        <img src="demos/check.png" alt="Image">
					<?php
include("../admin/conx.php");
$id=$_GET['id_sujet'];
$result=mysql_query("SELECT * FROM `sujets` WHERE `id_sujet`= '$id'");
$nblignes = mysql_numrows($result);
for ($i=0;$i<$nblignes;$i=$i+1) {
$sujet_tit= mysql_result($result,$i,"titre");
	  
	
	   $sujet_date= mysql_result($result,$i,"date_ajout");
	    $sujet_contenu = mysql_result($result,$i,"contenu");
		 $sujet_admin= mysql_result($result,$i,"id_admin");
		  $sujet_tuteur= mysql_result($result,$i,"id_tuteur");
		   $sujet_apprenant= mysql_result($result,$i,"id_apprenant");
		   }
?>
        <h1><a href="#"><?php echo $sujet_tit ?></a></h1>
        <span>more details sur le sujet</span>
    </div>
    <div class="container">
        <!-- Start class tzsing_post -->
        <div class="tzsingle_post">
            <article class="tz-single-content">
                <div class="tz-blog-thubnail">
                    <img src="demos/Blog/images-1-Bog-SinglePost.jpg" alt="Images">
                </div>
                <div class="tz-single-description">
                    <h3>
                        <img src="demos/check.png" alt="Images">
                        <a href="#"><?php echo $sujet_tit ?></a>
                    </h3>
                    <span class="tz-entry-meta">
							<?php
							include("../admin/conx.php");	
							 
	   $sq=("SELECT   CONCAT(`Nom`,' ', `prenom`) as n FROM `tuteurs` WHERE `id_tuteur`= '$sujet_tuteur'");
	   $re=mysql_query($sq)or die('Erreur SQL !<br />'.$sq.'<br />'.mysql_error());
	   $data = mysql_fetch_array($re);
	   mysql_free_result ($re);


	   $sq1=("SELECT   CONCAT(`nom`,' ', `prenom`) as n FROM `admins` WHERE `id_admin`= '$sujet_admin'");
	   $re1=mysql_query($sq1)or die('Erreur SQL !<br />'.$sq1.'<br />'.mysql_error());
	   $data1 = mysql_fetch_array($re1);
	   mysql_free_result ($re1);

	   $sq2=("SELECT   CONCAT(`Nom`,' ', `prenom`) as n FROM ` apprenants` WHERE `id_apprenant`= '$sujet_apprenant'");
	   $re2=mysql_query($sq2)or die('Erreur SQL !<br />'.$sq2.'<br />'.mysql_error());
	   $data2 = mysql_fetch_array($re2);
	   mysql_free_result ($re2);
	   

							?>
                        ajouter par :<a class="tz-author" href="#"><?php echo $data['n']; ?><?php echo $data1['n']; ?><?php echo $data2['n']; ?></a>
                        <a href="#"><?php echo $sujet_date ?> </a>
							<?php
			$sql = "SELECT COUNT(*) as nb FROM `commentraires` WHERE `id_sujet`='$id'";
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$row = mysql_fetch_assoc($req);
$nombre = $row['nb'];
			?>
                        <a href="#"><?php echo $nombre ?> comments</a>
                    </span>
                    <p><?php echo$sujet_contenu?> </p>
                    <div class="tz-single-share">
                        <ul class="pull-left">
                            <li>
                                
                                <span>
                                    <a href="#"><i class="fa fa-heart"></i>LIKE</a>
                                </span>
                            </li>
                        </ul>
                        <ul class="pull-right">
                            <li>
                                <small>
                                    <a class="tz-button-more" href="ajout_sujet.php">Ajouter un sujet</a>
                                </small>
                                <small>
                                    <a href="#">Supprimer</a>
                                </small>
                            </li>
                        </ul>
                    </div>
                   
            </article>
		
			     <div class="tz-sing-post-comment">
                <h3 class="tz-title-comment"><a href="#">Comments (<?php echo $nombre ?> ).</a></h3>
			<?php
			include("../admin/conx.php");
	$result = mysql_query("SELECT `id_comm`, `contenu_comm`, `date_comm`, `id_sujet`, `id_admin`, `id_tuteur`, `id_apprenant` FROM `commentraires` WHERE `id_sujet`='$id'  ");
$nblignes = mysql_numrows($result);
                          
for ($i=0;$i<$nblignes;$i=$i+1) {
$comm_id = mysql_result($result,$i,"id_comm");
	$comm_tit= mysql_result($result,$i,"contenu_comm");
	  
	
	   $comm_date= mysql_result($result,$i,"date_comm");
	    
		 $comm_admin= mysql_result($result,$i,"id_admin");
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
	   

								?>
                                <a href="#"><img src="<?php echo$dat['photo'];?>" alt="NATASHA" height="35x" width="35"></a>
                            </div>
                            <div class="comment-content">
                                <span class="entry-comments-meta">
								<?php
								  $sql=("SELECT   CONCAT(`Nom`,' ', `prenom`) as np FROM `tuteurs` WHERE `id_tuteur`= ' $comm_tuteur'");
	   $req=mysql_query($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	   $dat = mysql_fetch_array($req);
	   mysql_free_result ($req);


	   $sql1=("SELECT   CONCAT(`nom`,' ', `prenom`) as np FROM `admins` WHERE `id_admin`= ' $comm_admin'");
	   $req1=mysql_query($sql1)or die('Erreur SQL !<br />'.$sql1.'<br />'.mysql_error());
	   $dat1 = mysql_fetch_array($req1);
	   mysql_free_result ($req1);

	   $sql2=("SELECT   CONCAT(`Nom`,' ', `prenom`) as np FROM ` apprenants` WHERE `id_apprenant`= ' $comm_app'");
	   $req2=mysql_query($sql2)or die('Erreur SQL !<br />'.$sql2.'<br />'.mysql_error());
	   $dat2 = mysql_fetch_array($req2);
	   mysql_free_result ($req2);
								?>
                                      <a href="#">  <strong><?php echo $dat['np']; ?><?php echo $dat1['np']; ?><?php echo $dat2['np']; ?></strong></a>
                                        <small><?php echo $comm_date?></small>
                                </span>
                                <p>
                                   <?php echo $comm_tit?>
                                </p>
                                
                            </div><!--comment-content -->
							<div class="tz-single-share">
							<ul class="pull-right">
                            <li>
                                
                                <small>
                                    <a href=" delete_comm.php?id_comm=<?php echo $comm_id ?>">Supprimer</a>
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
                    <h3 class="tz-title">Leave a comment.</h3>


                    <form method="post" class="function">
                       <input type="hidden" name="id_sujet" value="<?php echo $id;?>">
					    <input type="hidden" name="sujet_tut" value="<?php echo $data['id_tuteur'];?>">
						 <input type="hidden" name="sujet_admin" value="<?php echo $data1['id_admin'];?>">
						  <input type="hidden" name="sujet_app" value="<?php echo $data2['id_apprenant'];?>">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-comment-item">
							
                                <label>Write your comment.</label>
                                <textarea rows="5" id="comments_form_comments" name="comments_form_comments" class="form-control" maxlength="1000" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="comment-post" name="comm"  >
                                <i class="fa fa-comment"></i>
                                COMMENT
                            </button>
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
<script>
    jQuery.noConflict();
</script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/off-canvas.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.parallax-1.1.3.js"></script>
<script src="js/custom.js"></script>
<script>
<?php
$sql=("SELECT   `id_tuteur` FROM  `tuteurs` WHERE `pseudo`='$pseudo_tut'");
	   $req=mysql_query($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	   $data = mysql_fetch_array($req);
	   mysql_free_result ($req);?>
{ "var1": "data1", "var2": "data2", "var3": "data3" }
$(document).ready(function() {
	// Au submit du formulaire
	$('#form').submit( function() {
		var pseudo = $('#<?php echo  $data['id_tuteur'] ?>').val();
		var commentaire = $('#contenu').val();
		if (pseudo != '' && commentaire != '') {
			// On fait l'appel Ajax
			$.getJSON('include/ajax/ajoutcomm.php', {pseudo:pseudo, commentaire:commentaire}, function(data){
				if (data.ret) {
					// On ajoute le nouvel élément
					$('#commentaire').prepend('<p class="last"><strong>'+data.pseudo+'</strong> a dit :<br />'+data.commentaire+'</p>');
				}
				else {
					$('#contenu').after('<span class="erreur">Erreur lors de l\'ajout du commentaire</span>');
					$('.ok').hide().fadeIn('slow');
				}
			 });
		}
		// On retourne false pour ne pas recharger la page
		return false;
	}); });
	
$(document).ready(function() {
	// Au submit du formulaire
	$('#form').submit( function() {
		var pseudo = $('#<?php echo  $comm_tut?>').val();
		var commentaire = $('#comments_form_comments').val();
		// On supprime les anciens messages d'erreurs ou de succès
		$('.erreur').remove();
		$('.ok').remove();
		// Si on a commentaire à ajouter
		if (pseudo != '' && commentaire != '') {
			// On affiche le loader
			$('#comments_form_comments').after('<img src="<?php echo DEFAULT_THEME_PATH; ?>/img/loader.gif" alt="Chargement..." class="loader" />');
			// On compte le nombre de commentaire déjà présent + celui qui va être créé
			var nbCom=1;
			$('#commentaire p').each(function() { nbCom++; });
			// On enlève la class "last" à l'ancien dernier
			$('.last').removeClass('last');
			// On fait l'appel Ajax
			$.post('include/ajax/ajoutcomm.php', {pseudo:pseudo, commentaire:commentaire}, function(data){
				var xmlData = data.getElementsByTagName('com')[0];
				var ret = xmlData.getElementsByTagName('ret')[0].firstChild.nodeValue;
				var xmlPseudo = xmlData.getElementsByTagName('pseudo')[0].firstChild.nodeValue;
				var xmlCommentaire = xmlData.getElementsByTagName('commentaire')[0].firstChild.nodeValue;
				if (ret) {
					// On ajoute le nouvel élément
						$('#commentaire').prepend('<p class="last" id="com_'+nbCom+'"><strong>'+xmlPseudo+'</strong> a dit :<br />'+xmlCommentaire+'</p>');
						// On le met pair ou impair
						if ($('.last').next().is('.pair'))
							$('.last').addClass('impair');
						else
							$('.last').addClass('pair');
						if (!$('.last').next().is('p'))
							$('.last').addClass('first');
						// On efface le contenu du formulaire
						$('#contenu').val('').focus();
						$('.loader').remove();
						$('#contenu').after('<span class="ok">Commentaire ajouté avec succès</span>');
						$('.ok').hide().fadeIn('slow');
				   }
				   else {
					   $('.loader').remove();
						$('#contenu').after('<span class="erreur">Erreur lors de l\'ajout du commentaire</span>');
						$('.ok').hide().fadeIn('slow');
				   }
			 }, 'xml');
		}
		else {
			if (pseudo == '')
				$('#pseudo').after('<span class="erreur">Champ requis</span>');
			if (commentaire == '')
				$('#contenu').after('<span class="erreur">Champ requis</span>');
			$('.erreur').hide().fadeIn('slow');
		}
		// On retourne false pour ne pas recharger la page
		return false;
	}); });
	
	<?php
	echo '<script language="Javascript">
<!--
document.location.replace("Content-Type: text/xml");
// -->
</script>';
	
echo "<?xml version='1.0' encoding='UTF-8' ?>";

							



	
 



	 
	 if(isset($_POST['comm']))
{



    $comm_tit=nl2br($_POST['comments_form_comments']);//here getting result from the post array after submitting the form.
    $comm_tut=  $_POST['sujet_tut'];
	
	$comm_sujet=  $_POST['id_sujet'];
	
	
 
 
        
    
	 $sql="INSERT INTO `commentraires`(`id_comm`, `contenu_comm`, `id_sujet`, `id_admin`, `id_tuteur`, `id_apprenant`) VALUES ('','commantaire','$comm_sujet','$comm_app','$comm_tut',' $comm_app')";
	//var_dump($sql);
	//exit();
	$res=mysql_query($sql);
   


}


?>



   </script>         
			
</body>
</html>
<?php

mysql_close();

?>