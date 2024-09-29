<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sản phẩm</title>
    <link rel="stylesheet" href="./view/css/create.css">
</head>

<body>
    <div class="content-form">
        <div class="form-container">
            <h1>Chỉnh sửa sản phẩm</h1>

            <form action="?act=update_product" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $product_value['id']; ?>">

                <div class="thongtinsanpham">
                    <div class="form-row">
                        <label for="category_id">Danh Mục</label>
                        <select name="category_id" id="category_id">
                            <?php foreach ($categori as $category) : ?>
                                <option value="<?php echo $category['id']; ?>" <?php echo ($product_value['category_id'] == $category['id']) ? 'selected' : ''; ?>>
                                    <?php echo $category['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-row">
                        <label for="name_product">Tên Sản Phẩm</label>
                        <input type="text" name="name_product" id="name_product" placeholder="Tên Sản Phẩm" value="<?php echo $product_value['name_product']; ?>">
                    </div>
                    <div class="form-row">
                        <label for="quantity">Số Lượng</label>
                        <input type="number" name="quantity" id="quantity" placeholder="Số Lượng" value="<?php echo $product_value['quantity']; ?>">
                    </div>
                    <div class="form-row">
                        <label for="trongluong">Trọng lượng</label>
                        <input type="text" name="description_1" id="trongluong" placeholder="Trọng lượng" value="<?php echo $product_value['description_1']; ?>">
                    </div>
                    <div class="form-row">
                        <label for="cpu">CPU</label>
                        <input type="text" name="description_2" id="cpu" placeholder="CPU" value="<?php echo $product_value['description_2']; ?>">
                    </div>
                    <div class="form-row">
                        <label for="ram">RAM</label>
                        <input type="text" name="description_3" id="ram" placeholder="RAM" value="<?php echo $product_value['description_3']; ?>">
                    </div>
                    <div class="form-row">
                        <label for="rom">Bộ Nhớ Trong</label>
                        <input type="text" name="description_4" id="rom" placeholder="Bộ Nhớ Trong" value="<?php echo $product_value['description_4']; ?>">
                    </div>
                    <div class="form-row">
                        <label for="gpu">GPU</label>
                        <input type="text" name="description_5" id="gpu" placeholder="GPU" value="<?php echo $product_value['description_5']; ?>">
                    </div>
                    <div class="form-row">
                        <label for="hedieuhanh">Hệ điều hành</label>
                        <input type="text" name="description_6" id="hedieuhanh" placeholder="Hệ Điều Hành" value="<?php echo $product_value['description_6']; ?>">
                    </div>
                    <div class="form-row">
                        <label for="gia">Giá</label>
                        <input type="number" name="price" id="gia" placeholder="Giá" value="<?php echo $product_value['price']; ?>">
                    </div>
                </div>

                <div class="bottom">
                    <div class="img">
                        <div class="form-row">
                            <label for="manhinh">Kích Thước Màn Hình</label>
                            <input type="text" name="screen_size" id="manhinh" placeholder="Kích Thước Màn Hình" value="<?php echo $product_value['screen_size']; ?>">
                        </div>
                        <label for="img">Ảnh Sản Phẩm</label>
                        <input type="file" name="img" onchange="previewImage(event)">
                        <input type="hidden" name="old_img" id="old_img" value="<?php echo $product_value['image']; ?>">
                        <label for="preview-img">Xem Trước</label>
                        <div class="preview-img" id="preview-img"></div>
                        <img src="../admin/view/<?php echo $product_value['image']; ?>" alt="Ảnh xem trước" width="300px" height="170px">
                    </div>
                    <div class="mota">
                        <label for="description">Mô tả chi tiết</label>
                        <textarea name="description_7" id="description" class="description" placeholder="Nhập mô tả chi tiết sản phẩm"> </textarea>
                    </div>
                </div>

                <button type="submit" name="submit">Cập Nhật</button>
            </form>
        </div>
    </div>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview-img');
                output.innerHTML = '<img src="' + reader.result + '" alt="Ảnh xem trước">';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>
