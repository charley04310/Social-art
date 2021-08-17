<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=SocialArt", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
 
function MailSetup($recup_code,$pseudo,$recup_mail){

   $from = "socialart@contact.fr";

   $subject = "Essai de PHP Mail";
   $headers[] = 'MIME-Version: 1.0';
   $headers[] = 'Content-type: text/html; charset=iso-8859-1';

     // En-têtes additionnels
   $headers[] = 'To: '.$recup_mail ;
   $headers[] = 'From:' . $from ;
 
   $message = '
<html>
   <head>
     <title>Récupération de mot de passe - Votresite</title>
     <meta charset="utf-8" />
   </head>
   <body>
     <font color="#303030";>
       <div align="center">
         <table width="600px">
           <tr>
             <td>
               
               <div align="center">Bonjour <b>'.$pseudo.'</b>,</div>
               Voici votre code de récupération: <b>'.$recup_code.'</b>
               A bientôt sur <a href="#">Votre site</a> !
               
             </td>
           </tr>
           <tr>
             <td align="center">
               <font size="2">
                 Ceci est un email automatique, merci de ne pas y répondre
               </font>
             </td>
           </tr>
         </table>
       </div>
     </font>
   </body>
   </html>
   ';

   if(mail($recup_mail, $subject, $message, implode("\r\n", $headers))){
      echo 'mail envoyé';
   }else{
      echo 'mail pas envoyé';
   }

}


if(isset($_POST['NewMdp'])) {

   $recup_mail = htmlspecialchars($_POST['NewMdp']);

      if(filter_var($recup_mail, FILTER_VALIDATE_EMAIL)){

         $mailexist = $conn->prepare('SELECT Id_Users, Pseudo_Users, Email_Users FROM Utilisateurs WHERE Email_Users=?');
         $mailexist->execute(array($recup_mail));
         $mailexist_count = $mailexist->rowCount();

         if($mailexist_count == 1) {

            $data = $mailexist->fetch();
            $pseudo = $data['Pseudo_Users'];
            $id_user = $data['Id_Users'];
            $_SESSION['recup_mail'] = $data['Email_Users'];
            $recup_code = mt_rand(100,999);

            $mail_recup_exist = $conn->prepare('SELECT Id_user FROM Recuperation WHERE Email_user=?');
            $mail_recup_exist->execute(array($recup_mail));
            $mail_recup_exist = $mail_recup_exist->rowCount();

               if($mail_recup_exist == 1){

                  $recup_insert = $conn->prepare('UPDATE Recuperation SET Recup_code=? WHERE Email_user=?');
                  $recup_insert->execute(array($recup_code,$recup_mail));
                  MailSetup($recup_code,$pseudo,$recup_mail);
                  header("Location:http://localhost:8888/social'art/Social-art/NewMdp.php?section=code");

                  

               }else{

                  $recup_insert = $conn->prepare('INSERT INTO Recuperation(Id_user, Email_user, Recup_code) VALUES (?, ?, ?)');
                  $recup_insert->execute(array($id_user,$recup_mail,$recup_code));
                  MailSetup($recup_code,$pseudo,$recup_mail);
                  header("Location:http://localhost:8888/social'art/Social-art/NewMdp.php?section=code");

               }
              
         }else{
            echo "vous n'etes pas inscrit ";
         }
      }else{
         echo 'Email non valide';
      }  
   }else{
   echo 'le champ est vide';
}








/*if(isset($_POST['verif_submit'],$_POST['verif_code'])) {
   if(!empty($_POST['verif_code'])) {
      $verif_code = htmlspecialchars($_POST['verif_code']);
      $verif_req = $bdd->prepare('SELECT id FROM recuperation WHERE mail = ? AND code = ?');
      $verif_req->execute(array($_SESSION['recup_mail'],$verif_code));
      $verif_req = $verif_req->rowCount();
      if($verif_req == 1) {
         $up_req = $bdd->prepare('UPDATE recuperation SET confirme = 1 WHERE mail = ?');
         $up_req->execute(array($_SESSION['recup_mail']));
         header('Location:../index.php?reg_err=/recuperation.php?section=changemdp');
      } else {
         $error = "Code invalide";
      }
   } else {
      $error = "Veuillez entrer votre code de confirmation";
   }
}
if(isset($_POST['change_submit'])) {
   if(isset($_POST['change_mdp'],$_POST['change_mdpc'])) {
      $verif_confirme = $bdd->prepare('SELECT confirme FROM recuperation WHERE mail = ?');
      $verif_confirme->execute(array($_SESSION['recup_mail']));
      $verif_confirme = $verif_confirme->fetch();
      $verif_confirme = $verif_confirme['confirme'];
      if($verif_confirme == 1) {
         $mdp = htmlspecialchars($_POST['change_mdp']);
         $mdpc = htmlspecialchars($_POST['change_mdpc']);
         if(!empty($mdp) AND !empty($mdpc)) {
            if($mdp == $mdpc) {
               $mdp = sha1($mdp);
               $ins_mdp = $bdd->prepare('UPDATE membres SET motdepasse = ? WHERE mail = ?');
               $ins_mdp->execute(array($mdp,$_SESSION['recup_mail']));
              $del_req = $bdd->prepare('DELETE FROM recuperation WHERE mail = ?');
              $del_req->execute(array($_SESSION['recup_mail']));
               header('Location:../index.php/connexion/');
            } else {
               $error = "Vos mots de passes ne correspondent pas";
            }
         } else {
            $error = "Veuillez remplir tous les champs";
         }
      } else {
         $error = "Veuillez valider votre mail grâce au code de vérification qui vous a été envoyé par mail";
      }
   } else {
      $error = "Veuillez remplir tous les champs";
   }
}
?>*/