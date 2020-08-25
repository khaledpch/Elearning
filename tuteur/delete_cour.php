

<?php

include("../admin/conx.php");
$delete_id=$_GET['id_cour'];
$delete_query="DELETE FROM `cours` WHERE `id_cour`='$delete_id'";//delete query
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
 header("location: Courses-Grid.php");
?>