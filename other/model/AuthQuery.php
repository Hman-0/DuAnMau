<?php 
   class AuthQuery
   {
      
       public $conn;
       public function __construct() {
           $this->conn = connectDB();
       }
       
   
       public function login($email, $password) {
        try {
            $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            return $stmt->fetch();
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
   }
