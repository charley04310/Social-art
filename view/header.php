<?php 
if(!isset($_SESSION)){session_start();}
require('modele/dbConnect.php');?>

<!DOCTYPE html>
<html lang="en" id="html">

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
    <script src="style/themeswitch.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title_page?></title>

</head>



<body>

<header>
    <div id="header-container" class="header-container">
            <div class="content-left">
                <div class="logo">
                    <a href="index.php"><img src="img/logo_socialarttest.svg" alt="" width="70px"></a>
                </div>
            </div>


        <div class="content-right">

        <div class="dropdown">
            <a href="#" onclick="DropDownMenu('myDropdown_rubr')" class="drop_btn" style="color:white;">rubriques<img class="fleche_menu" src="img/caret.svg" height="11px"></a>
                <div id="myDropdown_rubr" class="dropdown-content">
               
                <div class="tooltip">
                    <a href="index.php?cat=Développement"><img src="img/developpement.svg" alt="" class="img-rubrique" id="developpement">
                    <span class="tooltiptext">DÉVELOPPEUR</span></a>
                </div>

                <div class="tooltip">
                <a href="index.php?cat=Illustration"><img src="img/graphiste.svg" alt="" class="img-rubrique" id="graphiste">
                    <span class="tooltiptext">ILLUSTRATION</span></a>
                </div>

                <div class="tooltip">
                <a href="index.php?cat=Réseau"><img src="img/reseau.svg" alt="" class="img-rubrique" id="reseau">
                    <span class="tooltiptext">RÉSEAU</span></a>
                </div>

                <div class="tooltip">
                <a href="index.php?cat=Cyber-Sécurité"><img src="img/cyber-security.svg" alt="" class="img-rubrique" id="cyber">
                    <span class="tooltiptext" style="width: 150px;">CYBER-SÉCURITÉ</span></a>
                </div>

                <div class="tooltip">
                <a href="index.php?cat=Détente"><img src="img/detente.svg" alt="" class="img-rubrique" id="detente">
                    <span class="tooltiptext">DÉTENTE</span></a>
                </div>

                

                </div>
            </div>

            <div class="dropdown">
                    <a href="#" onclick="DropDownMenu('myDropdown')" class="drop_btn" style="color:white;">menu<img class="fleche_menu" src="img/caret.svg" height="11px"></a>
                <div id="myDropdown" class="dropdown-content">

                    <div class="light-mode">
                        <div class="theme_title">
                                <p>THÈME MODE</p>
                        </div>

                        <label id="switch" class="switch">
                            <input type="checkbox" onchange="toggleTheme()" id="slider">
                            <span class="slider round"></span>
                        </label>

                    </div>

                <?php if(isset($_SESSION['user'])){ 
                echo '
                                <a href="#" onclick="ModalAddArticle()" class="addpost">
                                <p>AJOUTER UN POSTE</p>
                                <img src="img/AddPost.svg" alt="AddPost" height="20px" id="AddPost">
                                </a>
                       
                            
                            <div class="edit_information">
                            <a href="profil.php?profil='.$_SESSION['id_user'].'"style="color:var(--main-nav-color); text-decoration: none;"><b>'.$_SESSION['user'].'</b></a>
                            </div>
                    
                ';
                        require 'view/modal_Addpost.php';
                    } ?>
            <div class="login_drop">
                <button class="login-button" id="Login" onclick="<?php if(!isset($_SESSION['user'])){
                    echo 'SetModal()';}else{echo "location.href='controler/deconnexion.php'";} ?>">

                <?php if(isset($_SESSION['user'])){
                   echo '<span>Déconnexion</span>'; }else{echo '<span>Connexion</span>';
                   }?></button>

            </div>

        </div>
    </div>
         
           

                <button class="login-button" id="Login" onclick="<?php if(!isset($_SESSION['user'])){
                    echo 'SetModal()';}else{echo "location.href='controler/deconnexion.php'";} ?>">

                <?php if(isset($_SESSION['user'])){
                   echo '<span style="color:var(#E9CF76);">'.$_SESSION['user']['0'].'</span>'; }else{echo '<span style="color:green;"><img class="user-comment" src="img/User.svg" height="13px"></span>';
                   }?></button>


        </div>
        

    </div>



</header>

<div class="loader">

		<div class="flex-bloc cover" id="img_top">
			<img style="width:100%;" src="img/logo_socialarttest.svg" />
		</div>

		<div class="container-lettre">
			<span class="lettre">C</span>
			<span class="lettre">H</span>
			<span class="lettre">A</span>
			<span class="lettre">R</span>
			<span class="lettre">G</span>
			<span class="lettre">E</span>
			<span class="lettre">M</span>
			<span class="lettre">E</span>
			<span class="lettre">N</span>
			<span class="lettre">T</span>

		</div>

	</div>

	<script>
		const loader = document.querySelector('.loader')
		window.addEventListener('load', () => {
			setTimeout(function(){loader.classList.add('fondu-out')}, 1000);
			
		})
	</script>
