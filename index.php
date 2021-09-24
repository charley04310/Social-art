<!doctype html>
<html lang="fr">
<head>
	<!-- Manifest file -->
	<link rel="manifest" href="manifest.json">

   <script>
    /******************** Load Service Worker ****************************************/
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('serviceworker.js');
    };
    </script> 
</head>
<?php
$title_page = 'Page Acceuil';
$title_post = ' DÉCOUVREZ NOS DERNIERS POSTES';


require('view/header.php');

require('view/modal_connexion.php');

require('view/welcoming.php');

require('view/postView.php');

require('view/footer.php');
?>



</html>