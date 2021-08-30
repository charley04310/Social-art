<h2 class="h2_index">
    <div class="bloc_color_h2"></div><?= $title_post ?>
</h2>

<section class="Article">

    <?php
function HtmlPost($data, $ReqdataName, $comment_div){
         ?> 
    <div class="container-article">
        <div class="carte_article" style="background-image:url('<?=$data['Img_Poste']?>')">
            <a href="post.php?id=<?=$data['Id_Poste']?>&autor=<?=$data['Id_Users']?>&cat=<?=$data['Cat_Poste']?>">
                <div class="data_article">
                    <div class="meta_post">
                        <h3><?=$data['Titre_Poste']?></h3>
                        <p><?=$ReqdataName['Pseudo_Users']?></p>
                    </div>


                </div>
            </a>
        </div>

            <div class="dropdown-container-Commentpost">

                <a onclick="DropDownMenu('myDropdown_comment_<?=$data['Id_Poste']?>')" class="drop_btn" style="color:white; font-size:12px;">
                    <img class="fleche_menu" src="img/comment.svg" height="13px">  
                    AFFICHER LES COMMENTAIRES
                </a>
                <img width="15px" src="img/heartFull.svg" style="position:relative; left: 2px;top: 4px;">
                <?=$data['Nbr_Avis']?>
                <div id="myDropdown_comment_<?=$data['Id_Poste']?>" class="dropdown-postCom <?=$data['Id_Poste']?>">
                    
                    <?=$comment_div?>
                
                </div>

            </div>
            <div class="separator-card-post"></div>


    </div> 
<?php }

function GetComment($conn, $data, $comment_div){


    $comment = $conn->prepare('SELECT Desc_Com, Pseudo_User FROM MetaPost WHERE Id_Poste =?');
    $comment->execute(array($data['Id_Poste']));
  
        while ($DataComment = $comment->fetch()) {

            if(isset($DataComment)){

                $comment_div .=' 
                <p  style="text-align:left;"><img class="user-comment" src="img/User.svg" height="13px"> ' . $DataComment['Pseudo_User'] . '</p>
                <p>' . $DataComment['Desc_Com'] . '</p> 
                <div class="separator-card-post"></div>';

            }else{
                $comment_div = "";
            }
        }
}



    if (isset($_GET['cat'])) {

        function DataCat($dataName, $conn)
        {
          

            while ($data = $dataName->fetch()) {

                $Req = $conn->prepare('SELECT Pseudo_Users FROM Utilisateurs WHERE Id_Users =?');
                $Req->execute(array($data['Id_Users']));
                $ReqdataName = $Req->fetch();

                $comment_div = "";
        
                $comment = $conn->prepare('SELECT Desc_Com, Pseudo_User FROM MetaPost WHERE Id_Poste =?');
                $comment->execute(array($data['Id_Poste']));
            
                    while ($DataComment = $comment->fetch()) {

                        if(isset($DataComment)){
                            $comment_div .=' 
                            <div class="comment_post"> 
                                <p  style="text-align:left;"><img class="user-comment" src="img/User.svg" height="13px"> ' . $DataComment['Pseudo_User'] . '</p>
                                <p>' . $DataComment['Desc_Com'] . '</p> 
                            </div>';

                        }else{
                            $comment_div ="";
                        }
                    }

                GetComment($conn, $data, $comment_div);
                HtmlPost($data, $ReqdataName, $comment_div);
            }
        }

        $categorie =  $_GET['cat'];
        $dataName = $conn->prepare('SELECT * FROM Postes WHERE Cat_Poste =?');

        switch ($categorie) {
            case 'Développement':
                $dataName->execute(array($categorie));
                DataCat($dataName, $conn);
                die;

            case 'Illustration':
                $dataName->execute(array($categorie));
                DataCat($dataName, $conn);
                die;


            case 'Réseau':
                $dataName->execute(array($categorie));
                DataCat($dataName, $conn);
                die;

            case 'Cyber-Sécurité':
                $dataName->execute(array($categorie));
                DataCat($dataName, $conn);
                die;

            case 'Détente':
                $dataName->execute(array($categorie));
                DataCat($dataName, $conn);
                die;
        }
    }else{

        if (isset($_GET['profil'])) {

            function DataCat($dataName, $conn)
            {
                $comment_div = "";
                while ($data = $dataName->fetch()) {

                    $Req = $conn->prepare('SELECT Pseudo_Users FROM Utilisateurs WHERE Id_Users =?');
                    $Req->execute(array($data['Id_Users']));
                    $ReqdataName = $Req->fetch();
                    $comment_div = "";
        
                    $comment = $conn->prepare('SELECT Desc_Com, Pseudo_User FROM MetaPost WHERE Id_Poste =?');
                    $comment->execute(array($data['Id_Poste']));
                
                        while ($DataComment = $comment->fetch()) {
    
                            if(isset($DataComment)){
    
                                $comment_div .=' 
                                <div class="comment_post"> 
                                    <p  style="text-align:left;"><img class="user-comment" src="img/User.svg" height="13px"> ' . $DataComment['Pseudo_User'] . '</p>
                                    <p>' . $DataComment['Desc_Com'] . '</p> 
                                </div>';
    
                            }else{
                                $comment_div .=' 
                                <div class="comment_post"> 
                                    
                                </div>';
    
                            }
                        }
                        
                    HtmlPost($data, $ReqdataName, $comment_div);
                }
            }
            $profil =  $_GET['profil'];
            $dataName = $conn->prepare('SELECT * FROM Postes WHERE Id_Users =?');

            switch ($profil) {

                case $profil:
                    $dataName->execute(array($profil));
                    DataCat($dataName, $conn);
                    die;
            }
        }else{

            $req = $conn->query('SELECT * FROM Postes');


            while ($data = $req->fetch()) {

                $ReqdataName = $conn->prepare('SELECT Pseudo_Users FROM Utilisateurs WHERE Id_Users =?');
                $ReqdataName->execute(array($data['Id_Users']));
                $ReqdataName = $ReqdataName->fetch();

                $comment_div = "";
        
                $comment = $conn->prepare('SELECT Desc_Com, Pseudo_User FROM MetaPost WHERE Id_Poste =?');
                $comment->execute(array($data['Id_Poste']));
            
                    while ($DataComment = $comment->fetch()) {

                        if(isset($DataComment)){

                            $comment_div .=' 
                            <div class="comment_post"> 
                                <p  style="text-align:left;"><img class="user-comment" src="img/User.svg" height="13px"> ' . $DataComment['Pseudo_User'] . '</p>
                                <p>' . $DataComment['Desc_Com'] . '</p> 
                                <div class="separator-card-post"></div>
                            </div>';

                        }else{
                            $comment_div = "";
                        }
                    }
             HtmlPost($data, $ReqdataName, $comment_div);
                
            }

        }
        $req->closeCursor();
    }



    ?>
</section>