


<script>
    window.onload = function () {
        darkMode();
        ModalAddArticle();
        EditInf()
    }
    /******************** Load Service Worker ****************************************/
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('serviceworker.js');
    };
</script>
</body>
</html>