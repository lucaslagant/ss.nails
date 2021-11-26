<?php

require_once(dirname(__FILE__).'/../utils/Database.php');

class User{

    // private $_id;
    private $_lastname;
    private $_firstname;
    private $_email;
    private $_password;
    private $_confirmPassword;
    private $_admin;
    private $_pdo;

    public function __construct($lastname='',$firstname='',$email='',$password='', $confirmPassword='',$admin='',$pdo='')
    {
        $this->_lastname = $lastname;
        $this->_firstname = $firstname;
        $this->_mail = $email;
        $this->_password = $password;
        $this->_confirmPassword = $confirmPassword;
        $this->_admin = $admin;
        $this->_pdo = Database::connect();
    }

    public function set(){
        
        $sql = 'INSERT INTO `user` (`lastname`,`firstname`, `email`, `password`, `validated_token`)
        VALUES (:lastname, :firstname, :email, :password, :validated_token);';
    
        try {
            $sth = $this->_pdo->prepare($sql);
            $sth->bindValue(':lastname', $this->_lastname);
            $sth->bindValue(':email', $this->_email);
            $sth->bindValue(':password', $this->_password);
            if(!$sth->execute()){
                throw new PDOException('Problème lors de l\'inscription');
            }
            return true;
        } catch (\PDOException $ex) {
            return $ex;
        }
    
    }
    public function getValidatedToken(){
        return $this->_validated_token;
    }

    public static function get($id){
        $sql = 'SELECT * FROM `user`
                WHERE `id` = :id;';
        try {
            $pdo = Database::connect();
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            if(!$sth->execute()){
                throw new PDOException('Erreur d\'exécution');
            }
            return $sth->fetch();
        } catch (\PDOException $ex) {
            //throw $ex;
        }

    }
    public static function setValidateAccount($id){
        $sql = 'UPDATE `user` SET `validated_at`= CURRENT_TIMESTAMP()
                WHERE `id` = :id';
        
        try {
            $pdo = Database::connect();
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);

            if(!$sth->execute()){
                throw new PDOException('Problème de validation du compte');
            } else {
                return true;
            }
        } catch (\PDOException $ex) {
            return $ex;
        }
    }

    public static function getByEmail($email){
        $sql = 'SELECT * FROM `user` WHERE `email` = :email;';

        try {
            $pdo = Database::connect();
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':email', $email);

            if(!$sth->execute()){
                throw new PDOException('Problème d\'execution');
            } else {
                return $sth->fetch();
            }
        } catch (\PDOException $ex) {
            return $ex;
        }
    }

    public static function isValidated($email){
        $sql = 'SELECT `validated_at` FROM `user` WHERE `email` = :email;';

        try {
            $pdo = Database::connect();
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':email', $email);

            if(!$sth->execute()){
                throw new PDOException('Problème d\'execution');
            } else {
                return $sth->fetchColumn();
            }
        } catch (\PDOException $ex) {
            return $ex;
        }
    }
}