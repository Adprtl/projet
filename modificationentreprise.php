<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet">
    <link href="signup.css" rel="stylesheet">
    <title>Création Entreprise</title>
</head>

<body>
    <header class="container-fluid main-navbar">
       <?php
          include "header.php"
       ?>
    </header>
    <main>
        <div id="signup" class="signup">

            <form action="registerentreprise.php" method="POST">
                <h2>Création Entreprise</h2>
                <label for="nom">Nom Entreprise</label><br>
                <input type="text" id="nom" name="nomname" class="txtinput" placeholder="Entre ton nom" autofocus />
                <br>
                <label for="email">Email</label><br>
                <input  class="txtinput" type="email" id="email" name="emailname" placeholder="Email" />
                <br>
                <label for="secteur">Secteur d'activité </label><br>
                <input type="text" id="secteur" name="secteurname" class="txtinput" placeholder="Secteur d'activité" autofocus />
                <br>
                <label for="stagiaire">Stagiaire accepté </label><br>
                <input type="number" min="0" id="stagiaire" name="stagiairename" class="txtinput" placeholder="Nombre accepté" autofocus />

            
                <br>
                <br>
                <label for="visibilite">Invisible étudiant</label><br>
                <input type="checkbox"  id="visibilite" name="visibilitename" class="txtinput"  autofocus />
                <br>
                
                <input type="submit" class="submitbtn" id="valider" placeholder="SIGN UP" disabled="" value = "Envoyer" ; />
            </form>
        </div>

    </main>

</body>

</html>
