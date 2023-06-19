<?php
namespace models\roles;
use models\Database;
class Role
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
            return true;
        } catch (\PDOException) {
            return false;
        }
    }

    public function getAllRoles(){
        $query="SELECT * FROM `minicrm`.`roles`";
        try{
            $stmt=$this->db->query($query);
            $roles=[];
            while($row=$stmt->fetch(\PDO::FETCH_ASSOC))
                $roles[]=$row;
            return $roles;
        }catch (\PDOException){
            return [];
        }
    }
    public function getRoleById($id){
        $query="SELECT * FROM minicrm.roles WHERE id=?";
        try{
            $stmt=$this->db->prepare($query);
            $stmt->execute([$id]);
            return $stmt->fetch(\PDO::FETCH_ASSOC)??false;
        }catch (\PDOException){
            return false;
        }
    }
    public function createRole($role_name,$role_description){
        $query="INSERT INTO minicrm.roles (role_name,role_description) VALUES (?,?)";
        try{
            $stmt=$this->db->prepare($query);
            $stmt->execute([$role_name,$role_description]);
            return true;
        }catch (\PDOException){
            return false;
        }
    }
    public function updateRole($id,$role_name,$role_description){
        $query="UPDATE minicrm.roles SET role_name=?,role_description=? WHERE id=?";
        try{
            $stmt=$this->db->prepare($query);
            $stmt->execute([$role_name,$role_description,$id]);
            return true;
        }catch (\PDOException){
            return false;
        }
    }
    public function deleteRole($id){
        $query="DELETE FROM minicrm.roles WHERE id=?";
        try{
            $stmt=$this->db->prepare($query);
            $stmt->execute([$id]);
            return true;
        }catch (\PDOException){
            return false;
        }
    }
}
