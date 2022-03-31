<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Liste des offres</title>
    <style>
        .offre {
            display: flex;
            border: 1px solid #c0c0c0;
            border-radius: 8px;
            padding: 1% 3% 1% 3%;
            flex-wrap: wrap;
            flex-direction: column;
        }


        .listOffre {
            display: flex;
            border-radius: 8px;
            padding: 1% 1% 1% 1%;
            flex-direction: column;

        }
    </style>
</head>

<body>

<div class="mx-auto text-center m-5">
   <!--Bouton pour créer une offre de stage-->
   <a href="registrationoffre.php" ><button class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>  Créer</button></a>
</div>
 

    <!--Formulaire de recherche-->
    <form method="POST">
        <div class="container mb-5">
            <div class="row">
                <div class="col-4">
                    <!--Menu déroulant entreprise-->
                    <select id="selectEntreprise" name="selectEntreprise" class="form-select">
                        <option value="Aucune">Entreprise</option>
                        <!--Menu déroulant entreprise-->
                        <?php
                        $afficheEntreprise = mEntreprise();
                        foreach ($afficheEntreprise as $aE) {
                            echo '<option value="' . $aE['Nom_Entreprise'] . '">' . $aE['Nom_Entreprise'] . '</option>';
                        }
                        ?>
                    </select>

                </div>
                <div class="col-4">
                    <!--Menu déroulant compétence-->
                    <select id="selectCompetence" name="selectCompetence" class="form-select">
                        <option value="Aucune">Compétence</option>
                        <?php
                        $afficheCompetence = mCompétence();
                        foreach ($afficheCompetence as $aC) {
                            echo '<option value="' . $aC['Type_Competence'] . '">' . $aC['Type_Competence'] . '</option>';
                        }
                        ?>
                    </select>

                </div>
                <div class="col-2 text-center">
                <button type="submit"class="btn btn-secondary" >Rechercher</button>
                </div>
                <div class="col-2">
                <button type="reset" class="btn btn-secondary">Réinitialiser</button>

                </div>
            </div>


        </div>




      

    </form>
    <p style="border: 1px solid #f0f0f0; margin-bottom: 50px;"></p>
<div class="container">
    <div class="row">
        
 
    <?php

    $affiche = Page();
    echo '<div class="listOffre">';
    foreach ($affiche[3] as $rep) {
    ?>

        <div class="offre">
            <div>
                <h2 style="text-align : center;">Offre de stage</h2>
                <h5>Référence : <?php echo $rep->get_ref(); ?></h5>
                <h4>Entreprise : <?php echo $rep->get_entreprise() ?></h4>
                <h4>Durée du stage : <?php echo $rep->get_duree() ?> mois</h4>
                <h4>Date de début : <?php echo $rep->get_ddebut() ?></h4>
                <h4>Nombre de place : <?php echo $rep->get_place() ?></h4>
                <h4>Description : </h4> <?php echo '<p> ' . $rep->get_description() . '</p>'; ?>
                <h5>Date de l'offre : <?php echo $rep->get_doffre(); ?></h5>

                <?php
                $afficheSkill = Skill($rep->get_id());
                echo '<h3>Compétences : ';
                foreach ($afficheSkill as $repSkill) {
                    echo  " " . $repSkill['Type_Competence'];
                }
                echo '</h3>';

                ?>
                <form method="POST" action="modificationoffre.php"> <button class="btn btn-secondary" type="submit" name="modifOffre" value=<?php echo $rep->get_id(); ?>> Modifier</button>
                    <form>
                        <form method="POST"><button type="submit" name="supprOffre" class="btn btn-danger" value=<?php echo $rep->get_id(); ?>>Supprimer</button>
                            <form>

            </div>
        </div><br>

    <?php
    }
    echo '</div>';

    ?>
   </div>
</div>
    <?php
    //Supprimer une offre

    if (isset($_POST['supprOffre']) && !empty($_POST['supprOffre'])) {
        Supprimer();
    }
    ?>

    <?php
    //Système de pagination
    for ($i = 1; $i <= $affiche[1]; $i++) {
        if ($i == $affiche[2]) {
            echo $i . ' ';
        } else {
            echo ' <a href="controlOffre.php?page=' . $i . '">' . $i . '</a>  ';
        }
    }
    ?>

</body>

</html>