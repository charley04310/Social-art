<?php
require('model.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $post = getUsers($_GET['id']);

    require('view/postView.php');
}
else {
    echo 'Erreur : aucun identifiant de billet envoyé';
}