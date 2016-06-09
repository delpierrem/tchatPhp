<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mini-chat</title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    </head>
    <body>
        <ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="#">Home</a></li>
  <li role="presentation"><a href="#">Profile</a></li>
  <li role="presentation"><a href="#">Messages</a></li>
</ul>
<h1 class="text-center">Le T'chat</h1>

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
?>
<?php

echo '  <div class="col-md-6 col-md-offset-3"><ul class="list-group">';
?>
<?php

// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT users, message, DATE_FORMAT(date, \'%d/%m/%Y %Hh%imin%ss\') AS date FROM chat ORDER BY ID DESC LIMIT 0, 7');
// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
    echo '<li class="list-group-item"><strong>'."<span class=\"input-group-addon\">" . htmlspecialchars($donnees['users']) ."</span></strong>" . htmlspecialchars($donnees['message']). '</li>';
}
?>

<?php
echo '</ul> </div>';
?>
<div class="col-md-6 col-md-offset-3">
    <form action="minichat_post.php" method="post">
        <p>
          <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Votre pseudo &nbsp</span>
        <input type="text" class="form-control" placeholder="Username" name="users" id="pseudo" aria-describedby="basic-addon1">
      </div>

      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Votre message</span>
        <input type="text" class="form-control" name="message" id="message" placeholder="Message" aria-describedby="basic-addon2">
      </br>

      </div>
    </br>

        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Envoyer" />
    </p>
    </form>

    </div>


    </body>
</html>
