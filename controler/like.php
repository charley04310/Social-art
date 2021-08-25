<?php 
session_start();
require('../modele/dbConnect.php');



if(isset($_GET['meta'], $_GET['id_post'], $_GET['id_user'])){
    
    $idpost = $_GET['id_post'];
    $id_autor = $_GET['id_user'];

    switch($_GET['meta']){

        case 'like':

            $req = $conn->prepare("SELECT Like_user, Dislike_user FROM User_Like WHERE id_user=? AND Id_Post=?");
            $req->execute(array($id_autor,$idpost));
            $user = $req->fetch();


            if($user == false){
           
                $likeUser = 1;
                $dislike = 0;

                $req = $conn->prepare("INSERT INTO User_Like(Like_user, Dislike_user, Id_Post, id_user) VALUES (?, ?, ?, ?)");
                $req->execute(array($likeUser, $dislike, $idpost, $id_autor));
                header('Location:../post.php?id='.$idpost.'&autor='.$id_autor.'&InsterLike=ok');    


               
            }else{

                if($user['Like_user'] == '1'){
                    
                        $like = 0;
                        $req = $conn->prepare('UPDATE User_Like SET Like_user =? WHERE id_user =? AND Id_Post=?');
                        $req->execute(array($like, $id_autor, $idpost));
                        header('Location:../post.php?id='.$idpost.'&autor='.$id_autor.'&RemoveLike=ok');                      
                            
                  
                }else{

                    $like= 1;
                    $req = $conn->prepare('UPDATE User_Like SET Like_user =? WHERE id_user =? AND Id_Post=?');
                    $req->execute(array($like, $id_autor, $idpost));

                    $dislike= 0;
                    $req = $conn->prepare('UPDATE User_Like SET Dislike_user =? WHERE id_user =? AND Id_Post=?');
                    $req->execute(array($dislike,$id_autor, $idpost));
                    header('Location:../post.php?id='.$idpost.'&autor='.$id_autor.'&UpdateLike=ok');                      

                }
            }

            die;

        case 'dislike':

            $req = $conn->prepare("SELECT Like_user, Dislike_user FROM User_Like WHERE id_user=? AND Id_Post=?");
            $req->execute(array($id_autor,$idpost));
            $user = $req->fetch();

            if($user == false){

                $like = 0;
                $dislike = 1;
                $req = $conn->prepare("INSERT INTO User_Like(Like_user, Dislike_user, Id_Post, id_user) VALUES (?, ?, ?, ?)");;
                $req->execute(array($like, $dislike, $idpost, $id_autor));
                header('Location:../post.php?id='.$idpost.'&autor='.$id_autor.'&InsertDislike=ok');    

               
            }else{

                if($user['Dislike_user'] == '1'){
                
                        $dislike = 0;
                        $req = $conn->prepare('UPDATE User_Like SET Dislike_user =? WHERE id_user =? AND Id_Post=?');
                        $req->execute(array($dislike, $id_autor, $idpost));
                        header('Location:../post.php?id='.$idpost.'&autor='.$id_autor.'&RemoveDislike=ok'); 

                 


                }else{
                    $dislike = 1;
                    $like = 0;
                    $req = $conn->prepare('UPDATE User_Like SET Dislike_user =?, Like_user =?  WHERE id_user =? AND Id_Post=?');
                    $req->execute(array($dislike, $like, $id_autor, $idpost));

                    header('Location:../post.php?id='.$idpost.'&autor='.$id_autor.'&DislikeUpdate=ok');    

                }
            }

            break;



    }
}else{
echo 'faiiiiil';
}


?>