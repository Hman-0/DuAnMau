<?php

class AuthController
{
    public $auth;

    public function __construct(){
        $this->auth = new AuthQuery();
    }

    public function login() {
        session_start(); // Ensure session is started

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            
            $data = $this->auth->login($email, $password);

            if ($data) {
                if ($data['role'] == 'user') {
                    $_SESSION['user_id'] = $data['id'];
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['role'] = $data['role'];
                    header("Location: ?act=home");
                    exit();
                }
            } else {
                $error = "Tài khoản hoặc mật khẩu không chính xác";
            }
        }

        // Only require the login form without the header if not logged in
        require '../other/view/form/login.php';
    }

    public function logout() {
        session_start(); // Ensure session is started
        session_destroy();
        header("Location: ?act=home");
        exit();
    }
}
