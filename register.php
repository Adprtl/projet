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
            if ( isset($_REQUEST['pseudoname']) && isset($_REQUEST['nomname']) && isset($_REQUEST['prenomname']) && isset($_REQUEST['passname']) and !empty($_REQUEST['pseudoname'])  && !empty($_REQUEST['nomname'])  && !empty($_REQUEST['prenomname'])  && !empty($_REQUEST['passname'])){
                $pseudo = htmlentities($_REQUEST['pseudoname']);

                $nom = htmlentities($_REQUEST['nomname']);
                $prenom = htmlentities($_REQUEST['prenomname']);
              
                $pass =htmlentities($_REQUEST['passname']) ;
            
               // $hashed_password = password_hash($pass, PASSWORD_BCRYPT);
            
                $req = 'INSERT INTO `utilisateur`(`Identifiant`,`Nom`,`Prenom`, `Mail`, `Password`) VALUES (:pseudo,:nom,:prenom,:email,:pass);';
            
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
    

   



