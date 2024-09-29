<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../public/css/login.css">
    <style>
      /* Định dạng chung cho toàn bộ trang */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Định dạng cho khối chứa form */
.content-form {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
}

/* Định dạng cho khối chứa form và logo */
.form-container {
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 40px;
    width: 100%;
}

/* Định dạng cho logo */
.logo {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 20px;
}

.logo img {
    max-width: 100px;
    margin-bottom: 10px;
}

.logo p {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin: 0;
}

/* Định dạng cho các trường form */
.form-row {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

/* Định dạng cho các thẻ label */
label {
    font-size: 14px;
    color: #333;
    margin-bottom: 5px;
}

/* Định dạng cho các trường nhập liệu */
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
}

input[type="email"]:focus,
input[type="password"]:focus {
    border-color: #007bff;
    outline: none;
}

/* Định dạng cho nút submit */
button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 10px;
    font-size: 14px;
    cursor: pointer;
    width: 100%;
    margin-top: 10px;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

/* Định dạng cho các liên kết và thông báo lỗi */
.for-gotpw {
    font-size: 14px;
    color: #333;
    margin-top: 10px;
}

.for-gotpw a {
    color: #007bff;
    text-decoration: none;
    transition: color 0.3s ease;
}

.for-gotpw a:hover {
    color: #0056b3;
    text-decoration: underline;
}

.err p {
    color: red;
    margin: 0;
}

    </style>
</head>

<body>
    <div class="content-form">
        <div class="form-container">
            <div class="logo">
                <img src="../public/img/logo2.png" alt="">
                <p>Login</p>
            </div>
            <form action="?act=login" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <label for="">Email</label>
                    <input type="email" name="email" placeholder="Email">

                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password">
                    <div class="err">
                        <?php
                        if (isset($error)) {
                            echo '<p style="color: red;">' . $error . '</p>';
                        }
                        ?>
                    </div>

                    <button type="submit" name="submit">Login</button>
                </div>
                <div class="login-row">
                    <div class="for-gotpw">
                        <a href="?act=forgot_password">Forgot Password</a>
                    </div>
                    <div class="for-gotpw">
                        <p>Don't have an account? <a href="?act=register">Register</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>