<?php
require ("../modele/dbConnect.php");
//Variable utilisé pour afficher une notification d'erreur ou de succès
$message = '';
// Si aucun token n'est spécifié en paramètre de l'URL
if (empty ($_GET['token'])) {
    echo 'Aucun token n\'a été spécifié';
    exit;

}
//On récupère les informations par rapport au token dans la base de données
$query  $db->prepare ('SELECT date_demande_recupération_pwd FROM users WHERE pwd-recuperation_token = ?');
$query->bindValue(1, $_GET['token']);
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);
if (empty($row)) { //Si aucune info associée au token n'est trouvé
    echo 'Ce token n\' a pas été trouvé';
    exit;

}
//On calcul la date de la génération du token + 1heure
$dateToken = strtotime ('+1 hours', strtotime($row['date_demande-recuperation-pwd']));
$dateToday = time();

if($dateToken < $dateToday) { // Si la date est dépassé le délais de 3hrs
    echo 'Token expiré !';
    exit;
}

//Si le formulaire à été soumis
if (!empty ($_POST [btn_user_ChangePassword])) {
    //si le formualaire est correctement remplit
    if (!empty($_POST['user-ChangePassword'])
    && !empty($_POST['user-ChangePasswordConfirm'])) {
        //Si les deux mots de passe sont les mêmes
        if ($_POST['user_ChangePassword'] === $_POST['user-ChangePasswordConfirm']) {
            // On hash le mot de passe
            $password = password_hash($_POST['user_ChangePassword'], PASSWORD_DEFAULT);
            //on modifie les informations dans la base de données
            $req='UPDATE users SET pwd = ?, pwd_recuperation_token = ""
            WHERE pwd_recuperation_token = ?';
            $query = $db->prepare($req);
            echo $req. " ********** ".$password." ********** " .$_GET['token'];
            $query->bindValue(1, $password);
            $query->bindValue(2, $_GET['token']);
            $query->execute ();
            $message = '<div style="color: green;">Le mot de passe à été changé !</div>';
            // si les deux mots de passe ne sont pas identiques
        }else {
            $message = '<div style="color: red;"> les deux mots de passes ne sont pas identiques. </div>';

        }
        } else {
            $message = '<div style="color : red;"> Veuillez remplir tous les champs du formulaire. </div>';

        }
    }
    ?>