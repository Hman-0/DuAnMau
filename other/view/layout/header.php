
<?php
session_start();
?> 
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../other/view/css/style.css">
    <link rel="stylesheet" href="../other/view/css/product.css">
    <title>Trang chủ</title>
</head>
<body>
    <!-- Nội dung HTML tiếp theo -->

<nav>
    <div class="logo">
        <img src="../other/view/img/th__1_-removebg-preview.png" alt="logo" width="60px" height="60px">
    </div>
    <div class="search">
        <form action="?act=search" method="POST">
            <input type="search" name="search" placeholder="Tìm kiếm sản phẩm....">
            <button type="submit">Tìm kiếm</button>
        </form>
    </div>
    <div class="menu">
        <ul>
            <li><ion-icon name="home-outline"></ion-icon><a href="?act=home" class="cach">Trang chủ</a></li>
            <li><ion-icon name="call-outline"></ion-icon><a href="" class="cach">Liên hệ</a></li>
            <li><ion-icon name="help-circle-outline"></ion-icon><a href="" class="cach">Hỗ trợ</a></li>
            <li><ion-icon name="cart-outline"></ion-icon><a href="" class="cach">Giỏ hàng</a></li>
            <li class="menu-item">
                <ion-icon name="person-outline"></ion-icon>
                <div class="dropdown-menu">
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        echo '<a href="#">Xin chào, ' . htmlspecialchars($_SESSION['email']) . '</a>';
                        echo '<a href="?act=logout">Đăng xuất</a>';
                    } else {
                        echo '<a href="?act=login">Đăng nhập</a>';
                    }
                    ?>
                </div>
            </li>
        </ul>
    </div>
</nav>
<header class="navbar">
    <ul>
        <li><a href="?act=phone"><ion-icon name="phone-portrait-outline"></ion-icon><span>ĐIỆN THOẠI</span></a></li>
        <li><a href="#"><ion-icon name="logo-apple"></ion-icon><span>APPLE</span></a></li>
        <li><a href="?act=laptop"><ion-icon name="laptop-outline"></ion-icon><span>LAPTOP</span></a></li>
        <li><a href="#"><ion-icon name="tablet-portrait-outline"></ion-icon><span>TABLET</span></a></li>
        <li><a href="#"><ion-icon name="desktop-outline"></ion-icon><span>MÀN HÌNH</span></a></li>
        <li><a href="#"><ion-icon name="tv-outline"></ion-icon><span>ĐIỆN MÁY</span></a></li>
        <li><a href="#"><ion-icon name="watch-outline"></ion-icon><span>ĐỒNG HỒ</span></a></li>
        <li><a href="#"><ion-icon name="headset-outline"></ion-icon><span>ÂM THANH</span></a></li>
        <li><a href="#"><ion-icon name="home-outline"></ion-icon><span>SMART HOME</span></a></li>
        <li><a href="#"><ion-icon name="cable-outline"></ion-icon><span>PHỤ KIỆN</span></a></li>
        <li><a href="#"><ion-icon name="sync-outline"></ion-icon><span>THU CŨ ĐỔI MỚI</span></a></li>
        <li><a href="#"><ion-icon name="hammer-outline"></ion-icon><span>SỬA CHỮA</span></a></li>
        <li><a href="#"><ion-icon name="document-text-outline"></ion-icon><span>DỊCH VỤ</span></a></li>
        <li><a href="#"><ion-icon name="newspaper-outline"></ion-icon><span>TIN HOT</span></a></li>
        <li><a href="#"><ion-icon name="flash-outline"></ion-icon><span>ƯU ĐÃI</span></a></li>
    </ul>
</header>
<div class="slide-show">
    <div class="list-img">
        <div class="item">
            <img src="../other/view/img/anh1.jpg" alt="">
        </div>
        <div class="item">
            <img src="../other/view/img/anh2.jpg" alt="">
        </div>
        <div class="item">
            <img src="../other/view/img/anh3.jpg" alt="">
        </div>
        <div class="item">
            <img src="../other/view/img/anh4.jpg" alt="">
        </div>
    </div>
    <div class="btn">
        <button id="prev"><ion-icon name="arrow-back-outline"></ion-icon></button>
        <button id="next"><ion-icon name="arrow-forward-outline"></ion-icon></button>
    </div>
</div>
<div class="image-row">
    <img src="https://cdn.hoanghamobile.com/i/home/Uploads/2024/07/03/sanphamhot-s23_638556209347180526.png" alt="">
    <img src="https://cdn.hoanghamobile.com/i/home/Uploads/2024/07/04/macbook-air-m1.png" alt="">
    <img src="https://cdn.hoanghamobile.com/i/home/Uploads/2024/05/20/sanphamhot-thu-cu_638518167272108503.png" alt="">
    <img src="https://cdn.hoanghamobile.com/i/home/Uploads/2024/07/04/matebook-d-15.png" alt="">
</div>
<script src="../other/view/js/banner.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

