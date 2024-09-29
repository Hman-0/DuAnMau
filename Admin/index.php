<?php
// 1. Nhúng các file cần thiết
include_once "model/ProductQuery.php";
include_once "model/HomeQuery.php";
include_once "model/AuthQuery.php";
include_once "model/CmQuery.php";
include_once "model/CategoryQuery.php";
include_once "controller/ProductController.php";
include_once "controller/CmController.php";
include_once "controller/HomeController.php";
include_once "controller/AuthController.php";
include_once "controller/CateController.php";

require "./view/config/core.php";
require "./view/config/env.php";

// 2. Lấy các giá trị cần thiết từ đường dẫn url và bảo vệ chống XSS
$act = isset($_GET['act']) ? htmlspecialchars($_GET['act']):'';
$id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';

// 3. Tạo đối tượng cần thiết
$adminCtrl = new ProductController();
$authCtrl = new AuthController();
$homeCtrl =new HomeController();
$cmCtrl = new CommentController(); 
$cate = new CategoryController();  

// 4. Kiểm tra giá trị "act" và gọi phương thức tương ứng từ AuthController
try {
    if ($act === 'login') {
        $authCtrl->login();
    } else {
        $authCtrl->check_login();
        // Include header
        include '../Admin/view/layout/header.php';

        switch ($act) {
         
            case 'home':
                $homeCtrl->show();
                break;
            case 'user':
                $authCtrl->showUser();
                break;
            case 'auth-delete':
                $authCtrl->delete($id);
                break;
            case 'delete_user':
                $authCtrl->showUser();
                break;
            case 'product':
                $adminCtrl->showList();
                break;
            case 'admin-list':
                $adminCtrl->showList();
                break;
            case 'admin-delete':
                $adminCtrl->delete($id);
                break;
            case 'admin-create':
                $adminCtrl->view_form();
                break;
            case 'post_create':
                $adminCtrl->showCreate();
                break;
            case 'admin-update':
                $adminCtrl->form_update($id);
                break;
            case 'update_product':
                $adminCtrl->showUpdate();
                break;
            case 'login':
                $authCtrl->login();
                break;
            case 'comment':
                $cmCtrl->views_comments();
                break;
            case 'category':
                $cate->view_category();
                break;
            case 'delete_category':
                $cate->delete_category();
            case 'form_update_category':
                $cate->form_update_category($id);
                break;
         
            default:
                $adminCtrl->showList(); // Hoặc có thể chuyển hướng đến trang lỗi
                break;
        }

        // Include footer
        include '../Admin/view/layout/footer.php';
    }
} catch (Exception $e) {
    echo "Lỗi: " . $e->getMessage();
}
?>
