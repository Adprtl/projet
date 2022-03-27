<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="css/style.css" rel="stylesheet">
        <title>Sign Ip</title>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'><link rel="stylesheet" href="./style.css">
    </head>

   
    <header class="container-fluid main-navbar">
  <!--START Bootstrap4 navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><img src="https://media.discordapp.net/attachments/949259340915818527/954398806923956344/IMG_6470.png?width=671&height=671" height ="80px" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">CesiJob</a>
        </li>
       
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link" href="#">Home <span class="sr-only"></span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="#">Contact <span class="sr-only"></span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="#">Connexion <span class="sr-only"></span></a>
        </li>
        </li>
      </ul>
    </div>
  </nav>
  <!--End Bootstrap4 navbar -->
</header>
  

  
        <form action="connexion.php" method="POST">
 <div class = "signin">
                  <h2 >Sign In</h2>
                  <br>

              
        <label for="email">Email</label><br>
        <input class="txtinput" type="email" id="Mail" name="mailname" placeholder="Email" autofocus />
        <br>
        <label for="password">Mot de passe</label><br>
        <input class="txtinput" type="password" id="Password" name="passwordname" placeholder="...." />
        <br>
        <a href="#"> Mot de passe oublié ? </a><br>
        <input class="submitbtn" type="submit" value="Connecte toi !" />
   </div>
        </form>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js'></script>
    </body>

</html>