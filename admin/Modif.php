<?php
include("conx.php");

if($_GET['id_app']) {
		
		$user_login = $_GET['pseudo'];
		$user_pass = $_GET['mdp'];
	    $user_name=$_GET['nom_app'];
	$user_prenom=$_GET['prenom_app'];
    $user_ville=$_GET['ville_app'];
	$user_email=$_GET['email_app'];
	$user_date=$_GET['date_app'];
	$user_tel=$_GET['tel_app'];
	$user_nivo=$_GET['nivo_app'];
	 $user_sexe=$_GET['sexe_app'];//same
}
if (isset($_POST['pseudo']) && isset($_POST['mdp']) && isset($_POST['nom_app'])&& isset($_POST['prenom_app'])&& isset($_POST['ville_app'])&& isset($_POST['email_app']) && isset($_POST['date_app'])&& isset($_POST['tel_app'])&& isset($_POST['nivo_app'])&& isset($_POST['sexe_app']) ){
		
		
		
	 
		// lancement de la requête
		$sql = ('UPDATE ` apprenants` SET `pseudo`=[$user_pseudo],`password`=[$user_pass],`Nom`=[$user_name],`prenom`=[$user_prenom],`ville`=[$user_ville],`email`=[$user_email],`date_naiss`=[$user_date],`tel`=[$user_tel],`niveau_app`=[$user_nivo],`sexe`=[$user_sexe] ');

		// on exécute la requête (mysql_query) et on affiche un message au cas où la requête ne se passait pas bien (or die)
		$res=mysql_query($sql);


		// un petit message permettant de se rendre compte de la modification effectuée
		 if(isset($res))
    		{
//javascript function to open in the same window
    echo "<script>alert('l'apprenat est modifier  avec succèe')</script>";
	
}
 else
  {
   echo "<script>alert(' Modification echoué')</script>"; 
   }
   
 require("consulter_app.php");
 
 }
?>