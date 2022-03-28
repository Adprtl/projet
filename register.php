<?php
include "connexionbdd.php";
if (isset($_REQUEST['emailname']) && !empty($_REQUEST['emailname'])){
    $email = htmlentities($_REQUEST['emailname']);
    $reqverifemail =  'SELECT Mail FROM utilisateur WHERE Mail="'.$email.'";';

    
    $resemail = $pdo->query($reqverifemail);

    $count = $resemail->rowCount();

        if ($count != 0){
            header('Location:Registration.php?err=2');
        }else{
            //echo 'ça passe ici';
            if ( isset($_REQUEST['pseudoname']) && isset($_REQUEST['nomname']) && isset($_REQUEST['prenomname']) && isset($_REQUEST['passname'])  && isset($_REQUEST['selectCentre']) and !empty($_REQUEST['pseudoname'])  && !empty($_REQUEST['nomname'])  && !empty($_REQUEST['prenomname'])  && !empty($_REQUEST['passname']) && !empty($_REQUEST['selectCentre'])){
                $pseudo = htmlentities($_REQUEST['pseudoname']);

                $nom = htmlentities($_REQUEST['nomname']);
                $prenom = htmlentities($_REQUEST['prenomname']);
                $centre = htmlentities($_REQUEST['selectCentre']);
                $promotion = htmlentities($_REQUEST['selectPromotion']);
                $pass =htmlentities($_REQUEST['passname']) ;
                
               // $hashed_password = password_hash($pass, PASSWORD_BCRYPT);
                $req1 = 'INSERT INTO etudiant (ID_Centre,ID_Promotion) VALUES (:selectCentre,:selectPromotion);';

                $query = $pdo->prepare($req1);
                $query->bindValue(':selectCentre',$centre, PDO::PARAM_STR);
                $query->bindValue(':selectPromotion',$promotion, PDO::PARAM_STR);
                $query->execute();

                $req2 = 'SELECT Max(ID_Etudiant) As id from etudiant';

                $recipesStatement1 = $pdo->prepare($req2);
                $recipesStatement1->execute();
                $recipes1 = $recipesStatement1->fetchAll();

                $req = 'INSERT INTO `utilisateur`(`Identifiant`,`Nom`,`Prenom`, `Mail`, `Password`, ID_Etudiant) VALUES (:pseudo,:nom,:prenom,:email,:pass,'.$recipes1[0]['id'].');';

                $query = $pdo->prepare($req);
                $query->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
                $query->bindValue(':nom',$nom, PDO::PARAM_STR);
                $query->bindValue(':prenom',$prenom, PDO::PARAM_STR);
                $query->bindValue(':email',$email, PDO::PARAM_STR);
                $query->bindValue(':pass', $pass, PDO::PARAM_STR);
                $query->execute();
               // header('Location:login.php');
                
            }
            else{
                header('Location:Registration.php?err=1');
            }
            
        }
}
    

   



