<?php

$req = $conn->prepare('SELECT Titre_Poste, Id_Poste, Cat_Poste, Date_Poste, Id_Users, Desc_Poste, Img_Poste, Nbr_Avis FROM Postes WHERE Id_Poste =?');
$req->execute(array($_GET['id']));
$data = $req->fetch();


$ReqdataName = $conn->prepare('SELECT Pseudo_Users FROM Utilisateurs WHERE Id_Users =?');
$ReqdataName->execute(array($_GET['autor']));
$dataName = $ReqdataName->fetch();


$userLike = $conn->prepare('SELECT * FROM User_Like WHERE Id_Post =?');
$userLike->execute(array($_GET['id']));

while ($dataLike = $userLike->fetch()) {
    $Like = 0;
    $Dislike = 0;

    if ($dataLike['Like_user'] == '1') {
        $Like++;
    }

    if ($dataLike['Dislike_user'] == '1') {
        $Dislike++;
    }
}

if (isset($_SESSION['id_user'])) {

    $userLiked = $conn->prepare('SELECT Like_user, Dislike_user FROM User_Like WHERE id_user =? AND Id_Post =?');
    $userLiked->execute(array($_SESSION['id_user'], $_GET['id']));
    $dataUserLiked = $userLiked->fetch();


    if ($dataUserLiked['Like_user'] === '1') {
        $heart = '<img width="25px" style="margin-top:1rem;" src="img/heartFull.svg" alt="">';
    } else {
        $heart = '<img width="25px" style="margin-top:1rem;" src="img/heart.svg" alt="">';
    }


}

?>

<section class="container-post">
    <div class="post_view">

        <div class="cover_post">
            <img src="<?= $data['Img_Poste'] ?>" class="img_poste_couverture" alt="">
        </div>

        <div class="data_post">
            <div class="meta_post">

                <h1>
                    <div class="bloc_color_h2"></div> <?= $data['Titre_Poste'] ?>
                </h1>

                <p style="color: #E9CF76;"><a href="profil.php?profil=<?= $_GET['autor']?>" style="color: #E9CF76;"><img class="user-comment" src="img/User.svg" height="13px"> <?= $dataName['Pseudo_Users'] ?></a></p>
                <p><em><?= $data['Cat_Poste'] ?></em></p>
                <p><em><?= $data['Date_Poste'] ?></em></p>

                
                    <p style="font-size:11px;"><?= $data['Nbr_Avis']?>
                    <img width="12px" src="img/heartFull.svg" style="margin-left: 0.5rem;"></p>

                <div class="separator-metapost"></div>
                <p class="description_article"><?= $data['Desc_Poste'] ?></p>

                <?php
                if (isset($_SESSION['id_user'], $_SESSION['user'])) {
                    echo '
                        <a href="controler/like.php?meta=like&id_post=' . $data['Id_Poste'] . '&id_user=' . $_SESSION['id_user'] . '">' . $heart . '</a>
                        </a>
                        ';
                }
                ?>

            </div>

            <div class="dropdown-container-post">
                <div class="separator-metapost"></div>

                <a href="#" onclick="DropDownMenu('myDropdown_comment')" class="drop_btn" style="color:white; font-size:15px;"><img class="fleche_menu" src="img/comment.svg" height="13px"> AFFICHER LES COMMENTAIRES (145)</a>
                <div id="myDropdown_comment" class="dropdown-comment">



                    <?php
                    $req = $conn->prepare('SELECT Desc_Com, Pseudo_User FROM MetaPost WHERE Id_Poste= ?');
                    $req->execute(array($_GET['id']));

                    while ($data = $req->fetch()) {

                        $reqConfirm = $conn->prepare('SELECT Id_Users FROM Utilisateurs WHERE Pseudo_Users= ?');
                        $reqConfirm->execute(array($data['Pseudo_User']));
                        $id_user = $reqConfirm->fetch();


                        echo '
        <div class="comment_post">
        <p class="auteur_comment" style="text-align:left;"><a href="profil.php?profil=' . $id_user['Id_Users'] . '" style="text-decoration: none;"><img class="user-comment" src="img/User.svg" height="13px"> ' . $data['Pseudo_User'] . ' </a></p>
        <p class="comment_user">' . $data['Desc_Com'] . '</p>
        ';
                    }
                    ?>
                    <?php

                    if (isset($_SESSION['user']) && isset($_SESSION['id_user'])) {
                        echo
                        '<form class="new_comment" action="controler/comment.php?id=' . $_GET['id'] . '&autor=' . $_SESSION['id_user'] . '" method="post">
                <input type="text" id="AddComment" name="AddComment"><br>
                <div class="separator-comment"></div>

                <button id="new_comment"><b>Publier votre commentaire</b></button>
            <form/>
            ';
                    }

                    ?>
                </div>
            </div>

        </div>

    </div>
    </div>

</section>