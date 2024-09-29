<?php 

class ProductQuery
{
    public $conn;
    
    public function __construct()
    {
        $this->conn = connectDB();
    }
    
    public function getProducts()
    {
        try {
            $query = "SELECT * FROM products";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "<h1>Lỗi hàm getProducts trong model: " . $e->getMessage() . "</h1>";
            return [];  
        }
    }
    public function getLapTop()
    {
        try {
            $sql = "SELECT * FROM products WHERE category_id = 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $products = $stmt->fetchAll();
            return $products;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function getPhone()
    {
        try {
            $sql = "SELECT * FROM products WHERE category_id = 2";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $products = $stmt->fetchAll();
            return $products;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function searchProductsByName($name) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM products WHERE name_product LIKE ?");
            $stmt->execute(["%$name%"]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "<h1>Lỗi hàm searchProductsByName trong model: " . $e->getMessage() . "</h1>";
            return [];
        }
    }

    public function getProductById($id) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM products WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "<h1>Lỗi hàm getProductById trong model: " . $e->getMessage() . "</h1>";
            return null;
        }
    }
    public function add_comment($product_id, $user_id, $content)
    {
        try {
            $sql = "INSERT INTO comments (product_id, user_id, content, created_at) VALUES (:product_id, :user_id, :content, NOW())";
            $stmt = $this->conn->prepare($sql);
            $content = trim($content);
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            if ($stmt->execute()) {
                return true;
            } else {
                $errorInfo = $stmt->errorInfo();
                error_log("Error adding comment: " . $errorInfo[2]);
                return false;
            }
        } catch (PDOException $e) {
            error_log("PDOException: " . $e->getMessage());
            return false;
        }
    }


    public function get_comment($product_id)
    {
        $sql = "
            SELECT c.*, u.username, u.avatar, DATE_FORMAT(c.created_at, '%d-%m-%Y') AS created_date
            FROM comments AS c
            JOIN users AS u ON c.user_id = u.id
            WHERE c.product_id = :product_id
            ORDER BY c.created_at DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
        $comments = $stmt->fetchAll();
        return $comments;
    }
}

