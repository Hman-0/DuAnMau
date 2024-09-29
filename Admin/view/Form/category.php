<div class="container">
    <div class="row">
        <table class="table">
            <h2>Category</h2>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>

                    <th>Product Count</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
             
                            <?php foreach ($list_category as $category) : ?>
                <tr>
                    <td><?php echo $category['id']; ?></td>
                    <td><?php echo $category['name']; ?></td>
                    <td><?php echo $category['product_count']; ?></td>
                    <td>
                    <a href="?act=form_update_category&id=<?= $category['id'] ?>">Sửa</a>
                    <a href="?act=delete_category&id=<?= $category['id'] ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>
                 
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
       
    </div>
</div>
