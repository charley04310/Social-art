<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="manifest" href="manifest.json">
    <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Poppins:wght@100;300&display=swap"
        rel="stylesheet">
    <script src="style/animation.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TITRE</title>

</head>

<body>

    <header>
        <div id="header-container" class="header-container">


            <div class="content-left">
                <div class="logo">
                    <a href="index.php"><img src="img/logo_socialart.svg" alt="" width="160px"></a>
                </div>

                <!--<img src="img/logo_socialart.png" alt="">-->
                <div class="search_bar">
                    <input type="Search" name="Search" id="">

                    <img src="img/search.svg" alt="Search" class="search_icone">
                </div>


            </div>

            <div class="content-right">

                <div class="light-mode">
                  
                    <div id="outer-div">
                        <div id="inner-div"></div>
                    </div>
                </div>
           


                <img src="img/AddPost.svg" alt="AddPost" id="AddPost" onclick="ModalAddArticle()">
                <img src="img/User.svg" alt="AddPost" class="img-rubrique" id="User" onclick="EditInf()">



                <button class="login-button" id="Login" onclick="SetModal()">connexion</button>



            </div>

        </div>

    </header>


    <section id="left_fixed_navigation" class="left_fixed_navigation">

        <div class="tooltip">
            <img src="img/developpement.svg" alt="" class="img-rubrique" id="developpement">
            <span class="tooltiptext">DÉVELOPPEUR</span>
        </div>

        <div class="tooltip">
            <img src="img/graphiste.svg" alt="" class="img-rubrique" id="graphiste">
            <span class="tooltiptext">ILLUSTRATION</span>
        </div>

        <div class="tooltip">
            <img src="img/reseau.svg" alt="" class="img-rubrique" id="reseau">
            <span class="tooltiptext">RÉSEAU</span>
        </div>

        <div class="tooltip">
            <img src="img/cyber-security.svg" alt="" class="img-rubrique" id="cyber">
            <span class="tooltiptext" style="width: 150px;">CYBER-SÉCURITÉ</span>
        </div>

        <div class="tooltip">
            <img src="img/detente.svg" alt="" class="img-rubrique" id="detente">
            <span class="tooltiptext">DÉTENTE</span>
        </div>

        <img src="img/fleche.svg" alt="" class="img-fleche" id="fleche">
        <h2 class="rubrique-title">RUBRIQUES</h2>

    </section>
