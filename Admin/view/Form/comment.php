<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<div class="container">
    <div class="row">
        <table class="table">
            <h2>Comment</h2>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Product ID</th>
                    <th>Content</th>
                    <th>Create at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($list_comments as $key => $value) :?>
                <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><?php echo $value['username'] ?></td>
                    <td><?php echo $value['product_id'] ?></td>
                    <td><?php echo $value['content'] ?></td>
                    <td><?php echo $value['created_at'] ?></td>


                   
                    <td>
            <a href="?act=admin-update&id=<?= $value['id'] ?>">Sửa</a>
            <a href="?act=admin-delete&id=<?= $value['id'] ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>
        </td>
                </tr>
            <?php endforeach ;?>
            </tbody>
        </table>
       
    </div>
</div>
</body>
</html>
