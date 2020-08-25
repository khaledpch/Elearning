<?php

// Connexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=isims', 'root', '');

// Configuration facultative de la connexion
$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER); // les noms de champs seront en caractères minuscules
$db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION); // les erreurs lanceront des exceptions

?>