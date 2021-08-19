<section class="container-profil-view">

<div class="cover_profil">
</div>
<div class="top-profil">

    <div class="bloc-left-profil">
        <div class="avatar-bloc">
        </div>

        <div class="name-date">
        <?php 

        if($_GET['profil']){
            $ReqdataName = $conn->prepare('SELECT Pseudo_Users, Email_Users, Bio_Users FROM Utilisateurs WHERE Id_Users =?');
            $ReqdataName->execute(array($_GET['profil']));
            $dataName = $ReqdataName->fetch();
        }
        
        ?>
            <p class="pseudo-profil"><?=$dataName['Pseudo_Users']?></p>
            <p class="email-profil"><em><?=$dataName['Email_Users']?></em></p>
        <?php 
        if(isset($_SESSION['id_user'])){
            if($_SESSION['id_user'] === $_GET['profil']){
            echo' <button class="edit-profil">Modifier mes informations personnelles</button>';
            }
        }
        ?>  
        </div>
    </div>

    <div class="profil-desc">
        <p><?=$dataName['Bio_Users']?></p>
    </div>
</div>
</section>