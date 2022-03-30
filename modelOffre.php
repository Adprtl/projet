<?php

function SupprimerOffre($suppr){
    $bdd = Connexion();
    $bdd->query("delete from offre_de_stage where id_offre_de_stage = ".$suppr);
}

function MenuEntreprise(){
    $bdd = Connexion();
    $requeteEntreprise = "SELECT * FROM entreprise";
    $reponseEntreprise = $bdd->query($requeteEntreprise);
    $afficheEntreprise = $reponseEntreprise->fetchAll();
    return $afficheEntreprise;
}

function MenuCompétence(){
    $bdd = Connexion();
    $requeteCompetence = "SELECT * FROM competence";
    $reponseCompetence = $bdd->query($requeteCompetence);
    $afficheCompetence = $reponseCompetence->fetchAll();
    return $afficheCompetence;
}

function AfficheCompétence($rep){
    $bdd = Connexion();
    $listOffreSkill = "Select * FROM offre_de_stage NATURAL JOIN (select * from classer natural join competence) as tab WHERE ID_offre_de_stage='" . $rep."'";
                        
    $reponseSkill = $bdd->query($listOffreSkill);
    $afficheSkill = $reponseSkill->fetchAll();
    return $afficheSkill;
}

function AfficheOffre($depart, $offreParPage){
    $bdd = Connexion();
    //Requête pour récupérer les offres à afficher
    $limitOffre = " LIMIT " . $depart . "," . $offreParPage;
    $listOffre = "Select * FROM offre_de_stage NATURAL JOIN entreprise" . $limitOffre;
    //$listOffre = "Select * FROM offre_de_stage  LIMIT " . $depart . "," . $offreParPage;

    if(isset($_POST['selectEntreprise']) && !empty($_POST['selectEntreprise']) && $_POST['selectEntreprise'] != 'Aucune' && isset($_POST['selectCompetence']) && !empty($_POST['selectCompetence']) && $_POST['selectCompetence'] != 'Aucune'){
        $listOffre = "select * from (select * from offre_de_stage natural join entreprise WHERE Nom_Entreprise = '".$_POST['selectEntreprise']."') as tab2 natural join (select * from classer natural join competence WHERE Type_Competence = '".$_POST['selectCompetence']."') as tab";
    }
    else if (isset($_POST['selectEntreprise']) && !empty($_POST['selectEntreprise']) && $_POST['selectEntreprise'] != 'Aucune'){
        $listOffre = "Select * FROM offre_de_stage NATURAL JOIN entreprise WHERE Nom_Entreprise ='".$_POST['selectEntreprise']."'" . $limitOffre;
    }
    else if (isset($_POST['selectCompetence']) && !empty($_POST['selectCompetence']) && $_POST['selectCompetence'] != 'Aucune'){
        $listOffre = 'select * from (select * from offre_de_stage natural join entreprise) as tab2 natural join (select * from classer natural join competence WHERE Type_Competence = "'.$_POST['selectCompetence'].'") as tab';
    }

    $reponse = $bdd->query($listOffre);
    $affiche = $reponse->fetchAll();
    return $affiche;

}

//Compte le nombre total d'offre à afficher
function TotalOffre(){
    $bdd = Connexion();
    if(isset($_POST['selectEntreprise']) && !empty($_POST['selectEntreprise']) && $_POST['selectEntreprise'] != 'Aucune' && isset($_POST['selectCompetence']) && !empty($_POST['selectCompetence']) && $_POST['selectCompetence'] != 'Aucune'){
        $offreTotaleReq = $bdd->query("select COUNT(id_offre_de_stage) from (select * from offre_de_stage natural join entreprise WHERE Nom_Entreprise = '".$_POST['selectEntreprise']."') as tab2 natural join (select * from classer natural join competence WHERE Type_Competence = '".$_POST['selectCompetence']."') as tab GROUP BY (id_offre_de_stage)");
        $offreTotale = $offreTotaleReq->rowCount();
    }
    elseif (isset($_POST['selectEntreprise']) && !empty($_POST['selectEntreprise']) && $_POST['selectEntreprise'] != 'Aucune'){
        $offreTotaleReq = $bdd->query("Select * FROM offre_de_stage NATURAL JOIN entreprise WHERE Nom_Entreprise ='".$_POST['selectEntreprise']."'");
        $offreTotale = $offreTotaleReq->rowCount(); 
    }
    elseif (isset($_POST['selectCompetence']) && !empty($_POST['selectCompetence']) && $_POST['selectCompetence'] != 'Aucune'){
        $offreTotaleReq = $bdd->query("select count(ID_Offre_de_stage) from offre_de_stage natural join (select * from classer natural join competence WHERE Type_Competence ='".$_POST['selectCompetence']."') as tab group by(ID_Offre_de_stage)");
        $offreTotale = $offreTotaleReq->rowCount(); 
    }
    else{
        $offreTotaleReq = $bdd->query('SELECT id_offre_de_stage FROM offre_de_stage');
        $offreTotale = $offreTotaleReq->rowCount();
    }
    return $offreTotale;
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