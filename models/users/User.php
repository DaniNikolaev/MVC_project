<?php
namespace models\users;
use models\Database;
class User{
    private $db;

    public function __construct(){
        $this->db=Database::getInstance()->getConnection();
        $this->createTableRole();
    }
    public function createTableRole(){
        $roleTableQuery="CREATE TABLE IF NOT EXISTS `minicrm`.`roles`(
            `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `role_name` VARCHAR(70) NOT NULL,
            `role_description` TEXT
        )";
        try {
            $this->db->exec($roleTableQuery);
            $this->createTableUser();
        }catch (\PDOException){
            return false;
        }
    }
    public function createTableUser(){
        $userTableQuery="CREATE TABLE IF NOT EXISTS `minicrm`.`users` (
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
        }catch (\PDOException){
            return false;
        }
    }
    public function readAll(){
        try{
            $stmt=$this->db->query("SELECT * FROM minicrm.users");
            $users=[];
            while($row=$stmt->fetch(\PDO::FETCH_ASSOC))
                $users[]=$row;
            return $users;
        }catch (\PDOException $e){
            return [];
        }
    }
    public function create($data){
        $username=$data['username'];
        $password=$data['password'];
        $email=$data['email'];
        $role=$data['role'];
        $created_at=date("Y-m-d H:i:s");
        $query="INSERT INTO minicrm.users (username,email,password,role,created_at) VALUES(?,?,?,?,?)";
        try{
            $stmt=$this->db->prepare($query);
            $stmt->execute([$username,$email,$password,$role,$created_at]);
            return true;
        }
        catch (\PDOException){
            return false;
        }
    }
    public function read($id){
        $query="SELECT * FROM minicrm.users WHERE id=?";
        try{
            $stmt=$this->db->prepare($query);
            $stmt->execute([$id]);
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }catch (\PDOException){
            return false;
        }
    }
    public function update($id,$data){
        $username=$data['username'];
        $admin=!empty($data['admin'])&&$data['admin']!==0?1:0;
        $email=$data['email'];
        $role=$data['role'];
        $is_active=isset($data['is_active'])?1:0;
        $query="UPDATE minicrm.users SET username=?,is_admin=?,email=?,role=?,is_active=? WHERE id=?";
        try{
            $stmt=$this->db->prepare($query);
            $stmt->execute([$username,$admin,$email,$role,$is_active,$id]);
            return true;
        }catch (\PDOException){
            return false;
        }
    }
    public function delete($id){
        $query="DELETE FROM minicrm.users WHERE id=?";
        try{
            $stmt=$this->db->prepare($query);
            $stmt->execute([$id]);
            return true;
        }catch (\PDOException){
            return false;
        }
    }
}