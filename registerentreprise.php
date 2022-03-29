<?php
include "connexionbdd.php";

if (isset($_REQUEST['emailname']) && !empty($_REQUEST['emailname'])){
    $email = htmlentities($_REQUEST['emailname']);
    $reqverifemail =  'SELECT Mail FROM entreprise WHERE Mail="'.$email.'";';

    
    $resemail = $pdo->query($reqverifemail);

    $count = $resemail->rowCount();

        if ($count != 0){
            header('Location:registrationentreprise.php?err=2');
        }else{
    if ( isset($_REQUEST['nomname']) && isset($_REQUEST['emailname']) && isset($_REQUEST['secteurname']) && isset($_REQUEST['stagiairename'])  and !empty($_REQUEST['nomname']) && !empty($_REQUEST['emailname'])&& !empty($_REQUEST['secteurname']) && !empty($_REQUEST['stagiairename'])){


    $nom = htmlentities($_REQUEST['nomname']);
    $email = htmlentities($_REQUEST['emailname']);
    $secteur = htmlentities($_REQUEST['secteurname']);
    $stagiaire= htmlentities($_REQUEST['stagiairename']);
    
    if (isset($_REQUEST['visibilitename'])){
     $visibilite= htmlentities(1);

    }
    else{
        $visibilite= htmlentities(0);
    }

    $req = 'INSERT INTO `entreprise`(`Nom_Entreprise`, `Mail`, `Secteur_activite`, `Stagiaire_CESI_accepte`, `Invisible_Etudiant`) VALUES (:nom,:email,:secteur,:stagiaire,:visibilite);';

    
    $query = $pdo->prepare($req);
    $query->bindValue(':secteur',$secteur, PDO::PARAM_STR);
    $query->bindValue(':nom',$nom, PDO::PARAM_STR);
    $query->bindValue(':email',$email, PDO::PARAM_STR);
    $query->bindValue(':stagiaire',$stagiaire, PDO::PARAM_STR);
    $query->bindValue(':visibilite',$visibilite, PDO::PARAM_STR);
    $query->execute();




}else{
        // header('Location:Registration.php?err=1');
        echo 'a';
        }
    }
}
?>