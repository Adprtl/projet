<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Liste des comptes</title>
    <style>
        .offre{
            display : flex;
            border : 1px solid black;
            border-radius : 8px;
            padding : 1% 3% 1% 3%;
            flex-wrap: wrap;
            flex-direction: column;
        }
        table, td, th{
            border : 1px solid black;
            text-align : center;
        }
        
    </style>
</head>
<body>
    
    <!--Bouton pour créer un compte-->
<a href="#"><button>Créer</button></a>

    <!--Formulaire de recherche-->
    <!--Menu déroulant role--> 
<form method="POST">

    <select name="selectRole">
        <option value="Aucun">Aucun</option>
        <option value="Etudiant">Etudiant</option>
        <option value="Pilote">Pilote</option>
        <option value="Delegue">Delegue</option>
        <option value="Administrateur">Administrateur</option>
    </select>

    <!--Menu déroulant centre-->    

<?php /*
<select id="selectCentre" name="selectCentre">
    <option value="Aucun">Aucun</option>
    <?php
        $afficheCentre = mCentre();
        foreach($afficheCentre as $aC){
            echo '<option value="' . $aC['Nom_Centre'] .'">' . $aC['Nom_Centre']. '</option>';
        }  
    ?>    
    </select>*/ ?>

    <button type="submit">Rechercher</button>
    <button type="reset">Réinitialiser</button>

    </form>

                    <div class="offre">
                        <div>
                            <table>
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Identifiant de connexion</th>
                                    <th>Mot de passe</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Mail</th>
                                    <th>Rôle</th>
                                    <th>Centre</th>
                                    <th>Promotion</th>
                                    
                                        
                                </tr>
                                </thead>
                                <tbody>

               
<?php

                $affiche = Page();
                foreach($affiche[3] as $rep){
                ?>
                    <tr>
                        <td><?php echo $rep->get_id(); ?></td>
                        <td><?php echo $rep->get_ident(); ?></td>
                        <td><?php echo $rep->get_mdp(); ?></td>
                        <td><?php echo $rep->get_nom(); ?></td>
                        <td><?php echo $rep->get_prenom(); ?></td>
                        <td><?php echo $rep->get_mail(); ?></td>
                        <td><?php if($rep->get_id_etud() != NULL){echo "Etudiant";}else if($rep->get_id_pilote() != NULL){echo "Pilote";}
                        else if($rep->get_id_deleg() != NULL){echo "Delegue";}else if($rep->get_id_admin() != NULL){echo "Administrateur";}
                        ?></td>
                        
                        <td>
                        <?php
                            if ($rep->get_id_etud() != NULL){
                                $role = "Etudiant";
                                $afficheCentre1 = Centre($rep->get_id(), $role);
                                echo $afficheCentre1[0]['Nom_Centre'];
                            }
                            else if ($rep->get_id_pilote() != NULL){
                                $role = "Pilote";
                                $afficheCentre1 = Centre($rep->get_id(), $role);
                                echo $afficheCentre1[0]['Nom_Centre'];
                            }
                            else {
                                echo "-";
                            }
                            
                        ?>
                        </td>
                        <td>
                        <?php
                            if ($rep->get_id_etud() != NULL){
                                $role = "Etudiant";
                                $afficheProm = Promotion($rep->get_id(), $role);
                                //echo $afficheCentre1[0]['Nom_Promotion'];
                                foreach($afficheProm as $aP){
                                    echo $aP['Nom_Promotion'];
                                }
                            }
                            else if ($rep->get_id_pilote() != NULL){
                                $role = "Pilote";
                                $afficheProm = Promotion($rep->get_id(), $role);
                                echo $afficheProm[0]['Nom_Promotion'];
                            }
                            else {
                                echo "-";
                            }
                            
                        ?>
                        </td>
                        <td><form method="POST"><button name="modifCompte" value= <?php echo $rep->get_id(); ?>>Modifier</button></form></td>
                        <td><form method="POST"><button name="supprCompte" value= <?php echo $rep->get_id(); ?>>Supprimer</button></form></td>
                    </tr>

                            

                <?php        
                }
                ?>
            </tbody>
            </table>
            </div>
            </div>
                
<?php 
//Supprimer un compte

            if (isset($_POST['supprCompte']) && !empty($_POST['supprCompte'])){
                Supprimer();
            }
?>

<?php
        //Système de pagination
        
        for ($i = 1; $i <= $affiche[1]; $i++) {
            if ($i == $affiche[2]) {
                echo $i . ' ';
            } else {
                echo ' <a href="controlCompte.php?page=' . $i . '">' . $i . '</a>  ';
            }
        }
        ?>

</body>
</html>