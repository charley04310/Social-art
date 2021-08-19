<?php
session_start();
require('../modele/dbConnect.php');
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$nameComment = $_SESSION['user'];
$id_post = $_GET['id'];
$comment = $_POST['AddComment'];
test_input($comment);

if($_SESSION['user'] && $_SESSION['id_user']){
    if(strlen($comment) < 255){
         // On prépare la requete
    $req = $conn->prepare("INSERT INTO MetaPost(Pseudo_User, Desc_com, Id_Poste) 
         VALUES (?, ?, ?)");
     // on place les variables dans les champs de la BDD
     $inf_comm = array($nameComment, $comment, $id_post);
     // ON EXECUTE LA REQUETE
     $req->execute($inf_comm);
     // On redirige vers une page "user"
     header('Location:../post.php?id='.$_GET['id'].'&autor='.$_GET['autor'].'');

    }else{

    header('Location:../post.php?id='.$_GET['id'].'&autor='.$_GET['autor'].'&error=errorComment');
    }

}else{
    header('Location:../post.php?id='.$_GET['id'].'&autor='.$_GET['autor'].'&error=errorServer');
}

?>