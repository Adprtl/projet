<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des offres</title>
    <style>
        .offre{
            display : flex;
            border : 1px solid black;
            border-radius : 8px;
            padding : 1% 3% 1% 3%;
            flex-wrap: wrap;
            flex-direction: column;
        }
        .offre:hover{
            background-color : red;
            transition: all 1s;

        }
        .listOffre{
            display : flex;
            border : 1px solid black;
            border-radius : 8px;
            padding : 1% 1% 1% 1%;
            flex-direction: column;
            
        }
        
        
    </style>
</head>
<body>
    <!--Bouton pour créer une offre de stage-->
<a href="registrationoffre.php"><button>Créer</button></a>

    <!--Formulaire de recherche-->
<form method="POST">
<!--Menu déroulant entreprise-->    
<select id="selectEntreprise" name="selectEntreprise">
    <option value="Aucune">Aucune</option>
    <?php
        $afficheEntreprise = mEntreprise();
        foreach($afficheEntreprise as $aE){
            echo '<option value="' . $aE['Nom_Entreprise'] .'">' . $aE['Nom_Entreprise']. '</option>';
        }  
    ?>    
    </select>
<!--Menu déroulant compétence-->
    <select id="selectCompetence" name="selectCompetence">
    <option value="Aucune">Aucune</option>
    <?php
        $afficheCompetence = mCompétence();
        foreach($afficheCompetence as $aC){
            echo '<option value="' . $aC['Type_Competence'] .'">' . $aC['Type_Competence']. '</option>';
        }  
    ?>    
    </select>

    <button type="submit">Rechercher</button>
    <button type="reset">Réinitialiser</button>

    </form>

<?php

                $affiche = Page();
                echo '<div class="listOffre">';
                foreach($affiche[3] as $rep){
                ?>

                    <div class="offre">
                        <div>
                        <h2 style="text-align : center;">Offre de stage</h2>
                        <h5>Référence : <?php echo $rep->get_ref(); ?></h5>
                        <h4>Entreprise : <?php echo $rep->get_entreprise() ?></h4>
                        <h4>Durée du stage : <?php echo $rep->get_duree() ?> mois</h4>
                        <h4>Date de début : <?php echo $rep->get_ddebut() ?></h4>
                        <h4>Nombre de place : <?php echo $rep->get_place() ?></h4>
                        <h4>Description : </h4> <?php echo '<p> '.$rep->get_description().'</p>'; ?>
                        <h5>Date de l'offre : <?php echo $rep->get_doffre(); ?></h5>

                        <?php 
                        $afficheSkill = Skill($rep->get_id());
                        echo '<h3>Compétences : ';
                        foreach($afficheSkill as $repSkill){
                            echo  " " . $repSkill['Type_Competence'] ;
                        }
                        echo '</h3>';

                        ?>
                        <form method="POST"  action="modificationoffre.php"> <button  type="submit"  name="modifOffre"  value= <?php echo $rep->get_id(); ?>> Modifier</button><form>
                        <form method="POST"><button type="submit" name="supprOffre" value= <?php echo $rep->get_id(); ?> >Supprimer</button><form>
                            
                </div>
                    </div><br>

                    <?php
                }
                echo '</div>';
                
?>

<?php 
//Supprimer une offre

            if (isset($_POST['supprOffre']) && !empty($_POST['supprOffre'])){
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