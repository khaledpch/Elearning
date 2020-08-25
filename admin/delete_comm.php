

<?php

include("../conx.php");
$delete_id=$_GET['id_comm'];
$delete_query="DELETE FROM `commentraires` WHERE `id_comm`='$delete_id'";//delete query
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
 header("location: ajoutcomm.php?id_sujet=");
?>