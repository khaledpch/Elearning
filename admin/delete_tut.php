<?php

include("conx.php");
$delete_id=$_GET['id_app'];
$delete_query="DELETE FROM `tuteurs` WHERE `id`='$delete_id'";//delete query
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
 require("consulter_tut.php");
?>