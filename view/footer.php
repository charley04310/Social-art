


<script>

    window.onload = function () {     
        <?php if(!empty($_GET['login_err'])){
        echo  'SetModal();
        darkMode();
        ModalAddArticle();
        EditInf()';
        }else{  echo 'darkMode();
            ModalAddArticle();
            EditInf()';}?>

    }
    /******************** Load Service Worker ****************************************/
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('serviceworker.js');
    };
</script>
</body>
</html>