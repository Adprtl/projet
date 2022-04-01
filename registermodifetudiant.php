<?php
include "connexionbdd.php";

            if ( isset($_REQUEST['pseudoname']) && isset($_REQUEST['emailname']) && isset($_REQUEST['nomname']) && isset($_REQUEST['prenomname']) && isset($_REQUEST['passname'])   and !empty($_REQUEST['pseudoname'])  && !empty($_REQUEST['nomname'])  && !empty($_REQUEST['prenomname'])  && !empty($_REQUEST['passname'])  && !empty($_REQUEST['emailname'])){
                $pseudo = htmlentities($_REQUEST['pseudoname']);
                $email = htmlentities($_REQUEST['emailname']);
                $nom = htmlentities($_REQUEST['nomname']);
                $prenom = htmlentities($_REQUEST['prenomname']);
                $pass =htmlentities($_REQUEST['passname']) ;
                $id = htmlentities($_REQUEST['idname']);

               // $hashed_password = password_hash($pass, PASSWORD_BCRYPT);


               $req = 'UPDATE `utilisateur` SET `Identifiant`= :pseudo ,`Nom`= :nom,`Prenom`=:prenom,`Mail`=:email,`Password`=:pass where ID_Utilisateur = :valider;';

                $query = $pdo->prepare($req);
                $query->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
                $query->bindValue(':nom',$nom, PDO::PARAM_STR);
                $query->bindValue(':prenom',$prenom, PDO::PARAM_STR);
                $query->bindValue(':email',$email, PDO::PARAM_STR);
                $query->bindValue(':pass', $pass, PDO::PARAM_STR);
                $query->bindValue(':valider',$id, PDO::PARAM_STR);
                $query->execute();
               // header('Location:login.php');

            }
            else{
                // header('Location:Registration.php?err=1');
                echo"a";
            }


?>