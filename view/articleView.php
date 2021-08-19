<?php

$req = $conn->prepare('SELECT Titre_Poste, Id_Poste, Cat_Poste, Date_Poste, Id_Users, Desc_Poste FROM Postes WHERE Id_Poste =?');
$req->execute(array($_GET['id']));
$data = $req->fetch();


$ReqdataName = $conn->prepare('SELECT Pseudo_Users FROM Utilisateurs WHERE Id_Users =?');
$ReqdataName->execute(array($_GET['autor']));
$dataName = $ReqdataName->fetch();

?>

<section class="container-post">
        <div class="post_view">

            <div class="cover_post">
            </div>

            <div class="data_post">
                <div class="meta_post">
                    <h1><?=$data['Titre_Poste']?></h1>
                    <p style="font-size: 10px;">Pulication :<em><?=$data['Date_Poste']?></em></p>
                    <p style="font-size: 10px;">Catégorie :<em><?=$data['Cat_Poste']?></em></p>
                    <p style="color: #FF7D2C;"><a href="profil.php?profil=<?=$_GET['autor']?>"><?=$dataName['Pseudo_Users']?></a></p>

                    <p class="description_article"><?=$data['Desc_Poste']?></p>
               </div>

<?php
    $req = $conn->prepare('SELECT Desc_Com, Pseudo_User FROM MetaPost WHERE Id_Poste= ?');
    $req->execute(array($_GET['id']));

        while ($data = $req->fetch()){

            $reqConfirm = $conn->prepare('SELECT Id_Users FROM Utilisateurs WHERE Pseudo_Users= ?');
            $reqConfirm->execute(array($data['Pseudo_User']));
            $id_user = $reqConfirm->fetch();
          


        echo '
        <div class="comment_post">
        <h3 class="auteur_comment"><a href="profil.php?profil='.$id_user['Id_Users'].'" style="text-decoration: none;">'.$data['Pseudo_User'].'</a></h3>
        <p class="comment_user">'.$data['Desc_Com'].'</p>
        ';
        }   
        ?>
        <?php

        if(isset($_SESSION['user']) && isset($_SESSION['id_user'])){
            echo
            '<form class="new_comment" action="controler/comment.php?id='.$_GET['id'].'&autor='.$_SESSION['id_user'].'" method="post">
                <input type="text" id="AddComment" name="AddComment"><br>
                <button id="new_comment"><b>Ajoutez votre commentaire</b></button>
            <form/>
            ';
            }

        ?>
                   
                </div>

            </div>
        </div>

    </section>