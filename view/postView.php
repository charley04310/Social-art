<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=socialart", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
} ?>


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

while ($data = $req->fetch())
{

echo '

    <div class="carte_article">
        <a href="post.php">
            <div class="data_article">
                <div class="meta_post">
                    <h3>'. $data['Titre_Poste'] .'</h3>
                    <p> Auteur :' .$data['Id_Poste']. ' </p>
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
    </div>';} // Fin de la boucle des billets
$req->closeCursor();
?>
</section>