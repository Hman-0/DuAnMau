<?php 
    class ProductQuery{
        public $conn;

        // Khai báo phương thức
        public function __construct()
        {
          $this->conn= connectDB();
        }

        public function all()
        {
            // Khai báo try catch
            try {
                $sql = "
                SELECT p.id, p.name_product, p.screen_size, p.quantity, p.description_1, p.description_2, p.description_3, p.description_4, p.description_5, p.description_6,    p.image, p.price, p.views,c.name as category_name
                FROM products p 
                JOIN categories c ON p.category_id = c.id
            ";                $stmt  = $this->conn->prepare($sql);
                $stmt->execute();
                return $stmt ->fetchAll();
                
            } catch (Exception $error) {
                echo "<h1>";
                echo "Lỗi hàm all trong model: " . $error->getMessage();
                echo "</h1>";
            }
        }
        public function delete($id){
            try{
             $sql="DELETE FROM `products` WHERE id=$id";
             $data=$this->conn->exec($sql);
             if($data == 1){
                 return "ok";
             }
            
            }catch (Exception $error) {
             echo "<h1>";
             echo "Lỗi Delete: " . $error->getMessage();
             echo "</h1>";
         }
            
     }
     public function insert($category_id, $name_product, $quantity, $description_1, $description_2, $description_3, $description_4, $description_5, $description_6, $price, $img, $screen_size, $views = 0) {
        try {
            $sql = "INSERT INTO `products` (`category_id`, `name_product`, `screen_size`, `description_1`, `description_2`, `description_3`, `description_4`, `description_5`, `description_6`, `quantity`, `image`, `price`, `views`) 
                    VALUES (:category_id, :name_product, :screen_size, :description_1, :description_2, :description_3, :description_4, :description_5, :description_6, :quantity, :image, :price, :views)";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':category_id', $category_id);
            $stmt->bindParam(':name_product', $name_product);
            $stmt->bindParam(':screen_size', $screen_size);
            $stmt->bindParam(':description_1', $description_1);
            $stmt->bindParam(':description_2', $description_2);
            $stmt->bindParam(':description_3', $description_3);
            $stmt->bindParam(':description_4', $description_4);
            $stmt->bindParam(':description_5', $description_5);
            $stmt->bindParam(':description_6', $description_6);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':image', $img);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':views', $views); // Bind giá trị cho views
    
            $result = $stmt->execute();
    
            return $result;
    
        } catch (Exception $error) {    
            echo "<h1>";
            echo "Lỗi Insert: " . $error->getMessage();
            echo "</h1>";
            return false;
        }
    }
    public function update($id, $category, $name_product, $screen_size, $description_1, $description_2, $description_3, $description_4, $description_5, $description_6, $quantity, $price, $image) {
        try {
            $sql = "
                UPDATE products
                SET
                    category_id = :category_id,
                    name_product = :name_product,
                    screen_size = :screen_size,
                    quantity = :quantity,
                    description_1 = :description_1,
                    description_2 = :description_2,
                    description_3 = :description_3,
                    description_4 = :description_4,
                    description_5 = :description_5,
                    description_6 = :description_6,
                    price = :price,
                    image = :image
                WHERE id = :id
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':category_id', $category);
            $stmt->bindParam(':name_product', $name_product);
            $stmt->bindParam(':screen_size', $screen_size);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':description_1', $description_1);
            $stmt->bindParam(':description_2', $description_2);
            $stmt->bindParam(':description_3', $description_3);
            $stmt->bindParam(':description_4', $description_4);
            $stmt->bindParam(':description_5', $description_5);
            $stmt->bindParam(':description_6', $description_6);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':image', $image);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    
        public function getproductbyID($id) {
        try {
            $sql = "SELECT p.*, c.name AS category_name FROM products p 
                    JOIN categories c ON p.category_id = c.id
                    WHERE p.id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id); // Sử dụng tham số đặt tên
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Sử dụng PDO::FETCH_ASSOC để trả về dạng mảng kết hợp
        } catch (Exception $e) {
            echo "Failed to get product: " . $e->getMessage();
        }
    }
    
    
    



public function getCategories() {
    try {
        $sql = "SELECT * FROM categories";
        $stmt = $this->conn->prepare($sql);
        $stmt -> execute();
        return $stmt-> fetchAll();
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}   


    }
    
?>