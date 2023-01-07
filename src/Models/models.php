<?php

// création d'une session
// session_start();

//class bdd connexion
class bdd {

    public PDO $connexion;
    
    //construc function
    public function __construct() {
        $this->connexion = new PDO('mysql:host=localhost;dbname=social_network;charset=utf8mb4', 'root', '');
    }
}

//class user intecract with bdd
class user extends bdd {

    //request function
    public function request(string $rqsql, array $exec): object{
        $statement = $this->connexion->prepare($rqsql);
        $statement->execute($exec);

        return $statement;
    }

    //info user function
    public function info(string $rqsql): object{
        $statement = $this->connexion->prepare($rqsql);
        $statement->execute();
    
        return $statement;
    }

    //info user tab function
    // public function infoUser(string $id): array{
    //     $statement = $this->connexion->prepare(
    //         "SELECT * FROM `user` WHERE id_user= :id_user"
    //     );
    //     $statement->execute(['id_user' => $id]);
    //     $response = $statement->fetch();
    //     return $response;
    // }

    //verif user exist in bdd function
    public function verif(string $email, string $pseudo):string{
        $verif = $this->request("SELECT `email`, `pseudo` FROM `user` WHERE `email`=:email OR `pseudo`=:pseudo", ["email" => $email, "pseudo" => $pseudo])->fetch();

        if ($verif) {
            if ($verif['email'] == $email && $verif['pseudo'] == $pseudo) {
                return "Ce pseudo et cet email sont deja attribués a un compte";
            } elseif ($verif['email'] == $email) {
                return "Cet email est deja attribué a un compte";
            } elseif ($verif['pseudo'] == $pseudo) {
                return "Ce pseudo est deja attribué a un compte";
            }
        } else {
            return "";
        }
    }

    //session validation function
    public function verifSession():array
    {
        return $this->request("SELECT id_user FROM `user` WHERE `id_user`=:id", ["id" => $_SESSION['id_user']])->fetch();
    }

    //register user function
    public function register(string $gender, string $first_name, string $last_name, string $pseudo, string $email, string $password, string $birth){
        $this->request("INSERT INTO user(id_user, gender, first_name, last_name, pseudo, email, `password`, birth_date) VALUES (DEFAULT,:gender,:first_name,:last_name,:pseudo,:email,:password,:birth)", ['gender' => $gender, 'first_name' => $first_name, 'last_name' => $last_name, 'pseudo' => $pseudo, 'email' => $email, 'password' => hash("sha256",$password), 'birth' => $birth]);
        $session = $this->request("SELECT `id_user` FROM `user` WHERE `email`=:email", ["email" => $email])->fetch();
        $_SESSION['id_user'] = $session['id_user'];
        //$this->log($_SERVER['REMOTE_ADDR']." à créer un compte avec comme pseudo ".$pseudo);
    }

    //login function
    public function login(string $email, string $pseudo, string $password) :bool {
        $statement = $this->request("SELECT id_user, email, pseudo, `password` FROM user WHERE password=:password AND (email=:email OR pseudo=:pseudo)", ['password' => hash("sha256",$password), 'email' => $email, 'pseudo' => $pseudo]);
        $response = $statement->fetch(PDO::FETCH_ASSOC);

        if ($response) {
            $_SESSION['id_user'] = $response['id_user'];
            //$this->log($_SERVER['REMOTE_ADDR']." s'est connecté en tant que ".$pseudo);
            return true;
		} else {
            //$this->log($_SERVER['REMOTE_ADDR']." n'as pas réussi à se connecté en tant que ".$pseudo);
            return false;
        }  
    }

    //show settings function
    public function getSettings() :array {
        return $this->request("SELECT gender, first_name, last_name, pseudo, email, password, birth_date FROM `user` WHERE id_user= :id_user",['id_user' => $_SESSION['id_user']])->fetch();
    }

    //show settings function
    public function suggestions() :array {
        return $this->request("SELECT gender, first_name, last_name, pseudo, email, password, birth_date FROM `user` WHERE id_user= :id_user",['id_user' => $_SESSION['id_user']])->fetch();
    }

