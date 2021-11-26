<?php
require_once dirname(__FILE__) . '/../utils/regex.php';
require_once(dirname(__FILE__).'/../models/User.php');




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
       $mail = trim(filter_input(INPUT_POST , 'mail' , FILTER_SANITIZE_EMAIL));
       if (!preg_match(REGEX_EMAIL,$mail)) {
           $error['mail'] = 'mail invalide';
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
           $user = new User($lastname,$firstname,$mail,$password);
           $response = $user->set();
           $id = $pdo->lastnaInsertId();
           $token = $user->getValidatedToken();

           


       }
    }






// appel des fichiers
include dirname(__FILE__)."/../views/templates/header.php";
include dirname(__FILE__)."/../views/register.php";
include dirname(__FILE__)."/../views/templates/footer.php";