<?php
require_once dirname(__FILE__) . '/../utils/regex.php';
require_once(dirname(__FILE__).'/../models/User.php');
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../class/Mail.php');
require_once(dirname(__FILE__) . '/../utils/Database.php');


    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST))
    {      
        
     
       $lastname_user = trim(filter_input(INPUT_POST , 'lastname_user' ,FILTER_SANITIZE_STRING));
       if ($lastname_user) {
           if (!preg_match(REGEX_NO_NUMBER , $lastname_user)) {
               $errors['lastname_user'] = 'Nom invalide';
           }           
       }       
       $firstname_user = trim(filter_input(INPUT_POST,'firstname_user' , FILTER_SANITIZE_STRING));
       if ($firstname_user) {
           if (!preg_match(REGEX_NO_NUMBER , $firstname_user)) {
               $errors['firstname_user'] = 'Prénom invalide';
           }          
       }       
       $mail = trim(filter_input(INPUT_POST , 'mail' , FILTER_SANITIZE_EMAIL));
       if (!preg_match(REGEX_EMAIL,$mail)) {
           $error['mail'] = 'mail invalide';
       }       
       $password = $_POST['password'];       
       $confirmPassword = $_POST['confirmPassword'];       
       if ($password == $confirmPassword) {
           $password = password_hash($password,PASSWORD_DEFAULT);
       }else {
           $error['password'] = 'Les mots de passe ne correspondent pas';           
       }       
       if (empty($error)) {        
           $pdo = Database::connect();           
           $user = new User($lastname_user,$firstname_user,$mail,$password);
           $response = $user->set();           
           $id = $pdo->lastInsertId();
           $token = $user->getValidatedToken();

           if ($response === true) {
               
            $to = $mail;
            $from = SENDER_EMAIL;
            $subject = 'Validation de votre inscription'; 
            $fromName = FROM_NAME;
            $toName = $lastname_user;

            $link = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/controllers/validAccountCtrl.php?id='.$id.'&token='.$token;            
            $message = "Bonjour $lastname_user $firstname_user ! Veuillez confirmer votre inscription <br> <button><a href=\"$link\">Clique ici</a></button>";

            $mail = new Mail($message,$to,$from,$subject,$fromName,$toName);
            $mail->send();

        }
        


       }
    }

// appel des fichiers
include dirname(__FILE__)."/../views/templates/header.php";
include dirname(__FILE__)."/../views/register.php";
include dirname(__FILE__)."/../views/templates/footer.php";