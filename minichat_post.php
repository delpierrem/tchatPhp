<?php

// Connexion à la base de données

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'pcw123');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO chat (users, message, date) VALUES(?, ?, NOW())');
$req->execute(array($_POST['users'], $_POST['message']));

// Redirection du visiteur vers la page du minichat
header('Location: index.php');
?>
