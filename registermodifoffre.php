<?php
include "connexionbdd.php";

if( isset($_REQUEST['refname']) && isset($_REQUEST['dureename']) && isset($_REQUEST['datedebutname']) && isset($_REQUEST['nombrename']) && isset($_REQUEST['descrptionname']) and  !empty($_REQUEST['refname']) && !empty($_REQUEST['dureename']) && !empty($_REQUEST['datedebutname']) && !empty($_REQUEST['dureename']) && !empty($_REQUEST['descrptionname'])){

    $ref = htmlentities($_REQUEST['refname']);
    $duree = htmlentities($_REQUEST['dureename']);
    $datededebut = htmlentities($_REQUEST['datedebutname']);
    $nombre = htmlentities($_REQUEST['nombrename']);
    $description = htmlentities($_REQUEST['descrptionname']);
    $id = htmlentities($_REQUEST['idname']);

  $req = 'UPDATE `offre_de_stage` SET `Reference`= :ref ,`Duree_Stage`= :duree,`Date_Debut`=:datedebut,`Nombre_Place`=:nombre,`Description_Offre`=:descriptiono where ID_Offre_de_stage = :valider;';


  $query = $pdo->prepare($req);
  $query->bindValue(':ref',$ref, PDO::PARAM_STR);
  $query->bindValue(':duree',$duree, PDO::PARAM_STR);
  $query->bindValue(':datedebut',$datededebut, PDO::PARAM_STR);
  $query->bindValue(':nombre',$nombre, PDO::PARAM_STR);
  $query->bindValue(':descriptiono',$description, PDO::PARAM_STR);
  $query->bindValue(':valider',$id, PDO::PARAM_STR);
  $query->execute();
  //header('Location:controlOffre.php');
 
  



}else{
    echo "a";
}