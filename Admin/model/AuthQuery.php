<?php

class AuthQuery {
    private $conn;

    public function __construct() {
        $this->conn = connectDB(); ;
    }

    public function auth($email, $password) {
        try {
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($user) {
                if ($password === $user['password']) {
                    return $user;
                } else {
                    echo "Password verification failed";
                }
            } else {
               ;
            }
            return false;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function all() {
        try {
            $sql = "SELECT * FROM users"; // Loại bỏ điều kiện WHERE
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về mảng các hàng
    
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function delete($id) {
        try {
            // Sử dụng prepared statement để ngăn chặn SQL Injection
            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            // Kiểm tra số lượng hàng bị ảnh hưởng
            if ($stmt->rowCount() === 1) {
                return "ok";
            } else {
                return "No record deleted.";
            }
        } catch (PDOException $error) {
            // Sử dụng PDOException để xử lý lỗi
            return "Error deleting record: " . $error->getMessage();
        }
    }
    public function addUser($name, $email, $phone, $avatar, $password, $role) {
        try {
            $sql = "INSERT INTO users (name, email, phone, avatar, password, role) VALUES (:name, :email, :phone, :avatar, :password, :role)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':avatar', $avatar);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':role', $role);

            return $stmt->execute(); // Trả về true nếu thành công, false nếu không
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
}
?>
