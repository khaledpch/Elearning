<?php
include("conx.php");
session_start();



                        

		
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

    <title>Administrateur</title>

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
                            <span class="badge bg-important">1</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">You have 1 new messages</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="./img/avatar-mini.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Greg  Martin</span>
                                    <span class="time">1 min</span>
                                    </span>
                                    <span class="message">
                                        I really like this admin panel.
                                    </span>
                                </a>
                            </li>
                           
                            <li>
                                <a href="#">See all messages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox notificatoin end -->
                    <!-- alert notification start-->
                   
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                            <span class="username"><?php echo  $_SESSION['pseudo']  ?> </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="profile.html"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_clock_alt"></i> Timeline</a>
                            </li>
                           
                            <li>
                                <a href="../index.php"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                            <li>
                                <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
                            </li>
                            <li>
                                <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
                            </li>
                        </ul>
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
                          <li><a class="" href="form_component.html">Form Components</a></li>                          
                          <li><a class="" href="form_validation.html">Form Validation</a></li>
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
                  
                  
              <!-- sidebar menu end-->
          </div>
      </aside>

    
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <div class="row">
                <!-- profile-widget -->
                <div class="col-lg-12">
                    <div class="profile-widget profile-widget-info">
                          <div class="panel-body">
                            <div class="col-lg-2 col-sm-2">

                              <h4><?php echo  $_SESSION['pseudo']  ?></h4>               
                              <div class="follow-ava">
                                  <img src="img/profile-widget-avatar.jpg" alt="">
                              </div>
                              <h6>Administrator</h6>
                            </div>
                            <div class="col-lg-4 col-sm-4 follow-info">
                                <p>Hello I’m John Smith, a leading expert in interactive and creative design.</p>
                                <p>@johnsmith</p>
                                <h6>
                                    <span><i class="icon_clock_alt"></i>11:05 AM</span>
                                    <span><i class="icon_calendar"></i>25.10.13</span>
                                    <span><i class="icon_pin_alt"></i>NY</span>
                                </h6>
                            </div>
                            <div class="col-lg-6 col-sm-6 follow-info weather-category">
                                      <ul>
                                          <li class="active">
                                              <h4>50</h4>
                                              <i class="icon_close_alt2"></i> Pending Task
                                          </li>
                                          <li>
                                              <h4>550</h4>
                                              <i class="icon_check_alt2"></i> Completed
                                          </li>
                                          <li>
                                              <h4>600</h4>
                                              <i class="icon_plus_alt2"></i> Total Task
                                          </li>
                                      </ul>
                            </div>
                          </div>
                    </div>
                </div>
              </div>
              <!-- page start-->
              <div class="row">
                 <div class="col-lg-12">
                    <section class="panel">
                          <header class="panel-heading tab-bg-info">
                              <ul class="nav nav-tabs">
                                  <li class="active">
                                      <a data-toggle="tab" href="#recent-activity">
                                          <i class="icon-home"></i>
                                          Recent Activity
                                      </a>
                                  </li>
                                  <li>
                                      <a data-toggle="tab" href="#profile">
                                          <i class="icon-user"></i>
                                          Profile
                                      </a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#edit-profile">
                                          <i class="icon-envelope"></i>
                                          Edit Profile
                                      </a>
                                  </li>
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  <div id="recent-activity" class="tab-pane active">
                                      <div class="profile-activity">                                          
                                          <div class="act-time">                                      
                                              <div class="activity-body act-in">
                                                  <span class="arrow"></span>
                                                  <div class="text">
                                                      <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                                                      <p class="attribution"><a href="#">Edgar Parks</a> at 4:25pm, 30th Octmber 2013</p>
                                                      <p>An Awesome Piece of Cake For You Guys!</p>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="act-time">                                      
                                              <div class="activity-body act-in">
                                                  <span class="arrow"></span>
                                                  <div class="text">
                                                      <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                                                      <p class="attribution"><a href="#">Judi Mcginnis</a> at 5:25am, 30th Octmber 2013</p>
                                                      <p>Knowledge speaks, but wisdom listens.</p>                                                      
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="act-time">                                      
                                              <div class="activity-body act-in">
                                                  <span class="arrow"></span>
                                                  <div class="text">
                                                      <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                                                      <p class="attribution"><a href="#">Jewell Clark</a> at 5:25am, 30th Octmber 2013</p>
                                                      <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="act-time">                                      
                                              <div class="activity-body act-in">
                                                  <span class="arrow"></span>
                                                  <div class="text">
                                                      <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                                                      <p class="attribution"><a href="#">Lorena Rose</a> at 5:25am, 30th Octmber 2013</p>
                                                      <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="act-time">                                      
                                              <div class="activity-body act-in">
                                                  <span class="arrow"></span>
                                                  <div class="text">
                                                      <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                                                      <p class="attribution"><a href="#">Brandy Childress</a> at 5:25am, 30th Octmber 2013</p>
                                                      <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="act-time">                                      
                                              <div class="activity-body act-in">
                                                  <span class="arrow"></span>
                                                  <div class="text">
                                                      <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                                                      <p class="attribution"><a href="#">Judi Mcginnis</a> at 5:25am, 30th Octmber 2013</p>
                                                      <p>Knowledge speaks, but wisdom listens.</p>                                                      
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="act-time">                                      
                                              <div class="activity-body act-in">
                                                  <span class="arrow"></span>
                                                  <div class="text">
                                                      <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                                                      <p class="attribution"><a href="#">Jewell Clark</a> at 5:25am, 30th Octmber 2013</p>
                                                      <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="act-time">                                      
                                              <div class="activity-body act-in">
                                                  <span class="arrow"></span>
                                                  <div class="text">
                                                      <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                                                      <p class="attribution"><a href="#">Lorena Rose</a> at 5:25am, 30th Octmber 2013</p>
                                                      <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="act-time">                                      
                                              <div class="activity-body act-in">
                                                  <span class="arrow"></span>
                                                  <div class="text">
                                                      <a href="#" class="activity-img"><img class="avatar" src="img/chat-avatar.jpg" alt=""></a>
                                                      <p class="attribution"><a href="#">Brandy Childress</a> at 5:25am, 30th Octmber 2013</p>
                                                      <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
                                                  </div>
                                              </div>
                                          </div>

                                      </div>
                                  </div>
                                  <!-- profile -->
                                  <div id="profile" class="tab-pane">
                                    <section class="panel">
                                      <div class="bio-graph-heading">
                                               
                                      </div>

                                      <div class="panel-body bio-graph-info">
                                      <h1>Bio Graph</h1>
										  										  
                                          <div class="row">
	 
										  <div class="bio-row">
										  <?php
										  
