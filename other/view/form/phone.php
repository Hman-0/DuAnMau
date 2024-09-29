

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../other/view/css/home.css">
    <title>Document</title>
</head>
<body>
    



        <div class="product-container">
        <?php foreach ($list_phone as $key => $value) {?>
        <div class="product">
    <img src="../admin/view/<?php echo $value['image'] ?>" alt="img">
    <div class="product-info">
        <ul>
        <h2><?php echo $value['name_product'] ?></h2><br>
        <li><img src="../other/view/img/icons8-screen-50.png" alt=""><?php echo $value['screen_size'] ?>''</li>
        <li><img src="../other/view/img/icons8-weight-50.png" alt=""><?php echo $value['description_1'] ?>Kg</li>
        <li><img src="../other/view/img/icons8-electronics-50 (1).png" alt=""><?php echo $value['description_2'] ?></li>
        <li><img src="../other/view/img/icons8-ram-24.png" alt=""><?php echo $value['description_3'] ?>G</li>
        <li><img src="../other/view/img/icons8-ssd-50.png" alt=""><?php echo $value['description_4'] ?>G</li>
        <li><img src="../other/view/img/icons8-video-card-100.png" alt=""><?php echo $value['description_5'] ?></li>
        <li><img src="../other/view/img/icons8-resolution-64.png" alt=""><?php echo $value['description_6'] ?></li>
        <li><?php echo $value['quantity'] ?></li>
        <li><?php echo $value['price'] ?></li><br>
        <button class="view-product" >Mua ngay</button>
        <a href="?act=product_detail&id=<?php echo $value['id'] ?>"><button class="view-product" >Xem chi tiết </button></a>

        
        </ul>
    </div>
</div>

    <?php } ?>
</div>
</body>
</html>


 