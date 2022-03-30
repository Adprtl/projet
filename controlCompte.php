<?php
require('modelCompte.php');
require('viewCompte.php');


function Supprimer(){
    $supprC = $_POST['supprCompte'];
    SupprimerCompte($supprC);
    $_POST['supprCompte'] = NULL;
    $supprC = NULL;
}

function Page(){
    $entrepriseParPage = 5;
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
    require('classCompte.php');
    foreach($affiche as $a){
        $obj = new classCompte($a['ID_Utilisateur'], $a['Identifiant'], $a['Password'], $a['Nom'], $a['Prenom'], $a['Mail'], $a['ID_Etudiant'], $a['ID_Pilote'], $a['ID_Delegue'], $a['ID_Administrateur']);
        
        array_push($tab, $obj);
    }
    return array($affiche, $pagesTotales, $pageCourante, $tab);
}

function Centre($id, $role){
    $affiche = AfficheCentre($id, $role);
    return $affiche;
}

function Promotion($id, $role){
    $affiche = AffichePromotion($id, $role);
    return $affiche;
}

/*function mCentre(){
    $afficheCentre = MenuCentre();
    return $afficheCentre;
}*/
/*
function Note($rep){
    $afficheNote = AfficheNote($rep);
    return $afficheNote;
}
*/
?>