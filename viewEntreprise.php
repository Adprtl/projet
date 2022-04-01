<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des entreprises</title>
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
<a href="#"><button>Créer</button></a>

    <!--Formulaire de recherche-->
<form method="POST">
<!--Menu déroulant secteur d'activité-->    
<select id="selectSecteur" name="selectSecteur">
    <option value="Aucun">Aucun</option>
    <?php
        $afficheSecteur = mSecteur();
        foreach($afficheSecteur as $aS){
            echo '<option value="' . $aS['Secteur_activite'] .'">' . $aS['Secteur_activite']. '</option>';
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
                        <h2 style="text-align : center;"><?php echo  $rep->get_nom(); ?></h2>
                        <h4>Mail : <?php $rep->get_mail(); ?></h4>
                        <h4>Secteur d'activité : <?php echo $rep->get_secteur(); ?></h4>
                        <h4>Nombre de stagiaires CESI acceptés : <?php echo $rep->get_nb_stagiaire(); ?></h4>

                        <?php 
                        $afficheSite = Site($rep->get_id());
                        echo '<h4>Sites : ';
                        foreach($afficheSite as $repSite){
                            echo  " " . $repSite['Ville'] . " (" . $repSite['Code_Postal'] . ") ";
                        }
                        echo '</h4>';

                        $afficheNote = Note($rep->get_id());
                        echo '<h3>Note moyenne : ';
                        foreach($afficheNote as $repNote){
                            echo  " " . $repNote['Note_Moyenne'] . " / 5" ;
                        }
                        echo '</h3>';

                        ?>
                        <div><form method="POST" action="modificationentreprise.php" name= "buttonmodif"><button type="submit" name="modifEntreprise" value= <?php echo $rep->get_id(); ?> >Modifier</button></form></div><br>
                       <div> <form method="POST" ><button type="submit" name="supprEntreprise" class="btn btn-danger" value=<?php echo $rep->get_id(); ?>>Supprimer</button></form></div>
                        <br>
                        <div><form method="POST" name ="note"><select name="noter" id="idnoter">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option></select>
                            <button type="submit" id="identreprise" name="noteId" value=<?php echo $rep->get_id(); ?> >Noter l'entreprise</button>
                    </form></div>
                            
                </div>
                    </div><br>

                    <?php
                }
                echo '</div>';
                
?>

<?php 
//Supprimer une entreprise

            if (isset($_POST['supprEntreprise']) && !empty($_POST['supprEntreprise'])){
                SupprimerE();
            }
?>
<?php 
//Noter une entreprise

            if (isset($_POST['noter']) && !empty($_POST['noter'])){
                $idE = htmlentities($_POST["noteId"]);
                $note = htmlentities($_POST["noter"]);
                Noter($idE, $note);
            }
?>

<?php
        //Système de pagination
        for ($i = 1; $i <= $affiche[1]; $i++) {
            if ($i == $affiche[2]) {
                echo $i . ' ';
            } else {
                echo ' <a href="controlEntreprise.php?page=' . $i . '">' . $i . '</a>  ';
            }
        }
        ?>

</body>
</html>