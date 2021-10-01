<?php
define("REGEX_NO_NUMBER", "/[A-Za-z-éèêëàâäôöûüç' ]+$/");
define("REGEX_EMAIL","/^[[:alnum:]]([-_.]?[[:alnum:]])*@[[:alnum:]]([-.]?[[:alnum:]])*\.([a-z]{2,4})$/");
define("REGEX_PASSWORD","/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/");
// Mot de passe pour avoir : au moins un nombre , une lettre , caractéres spéciaux , et avoir mini 8 caratéres
define("REGEX_PHONE","/^0[1-68][0-9]{8}$/");
?>