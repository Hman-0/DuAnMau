<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
    <link rel="stylesheet" href="./view/css/create.css">
    <style>

    </style>
</head>

<body>
    <div class="content-form">
        <div class="form-container">
            <h1>Thêm Sản Phẩm</h1>

            <form action="?act=post_create" method="POST" enctype="multipart/form-data">

                <div class="thongtinsanpham">
                    <div class="form-row">
                        <label for="category">Category</label>
                        <select name="category_id" id="category_id">
                            <?php foreach ($categori as $category) : ?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-row">
                        <label for="name_product">Tên Sản Phẩm</label>
                        <input type="text" name="name_product" id="name_product" placeholder="Tên Sản Phẩm">
                    </div>
                    <div class="form-row">
                        <label for="quantity">Số Lượng</label>
                        <input type="number" name="quantity" id="quantity" placeholder="Số Lượng">
                    </div>

                    <div class="form-row">
                        <label for="hedieuhanh">Trọng Lương</label>
                        <input type="text" name="description_1" id="hedieuhanh" placeholder="Trọng Lượng">
                    </div>

                    <div class="form-row">
                        <label for="cpu">CPU</label>
                        <input type="text" name="description_2" id="cpu" placeholder="CPU">
                    </div>
                    <div class="form-row">
                        <label for="ram">RAM</label>
                        <input type="text" name="description_3" id="ram" placeholder="RAM">
                    </div>
                    <div class="form-row">
                        <label for="rom">Bộ Nhớ Trong</label>
                        <input type="text" name="description_4" id="rom" placeholder="Bộ Nhớ Trong">
                    </div>
                    <div class="form-row">
                        <label for="gpu">GPU</label>
                        <input type="text" name="description_5" id="gpu" placeholder="GPU">
                    </div>


                    <div class="form-row">
                        <label for="trongluong">Hệ điều hành </label>
                        <input type="text" name="description_6" id="trongluong" placeholder="Hệ Điều Hành">
                    </div>
                    <div class="form-row">
                        <label for="gia">Giá</label>
                        <input type="text" name="price" id="gia" placeholder="Giá Gốc">
                    </div>


                </div>

                <div class="bottom">
                    <div class="img">
                        <div class="form-row">
                            <label for="manhinh">Kích Thước Màn Hình</label>
                            <input type="text" name="screen_size" id="manhinh" placeholder="Kích Thước Màn Hình">
                        </div>
                        <label for="img">Ảnh Sản Phẩm</label>
                        <input type="file" name="file_upload" id="file_upload" required onchange="previewImage(event)">

                        <label for="preview-img">Xem Trước</label>
                        <div class="preview-img" id="preview-img"></div>
                    </div>
                    <div class="mota">
                        <label for="description">Mô tả chi tiết</label>
                        <textarea name="description_7" id="description" class="description" placeholder="Nhập mô tả chi tiết sản phẩm"></textarea>
                    </div>
                </div>

                <button type="submit" name="submit">Thêm</button>
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