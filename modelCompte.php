<?php

function SupprimerCompte($supprC){
    $bdd = Connexion();
    $bdd->query("delete from utilisateur where ID_Utilisateur = '".$supprC."'");
}

/*function MenuCentre(){
    $bdd = Connexion();
    $requeteSecteur = "select DISTINCT Nom_Centre from centre; ";
    $reponseSecteur = $bdd->query($requeteSecteur);
    $afficheSecteur = $reponseSecteur->fetchAll();
    return $afficheSecteur;
}*/
/*
function AfficheNote($rep){
    $bdd = Connexion();
    $listOffreNote = "Select AVG(Note) as 'Note_Moyenne' FROM evaluation WHERE ID_Entreprise='" . $rep."'";
                        
    $reponseSkill = $bdd->query($listOffreNote);
    $afficheSkill = $reponseSkill->fetchAll();
    return $afficheSkill;
}
*/

function AfficheCentre($id, $role){
    $bdd = Connexion();
    $reponse = $bdd->query("select Nom_Centre from (SELECT * FROM centre natural join ". $role .") as tab natural join utilisateur where ID_Utilisateur =" . $id);
    $affiche = $reponse->fetchAll();
    return $affiche;
}
function AffichePromotion($id, $role){
    $bdd = Connexion();
    $reponse = $bdd->query("select Nom_Promotion from (SELECT * FROM promotion natural join ". $role .") as tab natural join utilisateur where ID_Utilisateur =" . $id);
    $affiche = $reponse->fetchAll();
    return $affiche;
}

function AfficheEntreprise($depart, $entrepriseParPage){
    $bdd = Connexion();
    //Requête pour récupérer les offres à afficher
    $limitEntreprise = " LIMIT " . $depart . "," . $entrepriseParPage;
    $listEntreprise = "Select * FROM utilisateur" . $limitEntreprise;
    //$listOffre = "Select * FROM offre_de_stage  LIMIT " . $depart . "," . $offreParPage;

    if (isset($_POST['selectRole']) && !empty($_POST['selectRole']) && $_POST['selectRole'] != 'Aucun'){
        $listEntreprise = "Select * FROM utilisateur WHERE ID_".$_POST['selectRole'] . $limitEntreprise;
    }

    $reponse = $bdd->query($listEntreprise);
    $affiche = $reponse->fetchAll();
    return $affiche;

}

//Compte le nombre total d'offre à afficher
function TotalEntreprise(){
    $bdd = Connexion();

    if (isset($_POST['selectRole']) && !empty($_POST['selectRole']) && $_POST['selectRole'] != 'Aucun'){
        $entrepriseTotaleReq = $bdd->query("Select * FROM utilisateur WHERE ID_".$_POST['selectRole']);
        $entrepriseTotale = $entrepriseTotaleReq->rowCount(); 
    }
    else{
        $entrepriseTotaleReq = $bdd->query('SELECT ID_Utilisateur FROM utilisateur');
        $entrepriseTotale = $entrepriseTotaleReq->rowCount();
    }
    return $entrepriseTotale;
}

//Connexion bdd
function Connexion(){
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=testf;charset=utf8', 'root');
        //$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        catch (PDOException $e) {
            die('Erreur : '.$e->getMessage());
        }
        return $bdd;
}


?>