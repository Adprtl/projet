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

            <form action="registermodifoffre.php" method="POST">
                <h2>Création Offre</h2>
                    
                <?php
                       
                        include "connexionbdd.php";
                            $requetePromotion = "SELECT * FROM offre_de_stage where ID_Offre_de_stage =".$_POST['modifOffre'];
                            $reponsePromotion = $pdo->query($requetePromotion);
                            $affichePromotion = $reponsePromotion->fetchAll();
                        ?> 
                           
                      
                <label for="ref">Reference</label><br>
              
                <input type="text" maxlength ="5"  id="ref" name="refname" class="txtinput" placeholder="Reference"  value ="<?php echo $affichePromotion[0]["Reference"] ?>"autofocus />
                
                <br>
                <label for="duree">Durée stage </label><br>
                <input type="number" min="0" id="duree" name="dureename" class="txtinput" placeholder="Durée stage"value ="<?php echo $affichePromotion[0]["Duree_Stage"] ?>" autofocus />
                <br>
                <label for="date début">Date de début</label><br>
                <input type="date" id="datedebut" name="datedebutname" class="txtinput" placeholder="Entre ton nom" value ="<?php echo $affichePromotion[0]["Date_Debut"] ?>" autofocus />
                <br>
                <label for="duree">nombre etudiant </label><br>
                <input type="number" min="0" id="nombre" name="nombrename" class="txtinput" placeholder="nombre étudiant" value ="<?php echo $affichePromotion[0]["Nombre_Place"] ?>"  autofocus />
                <br>
                <label for="ref">description</label><br>
                <textarea type="text"  id="descriptiono" name="descrptionname" class="txtinput" placeholder="..." autofocus ><?php echo $affichePromotion[0]["Description_Offre"] ?></textarea>
                <br>
                    
                

                <button type="submit" class="submitbtn" id="valider" placeholder="SIGN UP"  name = "idname" value=<?php echo $_POST['modifOffre'];?>>Envoyer</button>
                </form>
        </div>

    </main>

</body>

</html>