;

		 $sql = 'SELECT `id`, `pseudo`, `nom`,`prenom`, `email`, `ville`, `date_naiss`, `tel`, `pass` FROM `admins` where pseudo="khaled"';
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

// on fait une boucle qui va faire un tour pour chaque enregistrement 
while($data = mysql_fetch_assoc($req)) 
    


{
 ?> 
    

                                               <p><span>Nom </span>: <?php echo $data['nom']?> </p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Prénom </span>:<?php echo $data['prenom']?> </p>
                                              </div>                                              
                                              <div class="bio-row">
                                                  <p><span>date de naissance</span>:<?php echo $data['date_naiss']?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Ville </span>:<?php echo $data['ville']?></p>
                                              </div>
                                              
                                              <div class="bio-row">
                                                  <p><span>Email </span>:<?php echo $data['email']?> </p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Telephone </span>:<?php echo $data['tel']?> </p>
                                              </div>
                                              
 <?php

}
mysql_close();
?>
                                          </div>
                                      </div>
                                    </section>


                                      
                                  </div>
                                  <!-- edit-profile -->
                                  <div id="edit-profile" class="tab-pane">
                                    <section class="panel">                                          
                                          <div class="panel-body bio-graph-info">
                                              <h1> Profile Info</h1>
                                              <form class="form-horizontal" role="form">                                                  
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">First Name</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="f-name" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Last Name</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="l-name" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">About Me</label>
                                                      <div class="col-lg-10">
                                                          <textarea name="" id="" class="form-control" cols="30" rows="5"></textarea>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Country</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="c-name" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Birthday</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="b-day" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Occupation</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="occupation" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Email</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="email" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Mobile</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="mobile" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Website URL</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="url" placeholder="http://www.demowebsite.com ">
                                                      </div>
                                                  </div>

                                                  <div class="form-group">
                                                      <div class="col-lg-offset-2 col-lg-10">
                                                          <button type="submit" class="btn btn-primary">Save</button>
                                                          <button type="button" class="btn btn-danger">Cancel</button>
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>
                                      </section>
                                  </div>
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
  <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- jquery knob -->
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>

  <script>

      //knob
      $(".knob").knob();

  </script>


  </body>
</html>

											  