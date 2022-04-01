<?php
include "connexionbdd.php";

            if ( isset($_REQUEST['nomname']) && isset($_REQUEST['emailname'])  && isset($_REQUEST['stagiairename'])  and !empty($_REQUEST['nomname']) && !empty($_REQUEST['emailname']) && !empty($_REQUEST['stagiairename']) ){
                $nom = htmlentities($_REQUEST['nomname']);
                $email = htmlentities($_REQUEST['emailname']);
                $secteur = htmlentities($_REQUEST['secteurname']);
                $stagiaire= htmlentities($_REQUEST['stagiairename']);
                $id = htmlentities($_REQUEST['idname']);

               // $hashed_password = password_hash($pass, PASSWORD_BCRYPT);


               $req = 'UPDATE `entreprise` SET `Nom_Entreprise`= :nom ,`Secteur_activite`= :secteur,`Stagiaire_CESI_accepte`=:stagiaire,`Mail`=:email where ID_Entreprise = :valider;';
               $query = $pdo->prepare($req);
               $query->bindValue(':secteur',$secteur, PDO::PARAM_STR);
               $query->bindValue(':nom',$nom, PDO::PARAM_STR);
               $query->bindValue(':email',$email, PDO::PARAM_STR);
               $query->bindValue(':stagiaire',$stagiaire, PDO::PARAM_STR);
               $query->bindValue(':valider',$id, PDO::PARAM_STR);
               $query->execute();
            
           
               // header('Location:login.php');

            }
            else{
                // header('Location:Registration.php?err=1');
                echo"a";
            }


?>