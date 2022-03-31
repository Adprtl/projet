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
    <title>Création Etudiant</title>
</head>

<body>
    <header class="container-fluid main-navbar">
       <?php
         include "header.php"
         
       ?>
    </header>
    <main>
        <div id="signup" class="signup">
     
            <form action="registermodifetudiant.php" method="POST">
                <h2>Création Etudiant</h2>
                
                   <?php
                       
                       include "connexionbdd.php";
                           $requetePromotion = "SELECT * FROM utilisateur  where ID_Utilisateur = ".$_POST['modifCompte'];
                           $reponsePromotion = $pdo->query($requetePromotion);
                           $affichePromotion = $reponsePromotion->fetchAll();
                       ?> 
                          
                <label for="pseudo">Identifiant </label><br>
                <input type="text" id="pseudo" name="pseudoname" class="txtinput" placeholder="Entre ton Identifiant" value ="<?php echo $affichePromotion[0]["Identifiant"] ?>" autofocus />
                <br>
                <label for="nom">Nom  </label><br>
                <input type="text" id="nom" name="nomname" class="txtinput" placeholder="Entre ton nom" value ="<?php echo $affichePromotion[0]["Nom"] ?>" autofocus />
                <br>
                <label for="prenom">Prenom </label><br>
                <input type="text" id="prenom" name="prenomname" class="txtinput" placeholder="Entre ton prenom" value ="<?php echo $affichePromotion[0]["Prenom"] ?>" autofocus />
                <br>
                <label for="email">Email</label><br>
                <input  class="txtinput" type="email" id="email" name="emailname" placeholder="Email" value ="<?php echo $affichePromotion[0]["Mail"] ?>"/>
               
            
                <div class="passlab"><label for="pass">Mot de passe *</label><span class="passinfo">Majuscules, Minuscules, Nombres, Caractères spéciales</span><br></div>
                <input class="txtinput" type="password" id="pass" name="passname" placeholder="........" value ="<?php echo $affichePromotion[0]["Password"] ?>"/>

               
                <br>
                <label for="conirfmpass">Confirmation mot de passe</label><br>
                <input class="txtinput" type="password" id="conirfmpass" name="confirmpassname" placeholder="........" value ="<?php echo $affichePromotion[0]["Password"] ?>"/><br>
                                

                
                <br>
                
                <button type="submit" class="submitbtn" id="valider" placeholder="SIGN UP"  name = "idname" value=<?php echo $_POST['modifCompte'];?>>Envoyer</button>
            </form>
        </div>

    </main>

</body>

</html>

