
<?php

class ProductController
{
    private $product;
    public function __construct()   {
        $this->product = new ProductQuery();
    }

    public function showList() {
        $danhSachSp = $this->product->getProducts();
        require_once "../other/view/form/home.php";



    }
    public function search() {
        if (isset($_POST['search'])) {
            $name= $_POST['search'];
            $products = $this->product->searchProductsByName($name);
           require '../other/view/form/search.php';
        } else {
            echo "Search term not set";
        }
    }
    function view_laptop()
    {
        $list_laptop = $this->product->getLapTop();
        require_once '../other/view/form/laptop.php';
    }
    function view_phone()
    {
        $list_phone = $this->product->getPhone();
        require_once '../other/view/form/phone.php';    
    }

    public function add_comment()
    {
        $product_id = $_POST['product_id'];
        $user_id = $_SESSION['user_id'];
        $content = $_POST['content'];

        if($this->product->add_comment($product_id, $user_id, $content)){
            header('Location: ?act=product_detail&id='.$product_id);
        };
    }
    
    
    public function product_detail()
    {
        // Kiểm tra xem có ID sản phẩm không
        if (isset($_GET['id'])) {
            $product_id = intval($_GET['id']);
    
            // Tăng số lượt xem của sản phẩm
         
    
            // Lấy thông tin sản phẩm
            $product = $this->product->getProductById($product_id);
    
            // Lấy bình luận của sản phẩm
            $comments = $this->product->get_comment($product_id);
    
            if ($product) {
                // Gọi view để hiển thị chi tiết sản phẩm
                require_once '../other/view/form/product.php';
            } else {
                echo "Sản phẩm không tồn tại.";
            }
        } else {
            echo "ID sản phẩm không tồn tại.";
        }
    }
    
}