    //change password verification function
    public function verifPassword(string $p1, string $p2, string $p3): string {
        $verif = $this->request("SELECT `password` FROM `user` WHERE id_user= :id_user",['id_user' => $_SESSION['id_user']])->fetch();

        if (hash("sha256",$p1) != $verif['password']) {
            //$this->log($_SERVER['REMOTE_ADDR']." à tenter de changer son mot de passe ");
            return "L'ancien mot de passe ne correspond pas à l'actuel !";
        } else {
            if($p2 != $p3){
                //$this->log($_SERVER['REMOTE_ADDR']." à tenter de changer son mot de passe ");
                return "'nouveau mdp' n'est pas égal à 'confirmer nouveau mdp'";
            } else {
                //$this->log($_SERVER['REMOTE_ADDR']." à changé de mot de passe ");
                return "";
            }
        }
    }

    //change password function
    public function changeMdp(string $password) {
        $this->request("UPDATE `user` SET`password`=:password WHERE `id_user`=:id_user",['password' => hash("sha256",$password), 'id_user' => $_SESSION['id_user']]);
    }

    //delete account function
    public function deleteAccount() {
        //$this->log($_SERVER['REMOTE_ADDR']." à delete son compte ");
        unlink('src/upload/'.$_SESSION['id_user'].'.png');
        $this->request("DELETE FROM user WHERE user.id_user=:id_user; DELETE FROM reaction WHERE reaction.id_user=:id_user; DELETE FROM comment WHERE comment.id_user=:id_user; DELETE FROM publication WHERE publication.id_user=:id_user;",['id_user' => $_SESSION['id_user']]);
        session_destroy();
    }

    //add a image for a account function
    public function image(string $files,string $email) {
        $response = $this->request("SELECT `id_user`, `email` FROM `user` WHERE `email`=:email",["email" => $email])->fetch(PDO::FETCH_ASSOC);

        $tmpName = $files;
        $name = $response['id_user'].".png";
        move_uploaded_file($tmpName, 'src/upload/'.$name);
    }

    //change image profil function
    public function changeImg(string $tmpName) {
        $name = $_SESSION['id_user'].".png";
        move_uploaded_file($tmpName, 'src/upload/'.$name);
        //$this->log($_SERVER['REMOTE_ADDR']." à changé d'image de profil ");
    }

    //disconnect account function
    public function disconnect() {
        //$this->log($_SERVER['REMOTE_ADDR']." s'est déconnecté ");
        session_destroy();
    }

    //log function
    public function log(string $log) {
        date_default_timezone_set('Europe/Paris');
        $texte = file_get_contents('src/Logs/log_task.txt');
        $texte .= "\n".$log." à ".date('d/m/Y H:i:s');
        file_put_contents('src/Logs/log_task.txt',$texte);
    }

    public function settingsFriend():array {
        return $this->request("SELECT COUNT(*) FROM `friends_list` WHERE friends_list.id_user_1=:id_user OR friends_list.id_user_2=:id_user;",['id_user' => $_SESSION['id_user']])->fetch();
    }

    public function settingsPost():array {
        return $this->request("SELECT COUNT(*) FROM `publication` WHERE publication.id_user=:id_user ;",['id_user' => $_SESSION['id_user']])->fetch();
    }

    public function settingsComment():array {
        return $this->request("SELECT COUNT(*) FROM `comment` WHERE comment.id_user=:id_user;",['id_user' => $_SESSION['id_user']])->fetch();
    }

    public function settingsReaction():array {
        return $this->request("SELECT COUNT(*) FROM `reaction` WHERE reaction.id_user=:id_user;",['id_user' => $_SESSION['id_user']])->fetch();
    }
}



//comment class
class comment extends user{

    //create comment function
    public function createComment(string $idpost, string $message) {
        $this->request("INSERT INTO `comment`(`id_comment`, `id_user`, `id_publication`, `message`, `date`) VALUES (DEFAULT,:id_user,:id_post,:message,NOW())",["id_user" => $_SESSION['id_user'], "id_post" => $idpost, "message" =>$message]);
        //$this->log($_SERVER['REMOTE_ADDR']." à crée le commentaire ".$message + " sur le post d'id ".$idpost);
    }

