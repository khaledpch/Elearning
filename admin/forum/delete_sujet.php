
<?php

include("../conx.php");
$delete_id=$_GET['id_sujet'];
$delete_query="DELETE FROM `sujets` WHERE `id_sujet`='$delete_id'";//delete query
$run=mysql_query($delete_query);
if(isset($run))
{
//javascript function to open in the same window
    echo "<script>alert('La suppression  avec succèe')</script>";
	
}
 else
  {
   echo "<script>alert('La suppression  echoué')</script>"; 
   }
 header("location: forum.php");
?>