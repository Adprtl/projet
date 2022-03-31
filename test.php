<?php
include "connexionbdd.php";
include "allvariable.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>accueil</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<header class="container-fluid main-navbar">
    <?php
    include "header.php";
   ?>
</header>
<body onload="url()">
    
<?php
  if (isset($_SESSION['Mail']) && (($_SESSION['ID_Pilote']!=0) || ($_SESSION['ID_Administrateur']!=0))){
?>
 <h1>bienvenue mon G</h1>;
<?php   
    }else header('Location:index.php');
    ?>

</body>
</html>