
<?php
include "connexionbdd.php";

if (isset($_REQUEST['mailname']) && isset($_REQUEST['passwordname']) and
    !empty($_REQUEST['mailname']) && !empty($_REQUEST['passwordname'])){
    $email = htmlentities($_REQUEST['mailname']);
    $pass = htmlentities($_REQUEST['passwordname']);
    

$sqlQuery1 =  "SELECT * FROM utilisateur WHERE Mail ='" . $email . "' and Password='" . $pass. "'";

$recipesStatement1 = $pdo->prepare($sqlQuery1);
$recipesStatement1->execute();
$recipes1 = $recipesStatement1->fetchAll();
$ligne = $recipesStatement1->fetch();

//Vérifier existe
if ($recipes1 == TRUE){
    header('Location:test.php');

    session_start();
    $_SESSION['Mail'] = $email;
    $_SESSION['ID_Administrateur'] = $recipes1[0]['ID_Administrateur'];   
    $_SESSION['ID_Pilote'] = $recipes1[0]['ID_Pilote'];   
    
   setcookie(
       'Connexion',
       $email,
       [
           'expires' => time() + 7*24*3600,
           'secure' => true,
           'httponly' => true,
           ]
       );



       $uniqId = uniqid();
            $time = time();

            $tokenData = "{$email}#{$uniqId}#{$time}";
            $token = hash('sha512', $tokenData);

            $remember = isset($_POST['TOKEN']);
            $cookieData = "{$email}---{$token}";
            $cookieExpire = time() + 3600 * 24 * 7; // 7 jours
            setcookie('TOKEN', $cookieData, $cookieExpire, '/', null, false, true);
        

       

}
else{
    
    echo "<p>Gandalf n'existe pas</p>";
}

 }else{
     
        echo"shit";

    }
    // $req =  'SELECT * FROM utilisateur WHERE Mail="'.$email.'";';

    // echo $req;

    // $res = $pdo->query($req);

    // $count = $res->rowCount();

    // while ($ligne = $res->fetch()){
    //     $hashed = $ligne['Password'];
    //     if ($count != 0 && password_verify($pass, $hashed)){

           
//            // $_SESSION['pseudo'] =  $ligne['Pseudo'];

//             //header('Location:index.php');
//             echo $pass;
//             echo $email;
//         }else{
//             header('Location:connexion.php');
//         }
//     }

// }else{
//    // header('Location:Login.php');
//     echo $pass;
//     echo $email;
// }



?>