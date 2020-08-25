<?php
session_start();
if(empty($_SESSION['pseudo'])) 
{
  header('Location: ../index.php');
  exit();
 $id=$_GET['id_cour'];

 
}

if(isset($_POST['desc'])){
	if(!isset($_POST['iscorrect']) || $_POST['iscorrect'] == ""){
		echo "Désolé , les données importantes pour soumettre votre question est manquant . S'il vous plaît appuyez sur retour dans votre navigateur et essayer de nouveau et assurez-vous que vous sélectionnez une réponse correcte à la question.";
		exit();
	}
	if(!isset($_POST['type']) || $_POST['type'] == ""){
		echo "Désolé , il ya eu une erreur d'analyse la forme . S'il vous plaît appuyez sur retour dans votre navigateur et essayez à nouveau";
		exit();
	}
	require_once("../admin/conx.php");
	
	$question = $_POST['desc'];
	
	$answer1 = $_POST['answer1'];
	$answer2 = $_POST['answer2'];
	$answer3 = $_POST['answer3'];
	$answer4 = $_POST['answer4'];
	$type = $_POST['type'];
	$type = preg_replace('/[^a-z]/', "", $type);
	$isCorrect = preg_replace('/[^0-9a-z]/', "", $_POST['iscorrect']);
	$answer1 = strip_tags($answer1);
	$answer1 = mysql_real_escape_string($answer1);
	$answer2 = strip_tags($answer2);
	$answer2 = mysql_real_escape_string($answer2);
	$answer3 = strip_tags($answer3);
	$answer3 = mysql_real_escape_string($answer3);
	$answer4 = strip_tags($answer4);
	$answer4 = mysql_real_escape_string($answer4);
	$question = strip_tags($question);
	$question = mysql_real_escape_string($question);
	if($type == 'tf'){
	if((!$question) || (!$answer1) || (!$answer2) || (!$isCorrect)){
		echo "Désolé , Tous les champs doivent être remplis pour ajouter une nouvelle question au quiz . S'il vous plaît appuyez sur retour dans votre navigateur et essayer à nouveau.";
		exit();
		}
	}
	if($type == 'mc'){
	if((!$question) || (!$answer1) || (!$answer2) || (!$answer3) || (!$answer4) || (!$isCorrect)){
		echo "Sorry, All fields must be filled in to add a new question to the quiz. Please press back in your browser and try again.";
		exit();
		}
	}
	$sql = mysql_query("INSERT INTO questions (question, type) VALUES ('$question', '$type')")or die(mysql_error());
		$lastId = mysql_insert_id();
		mysql_query("UPDATE questions SET question_id='$lastId' WHERE id='$lastId' LIMIT 1")or die(mysql_error());
	//// Update answers based on which is correct //////////
	if($type == 'tf'){
		if($isCorrect == "answer1"){
		$sql2 = mysql_query("INSERT INTO answers (question_id, answer, correct) VALUES ('$lastId', '$answer1', '1')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct) VALUES ('$lastId', '$answer2', '0')")or die(mysql_error());
		$msg = 'Merci , votre question a été ajoutée';
	  header('location: addQuestions.php?msg='.$msg.'');
	exit();
	}
	if($isCorrect == "answer2"){
		$sql2 = mysql_query("INSERT INTO answers (question_id, answer, correct) VALUES ('$lastId', '$answer2', '1')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct) VALUES ('$lastId', '$answer1', '0')")or die(mysql_error());
		$msg = 'Merci , votre question a été ajoutée';
	  header('location: addQuestions.php?msg='.$msg.'');
	exit();
		}	
	}
	if($type == 'mc'){
		if($isCorrect == "answer1"){
		$sql2 = mysql_query("INSERT INTO answers (question_id, answer, correct) VALUES ('$lastId', '$answer1', '1')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct) VALUES ('$lastId', '$answer2', '0')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct) VALUES ('$lastId', '$answer3', '0')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct) VALUES ('$lastId', '$answer4', '0')")or die(mysql_error());
		$msg = 'Merci , votre question a été ajoutée';
	  header('location: addQuestions.php?msg='.$msg.'');
	exit();
	}
	if($isCorrect == "answer2"){
		$sql2 = mysql_query("INSERT INTO answers (question_id, answer, correct) VALUES ('$lastId', '$answer2', '1')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct) VALUES ('$lastId', '$answer1', '0')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct) VALUES ('$lastId', '$answer3', '0')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct) VALUES ('$lastId', '$answer4', '0')")or die(mysql_error());
		$msg = 'Merci , votre question a été ajoutée';
	  header('location: addQuestions.php?msg='.$msg.'');
	exit();
	}
	if($isCorrect == "answer3"){
		$sql2 = mysql_query("INSERT INTO answers (question_id, answer, correct) VALUES ('$lastId', '$answer3', '1')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct) VALUES ('$lastId', '$answer1', '0')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct) VALUES ('$lastId', '$answer2', '0')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct) VALUES ('$lastId', '$answer4', '0')")or die(mysql_error());
		$msg = 'Merci , votre question a été ajoutée';
	  header('location: addQuestions.php?msg='.$msg.'');
	exit();
	}
	if($isCorrect == "answer4"){
		$sql2 = mysql_query("INSERT INTO answers (question_id, answer, correct) VALUES ('$lastId', '$answer4', '1')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct) VALUES ('$lastId', '$answer1', '0')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct) VALUES ('$lastId', '$answer2', '0')")or die(mysql_error());
		mysql_query("INSERT INTO answers (question_id, answer, correct) VALUES ('$lastId', '$answer3', '0')")or die(mysql_error());
		$msg = 'Merci , votre question a été ajoutée';
	  header('location: addQuestions.php?msg='.$msg.'');
	exit();
		}
	}
}
?>
<?php 
$msg = "";
if(isset($_GET['msg'])){
	$msg = $_GET['msg'];
}
?>
<?php 
if(isset($_POST['reset']) && $_POST['reset'] != ""){
	$reset = preg_replace('/^[a-z]/', "", $_POST['reset']);
	require_once("../admin/conx.php");
	mysql_query("TRUNCATE TABLE questions")or die(mysql_error());
	mysql_query("TRUNCATE TABLE answers")or die(mysql_error());
	$sql1 = mysql_query("SELECT id FROM questions LIMIT 1")or die(mysql_error());
	$sql2 = mysql_query("SELECT id FROM answers LIMIT 1")or die(mysql_error());
	$numQuestions = mysql_num_rows($sql1);
	$numAnswers = mysql_num_rows($sql2);
	if($numQuestions > 0 || $numAnswers > 0){
		echo "Désolé , il y avait un problème à la réinitialisation de quiz. S'il vous plaît réessayer plus tard .";
		exit();
	}else{
		echo "Merci ! Le quiz a été réinitialisé à 0 questions.";
		exit();
	}
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Create A Quiz</title>
<script>
function showDiv(el1,el2){
	document.getElementById(el1).style.display = 'block';
	document.getElementById(el2).style.display = 'none';
}
</script>
<script>
function resetQuiz(){
	var x = new XMLHttpRequest();
			var url = "addQuestions.php";
			var vars = 'reset=yes';
			x.open("POST", url, true);
			x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			x.onreadystatechange = function() {
		if(x.readyState == 4 && x.status == 200) {
			document.getElementById("resetBtn").innerHTML = x.responseText;
			
	}
}
x.send(vars);
document.getElementById("resetBtn").innerHTML = "processing...";
	
}
</script>
<style type="text/css">
.content{
	margin-top:48px;
	margin-left:auto;
	margin-right:auto;
	width:780px;
	border:#333 1px solid;
	border-radius:12px;
	-moz-border-radius:12px;
	padding:12px;
	display:none;
}
</style>
</head>

<body>
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
	<section class="tz-banner-social">
        <div class="tz-banner-images">
            <img src="demos/Social/images-1-Social-1.jpg" alt="Images">
        </div>
        <div class="tz-social-comunity">
            <img src="demos/check-01.png" alt="Images">
            <h1><a href="#">quiz</a></h1>
            <span>ajouter un quiz</span>
        </div>
		</div>
		</section>
		<section>
   <div class="container">
        <!-- Start class tz-blog-wrapper -->
        <div class="tz-blog-wrapper-style-1">
            <div class="row">
	
   <div style="width:700px;margin-left:auto;margin-right:auto;text-align:center;">
   <p style="color:#06F;"><?php echo $msg; ?></p>
	<h2>Quel type de question aimeriez-vous créer?</h2>
    <button onClick="showDiv('tf', 'mc')">Vrai/Faux</button>&nbsp;&nbsp;<button onClick="showDiv('mc', 'tf')">Multiple Choix</button>&nbsp;&nbsp;
    <span id="resetBtn"><button onclick="resetQuiz()">remettre quiz à zero</button></span>
   </div>
  <div class="content" id="tf">
  	<h3>Vrai ou faux</h3>
    	<form action="addQuestions.php" name="addQuestion" method="post">
		
    <strong>S'il vous plaît entrez votre nouvelle question ici</strong>
    	<br />
    		<textarea id="tfDesc" name="desc" style="width:400px;height:95px;"></textarea>
    	  <br />
    	<br />
    	<strong>S'il vous plaît sélectionnez vraie ou fausse est la bonne réponse</strong>
    	<br />
            <input type="text" id="answer1" name="answer1" value="True" readonly>&nbsp;
              <label style="cursor:pointer; color:#06F;">
            <input type="radio" name="iscorrect" value="answer1">Bonne Réponse?</label>
    	  <br />
   		<br />
            <input type="text" id="answer2" name="answer2" value="False" readonly>&nbsp;
              <label style="cursor:pointer; color:#06F;">
              <input type="radio" name="iscorrect" value="answer2">Bonne Réponse?
            </label>
    	  <br />
    	<br />
    	<input type="hidden" value="tf" name="type">
    	<input type="submit" value="Ajouter">
    </form>
 </div>
 <div class="content" id="mc">
  	<h3>Multiple Choix</h3>
    <form action="addQuestions.php" name="addMcQuestion" method="post">
	
    <strong>S'il vous plaît entrez votre nouvelle question ici</strong>
        <br />
        <textarea id="mcdesc" name="desc" style="width:400px;height:95px;"></textarea>
        <br />
      <br />
    <strong>S'il vous plaît créer la première réponse à la question</strong>
    	<br />
        <input type="text" id="mcanswer1" name="answer1">&nbsp;
          <label style="cursor:pointer; color:#06F;">
          <input type="radio" name="iscorrect" value="answer1">Bonne Réponse?
        </label>
      <br />
    <br />
    <strong>S'il vous plaît créer la deuxième réponse à la question</strong>
    <br />
        <input type="text" id="mcanswer2" name="answer2">&nbsp;
          <label style="cursor:pointer; color:#06F;">
          <input type="radio" name="iscorrect" value="answer2">Bonne Réponse?
        </label>
      <br />
    <br />
    <strong>S'il vous plaît créer la troisième réponse à la question</strong>
    <br />
        <input type="text" id="mcanswer3" name="answer3">&nbsp;
          <label style="cursor:pointer; color:#06F;">
          <input type="radio" name="iscorrect" value="answer3">Bonne Réponse?
        </label>
      <br />
    <br />
    <strong>S'il vous plaît créer la quatrième réponse à la question</strong>
    <br />
        <input type="text" id="mcanswer4" name="answer4">&nbsp;
          <label style="cursor:pointer; color:#06F;">
          <input type="radio" name="iscorrect" value="answer4">Bonne Réponse?
        </label>
      <br />
    <br />
    <input type="hidden" value="mc" name="type">
    <input type="submit" value="Ajouter ">
    </form>
 </div>
 </div>
 </div>
 </div>
 </section>
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