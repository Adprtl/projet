  
  <!--START Bootstrap4 navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img src="https://media.discordapp.net/attachments/949259340915818527/954398806923956344/IMG_6470.png?width=671&height=671" height="80px" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">CesiJob</a>
                    </li>

                </ul>
                <?php
        if (isset($_SESSION['Mail'])) {
            echo '<li class="list-item">Bonjour'.$_SESSION['Mail'].'</li>';
            echo '<li class="list-item"><a href="deconnexion.php">Deconnexion</a></li>';
        }else{
            echo '<li class="list-item">
            <a href="connexion.php"></a>
        </li>';
        }

        ?>
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="">Contact <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="Login.php">Connexion <span class="sr-only"></span></a>
                    </li>
                    </li>
                </ul>
            </div>
        </nav>
        <!--End Bootstrap4 navbar -->