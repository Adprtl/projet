<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>accueil</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <!--Appli mobile-->
    <link rel="manifest" href="./manifest.json" />
    <link rel="apple-touch-icon" href="logo.png">
    <meta name="apple-mobile-web-app-status-bar" content="white">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="white">
    <script>
        if ("serviceWorker" in navigator) {
            navigator.serviceWorker.register("sw.js");
        }
    </script>
</head>

<body>
    <!-- partial:index.partial.html -->
    <header class="container-fluid main-navbar">
      <?php
        include "header.php";
      ?>
    </header>

    <main>
        <section class="main-slider py-5">
            <!--     carousel START -->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" style="height:600px !important;object-fit:cover;" src="https://grandes-ecoles.studyrama.com/sites/default/files/styles/content/public/field/image/choisir-specialite-btp-construction-ecole-ingenieurs.jpg?itok=jlRJVNDn" alt="First slide">

                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" style="height:600px !important;object-fit:cover;" src="https://upload.wikimedia.org/wikipedia/commons/d/d9/Arduino_ftdi_chip-1.jpg" alt="Third slide">

                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" style="height:600px !important;object-fit:cover;" src="https://cdn.futura-sciences.com/buildsv6/images/wide1920/9/4/0/940b22eda6_50170334_code-informatique.jpg" alt="Second slide">

                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!--     carousel END -->
        </section>



    </main>

    <footer>
        <h1>FOOTER</h1>
    </footer>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js'></script>
</body>

</html>
