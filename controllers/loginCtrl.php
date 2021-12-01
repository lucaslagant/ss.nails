<?php
require_once(dirname(__FILE__) . '/../utils/init.php');

require_once(dirname(__FILE__) . '/../models/User.php');

$errorsArray = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
    $isOk = filter_var($mail, FILTER_VALIDATE_EMAIL);

    if(!empty($mail)){
        if(!$isOk){
            $errorsArray['email_error'] = 'Le mail n\'est pas valide';
        }
    }else{
        $errorsArray['mail_error'] = 'Le champ est obligatoire';
    }


    $password = $_POST['password'];

    $isValidatedUser = User::isValidated($mail);

    if(!is_null($isValidatedUser)){
        $user = User::getByEmail($mail);
        $hash = $user->password;
        
        $isVerified = password_verify($password, $hash);
        if($isVerified === true){
            $_SESSION['user'] = $user; 
        } else {
            $errorsArray['global'] = 'Votre mot de passe n\'est pas bon!';
        }
    } else {
        $errorsArray['global'] = 'Votre compte n\'est pas encore validé!';
    }

}



include(dirname(__FILE__) . '/../views/templates/header.php');

include(dirname(__FILE__) . '/../views/login.php');

include(dirname(__FILE__) . '/../views/templates/footer.php');
