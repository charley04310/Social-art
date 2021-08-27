<section id="container-welcoming" class="container-welcoming">


    <h1> <?php if(isset($_SESSION['user'])){
        echo 'Bienvenue <b style="color:#fe7400;">'. $_SESSION['user'] . '</b>';
    }else{
        echo ' Benvenue sur la plateforme SOCIAL\'ART';
    } ?></h1>
    <p class="welcoming_para">Notre réseau social unique en son genre est destiné aux créateurs de contenues qui travaillent dans les
        métiers de digital</p>
</section>
