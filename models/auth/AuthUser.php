<?php
namespace models\auth;
use models\Database;
class AuthUser
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
        $this->createTableRole();
    }

    public function createTableRole()
    {
        $roleTableQuery = "CREATE TABLE IF NOT EXISTS `minicrm`.`roles`(
            `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `role_name` VARCHAR(70) NOT NULL,
            `role_description` TEXT
        )";
        try {
            $this->db->exec($roleTableQuery);
            $this->createTableUser();
        } catch (\PDOException) {
            return false;
        }
    }

    public function createTableUser()
    {
        $userTableQuery = "CREATE TABLE IF NOT EXISTS `minicrm`.`users` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `username` VARCHAR(70) NOT NULL,
            `email` VARCHAR(70) NOT NULL,
            `email_verification` VARCHAR(70) NOT NULL,
            `password` VARCHAR(70) NOT NULL,
            `is_admin` TINYINT(1) NOT NULL DEFAULT 0,
            `role` INT(11) NOT NULL DEFAULT 1,
            `is_active` TINYINT(1) NOT NULL DEFAULT 1,
            `last_login` TIMESTAMP NULL,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY(`id`),
            FOREIGN KEY(`role`) REFERENCES `roles`(`id`)
            )";
        try {
            $this->db->exec($userTableQuery);
            return true;
        } catch (\PDOException) {
            return false;
        }
    }

    public function register($username, $email,$role, $password)
    {
        $created_at = date("Y-m-d H:i:s");
        $query = "INSERT INTO minicrm.users (username,email,role,password,created_at) VALUES(?,?,?,?,?)";
        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$username, $email,$role, $password, $created_at]);
            return true;
        } catch (\PDOException) {
            return false;
        }
    }
    public function login($email,$password){
        try{
            $query="SELECT * FROM minicrm.users WHERE email=? LIMIT 1";
            $stmt=$this->db->prepare($query);
            $stmt->execute([$email]);
            $user=$stmt->fetch(\PDO::FETCH_ASSOC);
            if ($user&&password_verify($password,$user['password'])){
                return $user;
            }
            return false;
        }catch (\PDOException){
            return false;
        }
    }
    public function findByEmail($email){
        try{
            $query="SELECT * FROM minicrm.users WHERE email=? LIMIT 1";
            $stmt=$this->db->prepare($query);
            $stmt->execute([$email]);
            $user=$stmt->fetch(\PDO::FETCH_ASSOC);
            return $user??false;
        }catch (\PDOException){
            return false;
        }
    }
}
