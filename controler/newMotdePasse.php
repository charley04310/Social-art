<?php
session_start();
require('../modele/dbConnect.php');


                  // ------------------ Fonction d'envoi de mail 
 
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

                     /*------- On verifie le mail pour envoyer le code de verification et pour lenregistrer en BDD ---------*/

if(isset($_POST['NewMdp'])){

   $recup_mail = htmlspecialchars($_POST['NewMdp']);

   if(filter_var($recup_mail, FILTER_VALIDATE_EMAIL)){

         $mailexist = $conn->prepare('SELECT Id_Users, Pseudo_Users, Email_Users FROM Utilisateurs WHERE Email_Users=?');
         $mailexist->execute(array($recup_mail));
         $mailexist_count = $mailexist->rowCount();

         if($mailexist_count == 1){

            $_SESSION['recup_mail'] = $recup_mail;
            $_SESSION['recup_validate'] = 'validate_email';

            $data = $mailexist->fetch();
            $pseudo = $data['Pseudo_Users'];
            $id_user = $data['Id_Users'];
            $recup_code = mt_rand(100,999);
            $mail_recup_exist = $conn->prepare('SELECT Id_user FROM Recuperation WHERE Email_user=?');
            $mail_recup_exist->execute(array($recup_mail));
            $mail_recup_exist = $mail_recup_exist->rowCount();


               if($mail_recup_exist == 1){

                  $recup_insert = $conn->prepare('UPDATE Recuperation SET Recup_code=? WHERE Email_user=?');
                  $recup_insert->execute(array($recup_code,$recup_mail));
                  MailSetup($recup_code,$pseudo,$recup_mail);
                  header("Location:http://localhost:8888/social'art/Social-art/NewMdp.php");
                  
               }else{

                  $recup_insert = $conn->prepare('INSERT INTO Recuperation(Id_user, Email_user, Recup_code) VALUES (?, ?, ?)');
                  $recup_insert->execute(array($id_user,$recup_mail,$recup_code));
                  MailSetup($recup_code,$pseudo,$recup_mail);
                  header("Location:http://localhost:8888/social'art/Social-art/NewMdp.php");

               }
              
         }else{
            echo 'vous n\'etes pas inscrit';
         }
   }else{
         echo 'Email non valide';
      }  
}else{
   echo 'le champ est vide';
}

                     /*------- On verifie le code que l'utilisateur nous transmet ---------*/


$validate_code = $_POST['CodeVerify'];

if(isset($validate_code) && strlen($validate_code) < 4 ){

   $verif_req = $conn->prepare('SELECT Id_user FROM Recuperation WHERE Email_user = ? AND Recup_code = ?');
   $verif_req->execute(array($_SESSION['recup_mail'],$validate_code));
   $verif_req = $verif_req->rowCount();

   if($verif_req == 1) {

      $_SESSION['recup_validate'] = 'validate_code';

      $up_req = $conn->prepare('UPDATE Recuperation SET confirmation = 1 WHERE Email_user = ?');
      $up_req->execute(array($_SESSION['recup_mail']));
      header('Location:http://localhost:8888/social\'art/Social-art/NewMdp.php');

   }else{
      echo 'probleme lors de la mise a jour en BDD';
   }

}else{
   echo 'Votre code est non valide, merci de vérifier votre boite mail';

}




   



