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
    if ( isset($_REQUEST['nomname']) && isset($_REQUEST['emailname']) && isset($_REQUEST['secteurname']) && isset($_REQUEST['stagiairename']) && isset($_REQUEST['cpname'])  and !empty($_REQUEST['nomname']) && !empty($_REQUEST['emailname'])&& !empty($_REQUEST['secteurname']) && !empty($_REQUEST['stagiairename'])&& !empty($_REQUEST['cpname']) ){


    $nom = htmlentities($_REQUEST['nomname']);
    $email = htmlentities($_REQUEST['emailname']);
    $secteur = htmlentities($_REQUEST['secteurname']);
    $stagiaire= htmlentities($_REQUEST['stagiairename']);
    $ville= ($_REQUEST['selectville']);
    $cp= htmlentities($_REQUEST['cpname']);
    
  

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

    $req1 = 'SELECT Max(ID_Entreprise) As id from entreprise';

    $recipesStatement1 = $pdo->prepare($req1);
    $recipesStatement1->execute();
    $recipes1 = $recipesStatement1->fetchAll();


    $req2 = 'INSERT INTO `localite`(Ville,`Code_Postal`,ID_Entreprise) VALUES (:Ville,:cp,'.$recipes1[0]['id'].');';

    $query = $pdo->prepare($req2);
    $query->bindValue(':Ville',$ville, PDO::PARAM_STR);
    $query->bindValue(':cp',$cp, PDO::PARAM_STR);
    $query->execute();
    
    }else{
        // header('Location:Registration.php?err=1');
        echo "a";
         
        }
    }
}
?>