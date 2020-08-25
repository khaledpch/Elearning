<?php
class clientsManager{
	
	function DBConnect(){
try{
//$host="mysql:host=localhost;port=8080;dbname=sitecom";
$host="mysql:host=localhost;dbname=isims";
$user="root";
$password="";
$c = new PDO($host,$user,$password);
return $c;
}
catch(Exception $e){
	echo "Erreur: ".$e->getMessage();
	return -1;
}
}
public function authentification($c,$p){
		$login=$p["login"];
		$password=md5($p["pass"]);
		$sql="select * from admins where pseudo='$login' and pass='$password'";
		$req=$c->query($sql);
		if($req->rowCount()==0){
        return"false";
   
		}
		else
		{
			$row = $req->fetch(PDO::FETCH_ASSOC);
			return $_SESSION["admins"]=$row["id"];
		
		}
		}
			}
?>