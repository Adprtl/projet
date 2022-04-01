<?php
include "connexionbdd.php";

if( isset($_REQUEST['refname']) && isset($_REQUEST['dureename']) && isset($_REQUEST['datedebutname']) && isset($_REQUEST['nombrename']) && isset($_REQUEST['descrptionname']) and  !empty($_REQUEST['refname']) && !empty($_REQUEST['dureename']) && !empty($_REQUEST['datedebutname']) && !empty($_REQUEST['dureename']) && !empty($_REQUEST['descrptionname'])){

    $ref = htmlentities($_REQUEST['refname']);
    $duree = htmlentities($_REQUEST['dureename']);
    $datededebut = htmlentities($_REQUEST['datedebutname']);
    $nombre = htmlentities($_REQUEST['nombrename']);
    $description = htmlentities($_REQUEST['descrptionname']);
    $entreprise = htmlentities($_REQUEST['selectEntreprise']);
    $competence = htmlentities($_REQUEST['selectCompetence']);
    $competence2 = htmlentities($_REQUEST['selectCompetence2']);

  $req = 'INSERT INTO `offre_de_stage`( `Reference`, `Duree_Stage`, `Date_Debut`, `Date_Offre`, `Nombre_Place`, `Description_Offre`,ID_Entreprise) VALUES (:ref,:duree,:datedebut,DATE(NOW()),:nombre,:descriptiono,:selectEntreprise);';


  $query = $pdo->prepare($req);
  $query->bindValue(':ref',$ref, PDO::PARAM_STR);
  $query->bindValue(':duree',$duree, PDO::PARAM_STR);
  $query->bindValue(':datedebut',$datededebut, PDO::PARAM_STR);
  $query->bindValue(':nombre',$nombre, PDO::PARAM_STR);
  $query->bindValue(':descriptiono',$description, PDO::PARAM_STR);
  $query->bindValue(':selectEntreprise',$entreprise, PDO::PARAM_STR);
  $query->execute();
  
  $req2 = 'SELECT Max(ID_offre_de_stage) As id from offre_de_stage';

  $recipesStatement1 = $pdo->prepare($req2);
  $recipesStatement1->execute();
  $recipes1 = $recipesStatement1->fetchAll();


  

  $req3 = 'INSERT INTO `classer`(`ID_Competence`,ID_Offre_de_stage) VALUES (:selectCompetence,'.$recipes1[0]['id'].');';

  $query = $pdo->prepare($req3);
  $query->bindValue(':selectCompetence',$competence, PDO::PARAM_STR);
  $query->execute();

  $req4 = 'INSERT INTO `classer`(`ID_Competence`,ID_Offre_de_stage) VALUES (:selectCompetence2,'.$recipes1[0]['id'].');';
    
  $query = $pdo->prepare($req4);
  $query->bindValue(':selectCompetence2',$competence2, PDO::PARAM_STR);
  $query->execute();
  // header('Location:login.php');
  
  header('Location:controlOffre.php');
  



}else{
    echo "a";
}