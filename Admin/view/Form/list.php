<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
   
</head>
<body>

    
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Loại sản phẩm</th>
                <th>Tên</th>
                <th>Hình ảnh</th>
                <th>Màn hình</th>
                <th>Trọng lượng</th>
                <th>CPU</th>
                <th>RAM</th>
                <th>Bộ nhớ trong</th>
                <th>GPU</th>
                <th>Hệ điều hành</th>
                <th>Số lượng</th>
                <th>Tầm giá</th>
                <th>Lượt xem</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($danhSachSp as $s => $value) { ?>
    <tr>
        <td><?= $value['id'] ?></td>
        <td><?= $value['category_name'] ?></td>
        <td><?= $value['name_product'] ?></td>
        <td><img src="../admin/view/<?php echo $value['image'] ?>" alt="img" width="100" height="70" object-fit="cover"></td>        
        <td><?= $value['screen_size'] ?></td>
        <td><?= $value['description_1'] ?></td>
        <td><?= $value['description_2'] ?></td>
        <td><?= $value['description_3'] ?></td>
        <td><?= $value['description_4'] ?></td>
        <td><?= $value['description_5'] ?></td>
        <td><?= $value['description_6'] ?></td>
        <td><?= $value['quantity'] ?></td>  
        <td><?= $value['price'] ?></td>
        <td><?= $value['views'] ?></td>
        <td>
            <a href="?act=&id=<?= $value['id'] ?>">Sửa</a>
            <a href="?act=admin-delete&id=<?= $value['id'] ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>
        </td>
    </tr>
<?php } ?>

        </tbody>
    </table>
    <a href="?act=admin-create">Thêm sản phẩm</a>
</body>
</html>
