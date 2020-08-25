<?php
session_start();
if(empty($_SESSION['pseudo'])) 
{
  header('Location: ../index.php');
  exit();
 $id=$_GET['id_cour'];

 
}

if(isset($_GET['question'])){
	$question = preg_replace('/[^0-9]/', "", $_GET['question']);
	$next = $question + 1;
	$prev = $question - 1;
	if(!isset($_SESSION['qid_array']) && $question != 1){
		$msg = "Désolé , la tricherie est pas autorisé.";
		header("location: index.php?msg=$msg");
		exit();
	}
	if(isset($_SESSION['qid_array']) && in_array($question, $_SESSION['qid_array'])){
		$msg = "Désolé , la tricherie est pas autorisé . Vous allez maintenant devoir tout recommencer . Haha ";
		unset($_SESSION['answer_array']);
		unset($_SESSION['qid_array']);
		
		header("location: index.php?msg=$msg");
		exit();
	}
	if(isset($_SESSION['lastQuestion']) && $_SESSION['lastQuestion'] != $prev){
		$msg = "Désolé , la tricherie est pas autorisé . Vous allez maintenant devoir tout recommencer . Haha ";
		unset($_SESSION['answer_array']);
		unset($_SESSION['qid_array']);
		
		header("location: index.php?msg=$msg");
		exit();
	}
}
?>
<!DOCTYPE html>
<html>
<body>
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
	
		<script>
function countDown(secs,elem) {
	var element = document.getElementById(elem);
	element.innerHTML = "vous avez "+secs+" secondes restantes.";
	if(secs < 1) {
		var xhr = new XMLHttpRequest();
		var url = "userAnswers.php";
			var vars = "radio=0"+"&qid="+<?php echo $question; ?>;
			xhr.open("POST", url, true);
			xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhr.onreadystatechange = function() {
		if(xhr.readyState == 4 && xhr.status == 200) {
			alert("Vous n'avez  pas répondez à la question dans le temps accordé . Il sera marqué comme incorrect.");
			clearTimeout(timer);
	}
}
xhr.send(vars);
		document.getElementById('counter_status').innerHTML = "";
		document.getElementById('btnSpan').innerHTML = '<h2>Times Up!</h2>';
		document.getElementById('btnSpan').innerHTML += '<a href="quiz.php?question=<?php echo $next; ?>">Cliquez ici maintenant</a>';
		
	}
	secs--;
	var timer = setTimeout('countDown('+secs+',"'+elem+'")',1000);
}
</script>
<script>
function getQuestion(){
	var hr = new XMLHttpRequest();
		hr.onreadystatechange = function(){
		if (hr.readyState==4 && hr.status==200){
			var response = hr.responseText.split("|");
			if(response[0] == "finished"){
				document.getElementById('status').innerHTML = response[1];
			}
			var nums = hr.responseText.split(",");
			document.getElementById('question').innerHTML = nums[0];
			document.getElementById('answers').innerHTML = nums[1];
			document.getElementById('answers').innerHTML += nums[2];
		}
	}
hr.open("GET", "questions.php?question=" + <?php echo $question; ?>, true);
  hr.send();
}
function x() {
		var rads = document.getElementsByName("rads");
		for ( var i = 0; i < rads.length; i++ ) {
		if ( rads[i].checked ){
		var val = rads[i].value;
		return val;
		}
	}
}
function post_answer(){
	var p = new XMLHttpRequest();
			var id = document.getElementById('qid').value;
			var url = "userAnswers.php";
			var vars = "qid="+id+"&radio="+x();
			p.open("POST", url, true);
			p.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			p.onreadystatechange = function() {
		if(p.readyState == 4 && p.status == 200) {
			document.getElementById("status").innerHTML = '';
			alert("Merci , Votre réponse a été soumis"+ p.responseText);
			var url = 'quiz.php?question=<?php echo $next; ?>';
			window.location = url;
	}
}
p.send(vars);
document.getElementById("status").innerHTML = "processing...";
	
}
</script>
<script>
window.oncontextmenu = function(){
	return false;
}
</script>
</head>

<body onLoad="getQuestion()" align="center">
<div id="status">
<div id="counter_status"></div>
<div id="question"></div>
<div id="answers"></div>
</div>
<script type="text/javascript">countDown(20,"counter_status");</script>
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