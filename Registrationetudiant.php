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

            <form action="registeretudiant.php" method="POST">
                <h2>Création Etudiant</h2>
                <label for="pseudo">Identifiant </label><br>
                <input type="text" id="pseudo" name="pseudoname" class="txtinput" placeholder="Entre ton Identifiant" autofocus />
                <br>
                <label for="nom">Nom  </label><br>
                <input type="text" id="nom" name="nomname" class="txtinput" placeholder="Entre ton nom" autofocus />
                <br>
                <label for="prenom">Prenom ? </label><br>
                <input type="text" id="prenom" name="prenomname" class="txtinput" placeholder="Entre ton prenom" autofocus />
                <br>
                <label for="email">Email</label><br>
                <input onblur="mailv(),buttona();" class="txtinput" type="email" id="email" name="emailname" placeholder="Email" />
                <span class="error" id="errormail"></span></br>
            
                <div class="passlab"><label for="pass">Mot de passe *</label><span class="passinfo">Majuscules, Minuscules, Nombres, Caractères spéciales</span><br></div>
                <input onblur="passv(),buttona();" class="txtinput" type="password" id="pass" name="passname" placeholder="........" />

                <span class="error" id="errorpass"></span></br>
                <br>
                <label for="conirfmpass">Confirmation mot de passe</label><br>
                <input onblur="cpassv(),buttona();" class="txtinput" type="password" id="conirfmpass" name="confirmpassname" placeholder="........" /><br>

                                <select name="selectCentre">
                        <option value="Aucune">centre</option>
                        <?php
                        include "connexionbdd.php";
                            $requeteCentre = "SELECT * FROM centre";
                            $reponseCentre = $pdo->query($requeteCentre);
                            $afficheCentre= $reponseCentre->fetchAll();
                            foreach($afficheCentre as $aE){
                                echo '<option value="' . $aE['ID_Centre'] .'">' . $aE['Nom_Centre']. '</option>';
                            }
                        ?>
                        </select>
                        <select name="selectPromotion">
                        <option value="Aucune">Promotion</option>
                        <?php
                        include "connexionbdd.php";
                            $requetePromotion = "SELECT * FROM promotion";
                            $reponsePromotion = $pdo->query($requetePromotion);
                            $affichePromotion = $reponsePromotion->fetchAll();
                            foreach($affichePromotion as $aE){
                                echo '<option value="' . $aE['ID_Promotion'] .'">' . $aE['Nom_Promotion']. '</option>';
                            }
                        ?>
                        </select>
                             
                        <select name="selectCompetence">
                        <option value="Aucune">Competence</option>
                        <?php
                        include "connexionbdd.php";
                            $requeteCentre = "SELECT * FROM competence";
                            $reponseCentre = $pdo->query($requeteCentre);
                            $afficheCentre= $reponseCentre->fetchAll();
                            foreach($afficheCentre as $aE){
                                echo '<option value="' . $aE['ID_Competence'] .'">' . $aE['Type_Competence']. '</option>';
                            }
                        ?>
                        </select>
                        <select name="selectCompetence2">
                        <option value="Aucune">Competence</option>
                        <?php
                        include "connexionbdd.php";
                            $requeteCentre = "SELECT * FROM competence";
                            $reponseCentre = $pdo->query($requeteCentre);
                            $afficheCentre= $reponseCentre->fetchAll();
                            foreach($afficheCentre as $aE){
                                echo '<option value="' . $aE['ID_Competence'] .'">' . $aE['Type_Competence']. '</option>';
                            }
                        ?>
                        </select>
                        
                        
                <span class="error" id="errorpass2"></span>
                <br>
                
                <input type="submit" class="submitbtn" id="valider" placeholder="SIGN UP" disabled="" value = "Envoyer" ; />
            </form>
        </div>

    </main>

</body>

</html>

<script>
    var validationmail = 0;
    var validationpass = 0;
    var validationpass2 = 0;

    function mailv() {
        var vmail = document.getElementById("email").value;
        var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
        if (!vmail.match(regex)) {
            document.getElementById('errormail').innerHTML = ("Veuillez renseigner un mail valide");
            validationmail = 0;
        } else {
            document.getElementById('errormail').innerHTML = "";
            validationmail = 1;
        }
    }

    function passv() {
        var vpass = document.getElementById("pass").value;
         var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,14}$/
        if (!vpass.match(regex)) {
            document.getElementById('errorpass').innerHTML = ("Majuscule,Minuscule,Chiffre,Caractère spéciale");
            validationpass = 0;
        } else {
            document.getElementById('errorpass').innerHTML = "";
            validationpass = 1;
        }
    }

    function cpassv() {
        var vpass = document.getElementById("pass").value;
        var vcmpass = document.getElementById("conirfmpass").value;
        if (vpass != vcmpass) {
            document.getElementById('errorpass2').innerHTML = ("Invalide le mail ne correspond pas");
            validationpass2 = 0;
        } else {
            document.getElementById('errorpass2').innerHTML = "";
            validationpass2 = 1;
        }
    }
    const button = document.getElementById('valider');

    function buttona() {
        if ((validationmail && validationpass && validationpass2) == 1) {
            
            button.disabled = false;
            console.log(validationmail && validationpass && validationpass2)
        } else {
            button.disabled = true;
            console.log(validationmail && validationpass && validationpass2)
        }
    }
    var str = window.location.href;

    var url = new URL(str);

    var err = url.searchParams.get("err");

    console.log(err);
    if (err == 1) {
      
        var titre = document.createElement("h1");
        titre.setAttribute("style", "color:red");

        var texte = document.createTextNode("Une erreur lors de l'inscription");

        titre.appendChild(texte); //on on accroche texte a <a>


        var node = document.getElementById("signup");
        // pour plus de flexibilité, peut-être remplacé par :
        // var node = document.getElementsByTagName("body")[0];
        node.appendChild(titre);
    }
    if (err == 2) {
        var titre = document.createElement("h1");
        titre.setAttribute("style", "color:red");

        var texte = document.createTextNode("L'email existe déjà");

        titre.appendChild(texte); //on on accroche texte a <a>


        var node = document.getElementById("signup");
        // pour plus de flexibilité, peut-être remplacé par :
        // var node = document.getElementsByTagName("body")[0];
        node.appendChild(titre);
    }
</script>