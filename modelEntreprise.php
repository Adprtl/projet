<?php

function EvalEntreprise($id, $idE, $note){
    $bdd = Connexion();
    //$bdd->query("insert into evaluation values ('" .$identreprise."', '1', '". $id."' , '". $note."')");
    $req = 'INSERT INTO `evaluation`(`ID_Entreprise`, `ID_Pilote`, `ID_Etudiant`, `Note`) VALUES ('.$idE.', 1, 1, '.$note.')';
    $query = $bdd->prepare($req);
    $query->execute();

} 

function SupprimerEntreprise($supprE){
    $bdd = Connexion();
    $bdd->query("delete from entreprise where ID_Entreprise = ".$supprE);
}

function MenuSecteur(){
    $bdd = Connexion();
    $requeteSecteur = "select DISTINCT Secteur_activite from entreprise; ";
    $reponseSecteur = $bdd->query($requeteSecteur);
    $afficheSecteur = $reponseSecteur->fetchAll();
    return $afficheSecteur;
}

/*
function AfficheCompétence($rep){
    $bdd = Connexion();
    $listOffreSkill = "Select * FROM offre_de_stage NATURAL JOIN (select * from classer natural join competence) as tab WHERE ID_offre_de_stage='" . $rep."'";
                        
    $reponseSkill = $bdd->query($listOffreSkill);
    $afficheSkill = $reponseSkill->fetchAll();
    return $afficheSkill;
}*/

function AfficheNote($rep){
    $bdd = Connexion();
    $listOffreNote = "Select AVG(Note) as 'Note_Moyenne' FROM evaluation WHERE ID_Entreprise='" . $rep."'";
                        
    $reponseSkill = $bdd->query($listOffreNote);
    $afficheSkill = $reponseSkill->fetchAll();
    return $afficheSkill;
}

function AfficheSite($rep){
    $bdd = Connexion();
    $listOffreNote = "Select * FROM localite WHERE ID_Entreprise='" . $rep."'";
                        
    $reponseSkill = $bdd->query($listOffreNote);
    $afficheSkill = $reponseSkill->fetchAll();
    return $afficheSkill;
}

function AfficheEntreprise($depart, $entrepriseParPage){
    $bdd = Connexion();
    //Requête pour récupérer les offres à afficher
    $limitEntreprise = " LIMIT " . $depart . "," . $entrepriseParPage;
    $listEntreprise = "Select * FROM entreprise order by Stagiaire_CESI_accepte DESC" . $limitEntreprise;
    //$listOffre = "Select * FROM offre_de_stage  LIMIT " . $depart . "," . $offreParPage;

    if (isset($_POST['selectSecteur']) && !empty($_POST['selectSecteur']) && $_POST['selectSecteur'] != 'Aucun'){
        $listEntreprise = "Select * FROM entreprise WHERE Secteur_activite='". $_POST['selectSecteur'] . "' order by Stagiaire_CESI_accepte DESC " . $limitEntreprise;
    }

    $reponse = $bdd->query($listEntreprise);
    $affiche = $reponse->fetchAll();
    return $affiche;

}

//Compte le nombre total d'offre à afficher
function TotalEntreprise(){
    $bdd = Connexion();

    if (isset($_POST['selectSecteur']) && !empty($_POST['selectSecteur']) && $_POST['selectSecteur'] != 'Aucun'){
        $entrepriseTotaleReq = $bdd->query("Select ID_Entreprise FROM entreprise WHERE Secteur_activite='". $_POST['selectSecteur'] . "'");
        $entrepriseTotale = $entrepriseTotaleReq->rowCount(); 
    }
    else{
        $entrepriseTotaleReq = $bdd->query('SELECT ID_Entreprise FROM entreprise');
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