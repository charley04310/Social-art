<?php

$req = $conn->prepare('SELECT Titre_Poste, Id_Poste, Cat_Poste, Date_Poste, Id_Users, Desc_Poste FROM Postes WHERE Id_Poste =?');
$req->execute(array($_GET['id']));
$data = $req->fetch();


$ReqdataName = $conn->prepare('SELECT Pseudo_Users FROM Utilisateurs WHERE Id_Users =?');
$ReqdataName->execute(array($_GET['id']));
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
                    <p style="color: #FF7D2C;"><a href="profil.php">@<?=$dataName['Pseudo_Users']?></a></p>

                    <p class="description_article"><?=$data['Desc_Poste']?></p>
                </div>

                <div class="comment_post">

                    <h3 class="auteur_comment"><a href="#" style="text-decoration: none;">@Jule_creator</a></h3>
                    <p class="comment_user">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis porro,
                        similique aperiam voluptas neque, reiciendis commodi atque magni nostrum et, corrupti ut. Omnis,
                        nostrum? Neque officiis corrupti dolor amet provident!</p>

                    <h3 class="auteur_comment"><a href="#" style="text-decoration: none;">@Jule_creator</a></h3>
                    <p class="comment_user">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam distinctio
                        assumenda fugiat voluptate quos sint totam nisi, doloremque est labore dolorum, sapiente alias
                        repudiandae vel voluptates deserunt aliquid omnis sit.</p>

                    <h3 class="auteur_comment"><a href="#" style="text-decoration: none;">@Jule_creator</a></h3>
                    <p class="comment_user">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam mollitia
                        iste, facilis exercitationem alias at ducimus! Sed, excepturi et ipsam minima quam dignissimos?
                        Amet voluptatum debitis odio quo explicabo inventore.</p>


                    <input type="text" id="AddComment"><br>
                    <button id="new_comment"><b>Ajoutez votre commentaire</b></button>

                </div>

            </div>
        </div>

    </section>