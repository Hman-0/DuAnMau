<?php 
// Bao gồm các tệp cần thiết
require_once "../other/controller/ProductController.php";
require_once "../other/model/ProductQuery.php";
require_once "../other/controller/AuthController.php";
require_once "../other/model/AuthQuery.php";
require "./view/config/core.php";
require "./view/config/env.php";

// Xử lý các biến GET
$act = isset($_GET['act']) ? htmlspecialchars($_GET['act']) : 'home';
$id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';

// Tạo các đối tượng controller
$productController = new ProductController();
$authCtrl = new AuthController();

if ($act == 'login') {
    $authCtrl->login();
} elseif ($act == 'logout') {
    $authCtrl->logout();
} else {
    // Bao gồm header
    include "../other/view/layout/header.php";

    // Chuyển hướng đến các phương thức tương ứng dựa trên hành động
    switch ($act) {
        case 'home':
            $productController->showList(); // Hiển thị danh sách sản phẩm
            break;
        case 'product_detail':
            $productController->product_detail(); // Xem chi tiết sản phẩm
            break;
        case 'search':
            $productController->search(); // Tìm kiếm sản phẩm
            break;
        case 'phone':
            $productController->view_phone(); // Xem sản phẩm điện thoại
            break;
        case 'laptop':
            $productController->view_laptop(); // Xem sản phẩm laptop
            break;
        case 'add_comment':
            $productController->add_comment(); 
            break;
        // default:
        //     // require "../other/view/layout/header.php";
        //     break;
    }

    // Bao gồm footer
    include "../other/view/layout/footer.php";
}
?>
