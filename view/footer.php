

    <script>

window.onload = function () {  
    test();
    <?php if(!empty($_GET['login_err'])){
    echo  'SetModal();
    darkMode()';
    }else{  echo 'darkMode();
        
       ';}?>
}
/******************** Load Service Worker ****************************************/
if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('serviceworker.js');
};
</script>
</body>
</html>