    //get comment function
    public function getComments(string $idpost):array {
        return $this->request("SELECT user.id_user, user.pseudo, id_comment, `message`,`date` FROM `comment` INNER JOIN user ON user.id_user=comment.`id_user` WHERE`id_publication`=:id_post ORDER BY comment.date  DESC;",['id_post' => $idpost])->fetchAll();
    }

    //delete comment function
    public function deleteComment(string $idcomment) {
        $this->request("DELETE FROM `comment` WHERE `id_comment`=:id_comment",['id_comment'=>$idcomment]);
        //$this->log($_SERVER['REMOTE_ADDR']." à delete le commentaire d'id ".$idcomment);
    }

}


//post class
class post extends user {

    //create a post function
    public function createPost(string $message){
        //$this->log($_SERVER['REMOTE_ADDR']." à crée un post avec le message suivant ".$message);
        $this->request("INSERT INTO `publication`(`id_publication`, `id_user`, `message`, `date`) VALUES (DEFAULT, :id_user ,:message,NOW())",["id_user"=>$_SESSION['id_user'],'message'=>$message]);
    }

    //show post function
    public function affichage(int $debut, int $nbelem): array{
        return $this->request("SELECT publication.id_publication, publication.message, user.id_user, user.pseudo, publication.date FROM `publication` INNER JOIN user ON publication.id_user = user.id_user ORDER BY publication.date DESC LIMIT $debut, $nbelem;",[])->fetchAll();
    }

    //delete post function
    public function deletePost(string $idpost) {
        $this->request("DELETE FROM `comment` WHERE `id_publication`=:id_post",['id_post'=>$idpost]);
        $this->request("DELETE FROM `publication` WHERE `id_publication`=:id_post",['id_post'=>$idpost]);
        $this->request("DELETE FROM `reaction` WHERE `id_publication`=:id_post",['id_post'=>$idpost]);
        //$this->log($_SERVER['REMOTE_ADDR']." à supprimé le post d'id ".$idpost);
    }

    //show feed function
    public function feed(int $debut, int $nbelem): array {
        return $this->request("SELECT pseudo, id_publication, publication.id_user, message, publication.date FROM publication INNER JOIN friends_list INNER JOIN user ON user.id_user=publication.id_user WHERE friends_list.status=1 AND friends_list.id_user_1=publication.id_user AND friends_list.id_user_2=:id_user OR friends_list.status=1 AND friends_list.id_user_2=publication.id_user AND friends_list.id_user_1=:id_user ORDER BY date DESC LIMIT $debut, $nbelem;",['id_user'=>$_SESSION['id_user']])->fetchAll();
    }

    //count post in bdd function
    public function countPost(): array {
        return $this->info("SELECT COUNT(*) FROM `publication`;")->fetch();
    }

    //count feed in bdd function
    public function countFeed(): array {
        return $this->request("SELECT COUNT(*) FROM `publication` INNER JOIN friends_list WHERE friends_list.status=1 AND friends_list.id_user_1=publication.id_user AND friends_list.id_user_2=:id_user OR friends_list.status=1 AND friends_list.id_user_2=publication.id_user AND friends_list.id_user_1=:id_user;",['id_user'=>$_SESSION['id_user']])->fetch();
    }

}

class react extends user{

    //create a react function
    public function createReact(string $idpost, string $message){
        $this->request("INSERT INTO `reaction`(`id_reaction`, `id_user`, `id_publication`, `reaction`) VALUES (DEFAULT,:id_user,:id_post,:message)",["id_user" => $_SESSION['id_user'], "id_post" => $idpost, "message" =>$message]);
        //$this->log($_SERVER['REMOTE_ADDR']." à ajouté la reaction suivante ".$message + " sur le post ".$idpost);
    }

    //show react function
    public function getReact(string $idpost):array{
        return $this->request("SELECT user.id_user, user.pseudo,id_reaction, reaction  FROM reaction INNER JOIN user ON user.id_user=reaction.`id_user` WHERE`id_publication`=:id_post ORDER BY id_reaction DESC;",['id_post' => $idpost])->fetchAll();
    }

    //delete react function
    public function deleteReact(string $idreaction){
        $this->request("DELETE FROM `reaction` WHERE `id_reaction`=:id_reaction",['id_reaction'=>$idreaction]);
        //$this->log($_SERVER['REMOTE_ADDR']." à delete sa reaction d'id ".$idreaction);
    }

