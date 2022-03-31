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
    <title>Création Offre</title>
</head>

<body>
    <header class="container-fluid main-navbar">
       <?php
         include "header.php"
       ?>
    </header>
    <main>
        <div id="signup" class="signup">

            <form action="registeroffre.php" method="POST">
                <h2>Création Offre</h2>

                <select name="selectEntreprise">
                        <option value="Aucune">Entreprise</option>
                        <?php
                        include "connexionbdd.php";
                            $requetePromotion = "SELECT * FROM entreprise";
                            $reponsePromotion = $pdo->query($requetePromotion);
                            $affichePromotion = $reponsePromotion->fetchAll();
                            foreach($affichePromotion as $aE){
                                echo '<option value="' . $aE['ID_Entreprise'] .'">' . $aE['Nom_Entreprise']. '</option>';
                            }
                        ?>
                        </select>
                            <br>
                            <br>
                <label for="ref">Reference</label><br>
                <input type="text" maxlength ="5"  id="ref" name="refname" class="txtinput" placeholder="Reference" autofocus />
                <br>
                <label for="duree">Durée stage </label><br>
                <input type="number" min="0" id="duree" name="dureename" class="txtinput" placeholder="Durée stage" autofocus />
                <br>
                <label for="date début">Date de début</label><br>
                <input type="date" id="datedebut" name="datedebutname" class="txtinput" placeholder="Entre ton nom" autofocus />
                <br>
                <label for="duree">nombre etudiant </label><br>
                <input type="number" min="0" id="nombre" name="nombrename" class="txtinput" placeholder="nombre étudiant" autofocus />
                <br>
                <label for="ref">desciption</label><br>
                <textarea type="text"  id="descriptiono" name="descrptionname" class="txtinput" placeholder="..." autofocus ></textarea>
                <br>
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
                          
                <br>
                

                <input type="submit" class="submitbtn" id="valider" placeholder="SIGN UP"  value = "Envoyer" ; />
                </form>
        </div>

    </main>

</body>

</html>
