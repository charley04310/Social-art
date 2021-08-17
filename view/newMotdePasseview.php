
<div class="container_NewMdp">

<?php
if(isset($_GET['section']) && $_GET['section'] === "code" ){
echo '
<form action="controler/newMotdePasse.php" method="post" class="form_NewMdp">

<div  class="texte_NewMdp">
     <p style="text-align:left">Merci de renseigner le code de récupération qui vous a été transmis par mail</p>
</div>

<div class="input_newMdp">
    <input type="code" id="CodeVerify" placeholder="Votre Code" name="CodeVerify">
</div>

    <div class="submit_newMdp"> 
        <input type="submit" id="MdpSubmit" value="Vérifier" name="Submit_CodeVerify">
    </div>
</form>

</div>

';

}else{
    echo '
    <form action="controler/newMotdePasse.php" method="post" class="form_NewMdp">

    <div  class="texte_NewMdp">
         <p style="text-align:left">Vous avez perdu votre mot de passe ou vous souhaitez le changer ?<br>Merci de renseigner votre email</p>
    </div>

    <div class="input_newMdp">
        <input type="email" id="NewMail" placeholder="Adresse mail" name="NewMdp">
    </div>


        <div class="submit_newMdp"> 
            <input type="submit" id="MdpSubmit" value="Réinitialiser" name="NewMdpUpDate">
        </div>
</form>';


}
 ?>

