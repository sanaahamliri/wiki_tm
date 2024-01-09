<?php

require_once '../config/database.php';
// require '../controllers/UtilisateurController.php';

class Utilisateur {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    // Register User
    public function register($data){
        $this->db->query('INSERT INTO utilisateur (nom, email, password, role) 
        VALUES (:name, :email, :password, 2)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    // Login user
    public function login($nameOrEmail, $password){
        $row = $this->findUserByEmailOrName($nameOrEmail, $nameOrEmail);

        if($row == false) return false;

        $hashedPassword = $row->password;
        if(password_verify($password, $hashedPassword)){
            return $row;
        } else {
            return false;
        }
    }

    // Find user by email or name
    public function findUserByEmailOrName($email, $name){
        $this->db->query('SELECT * FROM utilisateur WHERE nom = :name OR email = :email');
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if($this->db->rowCount() > 0){
            return $row;
        } else {
            return false;
        }
    }

    

   
}
?>
