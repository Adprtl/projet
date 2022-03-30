<?php
require('modelEntreprise.php');
require('viewEntreprise.php');


function Noter($idE, $not){
    EvalEntreprise(1, $idE, $not);
    $_POST["noteId"] = NULL;
    $_POST["noter"] = NULL;
}

function SupprimerE(){
    $supprE = $_POST['supprEntreprise'];
    SupprimerEntreprise($supprE);
    $_POST['supprEntreprise'] = NULL;
    $supprE = NULL;
}

function Page(){
    $entrepriseParPage = 2;
    $entrepriseTotale = TotalEntreprise();

    $pagesTotales = ceil($entrepriseTotale / $entrepriseParPage);

    //Page courante
    if (isset($_GET['page']) and !empty($_GET['page']) and ($_GET['page']) > 0) {
        $_GET['page'] = intval($_GET['page']);
        $pageCourante = $_GET['page'];
    } else {
        $pageCourante = 1;
    }
    
    //Détermine les offres à afficher
    $depart = ($pageCourante - 1) * $entrepriseParPage;

    $affiche = AfficheEntreprise($depart, $entrepriseParPage);

    $tab = array();
    require('classEntreprise.php');
    foreach($affiche as $a){
        $obj = new classEntreprise($a['ID_Entreprise'], $a['Nom_Entreprise'], $a['Mail'], $a['Secteur_activite'], $a['Stagiaire_CESI_accepte'], $a['Invisible_Etudiant']);
        //$obj = new classEntreprise();
        array_push($tab, $obj);
    }
    return array($affiche, $pagesTotales, $pageCourante, $tab);
}

function mSecteur(){
    $afficheSecteur = MenuSecteur();
    return $afficheSecteur;
}

function Note($rep){
    $afficheNote = AfficheNote($rep);
    return $afficheNote;
}

function Site($rep){
    $afficheSite = AfficheSite($rep);
    return $afficheSite;
}

/*function Skill($rep){
    $afficheSkill = AfficheCompétence($rep);
    return $afficheSkill;
}

function mCompétence(){
    $afficheCompetence = MenuCompétence();
    return $afficheCompetence;
}*/
?>