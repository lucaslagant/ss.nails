<?php
require_once dirname(__FILE__) . '/../utils/regex.php';
require_once(dirname(__FILE__).'/../models/User.php');
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../class/Mail.php');
require_once(dirname(__FILE__) . '/../utils/Database.php');


    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST))
    {             
       $lastname = trim(filter_input(INPUT_POST , 'lastname' ,FILTER_SANITIZE_STRING));
       if ($lastname) {
           if (!preg_match(REGEX_NO_NUMBER , $lastname)) {
               $errors['lastnameError'] = 'Nom invalide';
           }
       } else {
           $errors['lastnameError'] = 'Veuillez saisir votre nom';
       }
       $firstname = trim(filter_input(INPUT_POST,'firstname' , FILTER_SANITIZE_STRING));
       if ($firstname) {
           if (!preg_match(REGEX_NO_NUMBER , $firstname)) {
               $errors['firstnameError'] = 'Prénom invalide';
           }
       }else {
           $errors['firstname'] = 'Veuillez saisir votre prénom';
       }
       $email = trim(filter_input(INPUT_POST , 'email' , FILTER_SANITIZE_EMAIL));
       if (!preg_match(REGEX_EMAIL,$email)) {
           $error['email'] = 'mail invalide';
       }
       $password = $_POST['password'];
       $confirmPassword = $_POST['confirmPassword'];
       if ($password == $confirmPassword) {
           $password = password_hash($password,PASSWORD_DEFAULT);
       }else {
           $error['password_error'] = 'Les mots de passe ne correspondent pas';           
       }
       if (empty($error)) {
           $pdo = Database::connect();
           $user = new User($lastname,$firstname,$email,$password);
           $response = $user->set();
           $id = $pdo->lastnaInsertId();
           $token = $user->getValidatedToken();

           if ($response === true) {
               
            $to = $email;
            $from = SENDER_EMAIL;
            $subject = 'Validation de votre inscription';
            $fromName = FROM_NAME;
            $toName = $lastname;

            $link = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/controllers/validAccountCtrl.php?id='.$id.'&token'.$token;
            $message = "Bonjour $lastname ! Veuillez confirmer votre inscription <br> <button><a href=\"$link\">Clique ici</a></button>";

            $mail = new Mail($message,$to,$from,$subject,$fromName,$toName);
            $mail->send();

           }


       }
    }






// appel des fichiers
include dirname(__FILE__)."/../views/templates/header.php";
include dirname(__FILE__)."/../views/register.php";
include dirname(__FILE__)."/../views/templates/footer.php";