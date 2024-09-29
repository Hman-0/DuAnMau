

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Sản Phẩm</title>
    <script src="../other/view/js/comment.js"></script>
    <link rel="stylesheet" href="../other/view/css/product.css">
</head>
<body>

    <?php if (isset($product) && !empty($product)) { ?>

    <div class="product-page">
        <div class="product-main">
            <div class="product-image">
                <img src="../admin/view/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name_product']); ?>">
            </div>
            <div class="product-details">
                <h1><?php echo htmlspecialchars($product['name_product']); ?></h1>
                <div class="rating">
                    <span>4.9</span> 
                    <span class="stars">★★★★★</span>
                    <span>94 Đánh Giá</span>
                    <span>312 Đã Bán</span>
                </div>
                <div class="price">
                    <span class="original-price">47.290.000đ</span>
                    <span class="current-price"><?php echo htmlspecialchars($product['price']); ?></span>
                    <span class="discount">16% GIẢM</span>
                </div>
                <div class="options">
                    <div class="option">
                        <label for="version">Phiên bản</label>
                        <button id="version"><?php echo htmlspecialchars($product['description_4']); ?>GB</button>
                    </div>
                </div>
                <div class="specifications">
                    <h3>Thông số kỹ thuật</h3>
                    <ul>
                        <li>Hệ điều hành: <?php echo htmlspecialchars($product['description_6']); ?></li>
                        <li>Màn hình: <?php echo htmlspecialchars($product['screen_size']); ?>''</li>
                        <li>Trọng lượng: <?php echo htmlspecialchars($product['description_1']); ?>Kg</li>
                        <li>CPU: <?php echo htmlspecialchars($product['description_2']); ?></li>
                        <li>Ram: <?php echo htmlspecialchars($product['description_3']); ?>G</li>
                        <li>SSD: <?php echo htmlspecialchars($product['description_4']); ?>G</li>
                        <li>GPU: <?php echo htmlspecialchars($product['description_5']); ?></li>
                    </ul>
                </div>
                <div class="quantity">
                    <label for="quantity">Số lượng</label>
                    <input type="number" id="quantity" name="quantity" min="1" max="32" value="1">
                </div>
                <div class="buttons">
                    <button class="buy-now">Mua Ngay</button>
                    <button class="add-to-cart">Thêm Vào Giỏ Hàng</button>
                </div>
            </div>
        </div>
        <div class="comments">
            <?php if (!empty($_SESSION['user_id'])) : ?>

                <span class="text_detail">Bình Luận</span>
                <form method="post" action="?act=add_comment" enctype="multipart/form-data">
                    <textarea name="content" placeholder="Viết bình luận của bạn ở đây..." required></textarea>
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <button type="submit" class="submit-comment">Gửi</button>
                </form>

            <?php else : ?>
                <span class="text_detail">Bình Luận</span>
                <textarea name="content" placeholder="Viết bình luận của bạn ở đây..." required></textarea>
                <button type="submit" class="submit-comment" id="btn">Gửi</button>
            <?php endif; ?>

            <div class="comment-list">
                <?php
                // Khởi tạo biến $comments với mảng rỗng nếu chưa được xác định
                $comments = isset($comments) ? $comments : [];
                foreach ($comments as $comment) : ?>
                    <div class="comment">
                        <p><strong><?php echo htmlspecialchars($comment['username']); ?>:</strong> <?php echo htmlspecialchars($comment['content']); ?></p>
                        <span><?php echo htmlspecialchars($comment['created_at']); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

    <?php } else { ?>
    <p>Sản phẩm không tồn tại.</p>
    <?php } ?>

</body>
</html>
