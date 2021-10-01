<?php
require_once(dirname(__FILE__).'/../utils/regex.php');
$error=[];
$verif = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING));
    if (!empty($lastname)) {
        if (!preg_match(REGEX_NO_NUMBER,$lastname)) {
            $error['lastname'] = 'Nom invalide';
        }
    }
    $firstname = trim(filter_input(INPUT_POST,'firstname' , FILTER_SANITIZE_STRING));
    if (!empty($firstname)) {
        if (!preg_match(REGEX_NO_NUMBER,$firstname)) {
            $error['firstname'] = 'Prénom invalide';

        }
    }
    $email = trim(filter_input(INPUT_POST,'email'));
    if (!empty($email)) {
        if (!preg_match(REGEX_EMAIL,$email)) {
            $error['email'] = 'Entrer une adresse mail valide';
        }
    }
    $password = trim(filter_input(INPUT_POST,'password'));
    if (!empty($password)) {
        if (!preg_match(REGEX_PASSWORD,$password)) {
            $error['password'] = 'Entrer un mot de passe valide';
        }
    }
    $confirmpassword = trim(filter_input(INPUT_POST,'confirmpassword'));
    if (!empty($confirmpassword)) {
        if ($confirmpassword != $password) {
            $error['confirmpassword'] = 'Les mots de passe ne correspondent pas';
        }       
    }
    $phone = trim(filter_input(INPUT_POST,'phone'));
    if (!empty($phone)) {
        if (!preg_match(REGEX_PASSWORD,$phone)) {
            $error['phone'] = 'Veuillez entrer un numéro valide';
        }
    }

}
include dirname(__FILE__).'/../views/templates/header.php';
include dirname(__FILE__).'/../views/profil/signIn.php';
include dirname(__FILE__).'/../views/templates/footer.php';
