<?php
require_once __DIR__.'/../dbconnexion.php';
if (isset($_POST['pseudo']) && 
    isset($_POST['message']) && 
    !empty($_POST['message']) && 
    !empty($_POST['pseudo'])) {


        $message = $_POST['message'];
        $pseudo = $_POST['pseudo'];


        $getUserStatement = $pdo->prepare("SELECT * FROM user WHERE pseudo = ?");
        $getUserStatement->execute([
            $pseudo
        ]);
        $user = $getUserStatement->fetch(PDO::FETCH_ASSOC);

        function getIp(){
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            return $ip;
        }
        function insertMessage($pdo, $message, $user_id){
            $newMessageStatement = $pdo->prepare("INSERT INTO msg (iduser, msgtxt) VALUE (?,?)");
            $newMessageStatement->execute([
                $user_id,
                $message
            ]);
        }
        if ($user){

            // J'envoi un message en utilisant l'id du user
            insertMessage($pdo,$message, $user['id']);
        }else{
            //Sinon j'enregistre en bdd un nouvel utilisateur
                // je recupère son id et j'envoi le message
            $newUserStatement = $pdo->prepare("INSERT INTO user (pseudo, ipadress) VALUE (?,?)");
            $newUserStatement->execute([
                $pseudo,
                getIp()
            ]);

            $last_user_id = $pdo->lastInsertId();

            insertMessage($pdo,$message, $last_user_id);
        }   

}
echo 'status Code : 200, Response : J\'ai réussi à envoyer le message';