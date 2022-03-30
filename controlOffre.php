<?php
require('modelOffre.php');
require('viewOffre.php');

function Supprimer(){
    $suppr = $_POST['supprOffre'];
    SupprimerOffre($suppr);
    $_POST['supprOffre'] = NULL;
    $suppr = NULL;
}

function Page(){
    $offreParPage = 2;
    $offreTotale = TotalOffre();

    $pagesTotales = ceil($offreTotale / $offreParPage);

    //Page courante
    if (isset($_GET['page']) and !empty($_GET['page']) and ($_GET['page']) > 0) {
        $_GET['page'] = intval($_GET['page']);
        $pageCourante = $_GET['page'];
    } else {
        $pageCourante = 1;
    }
    
    //Détermine les offres à afficher
    $depart = ($pageCourante - 1) * $offreParPage;

    $affiche = AfficheOffre($depart, $offreParPage);
    $tab = array();
    require('classOffre.php');
    foreach($affiche as $a){
        $obj = new classOffre($a['ID_Offre_de_stage'], $a['Reference'], $a['Duree_Stage'], $a['Date_Debut'], $a['Date_Offre'], $a['Nombre_Place'], $a['Description_Offre'], $a['Nom_Entreprise']);
        //$obj = new classEntreprise();
        array_push($tab, $obj);
    }
    return array($affiche, $pagesTotales, $pageCourante, $tab);
}

function Skill($rep){
    $afficheSkill = AfficheCompétence($rep);
    return $afficheSkill;
}

function mEntreprise(){
    $afficheEntreprise = MenuEntreprise();
    return $afficheEntreprise;
}

function mCompétence(){
    $afficheCompetence = MenuCompétence();
    return $afficheCompetence;
}
?>