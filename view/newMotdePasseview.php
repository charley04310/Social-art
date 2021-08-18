
<div class="container_NewMdp">

<?php
if(isset($_SESSION['recup_validate'])){

    switch($_SESSION['recup_validate']){

        case 'validate_email':
            $MessageInformatif = 'Merci de renseigner le code de récupération qui vous a été transmis par mail';
            $placeholder = 'Votre code';
            $submit = 'Submit_CodeVerify';
            $type = 'code';
            $action = 'newMotdePasse.php';
            $value = 'Vérifier';
            $inputName = 'CodeVerify';
            break;

        case 'validate_code':
            $MessageInformatif = 'Merci de renseigner votre nouveau mot de passe';
            $placeholder = 'Votre nouveau Mot de passe';
            $Verifplaceholder = 'Confirmation de votre Mot de passe';
            $action = 'UpdatePassword.php';
            $inputName = 'InsertMdp';
            $inputNameVerify = 'VerifInsertMdp';
            $value = 'Mettre à jour';
            $type = 'password';
            $submit = 'UpdateMdp';
            break;       
        
    }
}else{

    $MessageInformatif = 'Vous avez perdu votre mot de passe ou vous souhaitez le changer ? Merci de renseigner votre email';
    $placeholder = 'Votre Adresse Mail';
    $type = 'email';
    $value = 'Réinitialiser';
    $action = 'newMotdePasse.php';
    $inputName = 'NewMdp';
    $submit = 'NewMdpUpDate';
}

?>
<?php 
if(isset($_SESSION['succes'])){
    if($_SESSION['succes'] === 'UpdateOk'){
        echo '<div>Felicitation votre Mot de passe a bien été mis à jour !!<br>
        
        </div> ';
    }
}
?>
<form action="controler/<?=$action?>" method="post" class="form_NewMdp">


<div  class="texte_NewMdp">
     <p style="text-align:left"><?=$MessageInformatif?></p>
</div>


<div class="input_newMdp">
    <input type="<?=$type?>" id="CodeVerify" placeholder="<?=$placeholder?>" name="<?=$inputName?>">
</div>

<?php 
    if(isset($_SESSION['recup_validate']) &&  $_SESSION['recup_validate'] == "validate_code"){
        echo '
    <div class="input_newMdp">
        <input type="'.$type.'" placeholder="'.$Verifplaceholder.'" name="'.$inputNameVerify.'">
    </div>
    ';
    }
?>
    <div class="submit_newMdp"> 
        <input type="submit" id="MdpSubmit" value="<?=$value?>" name="<?=$submit?>">
    </div>
</form>

</div>










