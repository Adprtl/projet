<?php
include "connexionbdd.php";

if (isset($_REQUEST['emailname']) && !empty($_REQUEST['emailname'])){
    $email = htmlentities($_REQUEST['emailname']);
    $reqverifemail =  'SELECT Mail FROM entreprise WHERE Mail="'.$email.'";';

    
    $resemail = $pdo->query($reqverifemail);

    $count = $resemail->rowCount();

        if ($count != 0){
            header('Location:registrationpilote.php?err=2');
        }else{
if ( isset($_REQUEST['pseudoname']) && isset($_REQUEST['nomname']) and !empty($_REQUEST['pseudoname'])  && !empty($_REQUEST['nomname'])){


$nom = htmlentities($_REQUEST['nomname']);
$prenom = htmlentities($_REQUEST['prenomname']);




$req = 'INSERT INTO `utilisateur`(`Identifiant`,`Nom`,`Prenom`, `Mail`, `Password`, ID_Pilote) VALUES (:pseudo,:nom,:prenom,:email,:pass,'.$recipes1[0]['id'].');';


$query = $pdo->prepare($req);
$query->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
$query->bindValue(':nom',$nom, PDO::PARAM_STR);
$query->bindValue(':prenom',$prenom, PDO::PARAM_STR);

$query->execute();

}else{


        }
    }
}
?>