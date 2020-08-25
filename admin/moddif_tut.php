<?php
include("conx.php");
session_start();
$pseudo_tut=$_SESSION['pseudo'];
$sql=("SELECT   `id_admin` FROM  `admins` WHERE `pseudo`='$pseudo_tut'");
	   $req=mysql_query($sql)or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	   $data = mysql_fetch_array($req);
	   mysql_free_result ($req);
	   $id=$data['id_admin'];
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Karmanta - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Karmanta, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Modifier apprenants</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">

    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
      <div class="alert alert-block alert-danger fade in karmanta-pro">
          <button data-dismiss="alert" class="close close-sm" type="button">
              <i class="icon-remove"></i>
          </button>
          <h3><strong></strong>  <a href="http://dmartify.com/live-preview/?theme_id=10631" target="_blank"></a>   <a href="http://dmartify.com/downloads/karmanta-bootstrap-3-responsive-admin-template/" target="_blank"></a></h3> 
      </div>
      <div class="alert alert-block alert-danger fade in karmanta-pro">
          <button data-dismiss="alert" class="close close-sm" type="button">
              <i class="icon-remove"></i>
          </button>
          <h3><strong></strong>  <a href="http://dmartify.com/live-preview/?theme_id=10631" target="_blank"></a> <a href="http://dmartify.com/downloads/karmanta-bootstrap-3-responsive-admin-template/" target="_blank"></a></h3> 
      </div>
      <header class="header white-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
            </div>

            <!--logo start-->
            <a href="index.php" class="logo">isims<span>  E-</span> <span class="lite">Learning</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
               
                <!--  search form end -->                
            </div>

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                    <!-- task notificatoin start -->
                   
                    <!-- task notificatoin end -->
                    <!-- inbox notificatoin start-->
                     <li id="mail_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-l"></i>
							<?php	$result = mysql_query("SELECT `id_msg`, `contenu`, `from`, `to`,`date`, `temp` FROM `messages`  WHERE `to`='$id' GROUP BY `from`  ORDER BY `id_msg` ASC  ");