    //verify react function
    public function verifReact(string $idpost):array{
        return $this->request("SELECT * FROM `reaction` WHERE `id_publication`=:id_publication AND `id_user`=:id_user",['id_publication'=>$idpost, 'id_user'=>$_SESSION['id_user']])->fetchAll();
    }
}


//friendlist class
class friendList extends user {

    //search a friend function
    public function searchFriend(string $friend):string {
        $response = $this->request("SELECT id_user FROM `user` WHERE pseudo=:pseudo", ["pseudo"=>$friend])->fetch(PDO::FETCH_ASSOC);

        if ($response) {
            if ($_SESSION["id_user"] != $response["id_user"]) {

                $rep = $this->request("SELECT * FROM `friends_list` WHERE `id_user_1`=:id_user_1 AND `id_user_2`=:id_user_2 OR `id_user_1`=:id_user_2 AND `id_user_2`=:id_user_1", ["id_user_1" => $_SESSION["id_user"], "id_user_2" => $response["id_user"]])->fetch();

                if (!$rep) {

                    $id_user_1 = $_SESSION["id_user"];
                    $id_user_2 = $response["id_user"];

                    $this->request("INSERT INTO `friends_list`(`id_request`, `id_user_1`, `id_user_2`, `status`) VALUES (DEFAULT, :id_user_1, :id_user_2, DEFAULT)", ['id_user_1' => $id_user_1, 'id_user_2' => $id_user_2]);

                    //$this->log($_SERVER['REMOTE_ADDR']." envoyé une demande d'amis à ".$friend);
                    return "demande d'amis envoyée";
                } else {
                    return "requette d'amis déjà envoyée";
                }
            } else {
                return "vous ne pouvez pas vous ajouter vous même en amis";
            }
        } else {
            return "la personne n'existe pas";
        }
    }

    //friend list function
    public function friendListAff():array {
        return $this->request("SELECT user.pseudo, user.id_user, friends_list.id_request FROM friends_list INNER JOIN user ON friends_list.id_user_2=user.id_user WHERE friends_list.id_user_1=:id_user AND friends_list.status=1 UNION SELECT user.pseudo, user.id_user, friends_list.id_request FROM friends_list INNER JOIN user ON friends_list.id_user_1=user.id_user WHERE friends_list.id_user_2=:id_user AND friends_list.status=1;", ['id_user' => $_SESSION['id_user']])->fetchAll();
    }

    //friends request function
    public function friendsReceive():array {
        return $this->request("SELECT user.id_user, user.pseudo, user.first_name, user.last_name, friends_list.id_request FROM friends_list INNER JOIN user ON friends_list.id_user_1=user.id_user WHERE id_user_2=:id_user_2 AND friends_list.status=0", ['id_user_2' => $_SESSION['id_user']])->fetchAll();
    }

    //friend request by user function
    public function friendsRequest():array {
        return $this->request("SELECT user.pseudo, user.id_user, friends_list.id_request FROM friends_list INNER JOIN user ON friends_list.id_user_2=user.id_user WHERE id_user_1=:id_user_1 AND friends_list.status=0", ['id_user_1' => $_SESSION['id_user']])->fetchAll();
    }

    //response friend request function
    public function responseRequest(string $rep, string $id) {
        if ($rep=="Accepter") {
            //$this->log($_SERVER['REMOTE_ADDR']." à accepté la demande d'amis d'id ".$id);
            return $this->request("UPDATE friends_list SET status='1' WHERE id_request=:id_request", ['id_request' => $id])->fetchAll();
        } else {
            //$this->log($_SERVER['REMOTE_ADDR']." à refusé la demande d'amis d'id ".$id);
            return $this->request("DELETE FROM friends_list WHERE id_request=:id_request", ['id_request' => $id])->fetchAll();
        }
    }

}


//security class
class security extends user{

    //redirect if not connected function
    public function secure(): bool {
        $response = $this->request("SELECT id_user FROM user WHERE id_user=:id_user", ['id_user' => $_SESSION['id_user']])->fetch();
        if ($response) {
            return true;
        } else {
            return false;
        }
    }
}