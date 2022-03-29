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
        //  include "header.php"
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
                <input onblur="mailv(),buttona();" class="txtinput" type="email" id="email" name="emailname" placeholder="Email" />
                <span class="error" id="errormail"></span></br>
                
                <label for="secteur">Secteur d'activité </label><br>
                <input type="text" id="secteur" name="secteurname" class="txtinput" placeholder="Secteur d'activité" autofocus />
                <br>
                <label for="stagiaire">Stagiaire accepté </label><br>
                <input type="number" min="0" id="stagiaire" name="stagiairename" class="txtinput" placeholder="Nombre accepté" autofocus />
                <br>
                <label for="cp">Code postal</label><br>
                <input type="text" maxlength ="5"  id="cp" name="cpname" class="txtinput" placeholder="Code Postal" autofocus />
                <br>
                <label for="ville">Ville</label><br>
                <select name="selectville" id ="Ville">
                   
                </select>
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
<script>

var caseCodePostal = document.getElementById("cp")
var caseVille = document.getElementById("Ville")

caseCodePostal.addEventListener("input", recupererVilles)

function recupererVilles() {
    if (caseCodePostal.value.length == 5) {
        fetch("https://apicarto.ign.fr/api/codes-postaux/communes/"+caseCodePostal.value+"").then((response) => response.json().then((data) =>
            {
            while (caseVille.getElementsByTagName("option")[0]) {
                caseVille.removeChild(caseVille.getElementsByTagName("option")[0])
            }
            for (let ville of data) {
                console.log(ville.nomCommune);
                caseVille.options[caseVille.options.length] = new Option (ville.nomCommune);
            }
        })
        )
    }
}


    var validationmail = 0;
   

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
    const button = document.getElementById('valider');

    function buttona() {
        if ((validationmail) == 1) {
            
            button.disabled = false;
            console.log(validationmail)
        } else {
            button.disabled = true;
            console.log(validationmail)
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