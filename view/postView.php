

<section id="container-welcoming" class="container-welcoming">
    <h1> <?php if(isset($_SESSION['user'])){
        echo 'Bienvenue <b>'. $_SESSION['user'] . '</b>';
    } ?> Retrouve les dernieres créations de nos contributeurs</h1>
    <p>Notre réseau social unique en son genre est destiné aux créateurs de contenues qui travaillent dans les
        métiers de digital</p>
</section>
<section class="Article">

<?php
$req = $conn->query('SELECT * FROM Postes');


while ($data = $req->fetch()){


    $ReqdataName = $conn->prepare('SELECT Pseudo_Users FROM Utilisateurs WHERE Id_Users =?');
    $ReqdataName->execute(array($data['Id_Users']));
    $ReqdataName = $ReqdataName->fetch();
    
    if($ReqdataName){
        
        echo '
    <div class="carte_article">
        <a href="post.php?id='.$data['Id_Poste'].'&autor='.$data['Id_Users'].'">
            <div class="data_article">
                <div class="meta_post">
                    <h3>'. $data['Titre_Poste'] .'</h3>
                    <p> ' .$ReqdataName['Pseudo_Users']. ' </p>
                </div>

                <div class="meta_logo">
                    <div class="like">
                        <img src="img/heart.svg" alt="">
                        <p>' .$data['Nbr_Avis']. '</p>
                    </div>

                    <div class="comment">
                        <img src="img/comment.svg" alt="">
                        <p>' .$data['Nbr_Comment']. '</p>
                    </div>

                </div>   
            </div>
        </a>
    </div>';
    }
} 
$req->closeCursor();
?>
</section>