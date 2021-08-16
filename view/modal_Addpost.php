

<section class="ModalAddArticle">

<!-- The Modal -->
<div id="AddArticle" class="modal">

    <!-- Modal content -->
    <div class="AddArticle-content">
        <span class="close" id="close_add">&times;</span>
            <img src="img/logo_socialart.svg" alt="social_art">
            
        <form action="controler/AddPost.php" method="post">
    
                <div class="input_addPost">
                    <label for="Title"><em>Titre de Votre Article</em></label><br />
                    <input type="text" id="Add_Title" name="AddTitle" required>
                </div>

                <div  class="input_addPost">

                    <label for="text"><em>Catégorie de votre article</em></label><br />

                    <select name="AddCategorie" id="cat_article">
                        <option value="Développement">Développement</option>
                        <option value="Illustration">Illustration</option>
                        <option value="Réseau">Réseau</option>
                        <option value="Cyber-Sécurité">Cyber-Sécurité</option>
                        <option value="Détente">Détente</option>
                    </select>


                </div>
        

                <div class="input_addPost">
                    <label for="content"><em>Description</em></label><br />
                    <input type="text" id="Add_Desc" name="AddDesc" required>
                </div>


                <div class="input_addPost">
                    <label for="avatar">Image de votre Article</label><br>
                    <input placeholder="Télécharger" type="file" id="img_post" name="AddImg" accept="image/png, image/jpeg">
                </div>
             
                <div class="input_addPost">
                    <input type="submit" id="send_post" value="Ajouter un article">
                </div>

        </form>
    </div>

</div>

</section>