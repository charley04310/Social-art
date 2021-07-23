

<section class="popup_log">


<div id="myModal" class="modal">
    <div class="modal-content">


        <div class="container-login">

            <div class="input_edit">
                <div class="close_bloc">
                <span class="close">&times;</span><br>

                </div>

<img src="img/logo_socialart.svg" alt="social_art">
        <form action="controler/Login.php" method="post">
        <?php 

if(isset($_GET['login_err'])){

    $err = htmlspecialchars($_GET['login_err']);

    switch($err)
    {
        case 'password':
            ?>
            <div style="color:red;">
                <strong>Erreur</strong> Mot de passe incorrect
            </div>
        <?php
        break;

        case 'username':
            ?>
            <div style="color:red;">
                <strong>Erreur</strong> pseudo incorrect
            </div>
        <?php
        break;

        case 'feed':
            ?>
            <div style="color:red;">
                <strong>Erreur</strong> Champ vide incorrect
            </div>
        <?php
        break;

    } 
} else{
    if(isset($_GET['login'])){
        echo ' 
        <script> window.onload = function() {
            SetModal();
          };</script>
        <div style="color:green;">
        <strong>Succes</strong> connexion
    </div>';
    }

}

?>

                <div class="input-loggin">
                    <label for="name"><em>Identifiant</em></label><br />
                    <input type="text" id="Id_Name" name="username" required>
                </div>

                <div  class="input-loggin">
                    <label for="text"><em>Mot de Passe</em></label><br />
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="memoriser_conn">
                    <input type="checkbox" id="remember_checkbox" name="conditions">
                    <label for="text"><em>Mémoriser mes identifiants</em></label>

                </div>
            
                <div>
                    <input type="submit" id="connexion" value="Se connecter">
                </div>

                <div class="create_account">
                    <p>Vous n'avez pas encore de Compte ? <a href="inscription.php">Enregistrez-vous !</a></p>
                   <p>Vous avez oubliez <a href="">Mot de passe ?</a></p>
                </div>
            </div>
        </form>
           
        </div>
    </div>


</section>


<section class="ModalAddArticle">

        <!-- The Modal -->
        <div id="AddArticle" class="modal">

            <!-- Modal content -->
            <div class="AddArticle-content">
                <span class="close">&times;</span>
                <p>Some text in the Modal..</p>
            </div>

        </div>

    </section>


    <section class="modalEditInf">

        <!-- The Modal -->
        <div id="EditInf" class="modal">
            <!-- Modal content -->
            <div class="AddArticle-content">
                <span class="close">&times;</span>
                <p>Some text in the Modal..</p>
            </div>

        </div>

    </section> 
