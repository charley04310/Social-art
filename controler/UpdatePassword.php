
<?php 
session_start();
require('../modele/dbConnect.php');

$NewMdp = $_POST['InsertMdp'];
$VerifPassword = $_POST['VerifInsertMdp'];


if(isset($VerifPassword)){

   if($NewMdp === $VerifPassword) {

      $searchString = " ";
      $replaceString = "";

      $NewMdp = htmlspecialchars($NewMdp);
      $NewMdp = str_replace($searchString,$replaceString,$NewMdp);

      $verif_confirme = $conn->prepare('SELECT Confirmation FROM Recuperation WHERE Email_user = ?');
      $verif_confirme->execute(array($_SESSION['recup_mail']));
      $verif_confirme = $verif_confirme->fetch();
      $verif_confirme = $verif_confirme['Confirmation'];

      if($verif_confirme == 1) {

         $New_pass_hache = password_hash($NewMdp, PASSWORD_DEFAULT);
         $ins_mdp = $conn->prepare('UPDATE Utilisateurs SET Mdp_Users = ? WHERE Email_Users =?');
         $ins_mdp->execute(array($New_pass_hache, $_SESSION['recup_mail']));

         if($ins_mdp){
            $del_req = $conn->prepare('DELETE FROM Recuperation WHERE Email_user = ?');
            $del_req->execute(array($_SESSION['recup_mail']));
            session_destroy();
            session_start();
            $_SESSION['succes'] = 'UpdateOk';
            header("Location:http://localhost:8888/social'art/Social-art/NewMdp.php");
            
         }else{

            $error = "probleme lors de la confirmation serveur";
         }

      } else{
         $error = "Erreur lors de la mise a jours du mdp";
      }
   }else{
      $error = "Vos mots de passes ne correspondent pas";
   }

}else{
      $error = "champs vident";

   }