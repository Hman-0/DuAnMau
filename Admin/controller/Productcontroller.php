<?php

class ProductController {
    public $productQuery;
   

    public function __construct() {
        // Khởi tạo đối tượng productQuery
        $this->productQuery = new ProductQuery();
       
    }
    public function showList() {
        $danhSachSp = $this->productQuery->all();

        require_once "../admin/view/Form/list.php";
    } 
    
    public function view_form(){
        $categori=$this->productQuery->getCategories();
        require_once '../admin/view/Form/create.php';
      
    }
    public function form_update($id) {
        $product_value = $this->productQuery->getProductByID($id);
        $categori = $this->productQuery->getCategories(); // Lấy tất cả danh mục
    
        if ($product_value) {
            $product_value = $product_value[0];
            require_once '../admin/view/Form/update.php';
        } else {
            echo "Không tìm thấy sản phẩm";
        }
    }
    public function showCreate() {
       if($_SERVER["REQUEST_METHOD"]=="POST"){
            $categori=$_POST['category_id'];
            $name_product=$_POST['name_product'];
            $quantity=$_POST['quantity'];
            $description_1=$_POST['description_1'];
            $description_2=$_POST['description_2'];
            $description_3=$_POST['description_3'];
            $description_4=$_POST['description_4'];
            $description_5=$_POST['description_5'];
            $description_6=$_POST['description_6'];
            $price=$_POST['price'];
            $img=$_FILES['file_upload'];
            $screen_size=$_POST['screen_size'];
      
            if($this->productQuery->insert(  $categori, $name_product, $quantity, $description_1, $description_2, $description_3, $description_4, $description_5, $description_6,$price,uploadFile($img,'./upload/'), $screen_size)){
                header('Location: ?act-list');
            }
       }
    }
    
   
    public function delete($id)
    {
        if($id !==""){
            $ketQua=$this->productQuery->delete($id);
            if($ketQua == "ok"){
                header("Location: ?act=admin-list");
            }
         
       
    }
    }
    public function showUpdate() {
        $id = $_POST['id'];
        $category = $_POST['category_id'];
        $name_product = $_POST['name_product'];
        $screen_size = $_POST['screen_size'];
        $description_1 = $_POST['description_1'];
        $description_2 = $_POST['description_2'];
        $description_3 = $_POST['description_3'];
        $description_4 = $_POST['description_4'];
        $description_5 = $_POST['description_5'];
        $description_6 = $_POST['description_6'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $img = $_FILES['img'];
        $new_img = $_POST['old_img'];
    
        if (isset($_FILES['img']) && $_FILES['img']['error'] == UPLOAD_ERR_OK) {
            if (!empty($new_img)) {
                deleteFile($new_img);
            }
            $new_img = uploadFile($img, '../admin/view/uploads/');
        }
    
        if ($this->productQuery->update($id, $category, $name_product, $screen_size, $description_1, $description_2, $description_3, $description_4, $description_5, $description_6, $quantity, $price, $new_img)) {
            header('Location: ?act=admin-list');
            exit();
        } else {
            echo "Lỗi cập nhật sản phẩm";
        }
    }}


?>
