

<?php
session_start();
if(empty($_SESSION['pseudo'])) 
{
  header('Location: ../index.php');
  exit();
 $id=$_GET['id_cour'];

 
}

if(isset($_POST['radio']) && $_POST['radio'] != ""){
	$answer = preg_replace('/[^0-9]/', "", $_POST['radio']);
	if(!isset($_SESSION['answer_array']) || count($_SESSION['answer_array']) < 1){
		$_SESSION['answer_array'] = array($answer);
	}else{
		array_push($_SESSION['answer_array'], $answer);
	}
	
}
if(isset($_POST['qid']) && $_POST['qid'] != ""){
	$qid = preg_replace('/[^0-9]/', "", $_POST['qid']);
	if(!isset($_SESSION['qid_array']) || count($_SESSION['qid_array']) < 1){
		$_SESSION['qid_array'] = array($qid);
	}else{
		array_push($_SESSION['qid_array'], $qid);
	}
	$_SESSION['lastQuestion'] = $qid;
}
?>
<?php
require_once("scripts/connect_db.php");
$response = ""; 
	if(!isset($_SESSION['answer_array']) || count($_SESSION['answer_array']) < 1){
		$response = "Vous n'êtes pas encore répondu à toutes les questions";
		echo $response;
	exit();
}else{
		$countCheck = mysql_query("SELECT id FROM questions")or die(mysql_error());
		$count = mysql_num_rows($countCheck);
		$numCorrect = 0;
		foreach($_SESSION['answer_array'] as $current){
			if($current == 1){
				$numCorrect++;
			}
		}
		$percent = $numCorrect / $count * 100;
		$percent = intval($percent);
	if(isset($_POST['complete']) && $_POST['complete'] == "true"){
		if(!isset($_POST['username']) || $_POST['username'] == ""){
			echo "Désolé , nous avons eu une erreur";
			exit();
		}
		$username = $_POST['username'];
		$username = mysql_real_escape_string($username);
		$username = strip_tags($username);
	if(!in_array("1", $_SESSION['answer_array'])){
		$sql = mysql_query("INSERT INTO quiz_takers (username, percentage, date_time) 
		VALUES ('$username', '0', now())")or die(mysql_error());
		echo "Avez-vous encore lire les questions? votre score est $percent%";
		echo"<p><button><a href =\"Home-01.php\">fin du guiz</a></button></p>";
		unset($_SESSION['answer_array']);
		unset($_SESSION['qid_array']);
		
		exit();
	}
	$sql = mysql_query("INSERT INTO quiz_takers (username, percentage, date_time) 
	VALUES ('$username', '$percent', now())")or die(mysql_error());
		echo "Merci d'avoir pris le quiz! votre score est $percent%";
			echo"<p><button><a href =\"Home-01.php\">fin du guiz</a></button></p>";
		unset($_SESSION['answer_array']);
		unset($_SESSION['qid_array']);
		
		exit();
	}
}
?>