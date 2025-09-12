<?php

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function findByEmail($email) {

        $stmt = $this->db->query("SELECT * FROM User WHERE email = :email", [
            ':email' => $email
        ]);
        
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->db->query(
            "INSERT INTO User(name, email, address, mobile, password) VALUES(:name, :email, :address, :mobile, :password)",
            [
                ':name' => $data['name'],
                ':email' => $data['email'],
                ':address' => $data['address'],
                ':mobile' => $data['mobile'],
                ':password' => $data['password']
            ]
        );
        
        return $stmt->rowCount() > 0;
    }
}

?>
