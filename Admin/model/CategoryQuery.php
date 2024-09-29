<?php

class Category {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getCategories() {
        try {
           $sql = "SELECT 
                    c.id, 
                    c.name, 
                  
                    COUNT(p.id) AS product_count
                FROM 
                    categories c
                LEFT JOIN 
                    products p ON c.id = p.category_id
                GROUP BY 
                    c.id, c.name";
            $stmt = $this->conn->prepare($sql);
            $stmt -> execute();
            return $stmt-> fetchAll();
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function categorybyid($id) {
        try {
            $sql = "SELECT * FROM categories WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            return $stmt-> fetch();
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function add($name, $description) {
        try {
            $sql = "INSERT INTO categories (name) VALUES (:name)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':name', $name);

            return $stmt->execute();
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function update($id, $name) {
        try {
            $sql = "UPDATE categories SET name = :name WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
          
            return $stmt->execute();
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function delete($id) {
        try {
            $sql = "DELETE FROM categories WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();  
        }
    }
    public function getCategorybyID($id) {
        try {
            $sql = "SELECT * FROM categories WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt-> fetchAll();
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
   
}
