<?php
class AuthController {
    public $user;

    public function __construct() {
        $this->user = new AuthQuery();
    }
    public function showUser() {
        $users = $this->user->all();
        require '../admin/view/Form/user_details.php';
    }
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $data = $this->user->auth($email, $password);
            // var_dump($data);    die();
            if ($data) {
                if ($data['role'] == 'admin') {
                    session_start();
                    $_SESSION['user_id'] = $data['id'];
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['role'] = $data['role'];
                    header("Location: ?act=admin-list");
                    exit();
                } else {
                 echo "Ban khong co quyen truy cap";
                }
            } else {
                echo  "Tai khoan hoac mat khau khong chinh xac";
            }
        }
        require '../admin/view/Form/login.php';
    }
    
    public function check_login() {
        session_start();
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['email'])) {
            header("Location: ?act=login");
            exit();
        }
    }
    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ?act=login");
        exit();
    }  
    public function delete($id) {
        // Kiểm tra nếu $id không rỗng và là số hợp lệ
        if (!empty($id) && is_numeric($id)) {
            $ketQua = $this->user->delete($id); // Gọi phương thức delete từ đối tượng đúng
            if ($ketQua == "ok") {
                header("Location: ?act=delete_user"); // Redirect nếu thành công
                exit(); // Dừng thực thi để không tiếp tục thực hiện các lệnh khác
            } else {
                // Xử lý trường hợp xóa không thành công
                echo "Xóa không thành công.";
            }
        } else {
            // Xử lý trường hợp id không hợp lệ
            echo "ID không hợp lệ.";
        }
    }
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ biểu mẫu
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $password = $_POST['password'] ?? '';
            $role = $_POST['role'] ?? '';

            // Xử lý tệp tải lên (nếu có)
            $avatar = '';
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = '../uploads/';
                $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
                move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);
                $avatar = basename($_FILES['avatar']['name']);
            }

            // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Thêm người dùng vào cơ sở dữ liệu
            $result = $this->user->addUser($name, $email, $phone, $avatar, $hashedPassword, $role);

            if ($result) {
                header("Location: ?act=user_list");
                exit();
            } else {
                echo "Error adding user.";
            }
        }
    }
    
}
?>