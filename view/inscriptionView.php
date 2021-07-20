

<form class="new_user" action="controler/registrer.php" method="post">

    <div class="description_adduser">
        <div class="background_adduser_description">
        </div>

    </div>

    <div class="container_adduser">

        <div class="add User">
            <label for="name"><em>Identifiant</em></label><br />
            <input type="text" id="Add_Name" name="AddUsername" required>
        </div>

        <div  class="add Mdp">
            <label for="text"><em>Mot de Passe</em></label><br />
            <input type="password" id="Add_Password" name="AddPassword" required>
        </div>

        <div  class="add Mdp">
            <label for="text"><em>Confirmation du Mot de Passe</em></label><br />
            <input type="password" id="Add_Password" name="ConfirmationPassword" required>
        </div>


        <div  class="add Email">
            <label for="text"><em>Email</em></label><br />
            <input type="email" id="Add_Email" name="AddEmail" required>
        </div>

        <div class="validate_condition">
        <input type="checkbox" id="conditions" name="conditions">
        <p>En cochant cette case, je confirme avoir pris connaissance des <a href="">conditions générales d'utilisations</a> de l'application.</p>

        </div>
       
        <div class="submit_user">
            <input type="submit" id="save_user" value="S'enregistrer">
        </div>
    </div>


</form>