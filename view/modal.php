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
                <div class="input-loggin">
                    <label for="name"><em>Identifiant</em></label><br />
                    <input type="text" id="Id_Name" name="username" required>
                </div>

                <div  class="input-loggin">
                    <label for="text"><em>Mot de Passe</em></label><br />
                    <input type="password" id="password" name="password" required>
                </div>

                <div>
                    <input type="submit" id="connexion" value="Se connecter">
                </div>

                <div class="create_account">
                    <p>Vous n'avez pas encore de Compte ? <a href="">Enregistrez-vous !</a></p>
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
