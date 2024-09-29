<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="../public/css/form.css">
    <style>
        .content-form {
            width: 500px;
            margin: auto;
        }
        button{
            width: 300px;
        }
        label{
            margin-left: 0;
        }
        textarea{
            max-width: 300px;
            width: 300px;
            min-width: 300px;
            min-height: 50px;
        }
    </style>
</head>
<body>
    <div class="content-form">
        <div class="form-container">
            <h1>Thêm Loai Hang</h1>
            <form action="?act=post_category" method="POST" enctype="multipart/form-data">
                <div class="thongtinsanpham">
                    <div class="form-row">
                        <label for="category">Category Name</label>
                        <input type="text" name="name"  placeholder="Category Name">

                        <label for="">Description</label>
                        <textarea name="description" placeholder="description"></textarea>
                    </div>
                </div>
                    <button type="submit">Submit</button>  
            </form>
        </div>
    </div>
</body>
</html>