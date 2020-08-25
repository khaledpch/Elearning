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

    <title>Consulter tuteur</title>

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
                    < <li id="mail_notificatoin_bar" class="dropdown">
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
<section id="main-content" align="center">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-sm-6">
                      <section class="panel">
   <center> <h1>Liste des tuteurs</h1></center>
</div>
    
<br />
</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                               <div id="style_div" >
<form method="post">
<table width="755">
	<tr>
    	<td width="190px" style="font-size:18px; color:#006; text-indent:30px;"></td>
        <td>
        	<a href="ajout_tut.php"><input type="button" title="Add new student" name="butAdd" class="btn btn-danger" value="Ajouter tuteur" id="button-search" /></a>
        </td>
        <td >
        	<input type="text" name="searchtxt" title="Enter name for search "  style="color:red" autocomplete="off"/>
        </td>
        <td style="float:right; color:#006">
        	<input type="submit" name="btnsearch" value="Recherche" id="button-search" title="Search Student" class="btn btn-danger" />
        </td>
    </tr>
</table>
</form>
</div><!--- end of style_div -->
                          </header>
						  
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
							  <th name="id_app"><i class="icon_calendar"></i> numero</th>
                                 <th name="pseudo_app"><i class="icon_profile"></i> pseudo</th>
                                 <th><i class="icon_cogs"></i> mdp</th>
                                 <th><i class="icon_profile"></i> nom et prenom</th>
                                 <th><i class="icon_pin_alt"></i> ville</th>
                                 <th><i class="icon_mail_alt"></i> email</th>
								 <th><i class="icon_calendar"></i> date </th>
								
								   <th><i class="icon_calendar"></i> grade </th>
								 
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
							  
<?php
require("conx.php");
$key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysql_query("SELECT * FROM `tuteurs` WHERE `Nom` ='$'");
		else
		 $sql_sel=mysql_query("SELECT * FROM `tuteurs`");
	
		
       
    $i=0;
$result = mysql_query("SELECT  `id_tuteur`,`pseudo`, `pass`, 	CONCAT(`Nom`, `prenom`) as np, `ville`, `email` ,`date_naiss`, `grade` FROM `tuteurs`");
$nblignes = mysql_numrows($result);
    



                          
for ($i=0;$i<$nblignes;$i=$i+1) {
		 $user_id = mysql_result($result,$i,"id_tuteur");
	 $user_pseudo = mysql_result($result,$i,"pseudo");
	  $user_pass = mysql_result($result,$i,"pass");
	
	   $user_prenom = mysql_result($result,$i,"np");
	    $user_ville = mysql_result($result,$i,"ville");
		 $user_email= mysql_result($result,$i,"email");
		 $user_date= mysql_result($result,$i,"date_naiss");
		
		 $user_nivo= mysql_result($result,$i,"grade");
		
		   
	 echo "<tr><td>$user_id</td><td>$user_pseudo</td><td>$user_pass</td><td>$user_prenom</td><td>$user_ville</td><td>$user_email</td><td>$user_date</td><td>$user_nivo</td><td>  <div class=\"btn-group\">" ?>
                              <a class ="delete" href="delete_tut.php?id_app=<?php echo $user_id ?>"><button class="btn btn-danger" title="supprimer" ><i class="icon_close_alt2"></i></button></a>
							  <a class ="" href="moddif_tut.php?id_tut=<?php echo $user_id ?>"><button class="" title="modifier" ><i class="icon_plus_alt2"></i></a></button></a>
							  
                            <?php      "</div></td></tr>";
								  
}
mysql_close();
?>
 <!--btn btn-danger is a bootstrap button to show danger-->
 </tbody>
 </table>
 </section>
 </div>
 </div>
</div>
</body>
</html>


							   
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
//delete
$('.delete').click(function(){
 
   var response = confirm("Voulez-vous vraiment supprimer l'article?");
   /* si la réponse est non */
   if(!response)
   {
      return false; /* ANNULE LE CLICK et donc le href */
   }
 
});
  </script>

 

 </body>
</html>

