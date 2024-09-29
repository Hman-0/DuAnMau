<section>
    <form action="#" method="POST">
        <label for="name">Tên loại:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="description">Mô tả:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea>
        <br><br>
        <input type="submit" value="Thêm mới" class="submit-btn">
        <input type="reset" value="Nhập lại" class="reset-btn">
        <button type="button" class="cancel-btn" > <a href="danhsach.php">Danh sách</a></button>
    </form>
</section>