$nblignes = mysql_numrows($result);
    



                          
for ($i=0;$i<$nblignes;$i=$i+1) {
$msg_id = mysql_result($result,$i,"id_msg");
	
	  
	
	   $msg_date= mysql_result($result,$i,"date");
	    $msg_contenu = mysql_result($result,$i,"contenu");
		    $msg_from = mysql_result($result,$i,"from");
			    $msg_to = mysql_result($result,$i,"to");
		
		$msg_time= mysql_result($result,$i,"temp");
		
		 ?>
							<?php
			$sql = "SELECT COUNT(*) as nb FROM `messages` WHERE `to`='$id' ";
$req = mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error());
$row = mysql_fetch_assoc($req);
$nombre = $row['nb'];
			?>
                            <span class="badge bg-important"><?php echo $nombre; ?></span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">You have 1 new messages</p>
                            </li>
                            <li>
                                <a href="forum/message.php?id_msg=<?php echo $msg_id?>">
							
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
                                    <span class="photo"><img alt="avatar" src="forum/<?php echo$dat['photo'];?><?php echo$dat1['photo'];?><?php echo$dat2['photo'];?>" height="50" width="50"></span>
                                    <span class="subject">
									
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
                                    <span class="from"><?php echo $dat['np']; ?><?php echo $dat1['np']; ?><?php echo $dat2['np']; ?></span>
                                    <span class="time"><?php echo $msg_date?></span>
								
                                    </span>
                                    <span class="message">
                                        <?php echo  $msg_contenu; ?>
                                    </span>
                                </a>
                            </li>
                           
                            <li>
                                <a href="#">voir tous messages</a>
                            </li>
                        </ul>
                    </li>
					<?php
					}
					?>
                    <!-- inbox notificatoin end -->
                    <!-- alert notification start-->
                   
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                            <span class="username"><?php echo  $_SESSION['pseudo']  ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="forum/profile_admin.php"><i class="icon_profile"></i> Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_mail_alt"></i> Message </a>
                            </li>
                            
                           
                            <li>
                                <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Accueil</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>salle</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="general.html">General</a></li>
                          <li><a class="" href="buttons.html">Buttons</a></li>
                          <li><a class="" href="grids.html">Grids</a></li>
                      </ul>
                  </li>
                 
                  
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Forum</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="forum/ajout_sujet.php">ajouter sujet</a></li>                          
                          <li><a class="" href="forum/forum.php">forum</a></li>
                      </ul>
                  </li>                  
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>utilisateur</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="consulter_app.php">gere apprenant</a></li>
                      
                          <li><a class="" href="consulter_tut.php">gere tuteur</a></li>
                      </ul>
					  
                  </li>
                  
                 
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
	  
	  <section id="main-content">
          <section class="wrapper">
              <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">


	 <div class="row" >
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                            <h1> Modifier tuteur</h1>
                          </header>
                          <div class="panel-body">
						  	  	<?php

 if(isset($_GET['id_tut'])or isset($_GET['modif'])) {
 include("conx.php");
$idd=$_GET['id_tut'];

$result=mysql_query("SELECT * FROM `tuteurs` WHERE `id_tuteur`= '$idd'");//delete query
$nblignes = mysql_numrows($result);
//echo "SELECT * FROM ` apprenants` WHERE `id`= '$id'";
//var_dump($result);
//exit;
for ($i=0;$i<$nblignes;$i=$i+1) {
		 $user_id = mysql_result($result,$i,"id_tuteur");
	 $user_pseudop = mysql_result($result,$i,"pseudo");
	  $user_passp = mysql_result($result,$i,"pass");
	   $user_nomp = mysql_result($result,$i,"nom");
	   $user_prenomp = mysql_result($result,$i,"prenom");
	   
	    $user_villep = mysql_result($result,$i,"ville");
		 $user_emailp= mysql_result($result,$i,"email");
		 $user_datep= mysql_result($result,$i,"date_naiss");
		  $user_telp= mysql_result($result,$i,"tel");
		    $user_sexep= mysql_result($result,$i,"sexe");
		
		 $user_nivop= mysql_result($result,$i,"grade");
		 if (isset($_GET['pseudo']) && isset($_GET['mdp']) && isset($_GET['nom_app'])&& isset($_GET['prenom_app'])&& isset($_GET['ville_app'])&& isset($_GET['email_app']) && isset($_GET['date_app'])&& isset($_GET['tel_app'])&& isset($_GET['nivo_app'])&& isset($_GET['sexe_app']) ){
		$user_pseudop=$_GET['pseudo'];
		$user_passp=$_GET['mdp'];
		$user_nomp=$_GET['nom_app'];
		$user_prenomp=$_GET['prenom_app'];
		 $user_villep = $_GET['ville_app'];
		 $user_emailp= $_GET['email_app'];
		 $user_datep= $_GET['date_app'];
		  $user_telp= $_GET['nivo_app'];
		    $user_sexep= $_GET['sexe_app'];
		
		
		
	 
		// lancement de la requête
		$sql = ("UPDATE `tuteurs` SET `pseudo`='$user_pseudop',`pass`='$user_passp',`Nom`='$user_nomp',`prenom`='$user_prenomp',`ville`='$user_villep',`email`='$user_emailp',`date_naiss`='$user_datep',`tel`='$user_telp',`grade`='$user_nivop',`sexe`='$user_sexep'  WHERE `id_tuteur`='$id' ");
		

		// on exécute la requête (mysql_query) et on affiche un message au cas où la requête ne se passait pas bien (or die)
		$res=mysql_query($sql);
//		exit;

		// un petit message permettant de se rendre compte de la modification effectuée
		 if($res)
    		{
//javascript function to open in the same window
    echo "<script>alert('l\'tuteur est modifier  avec succèe')</script>";
	
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
	

                              <div class="form"  >
                                   <form class="form-validate form-horizontal " id="register_form" method="get" action="Moddif_app.php"">
                                      <div class="form-group ">
                                          <label for="fullname" class="control-label col-lg-2">Pseudo <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="fullname" name="pseudo" type="text" value = "<?php echo $user_pseudop; ?>"/>
                                          </div>
                                      </div>
									  <input type="hidden" name="id_app" value="<?php echo $idd;?>">
                                      <div class="form-group ">
                                          <label for="address" class="control-label col-lg-2">Mot de pass <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="address" name="mdp" type="password" value = "<?php echo $user_passp; ?>"  />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Nom <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="username" name="nom app" type="text" value = "<?php echo $user_nomp; ?>" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="password" class="control-label col-lg-2">Prenom <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="password" name="prenom_app" type="text" value = "<?php echo $user_prenomp; ?>" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="confirm_password" class="control-label col-lg-2">Ville <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="confirm_password" name="ville_app" type="text" value = "<?php echo $user_villep; ?>"/>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="email" name="email_app" type="email"value = "<?php echo $user_emailp; ?>" />
                                          </div>
                                      </div>
									     <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Date de naissance<span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="username" name="date_app" type="date" value = "<?php echo $user_datep; ?>" />
                                          </div>
										  </div>
										     <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">tel<span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="username" name="tel_app" type="text" value = "<?php echo $user_telp; ?>" />
                                          </div>
										  </div>
										     <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">niveau apprenant<span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="username" name="nivo_app" type="text" value = "<?php echo $user_nivop; ?>" />
                                          </div> 
										  </div>
                                      <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">sexe<span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="username" name="sexe_app" type="text" value = "<?php echo $user_sexep; ?>" />
                                          </div>
                                      </div>
									   <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <input class="btn btn-primary" type="submit"   value="Modifier" name="modif">
                                              <button class="btn btn-default" type="button">Annuler</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
	  
   

	  
	  <script src="js/jquery.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js" ></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>

  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>

 