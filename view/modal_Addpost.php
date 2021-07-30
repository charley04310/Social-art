
<?php
if(isset($_POST["env"])){
$logo=$_FILES['photo']['name'];

if($logo!=""){
require "uploadImage.php";
if($sortie==false){$logo=$dest_dossier . $dest_fichier;}
else {$logo="notdid";}
}
if($logo!="notdid"){
echo "upload reussi";

}
else{
echo"l'image ne s'est pas enregistré";
}
}

?>
<section class="ModalAddArticle">

<!-- The Modal -->
<div id="AddArticle" class="modal">

    <!-- Modal content -->
    <div class="AddArticle-content">
        <span class="close" id="close_add">&times;</span>
            <img src="img/logo_socialart.svg" alt="social_art">
            
        <form action="controler/AddPost.php" method="post" enctype="multipart/form-data">
    
                <div class="">
                    <label for="Title"><em>Titre de Votre Article</em></label><br />
                    <input type="text" id="Add_Title" name="AddTitle" required>
                </div>

                <div  class="">

                    <label for="text"><em>Catégorie de votre article</em></label><br />

                    <select name="categorie" id="cat_article">
                        <option value="Développement">Développement</option>
                        <option value="Illustration">Illustration</option>
                        <option value="Réseau">Réseau</option>
                        <option value="Cyber-Sécurité">Cyber-Sécurité</option>
                        <option value="Détente">Détente</option>
                    </select>


                </div>
        

                <div class="">
                    <label for="content"><em>Description</em></label><br />
                    <input type="text" id="Add_Desc" name="AddDesc" required>
                </div>


                <div class="">
                    <label for="avatar">Choose a profile picture:</label><br>
                    <input type="file" name="photo" id="photo">
                </div>
             
                <div>
                    <input type="submit" id="send_post" value="Ajouter un article">
                </div>

        </form>
    </div>

</div>

</section>