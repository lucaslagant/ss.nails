<?php
require_once(dirname(__FILE__) . '/../utils/init.php');

if(isset($_SESSION['user'])){

    include(dirname(__FILE__) . '/../views/templates/header.php');

    include(dirname(__FILE__) . '/../views/profil.php');

    include(dirname(__FILE__) . '/../views/templates/footer.php');
    
} else {
    header('location: /index.php');
}