<section class="container-profil-view">

    <div class="cover_profil">
    </div>


    <?php

    if ($_GET['profil']) {

        $ReqdataName = $conn->prepare('SELECT Pseudo_Users, Email_Users, Bio_Users, Natio_Users, Avatar_Users FROM Utilisateurs WHERE Id_Users =?');
        $ReqdataName->execute(array($_GET['profil']));
        $dataName = $ReqdataName->fetch();

        echo ' 
        <div class="avatar-bloc">
            <img src="' . $dataName['Avatar_Users'] . '" class="avatar_profil" alt="">
        </div>
    <div class="bloc-left-profil">
       

        <div class="name-date">
            <div class="inf-user">
            <p class="email-profil" style="font-size: 17px; color:var(--main-nav-color)" ><img class="fleche_menu" src="img/User.svg" height="13px"> ' . $dataName['Pseudo_Users'] . '</p>
            <p class="natio-profil" style="font-size: 13px;"><img class="fleche_menu" src="img/geo.svg" style="padding-left: 1rem;" height="13px"> ' . $dataName['Natio_Users'] . '</p>
            <p class="bio-profil" style="font-size: 13px;" ><img class="fleche_menu" src="img/mood.svg" style="padding-left: 1rem;" height="13px"> ' . $dataName['Bio_Users'] . '</p>
            </div>
        </div>
        
        ';
    }
    if (isset($_SESSION['id_user'])) {
        if ($_SESSION['id_user'] === $_GET['profil']) {

            $ReqdataName = $conn->prepare('SELECT Pseudo_Users, Email_Users, Bio_Users, Natio_Users FROM Utilisateurs WHERE Id_Users =?');
            $ReqdataName->execute(array($_GET['profil']));
            $dataName = $ReqdataName->fetch();

    ?>

            <div class="dropdown-container-post">

                <a href="#" onclick="DropDownMenu('myDropdown_edit')" class="drop_btn" style="color:white; font-size:15px;">
                    <img class="fleche_menu" src="img/User.svg" height="13px"> MODIFIER VOS INFORMATIONS PERSONNELLES <img class="fleche_menu" src="img/caret.svg" height="13px">
                </a>

                <div id="myDropdown_edit" class="dropdown-edit">


                    <div class="bloc_informations_personnelles">
                        <form action="controler/EditProfil.php" method="post" enctype="multipart/form-data">
                            <p>Votre Email</p>
                            <input type="email" class="email-profil" name="EditEmail" value="<?= $dataName['Email_Users'] ?>">
                            <p>Votre Description</p>
                            <input type="text" class="bio-profil" name="EditBio" value="<?= $dataName['Bio_Users'] ?>">
                            <p>Nationalité</p>

                            <input type="text" class="bio-profil" name="EditNatio" value="<?= $dataName['Natio_Users'] ?>"><br />
                            <p>Votre Photo de Profil</p>

                            <input placeholder="Ajouter" type="file" id="img_post" name="EditAvatar" accept="image/png, image/jpeg">

                            <button class="edit-profil">Mise à jour</button>
                        </form>

                    </div>
                </div>
            </div>

            <div class="dropdown-container-post">

                <a href="#" onclick="DropDownMenu('myDropdown_secu')" class="drop_btn" style="color:white; font-size:15px;">
                    <img class="fleche_menu" src="img/cyber-security.svg" height="13px"> MOT DE PASSE ET IDENTIFIANT <img class="fleche_menu" src="img/caret.svg" height="13px">
                </a>

                <div id="myDropdown_secu" class="dropdown-secu">

                    <div class="Connexion et Sécurité">

                        <form>
                            <p>Pseudo</p>
                            <input type="text" class="bio-profil" name="EditPseudo" value="<?= $dataName['Pseudo_Users'] ?>">
                            <p>Nouveau Mot de Passe</p>
                            <input type="password" class="password-profil" name="EditPassword" placeholder="votre nouveau mot de passe">
                            <p>Confirmer votre Mot de Passe</p>
                            <input type="password" class="password-profil" name="ConfirmPassword" placeholder="confirmer mot de passe"><br />
                            <button class="edit-profil">Mise à jour</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
  
        <div class="separator-metapost"></div>
                    <?php
            require 'view/postView.php';
            die;
        }
    } 
    ?>

    </div>
<?php     require 'view/postView.php';?>

</section>