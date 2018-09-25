<?php
try{

    $bdd = new PDO('mysql:host=localhost;dbname=espace_membres;charset=utf8', 'root', 'yeswewebPaul');
}

catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

?>
