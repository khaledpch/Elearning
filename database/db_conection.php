<?php
/**
 * Created by PhpStorm.
 * User: Ehtesham Mehmood
 * Date: 11/21/2014
 * Time: 1:13 AM
 */


        $connection = mysql_connect('localhost', 'root', '');
        if ( ! $connection )
        die ("connection impossible");
 
        $mabasededonnee="isims";
        mysql_select_db($mabasededonnee) or die ("pas de connection"); 
         

?>