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
    <title>Création Delegue</title>
</head>

<body>
    <header class="container-fluid main-navbar">
       <?php
         include "header.php"
       ?>
    </header>
    <main>
        <div id="signup" class="signup">

            <form action="registerpilote.php" method="POST">
                <h2>Création Delegue</h2>
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

                <br>
                <br>
                <label for="visibilite">ENTREPRISE</label><br>
                <br>
                <label for="visibilite">rechercher entreprise</label><br>
                <input type="checkbox"  id="rechercheren" name="rechercherenname" class="txtinput"  autofocus />
                <br>     
                <br>
                <label for="visibilite">creer entreprise</label><br>
                <input type="checkbox"  id="creeren" name="creerenname" class="txtinput"  autofocus />
                <br>
                <br>
                <label for="visibilite">modifier entreprise</label><br>
                <input type="checkbox"  id="modifen" name="modifenname" class="txtinput"  autofocus />
                <br>
                <br>
                <label for="visibilite">Supprimer entreprise</label><br>
                <input type="checkbox"  id="suppren" name="supprenname" class="txtinput"  autofocus />
                <br>
                <br>
                <label for="visibilite">consulter entreprise</label><br>
                <input type="checkbox"  id="consulten" name="consultenname" class="txtinput"  autofocus />
                <br>
                <br>
                <label for="visibilite">Evaluer entreprise</label><br>
                <input type="checkbox"  id="evalen" name="evalenname" class="txtinput"  autofocus />
                <br>
                <br>
                <br>
                <label for="visibilite">OFFRE</label><br>
                <br>
                <label for="visibilite">rechercher offre</label><br>
                <input type="checkbox"  id="rechercherof" name="rechercherofname" class="txtinput"  autofocus />
                <br>     
                <br>
                <label for="visibilite">creer offre</label><br>
                <input type="checkbox"  id="creerof" name="creerofname" class="txtinput"  autofocus />
                <br>
                <br>
                <label for="visibilite">modifier offre</label><br>
                <input type="checkbox"  id="modifof" name="modifofname" class="txtinput"  autofocus />
                <br>
                <br>
                <label for="visibilite">Supprimer offre</label><br>
                <input type="checkbox"  id="supprof" name="supprofname" class="txtinput"  autofocus />
                <br>
                <br>
                <br>
                <label for="visibilite">PILOTE</label><br>
                <br>
                <label for="visibilite">rechercher pilote</label><br>
                <input type="checkbox"  id="rechercherpi" name="rechercherpiname" class="txtinput"  autofocus />
                <br>     
                <br>
                <label for="visibilite">creer pilote</label><br>
                <input type="checkbox"  id="creerpi" name="creerpiname" class="txtinput"  autofocus />
                <br>
                <br>
                <label for="visibilite">modifier pilote</label><br>
                <input type="checkbox"  id="modifpi" name="modifpiname" class="txtinput"  autofocus />
                <br>
                <br>
                <label for="visibilite">Supprimer pilote</label><br>
                <input type="checkbox"  id="supprpi" name="supprpiname" class="txtinput"  autofocus />
                <br>
                <br>
                <br>
                <label for="visibilite">DELEGUE</label><br>
                <br>
                <label for="visibilite">rechercher delegue</label><br>
                <input type="checkbox"  id="rechercherde" name="rechercherdename" class="txtinput"  autofocus />
                <br>     
                <br>
                <label for="visibilite">creer delegue</label><br>
                <input type="checkbox"  id="creerde" name="creerdename" class="txtinput"  autofocus />
                <br>
                <br>
                <label for="visibilite">modifier deleguee</label><br>
                <input type="checkbox"  id="modifen" name="modifdename" class="txtinput"  autofocus />
                <br>
                <br>
                <label for="visibilite">Supprimer delegue</label><br>
                <input type="checkbox"  id="supprde" name="supprdename" class="txtinput"  autofocus />
                <br>
                <br>
                <br>
                <label for="visibilite">ETUDIANT</label><br>
                <br>
                <label for="visibilite">rechercher etudiant</label><br>
                <input type="checkbox"  id="rechercheret" name="rechercheretname" class="txtinput"  autofocus />
                <br>     
                <br>
                <label for="visibilite">creer etudiant</label><br>
                <input type="checkbox"  id="creeret" name="creeretname" class="txtinput"  autofocus />
                <br>
                <br>
                <label for="visibilite">modifier etudiant</label><br>
                <input type="checkbox"  id="modifen" name="modifetname" class="txtinput"  autofocus />
                <br>
                <br>
                <label for="visibilite">Supprimer etudiant</label><br>
                <input type="checkbox"  id="suppret" name="suppretname" class="txtinput"  autofocus />
                <br>
                <br>


                
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